<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jogo;
use Illuminate\Support\Facades\Log;
use App\Services\GoogleDriveService;

class JogoController extends Controller
{
    //
    public function index()
    {
        // Lógica para listar produtos
        return view('produtos.index');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
            'estado' => 'required|in:novo,usado,recondicionado',
            'id_categoria' => 'required|exists:categorias,id',
            'descricao' => 'required|string|max:1000',
            'destaque' => 'nullable|boolean',
            'imagens'   => 'required',
            'imagens.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $jogo = jogo::create([
            'nome' => $validatedData['nome'],
            'descricao' => $validatedData['descricao'],
            'preco' => $validatedData['preco'],
            'id_categoria' => $validatedData['id_categoria'],
            'estado' => $validatedData['estado'],
            'tipo_produto' => $request->input('tipo_produto', 'jogo'),
            'id_anunciante' => auth()->id(),
            'console' => $request->input('console'),
            'destaque' => $request->boolean('destaque'),
        ]);

        $googleDriveService = new GoogleDriveService();

        if ($request->hasFile('imagens')) {
            foreach ($request->file('imagens') as $imagem) {
                $filePath = $imagem->getRealPath();
                $fileName = $imagem->getClientOriginalName();
                $uploadedFileUrl = $googleDriveService->upload($filePath, $fileName);

                // Aqui adiciona o registro na tabela imagens
                \App\Models\Imagem::create([
                    'jogo_id' => $jogo->id,
                    'caminho' => $uploadedFileUrl,
                    // Se quiser adicionar a flag 'principal', pode incluir aqui também
                ]);
            }
        } else {
            \Log::warning('Nenhuma imagem recebida no request');
        }

        return redirect()->route('pagina_inicial')->with('success', 'Produto anunciado com sucesso!');
    }


    public function show($id)
    {
        $produto = jogo::findOrFail($id);

        // Exemplo de produtos relacionados (ajuste conforme sua lógica)
        $produtosRelacionados = jogo::where('tipo_produto', $produto->tipo_produto)
            ->where('id', '!=', $produto->id)
            ->take(4)
            ->get();

        return view('produto', compact('produto', 'produtosRelacionados'));
    }

    public function update(Request $request, $id)
    {
        // Lógica para atualizar o jogo no banco de dados
        // Validação e atualização do jogo
        return redirect()->route('produtos.index');
    }

    public function destroy($id)
    {
        // Lógica para excluir um jogo
        return redirect()->route('produtos.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $jogos = Jogo::search($query)->paginate(10);

        return view('paginas.pesquisa', compact('jogos', 'query'));
    }

    public function searchSuggestions(Request $request)
    {
        $query = $request->input('query');
        $jogos = Jogo::search($query)->take(5)->get();

        return response()->json($jogos);
    }

    public function filter(Request $request)
    {
        // Lógica para filtrar produtos
        $filters = $request->all();
        // Implementar a lógica de filtragem no banco de dados
        return view('produtos.filter', compact('filters'));
    }

    public function sort(Request $request)
    {
        // Lógica para ordenar produtos
        $sortBy = $request->input('sort_by');
        // Implementar a lógica de ordenação no banco de dados
        return view('produtos.sort', compact('sortBy'));
    }

    public function aprovarAnuncios(Request $request)
    {
        $produtos = jogo::all();
        // Implementar a lógica de moderação no banco de dados
        return view('paginas.perfilAdmin.aprovar', ['produtos' => $produtos]);
    }

    public function aprovar($id)
    {
        $produto = jogo::find($id);
        $produto->moderado = 1;
        $produto->save();
        return redirect()->back()->with('success', 'Produto aprovado com sucesso!');
    }

    public function reprovar($id)
    {
        $produto = jogo::find($id);
        $produto->moderado = 2;
        $produto->save();
        return redirect()->back()->with('success', 'Produto reprovado com sucesso!');
    }


    public function addToFavorites(Request $request)
    {
        // Lógica para adicionar jogo aos favoritos
        $productId = $request->input('product_id');
        // Implementar a lógica de adição aos favoritos no banco de dados
        return redirect()->route('produtos.index');
    }

    public function removeFromFavorites(Request $request)
    {
        // Lógica para remover jogo dos favoritos
        $productId = $request->input('product_id');
        // Implementar a lógica de remoção dos favoritos no banco de dados
        return redirect()->route('produtos.index');
    }


    public function purchase(Request $request)
    {
        // Lógica para realizar a compra de um jogo
        $productId = $request->input('product_id');
        // Implementar a lógica de compra no banco de dados
        return redirect()->route('produtos.index');
    }

    public function review(Request $request)
    {
        // Lógica para adicionar uma avaliação a um jogo
        $productId = $request->input('product_id');
        // Implementar a lógica de avaliação no banco de dados
        return redirect()->route('produtos.index');
    }

    public function addToCart(Request $request)
    {
        // Lógica para adicionar jogo ao carrinho
        $productId = $request->input('product_id');
        // Implementar a lógica de adição ao carrinho no banco de dados
        return redirect()->route('produtos.index');
    }

    public function removeFromCart(Request $request)
    {
        // Lógica para remover jogo do carrinho
        $productId = $request->input('product_id');
        // Implementar a lógica de remoção do carrinho no banco de dados
        return redirect()->route('produtos.index');
    }


}
