<?php

use App\Helpers\GoogleDriveHelper;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\DenunciasController;
use App\Http\Controllers\ImagemProxyController;
use App\Http\Controllers\ModeloConsoleController;
use App\Http\Controllers\MoradaController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\jogoController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [ProdutoController::class, 'paginaInicial'])->name('pagina_inicial');

// Rotas de Layout
Route::get('/components/layout', function () {
    return view('components.layout');
})->name('layoutPage');

// rota para o controller de jogos
Route::post('/jogo/store', [JogoController::class, 'store'])->name('jogo.store');

// rota para controller de console
Route::post('/console/store', [ConsoleController::class, 'store'])->name('console.store');


// rota para o controller de produtos
Route::get('/produto/{tipo_produto}/{id}', [ProdutoController::class, 'show'])->name('produto.show');
Route::get('/pesquisa', [ProdutoController::class, 'search'])->name('pesquisaPage');
Route::get('/api/search-suggestions', [ProdutoController::class, 'searchSuggestions']);
Route::post('/destaque/adicionar', [CarrinhoController::class, 'adicionarDestaque'])->name('destaque.adicionar');
Route::get('paginas/carrinhoDestaque', [CarrinhoController::class, 'verCarrinhoDestaque'])->name('carrinho.destaque');
Route::get('/checkout/destaque', [CheckoutController::class, 'checkoutDestaque'])->name('checkout.destaque');
Route::post('/checkout/destaque/finalizar', [CheckoutController::class, 'finalizarPagamentoDestaque'])->name('checkout.finalizarDestaque');

Route::get('paginas/termos', function () {
    return view('paginas.termos');
})->name('termos');
Route::get('paginas/privacidade', function () {
    return view('paginas.privacidade');
})->name('privacidade');
Route::get('paginas/ajuda', function () {
    return view('paginas.ajuda');
})->name('ajuda');



// rotas para paginas de informação
Route::get('paginas/comoFazer', function () {
    return view('paginas.comoFazer');
})->name('comoFazer');

Route::get('/comoComprar', function () {
    return view('paginas.comoComprar');
})->name('comoComprar');


Route::get('/comoDenunciar', function () {
    return view('paginas.comoDenunciar');
})->name('comoDenunciar');


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
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

//Rotas de perfil de Utilizador
Route::post('paginas/editarPerfil', [UserController::class, 'atualizarInformacoes'])->name('user.atualizar');
Route::post('paginas/cancelarConta', [UserController::class, 'deletarConta'])->name('user.deletar');
Route::post('paginas/adicionarMorada', [UserController::class, 'adicionarMorada'])->name('moradas.adicionar');
Route::get('paginas/perfil/moradas', [UserController::class, 'mostrarMoradas'])->name('perfil.moradas');
Route::get('/paginas/adicionarMorada', [MoradaController::class, 'index'])->name('moradas.adicionar.form');
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
Route::get('perfil/meus_anuncios', [UserController::class, 'mostrarAnuncios'])->name('perfil-Anuncios');
Route::post('perfil/meus_anuncios/desativar/{tipo}/{id}', [ProdutoController::class, 'desativarAnuncio'])->name('anuncio.desativar');

Route::get('/perfil/moradas/{id}/editar', [MoradaController::class, 'editarForm'])->name('moradas.editar.form');
Route::post('/perfil/moradas/{id}/editar', [MoradaController::class, 'editarMorada'])->name('moradas.editar');
Route::delete('/perfil/moradas/{id}/apagar', [MoradaController::class, 'apagarMorada'])->name('moradas.apagar');
Route::get('/concelhos/{distritoId}', [MoradaController::class, 'obterConcelhosPorDistrito']);

Route::get('/paginas/adicionarCartão', function () {
    return view('paginas.adicionarCartão');
})->name('cart.adicionar');
Route::delete('/perfil/cartoes/{id}/desativar', [StripeController::class, 'desativarCartao'])->name('cartoes.desativar');
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

Route::get('/imagem-proxy/{id}', [ImagemProxyController::class, 'exibir']);
Route::post('/perfil/atualizar-imagem', [UserController::class, 'atualizarInformacoes'])->name('user.atualizar');

Route::post('/produto/{id}/destaque', [ProdutoController::class, 'destacar'])->name('produto.destaque');

// Rota visitar perfilAdd commentMore actions
Route::get('/perfil/{username}', [UserController::class, 'mostrarPerfilVisita'])->name('perfil.visitar');
Route::post('/comentarios', [App\Http\Controllers\ComentarioController::class, 'store'])->name('comentarios.store');


// Rotas de ticket de denuncia
Route::get('/denunciar/{id}', [DenunciasController::class, 'denunciarUsuario'])->name('denuncias.criar');

Route::post('/denunciar', [DenunciasController::class, 'store'])->name('denuncias.store');

Route::get("/perfilAdmin/denuncias", [DenunciasController::class, 'resolverDenuncias']);

