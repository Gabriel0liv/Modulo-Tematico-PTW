<?php

namespace App\Http\Controllers;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'conteudo' => 'required|string|max:500',
            'id_destinatario' => 'required|exists:users,id',
        ]);

        Comentario::create([
            'conteudo' => $validated['conteudo'],
            'id_remetente' => Auth::id(),
            'id_destinatario' => $validated['id_destinatario'],
        ]);

        return back()->with('success', 'Comentário enviado com sucesso!');
    }

    public function comentariosPerfil()
    {
        $id = Auth::id();
        $comentarios = Comentario::where('id_destinatario', $id)
            ->with('remetente')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('paginas.perfil.perfilcomentarios', compact('comentarios'));    }
}
