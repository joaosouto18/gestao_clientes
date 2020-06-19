<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grades;
use Illuminate\Support\Facades\DB;

class GradesController extends Controller
{

    public function index()
    {
        $grades = Grades::all();

        return view('grades-list', compact('grades'));
    }

    public function create()
    {
        return view('grade-new');
    }

    public function store(Request $request)
    {

        $grades = new Grades();

        //$codigo = DB::table('grades')->where('codigo', $request->input('codigo'))->first();
        //$nome = DB::table('grades')->where('nome', $request->input('nome'))->first();

        //if(isset($codigo) || isset($nome)) {

        //}

        $message = [
            'required' => 'Campo Obrigatório',
            'unique' => 'Dado já cadastrado no sistema',
            'integer' => 'Insira um valor válido',
        ];

        $request->validate([
            'nome' => 'required|unique:grades',
            'codigo' => 'required|unique:grades',
        ], $message);

        $grades->codigo = $request->input('codigo');
        $grades->nome = $request->input('nome');
        $grades->T1 = $request->input('t1');
        $grades->T2 = $request->input('t2');
        $grades->T3 = $request->input('t3');
        $grades->T4 = $request->input('t4');
        $grades->T5 = $request->input('t5');
        $grades->T6 = $request->input('t6');
        $grades->T7 = $request->input('t7');
        $grades->T8 = $request->input('t8');
        $grades->T9 = $request->input('t9');
        $grades->T0 = $request->input('t0');
        $grades->save();

        return redirect('/grades');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $grade = Grades::find($id);

        if(isset($grade)){
            $grade->delete();
        }

        return redirect('/grades');
    }
}
