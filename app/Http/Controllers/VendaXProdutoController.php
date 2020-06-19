<?php

namespace App\Http\Controllers;

use App\VendaXProduto;
use Illuminate\Http\Request;
use App\Estoque;

class VendaXProdutoController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        $estoque = Estoque::all();
        return view('venda-produto', compact('estoque'));
    }

    public function store(Request $request)
    {

    }

    public function show(VendaXProduto $vendaXProduto)
    {
        //
    }

    public function edit(VendaXProduto $vendaXProduto)
    {
        //
    }

    public function update(Request $request, VendaXProduto $vendaXProduto)
    {
        //
    }

    public function destroy(VendaXProduto $vendaXProduto)
    {
        //
    }
}
