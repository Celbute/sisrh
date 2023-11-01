<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function auth(Request $request){

        $credenciais=$request->validate([
            'email' =>['required', 'email'],
            'password'=>['required']
        ],
        [
            'email.required' =>'o campo e-mail é oobrigatorio',
            'email.email' =>'o  e-mail informado não é válido',
            'password.required' =>'O campo senha é obrigatorio'
        ]
    );

    if(Auth::attempt($credenciais)){
        $request->session()->regenerate();
        return redirect()->route('funcionarios.index');
    } else{
        return redirect()->back()->with('erro','E-mail ou senha inválida');
    }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.index');
    }

}
