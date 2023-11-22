@extends('layouts.default')

@section('title', 'SisRH - Cadastro de Benefício')

@section('content')
    <h1 class="fs-2 mb-3">Cadastro de Benefício</h1>

    <form class="row g-3" method="POST" action="{{ route('beneficios.store') }}" enctype="multipart/form-data">
        @csrf <!-- Token for security -->

        <div class="col-md-6">
            <label for="descricao" class="form-label">Nome do Benefício</label>
            <input type="text" class="form-control" id="descricao" name="descricao" value="{{ old('descricao') }}">
        </div>

        <div class="col-md-6">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status">
                <option value="on" selected>Ativo</option>
                <option value="off">Desligado</option>
            </select>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-success">Cadastrar</button>
            <a href="{{ route('beneficios.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
@endsection
