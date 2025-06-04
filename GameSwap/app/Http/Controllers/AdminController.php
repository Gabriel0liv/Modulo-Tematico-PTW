<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\ModeloConsole;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function edicao()
    {
        $categorias = Categoria::all();
        $modelo_consoles = ModeloConsole::all();
        return view('paginas.perfilAdmin.Edicao', ['categorias' => $categorias, 'modelo_consoles' => $modelo_consoles]);
    }
}
