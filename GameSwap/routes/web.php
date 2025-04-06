<?php

use Illuminate\Support\Facades\Route;


Route::get('/',function(){
    $produtos = [
        [
            "id" => 1,
            "nome" => "Playstation 5",
            "data_publicacao" => "2025-04-06 10:00:00",
            "id_anunciante" => 2,
            "descricao" => "Descricao do produto Playstation 5.",
            "preco" => 5000.00,
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
            "preco" => 5000.00,
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
            "preco" => 5000.00,
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
            "preco" => 5000.00,
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
            "preco" => 5000.00,
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
            "preco" => 5000.00,
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
            "preco" => 170.00,
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
            "preco" => 180.00,
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
            "preco" => 190.00,
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
            "preco" => 200.00,
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
            "preco" => 210.00,
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
            "preco" => 220.00,
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



    return view('compras', ['produtos' => $produtos],  );
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

Route::get("/paginas/chat",function(){
    return view('paginas.chat');
});

Route::get("/paginas/anunciar",function(){
    return view('paginas.anunciar');
});

Route::get("/perfil",function(){
    $utilizadores = [
        [
            "nome" => "Bananilson Farofa",
            "id" => "1",
            "username" => "Farofilson",
            "data_de_nascimento" => "24/12/2004",
            "Telemóvel" => "+351 911-058-351",
            "tipo" => "utilizador_comum",
            "NIF" => "000000000",
            "email" => "bunda@gmail.com"
        ]
    ];

    return view('paginas.perfil.perfil', ['utilizadores' => $utilizadores]);
});

Route::get("/perfil/cartões",function(){
    return view('paginas.perfil.perfilcartoes');
});

Route::get("/perfil/favoritos",function(){
    return view('paginas.perfil.perfilfavoritos');
});

Route::get("/perfil/minhas_compras",function(){
    return view('paginas.perfil.perfilminhascompras');
});

Route::get("/perfil/minhas_vendas",function(){
    return view('paginas.perfil.perfilminhasvendas');
});

Route::get("/perfil/moradas",function(){
    return view('paginas.perfil.perfilmoradas');
});

Route::get("/carrinho",function(){
    return view('paginas.carrinho');
});

Route::get("/pesquisa",function(){
    return view('paginas.pesquisa');
});

Route::get('/produto/{id}', function ($id) {
    $produtos = [
        [
            "id" => 1,
            "nome" => "Playstation 5",
            "data_publicacao" => "2025-04-06 10:00:00",
            "id_anunciante" => 2,
            "descricao" => "Descricao do produto Playstation 5.",
            "preco" => 5000.00,
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
            "preco" => 5000.00,
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
            "preco" => 5000.00,
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
            "preco" => 5000.00,
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
            "preco" => 5000.00,
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
            "preco" => 5000.00,
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
            "preco" => 170.00,
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
            "preco" => 180.00,
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
            "preco" => 190.00,
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
            "preco" => 200.00,
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
            "preco" => 210.00,
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
            "preco" => 220.00,
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


    // Encontra o produto pelo ID
    $produto = collect($produtos)->firstWhere('id', $id);

    // Verifica se o produto existe
    if (!$produto) {
        abort(404, 'Produto não encontrado');
    }

    // Retorna a página com os dados do produto
    return view('produto', ['produto' => $produto]);
});

