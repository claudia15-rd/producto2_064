<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Persona;
use App\Models\Usuario;

class PanelPonentePerfilController extends Controller
{
    public function getPerfil() {
        $idPersona = session('personId');
        $userId = session('userId');
        $persona = Persona::find($idPersona);
        $usuario = Usuario::find($userId);
        return view('panel-ponente-perfil')->with('persona', $persona)->with('usuario', $usuario);
    }

    public function postPerfil(Request $request) {
        $idPersona = session('personId');
        $userId = session('userId');
        Persona::find($idPersona)->update([
            'Nombre' => $request->input('nombre'),
            'Apellido1' => $request->input('primerApellido'),
            'Apellido2' => $request->input('segundoApellido'),
        ]);
        Usuario::find($idPersona)->update([
            'Username' => $request->input('username'),
        ]);
        if(!empty($request->input('password'))){
            Usuario::find($idPersona)->update([
                'Password' => $request->input('password'),
            ]);
        }
        return redirect('/panelponente/futuros');
    }
}
