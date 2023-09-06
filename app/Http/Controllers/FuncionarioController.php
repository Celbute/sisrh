<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Departamento;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class FuncionarioController extends Controller


{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $funcionarios = Funcionario::all()-> sortBy('nome');
       // receber os dados do banco atraves dos modulos
     return view('funcionarios.index', compact('funcionarios'));
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
      //  dd($input);

       $input['user_id'] = 1;

       if($request -> hasFile('foto')){
        $input['foto'] = $this->uploadFoto($request->foto);
       }
      //insert de dados do usuario
       Funcionario::create($input);

       return redirect()-> route('funcionarios.index')-> with('sucesso',
       'funcionario cadastrado com sucesso');

    }
 // função para redimencionar e realizar o upload da foto
    private function uploadFoto($foto){
        $nomeArquivo = $foto->hashName();
        // redimenssionar foto
       $imagem = Image::make($foto)->fit(100,100);

        //salvar arquivo da foto
        Storage::put('public/funcionarios/'.$nomeArquivo, $imagem-> encode());
        //$foto->store('public/funcionarios/');

        return $nomeArquivo;

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
         $funcionario = Funcionario::find($id);

         if(!$funcionario){
            return back();
        }

       $departamentos = Departamento::all()->sortBy('nome');
       $cargos = Cargo::all()->sortBy('descricao');
       return view('funcionarios.edit', compact('funcionario','departamentos','cargos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $input = $request -> toArray();
      $funcionario = Funcionario::find($id);

      if($request->hasFile('foto')){
        Storage::delete('public/funcionarios'.$funcionario['foto']);
        $input['foto'] = $this-> uploadFoto($request->foto);
      }

      $funcionario-> fill($input);
      $funcionario->save();
      return redirect()->route('funcionario.index')->with('sucesso','Funcionario alterado com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
