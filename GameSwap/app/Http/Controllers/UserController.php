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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\LengthAwarePaginator;


class UserController
{
    /**
     * Exibe a página de perfil do utilizador autenticado.
     *
     * @return \Illuminate\View\View
     */
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
                $googleDriveService = new GoogleDriveService();


                if ($imagemExistente) {
                    try {
                        // Apagar a imagem antiga no Google Drive
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

    /**
     * Exibe a página de perfil do utilizador autenticado.
     *
     * @return \Illuminate\View\View
     */
    public function deletarConta(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/')->withErrors(['error' => 'Usuário não autenticado.']);
        }

        // Validação da senha
        $request->validate([
            'password' => 'required|string',
        ]);

        if (!Hash::check($request->input('password'), $user->password)) {
            return back()->withErrors(['password' => 'Senha incorreta.']);
        }

        // Atualiza o estado do utilizador para cancelado
        $user->estado = 'cancelado';
        $user->save();

        // Desativa todos os anúncios do utilizador (jogos e consoles)
        Jogo::where('id_anunciante', $user->id)->update(['ativo' => 0]);
        Console::where('id_anunciante', $user->id)->update(['ativo' => 0]);

        // Faz logout e invalida sessão
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('pagina_inicial')->with('success', 'Conta cancelada com sucesso.');
    }

    /**
     * Exibe a página de perfil do utilizador autenticado.
     *
     * @return \Illuminate\View\View
     */
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

    /**
     * Exibe a página de perfil do utilizador autenticado.
     *
     * @return \Illuminate\View\View
     */
    public function mostrarMoradas()
    {
        $moradas = Morada::with(['distrito', 'concelho'])
            ->where('user_id', auth()->id())
            ->where('ativo', 1)
            ->get();
        return view('paginas.perfil.perfilmoradas', compact('moradas'));
    }

    /**
     * Exibe a página de perfil do utilizador autenticado.
     *
     * @return \Illuminate\View\View
     */
    public function verificarUsername(Request $request)
    {
        $existe = \App\Models\User::where('username', $request->username)->exists();

        return response()->json(['existe' => $existe]);
    }

    /**
     * Exibe a página de perfil do utilizador autenticado.
     *
     * @return \Illuminate\View\View
     */
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

    /**
     * Exibe o perfil de um utilizador específico.
     *
     * @param int $id ID do utilizador
     * @return \Illuminate\View\View
     */
    public function mostrarPerfilVisita($id)
    {
        $user = User::with('imagemUser')->findOrFail($id);

        $search = request('search');


        $jogos = Jogo::where('id_anunciante', $id)
            ->when($search, function ($query, $search) {
                $query->where('nome', 'like', '%' . $search . '%');
            })
            ->whereNull('id_comprador')
            ->with('imagens')
            ->get();
        $consoles = Console::where('id_anunciante', $id)
            ->when($search, function ($query, $search) {
                $query->where('nome', 'like', '%' . $search . '%');
            })
            ->whereNull('id_comprador')
            ->with('imagens')
            ->get();

        $anuncios = $jogos->merge($consoles)->map(function ($anuncio) {
            $anuncio->imagem_capa = $anuncio->imagens->first()
                ? \App\Helpers\GoogleDriveHelper::transformGoogleDriveUrl($anuncio->imagens->first()->path ?? $anuncio->imagens->first()->caminho)
                : '/placeholder.svg';
            return $anuncio;
        });

        // Ordenar manualmente
        $anuncios = $anuncios->sortByDesc('destacado')->sortByDesc('created_at')->values();

        // Paginar manualmente
        $perPage = 6;
        $page = request()->get('page', 1);
        $anunciosPaginados = new LengthAwarePaginator(
            $anuncios->forPage($page, $perPage),
            $anuncios->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        $comentarios = Comentario::where('id_destinatario', $user->id)
            ->with('remetente')
            ->orderBy('created_at', 'desc')
            ->paginate(3);

        return view('paginas.visitaPerfil', [
            'user' => $user,
            'anuncios' => $anunciosPaginados,
            'comentarios' => $comentarios
        ]);
    }

    /**
     * Exibe a lista de utilizadores para o perfil do administrador.
     *
     * @return \Illuminate\View\View
     */
    public function listarUtilizadores()
    {
        $users = User::paginate(10);

        return view('paginas.perfilAdmin.listaUtilizadores', compact('users'));
    }

    /**
     * Exibe os detalhes de um utilizador específico para o perfil do administrador.
     *
     * @param int $id ID do utilizador
     * @return \Illuminate\View\View
     */
    public function exibirUtilizador($id)
    {
        $user = User::findOrFail($id);
        $denuncias = Denuncias::where('id_denunciado', $id)->get();
        $banimentos = Denuncias::where('id_denunciado', $id)
            ->get()
            ->filter(function ($denuncias) {
                return $denuncias->status == 1 && $denuncias->data_reativacao != null;
            });
        $compras = Compra::where('comprador_id', $user->id)->paginate(3);
        $jogos = Jogo::where('id_anunciante', $user->id)->get();
        $consoles = Console::where('id_anunciante', $user->id)->get();
        $produtos = $jogos->merge($consoles);
        $comentarios = Comentario::where('id_remetente', $user->id)
            ->with('remetente')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('paginas.perfilAdmin.detalhesUtilizador', compact('denuncias', 'banimentos', 'user', 'produtos', 'comentarios', 'compras'));
    }

    /**
     * Exibe as compras do utilizador autenticado.
     *
     * @return \Illuminate\View\View
     */
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
