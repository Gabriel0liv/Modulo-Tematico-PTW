<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


//Função para retornar o array de produtos.

function getProdutos()
{
    return [
        [
            "id" => 1,
            "nome" => "Playstation 5",
            "data_publicacao" => "2025-04-06 10:00:00",
            "id_anunciante" => 2,
            "descricao" => "Descricao do produto Playstation 5.",
            "preco" => 549.99,
            "id_categoria" => 1,
            "estado" => "usado",
            "moderado" => true,
            "id_comprador" => null,
            "desenvolvedor" => "Sony",
            "publicador" => "Capcom",
            "ano_lancamento" => 2024,
            "idiomas" => "Ingles",
            "classificacao" => "12+",
            "regiao" => "EUR",
            "tipo_produto" => "console",
            "console" => "Playstation 5",
            "morada" => "Rua Exemplo 2, Cacia, Aveiro"
        ],
        [
            "id" => 2,
            "nome" => "Playstation 4",
            "data_publicacao" => "2025-04-06 10:00:00",
            "id_anunciante" => 3,
            "descricao" => "Descricao do produto Playstation 4.",
            "preco" => 200.00,
            "id_categoria" => 1,
            "estado" => "novo",
            "moderado" => true,
            "id_comprador" => null,
            "desenvolvedor" => "Sony",
            "publicador" => "Capcom",
            "ano_lancamento" => 2023,
            "idiomas" => "Ingles",
            "classificacao" => "12+",
            "regiao" => "EUR",
            "tipo_produto" => "console",
            "console" => "Playstation 4",
            "morada" => "Rua Exemplo 3, Cacia, Aveiro"
        ],
        [
            "id" => 3,
            "nome" => "Xbox Series X",
            "data_publicacao" => "2025-04-06 10:00:00",
            "id_anunciante" => 4,
            "descricao" => "Descricao do produto Xbox Series X.",
            "preco" => 549.99,
            "id_categoria" => 1,
            "estado" => "usado",
            "moderado" => true,
            "id_comprador" => null,
            "desenvolvedor" => "Microsoft",
            "publicador" => "Microsoft",
            "ano_lancamento" => 2022,
            "idiomas" => "Ingles",
            "classificacao" => "12+",
            "regiao" => "EUR",
            "tipo_produto" => "console",
            "console" => "Xbox Series X",
            "morada" => "Rua Exemplo 4, Cacia, Aveiro"
        ],
        [
            "id" => 4,
            "nome" => "Xbox One",
            "data_publicacao" => "2025-04-06 10:00:00",
            "id_anunciante" => 5,
            "descricao" => "Descricao do produto Xbox One.",
            "preco" => 180.00,
            "id_categoria" => 1,
            "estado" => "novo",
            "moderado" => true,
            "id_comprador" => null,
            "desenvolvedor" => "Microsoft",
            "publicador" => "Microsoft",
            "ano_lancamento" => 2021,
            "idiomas" => "Ingles",
            "classificacao" => "12+",
            "regiao" => "EUR",
            "tipo_produto" => "console",
            "console" => "Xbox One",
            "morada" => "Rua Exemplo 5, Cacia, Aveiro"
        ],
        [
            "id" => 5,
            "nome" => "Nintendo Switch",
            "data_publicacao" => "2025-04-06 10:00:00",
            "id_anunciante" => 6,
            "descricao" => "Descricao do produto Nintendo Switch.",
            "preco" => 329.99,
            "id_categoria" => 1,
            "estado" => "usado",
            "moderado" => true,
            "id_comprador" => null,
            "desenvolvedor" => "Nintendo",
            "publicador" => "Nintendo",
            "ano_lancamento" => 2020,
            "idiomas" => "Ingles, Japones",
            "classificacao" => "12+",
            "regiao" => "JPN",
            "tipo_produto" => "console",
            "console" => "Nintendo Switch",
            "morada" => "Rua Exemplo 6, Cacia, Aveiro"
        ],
        [
            "id" => 6,
            "nome" => "Nintendo Switch 2",
            "data_publicacao" => "2025-04-06 10:00:00",
            "id_anunciante" => 1,
            "descricao" => "Descricao do produto Nintendo Switch 2.",
            "preco" => 449.99,
            "id_categoria" => 1,
            "estado" => "novo",
            "moderado" => true,
            "id_comprador" => null,
            "desenvolvedor" => "Nintendo",
            "publicador" => "Nintendo",
            "ano_lancamento" => 2019,
            "idiomas" => "Ingles, Japones",
            "classificacao" => "12+",
            "regiao" => "JPN",
            "tipo_produto" => "console",
            "console" => "Nintendo Switch 2",
            "morada" => "Rua Exemplo 1, Cacia, Aveiro"
        ],
        [
            "id" => 7,
            "nome" => "Metal Gear V: Phantom Pain",
            "data_publicacao" => "2025-04-06 10:00:00",
            "id_anunciante" => 2,
            "descricao" => "Descricao do produto Metal Gear V: Phantom Pain.",
            "preco" => 20.00,
            "id_categoria" => 2,
            "estado" => "usado",
            "moderado" => true,
            "id_comprador" => null,
            "desenvolvedor" => "Kojima Productions",
            "publicador" => "Konami",
            "ano_lancamento" => 2017,
            "idiomas" => "Ingles, Japones",
            "classificacao" => "18+",
            "regiao" => "JPN",
            "tipo_produto" => "jogo",
            "console" => "Playstation 4",
            "morada" => "Rua Exemplo 2, Cacia, Aveiro"
        ],
        [
            "id" => 8,
            "nome" => "Death Stranding: Director's Cut",
            "data_publicacao" => "2025-04-06 10:00:00",
            "id_anunciante" => 3,
            "descricao" => "Descricao do produto Death Stranding: Director's Cut.",
            "preco" => 40.00,
            "id_categoria" => 2,
            "estado" => "novo",
            "moderado" => true,
            "id_comprador" => null,
            "desenvolvedor" => "Kojima Productions",
            "publicador" => "Sony",
            "ano_lancamento" => 2018,
            "idiomas" => "Ingles",
            "classificacao" => "18+",
            "regiao" => "JPN",
            "tipo_produto" => "jogo",
            "console" => "Playstation 5",
            "morada" => "Rua Exemplo 3, Cacia, Aveiro"
        ],
        [
            "id" => 9,
            "nome" => "Elden Ring",
            "data_publicacao" => "2025-04-06 10:00:00",
            "id_anunciante" => 4,
            "descricao" => "Descricao do produto Elden Ring.",
            "preco" => 30.00,
            "id_categoria" => 2,
            "estado" => "usado",
            "moderado" => true,
            "id_comprador" => null,
            "desenvolvedor" => "FromSoftware",
            "publicador" => "Bandai Namco",
            "ano_lancamento" => 2019,
            "idiomas" => "Ingles",
            "classificacao" => "18+",
            "regiao" => "EUR",
            "tipo_produto" => "jogo",
            "console" => "Playstation 5",
            "morada" => "Rua Exemplo 4, Cacia, Aveiro"
        ],
        [
            "id" => 10,
            "nome" => "Dark Souls: Prepare to Die",
            "data_publicacao" => "2025-04-06 10:00:00",
            "id_anunciante" => 5,
            "descricao" => "Descricao do produto Dark Souls: Prepare to Die.",
            "preco" => 35.00,
            "id_categoria" => 2,
            "estado" => "novo",
            "moderado" => true,
            "id_comprador" => null,
            "desenvolvedor" => "FromSoftware",
            "publicador" => "Bandai Namco",
            "ano_lancamento" => 2020,
            "idiomas" => "Ingles",
            "classificacao" => "18+",
            "regiao" => "EUR",
            "tipo_produto" => "jogo",
            "console" => "Playstation 4",
            "morada" => "Rua Exemplo 5, Cacia, Aveiro"
        ],
        [
            "id" => 11,
            "nome" => "Devil May Cry",
            "data_publicacao" => "2025-04-06 10:00:00",
            "id_anunciante" => 6,
            "descricao" => "Descricao do produto Devil May Cry.",
            "preco" => 15.00,
            "id_categoria" => 2,
            "estado" => "usado",
            "moderado" => true,
            "id_comprador" => null,
            "desenvolvedor" => "Capcom",
            "publicador" => "Capcom",
            "ano_lancamento" => 2021,
            "idiomas" => "Ingles",
            "classificacao" => "18+",
            "regiao" => "JPN",
            "tipo_produto" => "jogo",
            "console" => "Playstation 2",
            "morada" => "Rua Exemplo 6, Cacia, Aveiro"
        ],
        [
            "id" => 12,
            "nome" => "Yakuza 0(2013)",
            "data_publicacao" => "2025-04-06 10:00:00",
            "id_anunciante" => 1,
            "descricao" => "Descricao do produto Yakuza 0(2013).",
            "preco" => 25.00,
            "id_categoria" => 2,
            "estado" => "novo",
            "moderado" => true,
            "id_comprador" => null,
            "desenvolvedor" => "SEGA",
            "publicador" => "SEGA",
            "ano_lancamento" => 2022,
            "idiomas" => "Ingles, Japones",
            "classificacao" => "18+",
            "regiao" => "JPN",
            "tipo_produto" => "jogo",
            "console" => "Playstation 4",
            "morada" => "Rua Exemplo 1, Cacia, Aveiro"
        ]
    ];
}