// Rota visitar perfil
Route::get('/perfil/{username}', [UserController::class, 'mostrarPerfilVisita'])->name('perfil.visitar');

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



Route::post('paginas/carrinho/adicionar', [CarrinhoController::class, 'adicionar'])->name('carrinho.adicionar');
Route::get('paginas/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
Route::delete('paginas/carrinho/remover/{id}', [CarrinhoController::class, 'remover'])->name('carrinho.remover');
Route::get('paginas/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::middleware(['auth'])->group(function () {
    Route::post('/finalizar-compra', [CheckoutController::class, 'finalizarCompra'])->name('checkout.finalizar');
});



// Rotas de mensagens e anúncios
Route::get("/paginas/chat",function(){
    return view('paginas.chat');
})->name('mensagensPage');

Route::get("/paginas/anunciar", function(){
    return view('paginas.anunciar');
})->name('anunciarPage');

Route::get("/paginas/anunciar", [ProdutoController::class, 'anunciar'])->name('anunciarPage');



// Rotas de perfil
Route::get("/perfil",function(){
    return view('paginas.perfil.perfil');
})->name('perfilPage');

Route::get("paginas/perfil/cartões", [StripeController::class, 'listarCartoes'])->name('perfilCartoes');

Route::get("paginas/perfil/minhas_compras",[UserController::class, 'listarCompras'])->name('perfil-Compras');

Route::get("paginas/perfil/comentarios", [ComentarioController::class, 'comentariosPerfil'])->name('perfil-Comentarios');




// Rotas de perfil administrativo
Route::get("/perfilAdmin", [AdminController::class, 'perfil'])->name('perfilAdmin');

Route::get("/perfilAdmin/utilizadores", [UserController::class, 'listarUtilizadores'])->name('perfilAdmin.utilizadores');
Route::get("/perfilAdmin/utilizadores/{id}", [UserController::class, 'exibirUtilizador'])->name('perfilAdmin.utilizador.exibir');

Route::get("/perfilAdmin/denuncias",function(){
    return view('paginas.perfilAdmin.denuncias');
});

Route::get("/perfilAdmin/aprovar", [ProdutoController::class, 'aprovarAnuncios']);
Route::post("/perfilAdmin/aprovar/{id}", [ProdutoController::class, 'aprovar'])->name('produto.aprovar');
Route::post("/perfilAdmin/reprovar/{id}", [ProdutoController::class, 'reprovar'])->name('produto.reprovar');
Route::get("/perfilAdmin/Edicao", [AdminController::class, 'edicao'])->name('editar');;


// Rotas de categorias

Route::post("/perfilAdmin/Edicao", [CategoriaController::class, 'adicionarCategoria'])->name('categoria.adicionar');
Route::post("/perfilAdmin/Edicao/{id}", [CategoriaController::class, 'editarCategoria'])->name('categoria.editarCategoria');
Route::post("/perfilAdmin/Edicao/{id}/eliminar", [CategoriaController::class, 'eliminarCategoria'])->name('categoria.eliminarCategoria');

// Rodas Modelo de Consoles
Route::get('/perfilAdmin/modelos-consoles', [ModeloConsoleController::class, 'edicao'])->name('modelo_consoles.editar');
Route::post('/perfilAdmin/modelos-consoles', [ModeloConsoleController::class, 'adicionarModeloConsoles'])->name('modelo_consoles.adicionar');
Route::post('/perfilAdmin/modelos-consoles/{id}', [ModeloConsoleController::class, 'editarModeloConsoles'])->name('modelo_consoles.editarModelo');
Route::post('/perfilAdmin/modelos-consoles/{id}/eliminar', [ModeloConsoleController::class, 'eliminarModeloConsoles'])->name('modelo_consoles.eliminarModelo');

// Rotas de carrinho e pesquisa
Route::get("/carrinho",function(){
    return view('paginas.carrinho');
})->name('carrinhoPage');

// Rotas de ticket de denuncia
Route::get('/denunciar/{id}', [DenunciasController::class, 'denunciarUsuario'])->name('denuncias.criar');
Route::post('/denunciar', [DenunciasController::class, 'store'])->name('denuncias.store');
Route::get("/perfilAdmin/denuncias", [DenunciasController::class, 'resolverDenuncias']);
Route::get('/perfilAdmin/denuncias/detalhes/{id}', [DenunciasController::class, 'exibirDenuncia'])->name('denuncias.exibir');
Route::post('/perfilAdmin/denuncias/banir/{id}', [DenunciasController::class, 'banir'])->name('utilizador.banir');
Route::post('/perfilAdmin/denuncias/resolver/{id}', [DenunciasController::class, 'resolver'])->name('utilizador.resolver');
Route::post('/perfilAdmin/denuncias/suspender/{id}', [DenunciasController::class, 'suspender'])->name('utilizador.suspender');

// Rota visitar perfil
//Route::get('/perfil/{username}', [UserController::class, 'mostrarPerfilVisita'])->name('perfil.visitar');


