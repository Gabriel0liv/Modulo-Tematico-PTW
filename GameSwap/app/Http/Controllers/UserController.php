<?php

namespace App\Http\Controllers;

use App\Helpers\GoogleDriveHelper;
use App\Models\Compra;
use App\Models\Console;
use App\Models\Jogo;
use App\Models\Morada;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController
{
    public function atualizarInformacoes(Request $request)
    {
        $user = Auth::user();
        $user->username = $request->input('username');
        $user->name = $request->input('name');
        $user->dataNascimento = $request->input('dataNascimento');
        $user->contato = $request->input('contato');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return redirect()->route('perfilAdmin');


    }

    public function deletarConta(Request $request)
    {

        $user = Auth::user();

        if (!$user) {
            return redirect('/')->withErrors(['error' => 'Usuário não autenticado.']);
        }

        if (!Hash::check($request->input('password'), $user->password)) {
            return back()->withErrors(['password' => 'Senha incorreta.']);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $user->delete();

        return redirect()->route('pagina_inicial')->with('success', 'Conta removida com sucesso');
    }

    public function adicionarMorada(Request $request)
    {
        $validatedData = $request->validate([
            'morada' => 'required|string|max:255',
            // Código Postal no formato 0000-000
            'codigo_postal' => [
                'required',
                'regex:/^\d{4}-\d{3}$/'
            ],
            'distrito_id' => 'required|exists:distritos,id',
            'concelho_id' => 'required|exists:concelhos,id',
            'nome_morada' => 'required|string|max:255',
        ]);

        Morada::create([
            'user_id' => auth()->id(),
            'morada' => $validatedData['morada'],
            'codigo_postal' => $validatedData['codigo_postal'],
            'distrito_id' => $validatedData['distrito_id'],
            'concelho_id' => $validatedData['concelho_id'],
            'nome_morada' => $validatedData['nome_morada'],
        ]);

        if ($request->has('from') && $request->get('from') === 'checkout') {
            return redirect()->route('checkout.index')->with('success', 'Morada adicionada com sucesso!');
        }

        return redirect()->route('perfil.moradas');
    }

    public function mostrarMoradas()
    {
        $moradas = Morada::with(['distrito', 'concelho'])
            ->where('user_id', auth()->id())
            ->get();
        return view('paginas.perfil.perfilmoradas', compact('moradas'));
    }

    public function verificarUsername(Request $request)
    {
        $existe = \App\Models\User::where('username', $request->username)->exists();

        return response()->json(['existe' => $existe]);
    }

    public function mostrarAnuncios()
    {
        $userId = auth()->id();

        // Obter todos os jogos e consoles anunciados pelo utilizador
        $jogos = Jogo::where('id_anunciante', $userId)->with(['imagens', 'comprador'])->get();
        $consoles = Console::where('id_anunciante', $userId)->with(['imagens', 'comprador'])->get();

        // Mesclar ambas as coleções
        $anuncios = $jogos->merge($consoles)->map(function ($anuncio) {
            // Adicionar a propriedade "imagem_capa"
            $anuncio->imagem_capa = $anuncio->imagens->first()
                ? GoogleDriveHelper::transformGoogleDriveUrl($anuncio->imagens->first()->path ?? $anuncio->imagens->first()->caminho)
                : '/placeholder.svg';

            // Verificar status do anúncio
            if ($anuncio->comprador) {
                $anuncio->status = 'Vendido: ' . $anuncio->comprador->name;
            } elseif (!$anuncio->moderado) {
                $anuncio->status = 'Anúncio Pendente';
            } else {
                $anuncio->status = 'Publicado';
            }

            return $anuncio;
        });

        return view('paginas.perfil.perfilmeusanuncios', compact('anuncios'));
    }


    public function mostrarPerfilVisita($id)
    {
        $user = User::findOrFail($id);

        $jogos = Jogo::where('id_anunciante', $id)->get();
        $consoles = Console::where('id_anunciante', $id)->get();

        $anuncios = $jogos->merge($consoles);

        return view('paginas.visitaPerfil', compact('user', 'anuncios'));
    }

    public function listarCompras()
    {
        $user = auth()->user();

        // Buscar as compras do usuário com os produtos
        $compras = Compra::with(['produtos'])
            ->where('comprador_id', $user->id)
            ->latest()
            ->get()
            ->map(function ($compra) {
                // Atualizar os itens da compra com informações detalhadas
                $compra->produtos = $compra->produtos->map(function ($item) {
                    if ($item->tipo_produto === 'jogo') {
                        $produto = Jogo::with('imagens')->find($item->produto_id);
                    } elseif ($item->tipo_produto === 'console') {
                        $produto = Console::with('imagens')->find($item->produto_id);
                    } else {
                        $produto = null;
                    }

                    if ($produto) {
                        $item->nome = $produto->nome;
                        $item->imagem = $produto->imagens->first()
                            ? GoogleDriveHelper::transformGoogleDriveUrl($produto->imagens->first()->path ?? $produto->imagens->first()->caminho)
                            : '/placeholder.svg';
                    } else {
                        $item->nome = 'Produto não encontrado';
                        $item->imagem = '/placeholder.svg';
                    }
                    return $item;
                });

                return $compra;
            });

        return view('paginas.perfil.perfilminhascompras', compact('compras'));
    }


}
