<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoActo extends Model
{
    use HasFactory;
    protected $table = "Tipo_acto";
    protected $primaryKey = "Id_tipo_acto";
    public $timestamps = false;
    protected $fillable = [
        'Descripcion',
    ];
}