//Rotas principais do site.

Route::get('/', function () {
    return view('compras', ['produtos' => getProdutos()]);
})->name('pagina_inicial');

Route::get('/pesquisa', function () {
    return view('paginas.pesquisa', ['produtos' => getProdutos()]);
})->name('pesquisaPage');

Route::get('/produto/{id}', function ($id) {
    $produtos = getProdutos();
    $produto = collect($produtos)->firstWhere('id', $id);
    $produtosRelacionados = collect($produtos)->filter(fn($p) => $p['publicador'] === $produto['publicador'] && $p['id'] !== $produto['id']);

    if (!$produto) {
        abort(404, 'Produto não encontrado');
    }

    return view('produto', compact('produto', 'produtosRelacionados'));
})->name('produtoPage');


//Rotas de autenticação.

Route::post('/registo', [AuthController::class, 'criarRegisto'])->name('criarRegisto');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


//Rotas de layout e chat.

Route::get('/components/layout', fn() => view('components.layout'))->name('layoutPage');
Route::get('/paginas/chat', fn() => view('paginas.chat', ['produtos' => getProdutos()]))->name('mensagensPage');
Route::get('/paginas/anunciar', fn() => view('paginas.anunciar'))->name('anunciarPage');
Route::get('/carrinho', fn() => view('paginas.carrinho'))->name('carrinhoPage');


