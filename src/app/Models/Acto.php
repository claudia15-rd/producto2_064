<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Acto extends Model
{
    use HasFactory;
    protected $table = "Actos";
    protected $primaryKey = "Id_acto";
    public $timestamps = false;
    protected $fillable = [
        'Fecha',
        'Hora',
        'Titulo',
        'Descripcion_corta',
        'Descripcion_larga',
        'Num_asistentes',
        'Id_tipo_acto',
    ];
    
    public function personas()
    {
        return $this->hasMany(Persona::class);
    }

    public static function GetEventosDia($idPersona, $fecha) {
        return DB::select('SELECT * FROM Actos a LEFT JOIN Inscritos i 
            ON a.Id_acto = i.id_acto AND i.Id_persona = ? 
            WHERE Fecha = ?',[$idPersona, $fecha]);
    }

    //Ini apalac
    public static function GetEventosDiaPonente($idPersona, $fecha) {
        return DB::select('SELECT * FROM Actos a LEFT JOIN Lista_ponentes i 
            ON a.Id_acto = i.id_acto AND i.Id_persona = ? 
            WHERE Fecha = ?',[$idPersona, $fecha]);
    }
    //Fin apalac

    public static function GetEventosSemana($idPersona, $inicio, $fin) {
        return DB::select('SELECT * FROM Actos a LEFT JOIN Inscritos i 
            ON a.Id_acto = i.id_acto AND i.Id_persona = ? 
            WHERE Fecha BETWEEN ? AND ?',[$idPersona, $inicio, $fin]);
    }

    //Ini apalac
    public static function GetEventosPonente($idPersona, $inicio, $fin) {
        return DB::select('SELECT * FROM Actos a LEFT JOIN Lista_ponentes i 
            ON a.Id_acto = i.id_acto AND i.Id_persona = ? 
            WHERE Fecha BETWEEN ? AND ?',[$idPersona, $inicio, $fin]);
    }
    //Fin apalac
    public static function InsertarActo($titulo, $descripcion, $fechaHora, $tipoActo, $numAsistentes, $descripcionLarga){
        list($fecha, $hora) = explode("T", $fechaHora);
        DB::insert('INSERT INTO `Actos`(Titulo, Descripcion_corta, Fecha, Hora, Id_tipo_acto, 
            Num_asistentes, Descripcion_larga) VALUES (?, ?, ?, ?, ?, ?, ?)', 
            [$titulo, $descripcion, $fecha, $hora, $tipoActo, $numAsistentes, $descripcionLarga]);
    }

    public static function updateTipoActo($id, $tipoActo){
        DB::update('UPDATE `Actos` SET Id_tipo_acto = ? WHERE Id_acto = ?', [$tipoActo,$id]);
    }

    public static function Suscribe($idPersona, $idActo) {
        DB::insert('INSERT INTO Inscritos(Id_persona, id_acto, Fecha_inscripcion) VALUES (?, ?, NOW())', [$idPersona, $idActo]);
    }
    public static function UnSuscribe($idPersona, $idActo) {
        DB::delete('DELETE FROM Inscritos WHERE Id_persona = ? AND id_acto = ?', [$idPersona, $idActo]);
    }
}
