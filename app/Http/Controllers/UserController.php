<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = User::all()-> sortBy('name');
        //pagininação aqui

        if(Gate::allows('type-user')){
            $users = user::where('name','like','%' .$request->busca.'%') ;
            $totalUsers= User::all()->count();

            return view('users.index', compact('user','totalUsers'));

        }else{
            return back();
        }

        // receber os dados do banco atraves dos modulos

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all()->sortBy('name');
        return view('users.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->toArray();
        //dd($input);
        $input['password'] = bcrypt($input['password']);

        $input['user_id'] = 1;

        User::create($input);

        return redirect()->route('users.index')->with('sucesso', 'Usuários cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::find($id);

        if(!$users){
           return back();
       }
       if(auth()->user()->id == $users['id'] || auth()->user()->type == 'admin'){
        return view('user.edit', compact('user'));
       }else{
        return back();
       }


      return view('users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $user->name = $request->input('name');

        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->tipo = $request->input('tipo');

        $user->save();

        return redirect()->route('users.index')->with('sucesso', 'Usuário alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
