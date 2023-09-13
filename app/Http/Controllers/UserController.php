<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all()-> sortBy('name');
        // receber os dados do banco atraves dos modulos
      return view('users.index', compact('user'));
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
