<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

use App\Models\Acto;

class ApiController extends Controller
{
    public function getActos() {
        $actos = Acto::whereDate('Fecha', '>', now())->get();

        // Añadir el campo "URL" a cada acto
        foreach ($actos as $acto) {
            $acto->url = "/evento/".$acto->Id_acto; // Reemplaza "tu_valor_de_URL" con la URL deseada
        }

        return $actos->toJson();
    }
}
