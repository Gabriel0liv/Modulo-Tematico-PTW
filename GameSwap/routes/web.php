<?php

use Illuminate\Support\Facades\Route;


Route::get('/',function(){
    $consoles = [
    ["nome" => "Playstation 5", "preco" => "5000,00 R$", "empresa" => "Sony"],
    ["nome" => "Playstation 4", "preco" => "2000,99 R$", "empresa" => "Sony"],
    ["nome" => "Xbox Series X", "preco" => "4000,99 R$", "empresa" => "Microsoft"],
    ["nome" => "Xbox One", "preco" => "1500,99 R$", "empresa" => "Microsoft"],
    ["nome" => "Nintendo Switch", "preco" => "2000,90 R$", "empresa" => "Nintendo"],
    ["nome" => "Nintendo Switch 2", "preco" => "5000,00 R$", "empresa" => "Nintendo"]];

    $jogos = [
    ["nome" => "Metal Gear V: Phantom Pain", "preco" => "100,00 R$", "plataforma" => "PS4"],
    ["nome" => "Death Stranding: Director's Cut", "preco" => "200,00 R$", "plataforma" => "PS5"],
    ["nome" => "Elden Ring", "preco" => "250,00 R$", "plataforma" => "PS5"],
    ["nome" => "Dark Souls: Prepare to Die", "preco" => "100,00 R$", "plataforma" => "PS4"],
    ["nome" => "Devil May Cry", "preco" => "50,00 R$", "plataforma" => "PS2"],
    ["nome" => "Yakuza 0(2013)", "preco" => "90,00 R$", "plataforma" => "PS4"]
    ];

    return view('compras', ['consoles' => $consoles], ['jogos' => $jogos]);
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
