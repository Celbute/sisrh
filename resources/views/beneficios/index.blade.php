@extends('layouts.default')

@section('title', 'SisRh - Lista de Benefícios')

@section('content')

<x-btn-create>
    <x-slot name="route">{{ route('beneficios.create') }}</x-slot>
    <x-slot name="title">Cadastrar Beneficio</x-slot>
</x-btn-create>


<h1 class="fs-2 mb-3">Lista de Benefícios</h1>

    <x-busca>
        <x-slot name="rota">{{route('beneficios.index')}}</x-slot>
        <x-slot name="tipo">Benefício</x-slot>

    </x-busca>

    <table class="table table-striped">

        <thead  class="table-dark">
            <tr class="text-center">
                <th>Nome do Benefício</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($beneficios as $beneficio)
            <tr class="text-center">
                <td>{{ $beneficio->descricao }}</td>
                <td>{{ $beneficio->status === 'on' ? 'Ativo' : 'Desligado' }}</td>
                <td class="text-center">
                    <a href="{{ route('beneficios.edit', $beneficio->id) }}" title="Editar" class="btn btn-primary"><i class="bi bi-pen"></i></a>
                    <a href="" title="Deletar" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$beneficio->id}}"><i class="bi bi-trash"></i></a>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
    <style>
        .pagination{
            justify-content: center;
        }
    </style>
    {{ $beneficios->links() }}
@endsection
