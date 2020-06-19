<?php

namespace App\Http\Controllers;

use App\Colecao;
use Illuminate\Http\Request;

class ColecaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colecoes = Colecao::all();
        return view('colecao-list', compact('colecoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('colecao-new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => 'Campo Obrigatório',
            'integer' => 'Insira um valor válido',
        ];

        $request->validate([
            'nome' => 'required',
            'codigo' => 'required',
        ], $message);

        $colecao = new Colecao();

        $inicial = "COL";

        $colecao->nome = $request->input('nome');
        $colecao->codigo = $request->input('codigo');
        $colecao->descricao = $request->input('descricao');
        $colecao->save();

        return redirect('/colecoes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Colecao  $colecao
     * @return \Illuminate\Http\Response
     */
    public function show(Colecao $colecao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Colecao  $colecao
     * @return \Illuminate\Http\Response
     */
    public function edit(Colecao $colecao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Colecao  $colecao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Colecao $colecao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Colecao  $colecao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $colecao = Colecao::find($id);

        if(isset($colecao)){
            $colecao->delete();
        }

        return redirect('/colecoes');
    }
}
