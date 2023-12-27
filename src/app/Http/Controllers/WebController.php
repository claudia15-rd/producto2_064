<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

use App\Models\Acto;
use App\Models\TipoUsuario;
use App\Models\Persona;
use App\Models\Usuario;

class WebController extends Controller
{
    public function getEventos() {
        $actos=Acto::whereDate('Fecha', '>', now())->get();
        $eventosAgrupados = array();

        foreach ($actos as $evento) {
            $fecha = $evento['Fecha']; // Ajusta el formato según tu estructura de fecha

            if (!isset($eventosAgrupados[$fecha])) {
                $eventosAgrupados[$fecha] = array();
            }
            
            $eventosAgrupados[$fecha][] = $evento;
        }

        return view('eventos')->with('actos',$eventosAgrupados);
    }
    public function getEventoDetalle($id){
        $evento=Acto::find($id);
        //$ponentes=Acto::GetPonentes($id);
        $userId=session('userId');
        $inscrito=false;
        if(isset($userId)){
            $inscrito=Acto::IsInscribed($id,session('userId'));
        }
        return view('evento-detalle')->with('evento',$evento)->with('inscrito',$inscrito); 
        
    }

    public function getFormularioInscripcion(Request $request){
        $acto = $request->query('id');
        return view('formulario-inscripcion')->with('acto', $acto);
    }

    public function postFormularioInscripcion(Request $request){
        $acto = $request->query('id');
        $persona = Persona::create([
            'Nombre' => $request->input('nombre'),
            'Apellido1' => $request->input('primerApellido'),
            'Apellido2' => $request->input('segundoApellido'),
        ]);

        Usuario::altaUsuario(
            $request->input('username'),
            $request->input('password'),
            $persona->Id_persona,
            3
        );

        $usuario = Usuario::where('Id_Persona', $persona->Id_persona)->first();

        Acto::Suscribe($persona->Id_persona, $acto);
        session([
            'userId' => $usuario->Id_usuario,
            'personId' => $usuario->Id_Persona,
            'userTypeId' => $usuario->Id_tipo_usuario
        ]);
        return redirect("/evento/".$acto);
    }
}
