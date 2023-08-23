<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Departamento;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // receber os dados do banco atraves dos modulos
     return view('funcionarios.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //retornar o formulario de cadastro
        $departamentos = Departamento::all()->sortby('nome');
        $cargos= Cargo::all()->sortby('descricao');
        return view('funcionarios.create',compact('departamentos','cargos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $input = $request->toArray();
       dd($input);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
