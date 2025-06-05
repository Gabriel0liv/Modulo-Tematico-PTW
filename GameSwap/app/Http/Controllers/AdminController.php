<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\ModeloConsole;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function perfil()
    {
        $user = auth()->user();
        return view('paginas.perfilAdmin.perfilA', compact('user'));
    }

    public function edicao()
    {
        $user = auth()->user();
        $categorias = Categoria::all();
        $modelo_consoles = ModeloConsole::all();
        return view('paginas.perfilAdmin.Edicao', compact('user', 'categorias', 'modelo_consoles'));
    }
}
