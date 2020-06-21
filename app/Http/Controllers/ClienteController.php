<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Cliente;
use App\Empresa;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();



        //return view('cliente-list', compact('clientes'));
        return view('cliente-list', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view('cliente-new', compact('clientes'));
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
            'nome' => 'required|min:3',
            'email' => 'required',
            'birth_date' => 'required'
        ], $message);

        $cli = new Cliente();

        $cli->nome = $request->input('nome');
        $cli->telefone = $request->input('tel');
        $cli->email = $request->input('email');
        $cli->birth_date = $request->input('birth_date');


        /*CALCULO DA IDADE*/
            $newFormatDate =  date("d/m/Y", strtotime($cli->birth_date));
            //Separa em dia, mês e ano
            list($dia, $mes, $ano) = explode('/', $newFormatDate);
            // Descobre que dia é hoje e retorna a unix timestamp
            $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
            // Descobre a unix timestamp da data de nascimento do cliente
            $diadonascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
            // Depois apenas fazemos o cálculo
            $idade = floor((((($hoje - $diadonascimento) / 60) / 60) / 24) / 365.25);
        /* FIM CALCULO DA IDADE*/

        $cli->idade = $idade;
        $cli->save();

        return redirect('/clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$clientes = Cliente::all();

        $cli = Cliente::find($id);

        if(isset($cli)) {
            return view('cliente-edit', compact('cli'));
        }

        return redirect('/clientes');

      //  return view('cliente-edit', compact('clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $cli = Cliente::find($id);

        if(isset($cli)) {
            $cli->nome = $request->input('nome');
            $cli->telefone = $request->input('tel');
            $cli->email = $request->input('email');
            $cli->birth_date = $request->input('birth_date');
                /*CALCULO DA IDADE*/
                    $newFormatDate =  date("d/m/Y", strtotime($cli->birth_date));
                    //Separa em dia, mês e ano
                    list($dia, $mes, $ano) = explode('/', $newFormatDate);
                    // Descobre que dia é hoje e retorna a unix timestamp
                    $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
                    // Descobre a unix timestamp da data de nascimento do cliente
                    $diadonascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
                    // Depois apenas fazemos o cálculo
                    $idade = floor((((($hoje - $diadonascimento) / 60) / 60) / 24) / 365.25);
                /* FIM CALCULO DA IDADE*/

            $cli->idade = $idade;
            $cli->save();


        }

        return redirect('/clientes');

//       // $student = Student::find($id);
//
//        $cliente->nome = $request->input('nome');
//        $cliente->telefone = $request->input('tel');
//        $cliente->email = $request->input('email');
//        $cliente->birth_date = $request->input('birth_date');
//
//
//        /*CALCULO DA IDADE*/
//            $newFormatDate =  date("d/m/Y", strtotime($cliente->birth_date));
//            //Separa em dia, mês e ano
//            list($dia, $mes, $ano) = explode('/', $newFormatDate);
//            // Descobre que dia é hoje e retorna a unix timestamp
//            $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
//            // Descobre a unix timestamp da data de nascimento do cliente
//            $diadonascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
//            // Depois apenas fazemos o cálculo
//            $idade = floor((((($hoje - $diadonascimento) / 60) / 60) / 24) / 365.25);
//        /* FIM CALCULO DA IDADE*/
//
//        $cliente->idade = $idade;
//
//
//
//       // $cliente->update(Cliente::all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        if(isset($cliente)){
            $cliente->delete();
        }

        return redirect('/clientes');
    }
}
