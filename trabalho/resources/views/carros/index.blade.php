@extends('layout')

@section('title', 'Carros')

@section('content')

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (Cookie::get('ultimo_carro'))
    <p class="text-muted">Último carro cadastrado: <b>{{ Cookie::get('ultimo_carro') }}</b></p>
@endif

<h1 class="mb-3">Lista de Carros</h1>

<a href="{{ route('carros.create') }}" class="btn btn-primary mb-3">Cadastrar Carro</a>

<table class="table table-bordered table-striped">
    <tr>
        <th>ID</th>
        <th>Modelo</th>
        <th>Marca</th>
        <th>Ano</th>
        <th>Foto</th>
        <th>Ações</th>
    </tr>

    @foreach ($carros as $carro)
    <tr>
        <td>{{ $carro->id }}</td>
        <td>{{ $carro->modelo }}</td>
        <td>{{ $carro->marca }}</td>
        <td>{{ $carro->ano }}</td>
        <td>
            @if ($carro->imagem)
    <img src="{{ asset('storage/' . $carro->imagem) }}" width="100">
@endif

        </td>
        <td>
            <a href="{{ route('carros.edit', $carro->id) }}" class="btn btn-warning btn-sm">Editar</a>

            <form action="{{ route('carros.destroy', $carro->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Excluir</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection