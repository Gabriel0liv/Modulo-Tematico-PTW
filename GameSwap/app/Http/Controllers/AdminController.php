<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\ModeloConsole;
use Illuminate\Http\Request;

/**
 * Class AdminController
 *
 * Controlador responsável por gerenciar as ações administrativas relacionadas ao perfil do usuário e edição de dados.
 *
 * @package App\Http\Controllers
 */
class AdminController extends Controller
{

    /**
     * Exibe a página de perfil do administrador.
     *
     * @return \Illuminate\View\View Retorna a view da página de perfil do administrador.
     */
    public function perfil()
    {
        $user = auth()->user();
        return view('paginas.perfilAdmin.perfilA', compact('user'));
    }

    /**
     * Exibe a página de edição de dados do administrador.
     *
     * @return \Illuminate\View\View Retorna a view da página de edição com os dados necessários.
     */
    public function edicao()
    {
        $user = auth()->user();
        $categorias = Categoria::paginate(10);
        $modelo_consoles = ModeloConsole::paginate(10);
        return view('paginas.perfilAdmin.Edicao', compact('user', 'categorias', 'modelo_consoles'));
    }
}
