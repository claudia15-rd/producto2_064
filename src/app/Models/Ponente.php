<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ponente extends Model
{
    use HasFactory;
    protected $table = "Lista_Ponentes";
    // Define los campos de la clave primaria compuesta
    protected $primaryKey = ['id_ponente'];

    // Laravel asumirá que la clave primaria es autoincremental, 
    // si no es así, puedes desactivar la propiedad $incrementing
    // public $incrementing = false;

    public $timestamps = false;
    protected $fillable = [
        'Id_persona',
        'Id_acto',
        'Orden',
    ];

    public function personas()
    {
        return $this->hasMany(Persona::class);
    }

    public static function InsertarPonenteActo($id_acto, $id_persona)
    {
        DB::insert(
            'INSERT INTO `Lista_Ponentes` (Id_persona, Id_acto, Orden) VALUES (?, ?, ?)',
            [$id_persona, $id_acto, '1']
        );
    }

    public static function GetListaPonentes($acto)
    {
        return DB::select('SELECT p.* FROM Lista_Ponentes a INNER JOIN Personas p 
            ON a.Id_persona = p.Id_persona 
            WHERE a.Id_acto = ?', [$acto]);
    }

    public static function GetAllPonentes()
    {
        return DB::select('SELECT p.* FROM Usuarios u 
            INNER JOIN Personas p ON u.Id_Persona = p.Id_persona 
            AND u.Id_tipo_usuario = 2');
    }

    public static function BorrarPonenteActo($id_acto, $id_persona)
    {
       // DB::delete('DELETE FROM `lista_ponentes` WHERE Id_persona = ? AND Id_acto = ?', [$id_persona, $id_acto]);
       DB::delete('DELETE FROM `Lista_Ponentes` WHERE Id_persona = ? AND Id_acto = ?', [$id_persona, $id_acto]);
    }

    public static function GetFutureEvents($idPersona){
        return DB::select('SELECT * FROM Lista_Ponentes lp INNER JOIN Actos a
            ON lp.Id_acto = a.Id_acto 
            WHERE a.Fecha > now() AND lp.Id_persona = ?', [$idPersona]);
    }

    public static function GetPastEvents($idPersona){
        return DB::select('SELECT * FROM Lista_Ponentes lp INNER JOIN Actos a
            ON lp.Id_acto = a.Id_acto 
            WHERE a.Fecha < now() AND lp.Id_persona = ?', [$idPersona]);
    }
}
