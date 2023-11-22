@extends('layouts.default')

@section('title', 'SisRh - Cadastro de funcionarios')

@section('content')
    <h1 class="fs-2 mb-3"> Alterar Funcionarios</h1>
    <form class="row g-3" method="POST" action="{{route('funcionarios.update', $funcionario->id)}}"
    enctype="multipart/form-data">

    @csrf
    @method('PUT')

        @include('funcionarios.partials.form')

        <div class="col-md-6">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status">
                <option value="on" {{ $funcionario->status === 'on' ? 'selected' : '' }}>Ativo</option>
                <option value="off" {{ $funcionario->status === 'off' ? 'selected' : '' }}>Desligado</option>
            </select>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
            <a href="{{ route('funcionarios.index') }}" class="btn btn-danger btn-lg">Cancelar</a>
        </div>

    </form>
@endsection
