<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Inscrito extends Model
{
    use HasFactory;
    protected $table = "Inscritos";
    protected $primaryKey = "Id_inscripcion";
    public $timestamps = false;
    protected $fillable = [
        'Id_persona ',
        'id_acto ',
        'Fecha_inscripcion',
    ];

    public function acto()
    {
        return $this->hasOne(Acto::class, 'id_acto');
    }

    public static function Suscribe ($idPersona, $idActo)
    {
        DB::insert('INSERT INTO Inscritos(Id_persona, id_acto) VALUES (?, ?)', [$idPersona, $idActo]);
    }
}
