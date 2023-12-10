<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

use App\Models\TipoUsuario;
use App\Models\Persona;
use App\Models\Usuario;

class LoginController extends Controller
{
    public function getLanding() {
        return view('landing');
    }
    public function getLogin() {
        return view('login');
    }
    public function getLogout() {
        Session::flush();
        return redirect('/login');
    }
    public function postLogin(Request $request) {
        $usuario = Usuario::where('Username', $request->input('username'))
            ->where('Password', $request->input('password'))->first();
        
        if (isset($usuario->Id_usuario)){
            session([
                'userId' => $usuario->Id_usuario,
                'personId' => $usuario->Id_Persona,
                'userTypeId' => $usuario->Id_tipo_usuario
            ]);
            $userTypeId = $usuario->Id_tipo_usuario;

            // Redirigir según el tipo de usuario
            switch ($userTypeId) {
                case 1:
                    return redirect('/paneladmin/actos');
                    break;
                case 2:
              //      Session::flush();
              //      return redirect('/login');
              //      break;
                   return redirect('/panelusuario/dia');
                   break;              
                case 3:
               //     return redirect('/panelusuario/dia');
               //     break;                   Faltan los ponentes...
                    Session::flush();
                    return redirect('/login');
                    break;               
            }
            return redirect('/panelusuario/dia');
        }
        return view('/login')->with('error', 'Usuario o Contraseña incorrectos');
    }
    public function getRegistro() {
        $datos = TipoUsuario::all();
        return view('registro')->with('usertypes', $datos);
    }
    public function postRegistro(Request $request) {
        $persona = Persona::create([
            'Nombre' => $request->input('nombre'),
            'Apellido1' => $request->input('primerApellido'),
            'Apellido2' => $request->input('segundoApellido'),
        ]);

        Usuario::altaUsuario(
            $request->input('username'),
            $request->input('password'),
            $persona->Id_persona,
            $request->input('usertype')
        );

        $datos = TipoUsuario::all();
        return redirect('/login');
    }
}
