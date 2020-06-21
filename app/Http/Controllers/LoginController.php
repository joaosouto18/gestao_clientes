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
//        $request->validate([
//            'email' => 'required|email',
//            'password' => 'required|min:6'
//        ]);

        $rules = array(
            'email'    => 'required|email',
            'password' => 'required|min:6'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('/')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        }
        else {

            // create our user data for the authentication
            $userdata = array(

                'password' => Input::get('password'),
                'email' => Input::get('email')
            );


            // attempt to do the login
            if (Auth::attempt($userdata, true)) {

                // validation successful!
                // redirect them to the secure section or whatever
                // return Redirect::to('secure');
                // for now we'll just echo success (even though echoing in a controller is bad)
                //return Redirect::to('Home');
                echo 'SUCCESS!';
                echo Auth::user()->uname;

                Session::put('usuario', "logado");
                return redirect('/dashboard');

            } else {

                // validation not successful, send back to form
                echo "string";


            }
        }


//        $user_data = array(
//            'email' => $request->get('email'),
//            'password' => $request->get('password')
//        );
//
//
//        var_dump(Auth::user());
//
//        exit();
//
//
//        if(Auth::attempt($user_data,true))
//        {
//            Session::put('usuario', "logado");
//            return redirect('/dashboard');
//        }
//        else
//        {
//            return back()->with('error', 'Usuário ou Senha incorretos');
//        }

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
