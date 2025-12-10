<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\Request;

class CarroController extends Controller
{
    public function index()
    {
        $carros = Carro::all();
        return view('carros.index', compact('carros'));
    }

    public function create()
    {
        return view('carros.create');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'modelo' => 'required|min:2',
            'marca'  => 'required|min:2',
            'ano'    => 'required|integer|min:1900|max:3000',
            'imagem' => 'nullable|image|mimes:jpg,png'
        ]);

        if ($request->hasFile('imagem')) {
            $dados['imagem'] = $request->file('imagem')->store('capas', 'public');
        }

        Carro::create($dados);

        return redirect()
            ->route('carros.index')
            ->with('success', 'Carro cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $carro = Carro::findOrFail($id);
        return view('carros.edit', compact('carro'));
    }

    public function update(Request $request, Carro $carro)
    {
        $dados = $request->validate([
            'modelo' => 'required|min:2',
            'marca'  => 'required|min:2',
            'ano'    => 'required|integer|min:1900|max:3000',
            'imagem' => 'nullable|image|mimes:jpg,png'
        ]);

        if ($request->hasFile('imagem')) {
            $dados['imagem'] = $request->file('imagem')->store('capas', 'public');
        }

        $carro->update($dados);

        return redirect()
            ->route('carros.index')
            ->with('success', 'Carro atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $carro = Carro::findOrFail($id);
        $carro->delete();

        return redirect()
            ->route('carros.index')
            ->with('success', 'Carro excluído com sucesso!');
    }
}