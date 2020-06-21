<?php


namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Session;
use DB;
use App\User;

use Illuminate\Support\Facades\Redirect;


class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        // $this->middleware('guest', ['except' => ['logout', 'logout']]);
    }


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


            Session::put('usuario', "logado");
            return redirect('/dashboard');
        }
        else
        {


            return back()->with('error', 'Usuário ou Senha incorretos');
        }

    }




    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }


}
