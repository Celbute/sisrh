<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuncionarioController;
use App\Models\Funcionario;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/funcionarios', [FuncionarioController::class, 'index'])-> name('funcionarios.index');
Route::get('/funcionarios/create', [FuncionarioController::class, 'create'])-> name('funcionarios.create');
Route::post('/funcionarios',[FuncionarioController::class, 'store'])->name('funcionarios.store');

