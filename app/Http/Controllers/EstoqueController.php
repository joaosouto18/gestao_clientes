<?php

namespace App\Http\Controllers;

use App\Estoque;
use App\Produto;
use App\Loja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Picqer;

class EstoqueController extends Controller
{

    public function index()
    {
        $estoques = Estoque::all();
        $produtos = Produto::all();

        $count = 0;
        $sum = 0.0;

        foreach($estoques as $estoque) {

            $count = $count + $estoque->quantidade;
            $sum = $sum + $estoque->valor_total;
        }

        if($count == 0) $sum = 0 ? : null;

        return view('estoque-list', compact('estoques', 'count', 'sum'));
    }


    public function create()
    {
        $buscar = false;
        $loja = Loja::all();

        return view('estoque-new', compact('buscar', 'loja'));
    }

    public function store(Request $request)
    {
        $message = [
            'required' => 'Campo Obrigatório',
            'integer' => 'Insira um valor válido',
        ];

        $request->validate([
            'nome' => 'required',
            'codigo' => 'required',
            'qtd' => 'required',
            'tamanho' => 'required',
            'escolhaLoja' => 'required',
        ], $message);

        $codigo = $request->input('codigo');
        $tamanho = $request->input('tamanho');

        $codigo = $codigo . $tamanho;

        $getEstoque = DB::table('estoques')->where('barcode_string', $codigo)->first();

        if(isset($getEstoque)){

            $produto = Produto::where('codigo', $request->input('codigo'))->first();
            $loja = Loja::all();

            $buscar = true;
            return view('estoque-new', compact('produto', 'buscar', 'loja'));

        } else {

            $estoque = new Estoque();

            $barcode_generator = new Picqer\Barcode\BarcodeGeneratorPNG();

            $barcode = $barcode_generator->getBarcode($codigo, $barcode_generator::TYPE_CODE_128);

            $estoque->produto_id = $request->input('produto');
            $estoque->barcode = $barcode;
            $estoque->barcode_string = $codigo;
            $estoque->quantidade = $request->input('qtd');
            $estoque->tamanho = $request->input('tamanho');
            $estoque->loja_id = $request->input('escolhaLoja');
            $estoque->valor_total = $estoque->quantidade * $estoque->produto->valor_unitario;
            $estoque->save();

            $buscar = false;
            $loja = Loja::all();

            return view('estoque-new', compact('buscar', 'loja'));
        }
    }

    public function show(String $codigo)
    {
        $produto = Produto::where('codigo', $codigo)->first();
        $loja = Loja::all();

        if(isset($produto)){
            $buscar = true;
            return view('estoque-new', compact('produto', 'buscar', 'loja'));
        } else {
            $buscar = false;
            return view('estoque-new', compact('produto', 'buscar', 'loja'));
        }
    }

    public function edit(Estoque $estoque)
    {
        //
    }

    public function update(Request $request, Estoque $estoque)
    {
        //
    }

    public function destroy(Estoque $estoque)
    {
        //
    }
}
