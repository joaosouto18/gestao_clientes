<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use DB;



class DashboardController extends Controller
{




    function dashboard(Request $request)
    {



        //$results = DB::select('select * from users where id = :id', ['id' => 3]);

        //$clientes = Cliente::table('users')->get();


        if(Auth::user()){
            $qtdClientes = DB::table('users')->count();
            return view ('dashboard', compact('qtdClientes'));
        }

        else{
           // Session::flush();
            Auth::logout();
            redirect('login');
        }


    }
}
