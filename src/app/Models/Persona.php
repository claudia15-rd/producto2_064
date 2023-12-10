<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $table = "Personas";
    protected $primaryKey = "Id_persona";
    public $timestamps = false;
    protected $fillable = [
        'Nombre',
        'Apellido1',
        'Apellido2',
    ];
    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'Id_Persona');
    }
}
