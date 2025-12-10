@extends('layout')

@section('title', 'Editar Carro')

@section('content')

<h1 class="mb-4">Editar Carro</h1>

<form action="{{ route('carros.update', $carro->id) }}" 
      method="POST" 
      enctype="multipart/form-data" 
      class="card p-4">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Modelo</label>
        <input name="modelo" value="{{ $carro->modelo }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Marca</label>
        <input name="marca" value="{{ $carro->marca }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Ano</label>
        <input name="ano" value="{{ $carro->ano }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Foto</label>
        <input type="file" name="imagem" class="form-control">

    </div>

    @if ($carro->imagem)
    <img src="{{ asset('storage/' . $carro->imagem) }}" width="120">
@endif


    <button class="btn btn-success">Salvar</button>
    <a href="{{ route('carros.index') }}" class="btn btn-secondary ms-2">Voltar</a>
</form>

@endsection