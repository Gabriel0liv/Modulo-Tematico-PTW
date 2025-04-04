<?php

use Illuminate\Support\Facades\Route;


Route::get('/',function(){
    $produtos = [
    ["nome" => "Playstation 5", "preco" => "5000,00 R$", "empresa" => "Sony", "Vendedor" => "João", "Localização" => "Cacia, Aveiro", "Fotos" => "", "categoria" => "console"],
    ["nome" => "Playstation 4", "preco" => "2000,99 R$", "empresa" => "Sony", "Vendedor" => "Luís", "Localização" => "Esgueira, Aveiro", "Fotos" => "", "categoria" => "console"],
    ["nome" => "Xbox Series X", "preco" => "4000,99 R$", "empresa" => "Microsoft", "Vendedor" => "Carlos", "Localização" => "Cacia, Aveiro", "Fotos" => "", "categoria" => "console"],
    ["nome" => "Xbox One", "preco" => "1500,99 R$", "empresa" => "Microsoft", "Vendedor" => "Kleber", "Localização" => "Cacia, Aveiro", "Fotos" => "", "categoria" => "console" ],
    ["nome" => "Nintendo Switch", "preco" => "2000,90 R$", "empresa" => "Nintendo", "Vendedor" => "Bananilson", "Localização" => "Cacia, Aveiro", "Fotos" => "", "categoria" => "console"],
    ["nome" => "Nintendo Switch 2", "preco" => "5000,00 R$", "empresa" => "Nintendo", "vendedor" => "Frofa", "Localização" => "Cacia, Aveiro", "Fotos" => "", "categoria" => "console"],
    ["nome" => "Metal Gear V: Phantom Pain", "preco" => "100,00 R$", "empresa" => "PS4", "Vendedor" => "João", "Localização" => "Cacia, Aveiro", "Fotos" => "", "categoria" => "jogo"],
    ["nome" => "Death Stranding: Director's Cut", "preco" => "200,00 R$", "empresa" => "PS5", "Vendedor" => "João", "Localização" => "Cacia, Aveiro", "Fotos" => "", "categoria" => "jogo"],
    ["nome" => "Elden Ring", "preco" => "250,00 R$", "empresa" => "PS5", "vendedor" => "João", "Localização" => "Cacia, Aveiro", "Fotos" => "", "categoria" => "jogo"],
    ["nome" => "Dark Souls: Prepare to Die", "preco" => "100,00 R$", "empresa" => "PS4", "vendedor" => "João", "Localização" => "Cacia, Aveiro", "Fotos" => "", "categoria" => "jogo"],
    ["nome" => "Devil May Cry", "preco" => "50,00 R$", "empresa" => "PS2", "vendedor" => "João", "Localização" => "Cacia, Aveiro", "Fotos" => "", "categoria" => "jogo"],
    ["nome" => "Yakuza 0(2013)", "preco" => "90,00 R$", "empresa" => "PS4", "vendedor" => "João", "Localização" => "Cacia, Aveiro", "Fotos" => "", "categoria" => "jogo"]
    ];
    

    return view('compras', ['produtos' => $produtos]);
});

Route::get("/membership-payment-gateway",function(){
    return view('paginas.pagamento.payment-gateway');
});

Route::get("/membership-payment-gateway/step2",function(){
    return view('paginas.pagamento.payment-gateway-step2');
});

Route::get("/membership-payment-gateway/step3",function(){
    return view('paginas.pagamento.payment-gateway-step3');
});

Route::get("/chat",function(){
    return view('paginas.chat');
});

Route::get("/anunciar",function(){
    return view('paginas.anunciar');
});

Route::get("/perfil",function(){
    return view('paginas.perfil.perfil');
});

Route::get("/perfil/cartões",function(){
    return view('paginas.perfil.perfilcartoes');
});

Route::get("/perfil/favoritos",function(){
    return view('paginas.perfil.perfilfavoritos');
});

Route::get("/perfil/minhas compras",function(){
    return view('paginas.perfil.perfilminhascompras');
});

Route::get("/perfil/minhas vendas",function(){
    return view('paginas.perfil.perfilminhasvendas');
});

Route::get("/perfil/moradas",function(){
    return view('paginas.perfil.perfilmoradas');
});
