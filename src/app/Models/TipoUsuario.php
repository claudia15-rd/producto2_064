<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    use HasFactory;
    protected $table = "Tipos_usuarios";
    protected $primaryKey = "Id_tipo_usuario";
    public $timestamps = false;
    protected $fillable = [
        'Descripcion',
    ];
    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'Id_tipo_usuario');
    }
}
