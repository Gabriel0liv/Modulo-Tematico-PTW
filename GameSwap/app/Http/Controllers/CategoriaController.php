<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController
{
    public function edicao()
    {
        $categorias = Categoria::all();

        return view('paginas.perfilAdmin.Edicao', ['categorias' => $categorias]);
    }
    public function adicionarCategoria(){
        $baseNome = "novaCategoria";
        $nome = $baseNome;
        $contador = 1;

        // Verifica se já existe uma categoria com o mesmo nome
        while (Categoria::where('nome', $nome)->exists()) {
            $nome = $baseNome . $contador;
            $contador++;
        }

        // Cria uma nova instância de Categoria
        $categoria = new Categoria();
        $categoria->nome = $nome;

        // Guarda a nova categoria na base de dados
        $categoria->save();

        return redirect()->back();
    }

    public function editarCategoria(Request $request, $id)
    {
        // Encontra a categoria pelo ID
        $categoria = Categoria::find($id);

        // Obtém o nome da categoria do request
        $novoNome = trim($request->input('nome'));

        // Verifica se o nome não está vazio
        if (!empty($novoNome)) {
            // Atualiza o nome da categoria com o novo valor
            $categoria->nome = $novoNome;

            // Salva as alterações na base de dados
            $categoria->save();
        } else {
            // Se o nome estiver vazio, não salva
            return redirect()->back()->with('error', 'O nome da categoria não pode estar vazio.');
        }

        return redirect()->back();
    }

    public function eliminarCategoria($id)
    {
        // Encontra a categoria pelo ID
        $categoria = Categoria::find($id);

        // Remove a categoria da base de dados
        $categoria->delete();

        return redirect()->back();
    }
}
