@extends('layouts.default')

@section('title', 'SisRh - Cadastro de funcionarios')

@section('content')
    <h1 class="fs-2 mb-3"> Alterar Funcionarios</h1>
    <form class="row g-3" method="POST" action="{{route('funcionarios.store')}}"
    enctype="multipart/form-data">

    @csrf
    @method('PUT')

        @include('funcionarios.partials.form')

        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
            <a href="{{ route('funcionarios.index') }}" class="btn btn-danger btn-lg">Cancelar</a>
        </div>

    </form>
@endsection
