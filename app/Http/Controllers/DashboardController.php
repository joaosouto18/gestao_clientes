<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;



class DashboardController extends Controller
{


    public function dashboard()
    {
            if(!Auth::user()){
                return redirect('/logout');
            }

            $qtdClientes = DB::table('clientes')->count();
            return view ('dashboard', compact('qtdClientes'));

    }
}