//Rotas de pagamento e assinatura.

Route::get('/membership-payment-gateway', fn() => view('paginas.pagamento.payment-gateway'))->name('assinatura');
Route::get('/membership-payment-gateway/step2', fn() => view('paginas.pagamento.payment-gateway-step2'))->name('assinatura-2');
Route::get('/membership-payment-gateway/step3', fn() => view('paginas.pagamento.payment-gateway-step3'))->name('assinatura-3');


//Rotas de perfil de utilizador.

Route::get('/perfil', fn() => view('paginas.perfil.perfil'))->name('perfilPage');
Route::get('/perfil/cartões', fn() => view('paginas.perfil.perfilcartoes'))->name('perfil-cartões');
Route::get('/perfil/favoritos', fn() => view('paginas.perfil.perfilfavoritos'))->name('perfil-Favoritos');
Route::get('/perfil/minhas_compras', fn() => view('paginas.perfil.perfilminhascompras'))->name('perfil-Compras');
Route::get('/perfil/minhas_vendas', fn() => view('paginas.perfil.perfilminhasvendas'))->name('perfil-Vendas');
Route::get('/perfil/moradas', fn() => view('paginas.perfil.perfilmoradas'))->name('perfil-Moradas');


//Rotas de perfil de administrador.

Route::get('/perfilAdmin', fn() => view('paginas.perfilAdmin.perfilA'))->name('perfilAdmin');
Route::get('/perfilAdmin/estatisticas', fn() => view('paginas.perfilAdmin.estatisticas'))->name('perfilAdmin-estatisticas');
Route::get('/perfilAdmin/Edicao', fn() => view('paginas.perfilAdmin.Edicao'))->name('perfilAdmin-Edicao');
Route::get('/perfilAdmin/denuncias', fn() => view('paginas.perfilAdmin.denuncias'))->name('perfilAdmin-denuncias');
Route::get('/perfilAdmin/aprovar', fn() => view('paginas.perfilAdmin.aprovar'))->name('perfilAdmin-aprovar');
