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
        $categorias = Categoria::paginate(10);
        $modelo_consoles = ModeloConsole::paginate(10);
        return view('paginas.perfilAdmin.Edicao', compact('user', 'categorias', 'modelo_consoles'));
    }
}
