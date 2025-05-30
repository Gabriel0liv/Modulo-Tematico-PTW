<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\MoradaController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\jogoController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/',function(){
    $produtos = [
        [
            "id" => 1,
            "nome" => "Playstation 5",
            "data_publicacao" => "2025-04-06 10:00:00",
            "id_anunciante" => 2,
            "descricao" => "Descricao do jogo Playstation 5.",
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
            "descricao" => "Descricao do jogo Playstation 4.",
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
            "descricao" => "Descricao do jogo Xbox Series X.",
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
            "descricao" => "Descricao do jogo Xbox One.",
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
            "descricao" => "Descricao do jogo Nintendo Switch.",
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
            "descricao" => "Descricao do jogo Nintendo Switch 2.",
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
            "descricao" => "Descricao do jogo Metal Gear V: Phantom Pain.",
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
            "descricao" => "Descricao do jogo Death Stranding: Director's Cut.",
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
            "descricao" => "Descricao do jogo Elden Ring.",
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
            "descricao" => "Descricao do jogo Dark Souls: Prepare to Die.",
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
            "descricao" => "Descricao do jogo Devil May Cry.",
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
            "descricao" => "Descricao do jogo Yakuza 0(2013).",
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
    return view('compras', ['produtos' => $produtos]);
})->name('pagina_inicial');

// Rotas de Layout
Route::get('/components/layout', function () {
    return view('components.layout');
})->name('layoutPage');

// rota para o controller de jogos
Route::post('/jogo/store', [JogoController::class, 'store'])->name('jogo.store');

// rota para controller de console
Route::post('/console/store', [ConsoleController::class, 'store'])->name('console.store');
Route::get('/produto/{id}', [ProdutoController::class, 'show'])->name('produto.show');

// rota para o controller de produtos
Route::get('/pesquisa', [ProdutoController::class, 'search'])->name('pesquisaPage');
Route::get('/api/search-suggestions', [JogoController::class, 'searchSuggestions']);

// rotas para o controller de autenticação
Route::post('paginas/auth/registoPage',[AuthController::class,'criarRegisto'])->name('criarRegisto');
Route::post('paginas/auth/loginPage',[AuthController::class,'login'])->name('login');
Route::get('/verificar-username', [UserController::class, 'verificarUsername'])->name('verificar.username');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/paginas/auth/registoPage', function () {
   return view('paginas.auth.registoPage');
})->name('registoPage');
Route::get('/paginas/auth/loginPage', function () {
    return view('paginas.auth.loginPage');
})->name('loginPage');





//Rotas de perfil de Utilizador
Route::post('paginas/editarPerfil', [UserController::class, 'atualizarInformacoes'])->name('user.atualizar');
Route::post('paginas/cancelarConta', [UserController::class, 'deletarConta'])->name('user.deletar');
Route::post('paginas/adicionarMorada', [UserController::class, 'adicionarMorada'])->name('moradas.adicionar');
Route::get('/perfil/moradas', [UserController::class, 'mostrarMoradas'])->name('perfil.moradas');
Route::get('/paginas/adicionarMorada', [MoradaController::class, 'index'])->name('moradas.adicionar.form');


Route::get('/perfil/minhas_vendas', [UserController::class, 'mostrarVendas'])->name('perfil-Vendas');
Route::get('/perfil/moradas/{id}/editar', [MoradaController::class, 'editarForm'])->name('moradas.editar.form');
Route::post('/perfil/moradas/{id}/editar', [MoradaController::class, 'editarMorada'])->name('moradas.editar');
Route::delete('/perfil/moradas/{id}/apagar', [MoradaController::class, 'apagarMorada'])->name('moradas.apagar');
Route::get('/concelhos/{distritoId}', [MoradaController::class, 'obterConcelhosPorDistrito']);


Route::get('/paginas/adicionarCartão', function () {
    return view('paginas.adicionarCartão');
})->name('cart.adicionar');
Route::middleware('auth')->group(function () {
    Route::get('/stripe/setup-intent', [StripeController::class, 'createSetupIntent']);
    Route::post('/stripe/save-card', [StripeController::class, 'storePaymentMethod']);
    Route::post('/stripe/set-default/{id}', [StripeController::class, 'setDefaultCard'])->name('stripe.set-default');
});
Route::post('/cartao/adicionar', [StripeController::class, 'storePaymentMethodForm'])->name('cartao.store');

Route::get('paginas/editarPerfil',function (){
   return view('paginas.editarPerfil');
})->name('editarPerfil');

Route::get('paginas/cancelarConta',function (){
    return view('paginas.cancelarConta');
})->name('cancelarConta');



// Rotas de pagamento
Route::get("/membership-payment-gateway",function(){
    return view('paginas.pagamento.payment-gateway');
})->name('assinatura');

Route::get("/membership-payment-gateway/step2",function(){
    return view('paginas.pagamento.payment-gateway-step2');
})->name('assinatura-2');

Route::get("/membership-payment-gateway/step3",function(){
    return view('paginas.pagamento.payment-gateway-step3');
})->name('assinatura-3');



// Rotas de mensagens e anúncios
Route::get("/paginas/chat",function(){
    return view('paginas.chat');
})->name('mensagensPage');

Route::get("/paginas/anunciar", function(){
    return view('paginas.anunciar');
})->name('anunciarPage');

Route::get("/paginas/anunciar", [CategoriaController::class, 'anunciar'])->name('anunciarPage');



// Rotas de perfil
Route::get("/perfil",function(){
    return view('paginas.perfil.perfil');
})->name('perfilPage');

Route::get("/perfil/cartões", [StripeController::class, 'listarCartoes'])->name('perfil-cartões');

Route::get("/perfil/favoritos",function(){
    return view('paginas.perfil.perfilfavoritos');
})->name('perfil-Favoritos');

Route::get("/perfil/minhas_compras",function(){
    return view('paginas.perfil.perfilminhascompras');
})->name('perfil-Compras');





// Rotas de perfil administrativo
Route::get("/perfilAdmin",function(){
    return view('paginas.perfilAdmin.perfilA');
})->name('perfilAdmin');

Route::get("/perfilAdmin/estatisticas",function(){
    return view('paginas.perfilAdmin.estatisticas');
});

Route::get("/perfilAdmin/denuncias",function(){
    return view('paginas.perfilAdmin.denuncias');
});

Route::get("/perfilAdmin/aprovar", [ProdutoController::class, 'aprovarAnuncios']);
Route::post("/perfilAdmin/aprovar/{id}", [ProdutoController::class, 'aprovar'])->name('produto.aprovar');
Route::post("/perfilAdmin/reprovar/{id}", [ProdutoController::class, 'reprovar'])->name('produto.reprovar');



// Rotas de categorias
Route::get("/perfilAdmin/Edicao", [CategoriaController::class, 'edicao'])->name('categoria.editar');;
Route::post("/perfilAdmin/Edicao", [CategoriaController::class, 'adicionarCategoria'])->name('categoria.adicionar');
Route::post("/perfilAdmin/Edicao/{id}", [CategoriaController::class, 'editarCategoria'])->name('categoria.editarCategoria');
Route::post("/perfilAdmin/Edicao/{id}/eliminar", [CategoriaController::class, 'eliminarCategoria'])->name('categoria.eliminarCategoria');



// Rotas de carrinho e pesquisa
Route::get("/carrinho",function(){
    return view('paginas.carrinho');
})->name('carrinhoPage');



