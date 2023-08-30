@extends('layouts.default')
@section('title', 'Funcionarios')

@section('content')
    <x-btn-create>
        <x-slot name="route">{{ route('funcionarios.create') }}</x-slot>
        <x-slot name="title">Cadastrar Funcrionário</x-slot>
    </x-btn-create>
    <h1 class="fs-2 mb-3">Lista Funcionários</h1>
    @if (Session::get('sucesso'))
        <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>
    @endif

    <table class="table table-striped">
        <thead class="table-dark">
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">Foto</th>
                <th scope="col">Nome</th>
                <th scope="col">Cargo</th>
                <th scope="col">Departamento</th>
                <th scope="col" width="110px">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($funcionarios as $funcionario)
            <tr class="align-midle">
                <th scope="row" class="text-center">{{$funcionario->id }}</th>
                <td class="text-aling">
                    @if (empty($funcionario->foto))
                        <img src="/images/sombra_funcionario.jpg" alt="foto" class="img-thumbnail" width="70">
                    @else

                    @endif
                </td>
                <td>{{$funcionario->nome}}</td>

                <td class="text-center">{{$funcionario->Cargo->descricao}}</td>
                <td class="text-center">{{$funcionario->departamento->nome}}</td>
                <td>
                    <a href="" title="Editar" class="btn btn-primary"><i class="bi bi-pen"></i></a>
                    <a href="" title="Deletar" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
