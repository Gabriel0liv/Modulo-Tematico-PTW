<?php

namespace App\Http\Controllers;

use App\Helpers\GoogleDriveHelper;
use App\Models\Compra;
use App\Models\Console;
use App\Models\Denuncias;
use App\Models\ImagemUser;
use App\Models\Comentario;
use App\Models\Jogo;
use App\Models\Morada;
use App\Models\User;
use App\Services\GoogleDriveService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        $user = Auth::user()->load('imagemUser');

        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        try {
            // Verificar se uma nova imagem de perfil foi enviada
            if ($request->hasFile('imagem_perfil')) {
                $request->validate([
                    'imagem_perfil' => 'image|mimes:jpeg,png,jpg,gif|max:8192',
                ]);

                // Obter o registro existente da imagem do usuário
                $imagemExistente = ImagemUser::where('user_id', $user->id)->first();

                if ($imagemExistente) {
                    try {
                        // Apagar a imagem antiga no Google Drive
                        $googleDriveService = new GoogleDriveService();
                        $googleDriveService->delete($imagemExistente->imagem_url);

                        Log::info('Imagem de perfil antiga removida.', [
                            'user_id' => $user->id,
                            'url' => $imagemExistente->imagem_url,
                        ]);

                        // Apagar o registro da imagem do banco de dados
                        $imagemExistente->delete();
                    } catch (\Throwable $e) {
                        Log::error('Erro ao deletar a imagem de perfil antiga do Google Drive.', [
                            'user_id' => $user->id,
                            'error' => $e->getMessage(),
                        ]);
                    }
                }

                // Fazer o upload da nova imagem
                $file = $request->file('imagem_perfil');
                $fileName = 'perfil_' . $user->id . '_' . time() . '.' . $file->getClientOriginalExtension();
                $filePath = $file->getRealPath();

                // Serviço de upload
                $uploadedFileUrl = $googleDriveService->upload(
                    $filePath,
                    $fileName,
                    $user->id,  // Subpasta específica do usuário
                    'utilizadores'  // Pasta principal
                );

                // Criar ou atualizar registro na tabela `imagem_user`
                ImagemUser::updateOrCreate(
                    ['user_id' => $user->id],
                    ['imagem_url' => $uploadedFileUrl]
                );

                Log::info('Nova imagem de perfil enviada com sucesso.', [
                    'user_id' => $user->id,
                    'url' => $uploadedFileUrl,
                ]);
            }

            $user->save();

            return redirect()->route('perfilPage')->with('success', 'Perfil atualizado com sucesso!');
        } catch (\Throwable $e) {
            Log::error('Erro ao atualizar o perfil do usuário.', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
            ]);

            return back()->withErrors(['error' => 'Ocorreu um erro ao atualizar o perfil.']);
        }


    }

    public function deletarConta(Request $request)
    {
        $user = auth()->user();

        // Validação da senha enviada
        $request->validate([
            'password' => 'required|string',
        ]);

        // Verifica se a senha está correta
        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Senha incorreta.'], 401);
        }

        // Altera o status para "cancelado"
        $user->status = 'cancelado';
        $user->save();

        // Logout do usuário
        auth()->logout();

        return response()->json(['message' => 'Conta cancelada com sucesso.']);
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
        $user = User::with('imagemUser')->findOrFail($id); // Carrega também a imagem do usuário

        // Buscar jogos e consoles anunciados pelo usuário
        $jogos = Jogo::where('id_anunciante', $id)->with('imagens')->get();
        $consoles = Console::where('id_anunciante', $id)->with('imagens')->get();

        // Mesclar os anúncios e adicionar a propriedade imagem_capa
        $anuncios = $jogos->merge($consoles)->map(function ($anuncio) {
            $anuncio->imagem_capa = $anuncio->imagens->first()
                ? GoogleDriveHelper::transformGoogleDriveUrl($anuncio->imagens->first()->path ?? $anuncio->imagens->first()->caminho)
                : '/placeholder.svg'; // Se não houver imagem, use o placeholder
            return $anuncio;
        });


        $comentarios = Comentario::where('id_destinatario', $user->id)
            ->with('remetente')
            ->orderBy('created_at', 'desc')
            ->paginate(3); // 4 por página

        return view('paginas.visitaPerfil', compact('user', 'anuncios', 'comentarios'));

    }


    public function listarUtilizadores()
    {
        $users = User::all();

        return view('paginas.perfilAdmin.listaUtilizadores', compact('users'));
    }


    public function exibirUtilizador($id)
    {
        $user = User::findOrFail($id);
        $denuncias = Denuncias::where('id_denunciado', $id)->get();
        $jogos = Jogo::where('id_anunciante', $user->id)->get();
        $consoles = Console::where('id_anunciante', $user->id)->get();
        $produtos = $jogos->merge($consoles);

        return view('paginas.perfilAdmin.detalhesUtilizador', compact('denuncias', 'user', 'produtos'));
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
