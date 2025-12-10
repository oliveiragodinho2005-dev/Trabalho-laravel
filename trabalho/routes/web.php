<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\CarroController;

Route::resource('carros', CarroController::class);

Route::get('/tema-toggle', function () {
    $temaAtual = session('theme', 'light');
    $novoTema = $temaAtual === 'light' ? 'dark' : 'light';
    session(['theme' => $novoTema]);

    return back();
})->name('theme.toggle');