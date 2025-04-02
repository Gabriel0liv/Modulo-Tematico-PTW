<?php

use Illuminate\Support\Facades\Route;


Route::get('/',function(){
    return view('compras');
});

Route::get('/paginas',function(){
    return view('paginas.anunciar');
});

