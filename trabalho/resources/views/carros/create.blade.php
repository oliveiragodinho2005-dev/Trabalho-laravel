@extends('layout')

@section('title', 'Cadastrar Carro')

@section('content')

<h1 class="mb-4">Novo Carro</h1>

<form action="{{ route('carros.store') }}" method="POST" enctype="multipart/form-data" class="card p-4">
    @csrf

    <div class="mb-3">
        <label class="form-label">Modelo</label>
        <input name="modelo" value="{{ old('modelo') }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Marca</label>
        <input name="marca" value="{{ old('marca') }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Ano</label>
        <input name="ano" value="{{ old('ano') }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Foto</label>
        <input type="file" name="imagem" class="form-control">
    </div>

    <button class="btn btn-success">Salvar</button>
    <a href="{{ route('carros.index') }}" class="btn btn-secondary ms-2">Voltar</a>
</form>

@endsection