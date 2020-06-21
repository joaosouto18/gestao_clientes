<?php


namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
use DB;



class LoginController extends Controller
{

    public function login(Request $request){
        //Session::flush();




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

        if(Auth::attempt($user_data))
        {
            Session::put('usuario', "logado");
            return redirect('/dashboard');
        }
        else
        {
            return back()->with('error', 'Usuário ou Senha incorretos');
        }

    }

    function dashboard(Request $request)
    {

        //$results = DB::select('select * from users where id = :id', ['id' => 3]);

        //$clientes = Cliente::table('users')->get();
        $qtdClientes = DB::table('users')->count();


        if(Session::get('usuario') == "logado")
        {
//            var_dump("ENTROU");
//            exit();

            return view ('/dashboard', compact('qtdClientes'));
        }else{
            redirect('/');
        }


//        if(){
//
//        }
//        Session::flush();
//        Auth::logout();

//        $value = $request->session()->all();
        //$value = $request->session()->get('key', 'default');

        //$value = Session::get('usuario');

        if ($request->session()->has('usuario')) {

            redirect('/dashboard');
        }else
        {
            return view('login');
        }


        return view('dashboard');
    }


    function logout(Request $request)
    {

//            $request->session()->flush();

        Auth::logout();
        Session::flush();
//        $request->session()->regenerate(true);

        return redirect('/');

    }


}
