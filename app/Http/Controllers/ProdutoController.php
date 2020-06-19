<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Produto;
use Illuminate\Http\Request;
use App\Grupo;
use App\Colecao;
use App\Grades;
use App\Estoque;

class ProdutoController extends Controller
{

    public function index()
    {
        $produtos = Produto::all();
        return view('produtos-list', compact('produtos'));
    }

    public function create()
    {
        $grupos = Grupo::all();
        $colecoes = Colecao::all();
        $grades = Grades::all();

        return view('produtos-new', compact(['grupos', 'colecoes', 'grades']));
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
            'custo' => 'required',
            'unitario' => 'required',
            'codigo' => 'required',
        ], $message);

        $produto = new Produto();

        $produto->codigo = $request->input('codigo');
        $produto->nome = $request->input('nome');
        $produto->descricao = $request->input('descricao');
        $produto->custo = $request->input('custo');
        $produto->valor_unitario = $request->input('unitario');
        $produto->valor_revenda = $request->input('revenda');
        $produto->porcentagem_lucro = $request->input('porcentLucro');
        $produto->icms = $request->input('icms');
        $produto->pis = $request->input('pis');
        $produto->cofins = $request->input('cofins');
        $produto->ipi = $request->input('ipi');
        $produto->grupo_id = $request->input('escolhaGrupos');
        $produto->grade_id = $request->input('escolhaGrade');
        $produto->colecao_id = $request->input('escolhaColecao');
        $produto->save();

        return redirect('/produtos');
    }

    public function show(String $cod)
    {
        $produto = Estoque::find($cod);
    }

    public function edit(Produto $produto)
    {
        //
    }

    public function update(Request $request, Produto $produto)
    {
        //
    }

    public function destroy($id)
    {
        $produto = Produto::find($id);

        if(isset($produto)){
            $produto->delete();
        }

        return redirect('/produtos');
    }
}
