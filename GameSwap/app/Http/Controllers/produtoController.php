<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class produtoController extends Controller
{
    //
    public function index()
    {
        // Lógica para listar produtos
        return view('produtos.index');
    }



    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
            'estado' => 'required|in:novo,usado',
            'id_categoria' => 'required|exists:categorias,id',
            'descricao' => 'required|string|max:1000',
            'console' => 'nullable|string|max:255',
        ]);

        // Criação do produto
        Produto::create([
            'nome' => $request->input('nome'),
            'preco' => $request->input('preco'),
            'estado' => $request->input('estado'),
            'id_categoria' => $request->input('id_categoria'),
            'descricao' => $request->input('descricao'),
            'console' => $request->input('console')
            //'id_anunciante' => auth()->id(), // ID do utilizador autenticado
        ]);

        // Redireciona com mensagem de sucesso
        return redirect()->route('pagina_inicial')->with('success', 'Produto anunciado com sucesso!');
    }



    public function show($id)
    {
        // Lógica para mostrar um produto específico
        return view('produtos.show', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Lógica para atualizar o produto no banco de dados
        // Validação e atualização do produto
        return redirect()->route('produtos.index');
    }
    public function destroy($id)
    {
        // Lógica para excluir um produto
        return redirect()->route('produtos.index');
    }
    public function search(Request $request)
    {
        // Lógica para pesquisar produtos
        $query = $request->input('query');
        // Implementar a lógica de pesquisa no banco de dados
        return view('produtos.search', compact('query'));
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

    public function moderate(Request $request)
    {
        // Lógica para moderar produtos
        $productId = $request->input('product_id');
        // Implementar a lógica de moderação no banco de dados
        return redirect()->route('produtos.index');
    }


    public function addToFavorites(Request $request)
    {
        // Lógica para adicionar produto aos favoritos
        $productId = $request->input('product_id');
        // Implementar a lógica de adição aos favoritos no banco de dados
        return redirect()->route('produtos.index');
    }
    public function removeFromFavorites(Request $request)
    {
        // Lógica para remover produto dos favoritos
        $productId = $request->input('product_id');
        // Implementar a lógica de remoção dos favoritos no banco de dados
        return redirect()->route('produtos.index');
    }


    public function purchase(Request $request)
    {
        // Lógica para realizar a compra de um produto
        $productId = $request->input('product_id');
        // Implementar a lógica de compra no banco de dados
        return redirect()->route('produtos.index');
    }

    public function review(Request $request)
    {
        // Lógica para adicionar uma avaliação a um produto
        $productId = $request->input('product_id');
        // Implementar a lógica de avaliação no banco de dados
        return redirect()->route('produtos.index');
    }

    public function addToCart(Request $request)
    {
        // Lógica para adicionar produto ao carrinho
        $productId = $request->input('product_id');
        // Implementar a lógica de adição ao carrinho no banco de dados
        return redirect()->route('produtos.index');
    }
    public function removeFromCart(Request $request)
    {
        // Lógica para remover produto do carrinho
        $productId = $request->input('product_id');
        // Implementar a lógica de remoção do carrinho no banco de dados
        return redirect()->route('produtos.index');
    }
}
