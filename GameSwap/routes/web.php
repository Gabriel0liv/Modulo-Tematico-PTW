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

Route::get("/paginas/pagamento/pagamento1",function(){
    return view('paginas.pagamento.pagamento1');
});

Route::get("/paginas/pagamento/pagamento2",function(){
    return view('paginas.pagamento.pagamento2');
});

Route::get("/paginas/pagamento/pagamento3",function(){
    return view('paginas.pagamento.pagamento3');
});

Route::get("/paginas/chat",function(){
    return view('paginas.chat');
});

Route::get("/paginas/anunciar",function(){
    return view('paginas.anunciar');
});
