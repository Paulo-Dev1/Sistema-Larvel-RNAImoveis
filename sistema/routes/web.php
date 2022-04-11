<?php

use App\Http\Controllers\CadCorretoresController;
use App\Http\Controllers\GerenteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//login
Route::get('/', HomeController::class)->name('home');
Route::post('painel', [UsuarioController::class, 'login'])->name('usuarios.login');
//corretores 
Route::get('corretores', [CadCorretoresController::class, 'index'])->name('corretores.index');
Route::post('corretores', [CadCorretoresController::class, 'insert'])->name('corretores.insert');
Route::get('corretores/inserir', [CadCorretoresController::class, 'create'])->name('corretores.inserir');

Route::get('corretores/{item}/edit', [CadCorretoresController::class, 'edit'])->name('corretores.edit');
Route::put('corretores/{item}', [CadCorretoresController::class, 'editar'])->name('corretores.editar');

Route::delete('corretores/{item}', [CadCorretoresController::class, 'delete'])->name('corretores.delete');
Route::get('corretores/{item}/delete', [CadCorretoresController::class, 'modal'])->name('corretores.modal');
//gerentes
Route::get('home-gerente', [GerenteController::class, 'index'])->name('gerente.index');
Route::get('/', [UsuarioController::class, 'logout'])->name('usuarios.logout');
Route::put('gerente/{usuario}', [GerenteController::class, 'editar'])->name('gerente.editar');
