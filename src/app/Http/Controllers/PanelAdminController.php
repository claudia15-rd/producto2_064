<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Acto;
use App\Models\TipoActo;
use App\Models\Usuario;
use App\Models\Ponente;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;

class PanelAdminController extends Controller
{

    //apalac
    public $id; // Declara una propiedad para almacenar $id del acto y agregarle el ponente
    //apalac

    public function getActos()
    {
        $eventos = Acto::all();
        $eventosAgrupados = array();

        foreach ($eventos as $evento) {
            $fecha = $evento['Fecha']; // Ajusta el formato según tu estructura de fecha

            if (!isset($eventosAgrupados[$fecha])) {
                $eventosAgrupados[$fecha] = array();
            }

            $eventosAgrupados[$fecha][] = $evento;
        }
        return view('panel-admin-actos')->with('actos', $eventosAgrupados);
    }
    public function getCrearActo()
    {
        $acttypes = TipoActo::all();
        return view('panel-admin-crear-acto')->with('acttypes', $acttypes);
    }
    public function getEditarActo(Request $request)
    {
        $id = $request->query('id');
        $acto = Acto::find($id);
        $acttypes = TipoActo::all();
        return view('panel-admin-detalle-acto')->with('acto', $acto)->with('acttypes', $acttypes);
    }
    public function postCrearActo(Request $request)
    {
        Acto::InsertarActo(
            $request->input('titulo'),
            $request->input('descripcion'),
            $request->input('fechaHora'),
            $request->input('tipoActo'),
            $request->input('numAsistentes'),
            $request->input('descripcionLarga'),
        );
        return redirect('/paneladmin/actos');
    }
    public function postEditarActo(Request $request)
    {
        list($fecha, $hora) = explode('T', $request->input('fechaHora'));
        $id = $request->query('id');
        Acto::find($id)->update([
            'Titulo' => $request->input('titulo'),
            'Descripcion_corta' => $request->input('descripcion'),
            'Descripcion_larga' => $request->input('descripcionLarga'),
            'Num_asistentes' => $request->input('numAsistentes'),
            'Fecha' => $fecha,
            'Hora' => $hora,
            'Id_tipo_acto' => $request->input('tipoActo'),
        ]);
        Acto::updateTipoActo($id, $request->input('tipoActo'));
        return redirect('/paneladmin/actos');
    }
    public function postEliminarActo(Request $request)
    {
        $id = $request->query('id');
        Acto::find($id)->delete();
        return redirect('/paneladmin/actos');
    }
    public function getCrearTipoActo()
    {
        return view('panel-admin-crear-tipo-acto');
    }
    public function postCrearTipoActo(Request $request)
    {
        TipoActo::create([
            'Descripcion' => $request->input('descripcion'),
        ]);
        return redirect('/paneladmin/actos');
    }
    //Ini apalac
    public function postAgregarPonente(Request $request)
    {
        $this->id = $request->query('id');            //Acto
        //$ponentes[] = Usuario::GetUsuariosPonentes();  
        $ponentes = Usuario::all();
        return view('panel-admin-crear-ponente')->with('ponentes', $ponentes)->with('acto', $this->id);
    }
    public function postAgregarPonente2(Request $request)
    {
        //$this->id = $request->query('id');            //Acto
        $id_acto = $request->input('acto');  
        //$id =  $this->id;
        Ponente::InsertarPonenteActo($request->input('ponente'), $id_acto);
        $ponentes = Usuario::all();
        return view('panel-admin-crear-ponente')->with('ponentes', $ponentes)->with('acto', $id_acto);
    }

    public function postBorrarPonente(Request $request)
    {
        $this->id = $request->query('id');            //Acto
        $ponentes = Ponente::GetListaPonentes($this->id);
        return view('panel-admin-borrar-ponente')->with('ponentes', $ponentes);
    }


    public function postBorrarPonente2(Request $request)
    {
        // $this->id = $request->query('id');            //Acto
        $id_acto = $this->id;  //acto
        $user = $request->input('user');
        $usuario = Usuario::GetPersonaPonente($user);
        // Verificar si hay al menos un resultado
        if (!empty($usuario)) {
            $id_persona = $usuario[0]->Id_Persona;
        }
        // Llamada al método estático
        Ponente::BorrarPonenteActo($id_acto, $id_persona);
        $ponentes = Ponente::GetListaPonentes($id_acto);
        return view('panel-admin-borrar-ponente')->with('ponentes', $ponentes);
    }

    //End apalac
}
