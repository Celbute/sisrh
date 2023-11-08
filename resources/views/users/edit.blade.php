@extends('layouts.default')

@section('title', 'SisRh - Cadastro de Usuários')

@section('content')
    @if (Session::get('sucesso'))
        <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>
    @endif

    <h1 class="fs-2 mb-3"> Alterar Usarios</h1>

    <form class="row g-3" method="POST" action="{{ route('users.update', $users->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('users.partials.form')

        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
            <a href="{{ route('users.index') }}" class="btn btn-danger btn-lg">Cancelar</a>
        </div>

    </form>
@endsection
