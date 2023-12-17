<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ponente extends Model
{
    use HasFactory;
    protected $table = "Lista_ponentes";
    // Define los campos de la clave primaria compuesta
    protected $primaryKey = ['id_ponente '];

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
            'INSERT INTO `lista_ponentes` (Id_persona, Id_acto, Orden) VALUES (?, ?, ?)',
            [$id_acto, $id_persona, '1']
        );
    }

    public static function GetListaPonentes($acto)
    {
        return DB::select('SELECT * FROM Lista_ponentes a LEFT JOIN Usuarios i 
            ON a.Id_persona = i.Id_persona 
            WHERE a.Id_acto = ?', [$acto]);
    }

    public static function BorrarPonenteActo($id_acto, $id_persona)
    {
       // DB::delete('DELETE FROM `lista_ponentes` WHERE Id_persona = ? AND Id_acto = ?', [$id_persona, $id_acto]);
       DB::delete('DELETE FROM `lista_ponentes` WHERE Id_persona = ?', [$id_persona]);
    }
}
