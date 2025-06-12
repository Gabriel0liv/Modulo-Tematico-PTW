<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\CompraProduto;
use Illuminate\Http\Request;

class comprasController extends Controller
{
    public function detalhesCompras($id){
        $compra = Compra::findOrFail($id);
        $items = CompraProduto::where('compra_id', $id)->get();

        return view('paginas.detalhesCompras', compact('compra','items'));
    }
}
