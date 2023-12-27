<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Usuario extends Model
{
    use HasFactory;
    protected $table = "Usuarios";
    protected $primaryKey = "Id_usuario";
    public $timestamps = false;
    protected $fillable = [
        'Username',
        'Password',
        'Id_Persona ',
        'Id_tipo_usuario ',
    ];
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'Id_Persona');
    }
    public function tipousuario()
    {
        return $this->belongsTo(TipoUsuario::class, 'Id_tipo_usuario');
    }

    public static function altaUsuario($username, $password, $persona, $tipoUsuario)
    {
        DB::insert('INSERT INTO Usuarios (Username, `Password`, Id_Persona, Id_tipo_usuario) 
        VALUES (?, ?, ?, ?)', [$username, $password, $persona, $tipoUsuario]);
    }

    //Ini apalac
    public static function GetUsuariosPonentes()
    {
        return DB::select('SELECT * FROM `usuarios` WHERE `Id_tipo_usuario` = 3');
    }

    public static function GetPersonaPonente($username)
    {
        return DB::select("SELECT * FROM `usuarios` WHERE `Username` = ?", [$username]);
    }
}
    //End apalac
