@extends('layouts.default')
@section('title', 'Usuários')

@section('content')
    <x-btn-create>
        <x-slot name="route">{{ @route('users.create') }}</x-slot>
        <x-slot name="title">Cadastrar usuarios</x-slot>
    </x-btn-create>
    <h1 class="fs-2 mb-3">Lista de Usuarios</h1>

    @if (Session::get('sucesso'))
        <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>
    @endif

    <table class="table table-striped">
        <thead class="table-dark">
          <tr class="text-center">
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">tipo</th>
            <th scope="col">ações</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($user as $users)
          <tr>
            <th class="text-center" scope="row">{{ $users->id }}</th>
            <td class="text-center">{{ $users->name}}</td>
            <td class="text-center">{{ $users->email}}</td>
            <td class="text-center">{{ $users->tipo}}</td>
            <td class="text-center">
                <a href="{{ route('users.edit', $users->id) }}" title="Editar" class="btn btn-primary"><i class="bi bi-pen"></i></a>
                <a href="" title="Deletar" class="btn btn-danger"><i class="bi bi-trash"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
@endsection
