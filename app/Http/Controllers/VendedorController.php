<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendedor;
use App\Endereco;
use App\Empresa;
use App\Loja;

class VendedorController extends Controller
{
    public function index()
    {
        $vendedores = Vendedor::all();

    return view('vendedor-list', compact('vendedores'));
    }

    public function create()
    {
        $empresas = Empresa::all();
        $lojas = Loja::all();
        return view('vendedor-new', compact('empresas', 'lojas'));
    }

    public function store(Request $request)
    {

        $message = [
            'required' => 'Campo Obrigatório',
            'integer' => 'Insira um valor válido',
            'unique' => 'Dado já cadastrado no sistema',
        ];

        $request->validate([
            'nome' => 'required',
            'email' => 'required|unique:vendedors',
            'cpf' => 'required|unique:vendedors',
            'rg' => 'required|unique:vendedors',
            'logradouro' => 'required',
            'bairro' => 'required',
            'municipio' => 'required',
            'numero' => 'required',
            'cep' => 'required',
        ], $message);

        $vendedor = new Vendedor();
        $endereco = new Endereco();

        $endereco->logradouro = $request->input('logradouro');
        $endereco->bairro = $request->input('bairro');
        $endereco->numero = $request->input('numero');
        $endereco->municipio = $request->input('municipio');
        $endereco->cep = $request->input('cep');
        $endereco->ponto_referencia = $request->input('referencia');
        $endereco->save();

        $vendedor->nome = $request->input('nome');
        $vendedor->telefone_fixo = $request->input('telfixo');
        $vendedor->telefone_celular = $request->input('telcel');
        $vendedor->email = $request->input('email');
        $vendedor->rg = $request->input('rg');
        $vendedor->cpf = $request->input('cpf');
        $vendedor->dt_nascimento = '1989-02-20';
        $vendedor->empresa_id = $request->input('escolhaEmpresa');
        $vendedor->endereco_id = $endereco->id;
        $vendedor->loja_id = $request->input('escolhaLoja');
        $vendedor->save();

        return redirect('/vendedor');

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

    public function destroy($id)
    {
        $vendedor = Vendedor::find($id);

        if(isset($vendedor)){
            $vendedor->delete();
        }

        return redirect('/vendedor');
    }
}
