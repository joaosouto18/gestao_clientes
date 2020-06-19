<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresa-new');
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
            'cnpj' => 'required',
            'razaoSocial' => 'required',
            'inscEstadual' => 'required',
            'inscMunicipal' => 'required',
        ], $message);

        $empresa = new Empresa();
        $empresa->nome_fantasia = $request->input('nome');
        $empresa->cnpj = $request->input('cnpj');
        $empresa->razao_social = $request->input('razaoSocial');
        $empresa->inscricao_estadual = $request->input('inscEstadual');
        $empresa->inscricao_municipal = $request->input('inscMunicipal');
        $empresa->save();

        return redirect('/clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
