<?php

namespace App\Http\Controllers;
use App\Models\Beneficio;
use Illuminate\Http\Request;

class BeneficioController extends Controller
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
        $beneficios = Beneficio::where('descricao','like', '%'.$request->busca.'%')->orderBy('descricao','asc')->paginate(3);

        return view('beneficios.index', compact('beneficios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('beneficios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required|max:255',
            'status' => 'required|in:on,off',
        ]);

        Beneficio::create($request->all());

        return redirect()->route('beneficios.index')->with('sucesso', 'Benefício cadastrado com sucesso!');
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
        $beneficio = Beneficio::find($id);

        if (!$beneficio) {
            return back();
        }

        return view('beneficios.edit', compact('beneficio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'descricao' => 'required|max:255',
            'status' => 'required|in:on,off',
        ]);

        $beneficio = Beneficio::find($id);
        $beneficio->update($request->all());

        return redirect()->route('beneficios.index')->with('sucesso', 'Benefício alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $beneficio = Beneficio::find($id);

        // Verificar se o benefício não está vinculado a nenhum funcionário
        if ($beneficio->funcionarios->isEmpty()) {
            $beneficio->delete();
            return redirect()->route('beneficios.index')->with('sucesso', 'Benefício excluído com sucesso!');
        } else {
            return redirect()->route('beneficios.index')->with('erro', 'Não é possível excluir o benefício vinculado a funcionários!');
        }
        return redirect()->route('beneficios.index')->with('erro','Beneficio não encontrado');
    }
}
