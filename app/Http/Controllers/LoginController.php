<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;

use Illuminate\Support\Facades\Redirect;


class LoginController extends Controller
{


    public function login(Request $request){
        return view('login');
    }


    public function checklogin(Request $request){

        // validar o dado que vem do formulario
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );

        if(Auth::attempt($user_data,true))
        {
            return redirect('/dashboard');
        }

         return back()->with('error', 'Usuário ou Senha incorretos');


    }

    public function logout(Request $request)
    {
        Auth::logout();

        return Redirect::to('/login');
    }

}
