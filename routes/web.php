<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\ProdutoController;

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

  // Rotas - Criar
Route::post('marcas',[MarcasController::class, 'store']);
Route::post('produto', [ProdutoController::class, 'store']);

  // deletar
Route::delete('estoque/{id}', [EstoqueController::class, 'destroy']);
Route::put('/produto/{id}', [ProdutoController::class, 'update']);



  // Rotas - Mostrar as view
Route::get('estoque',[EstoqueController::class,'index']);
Route::get('produto', [ProdutoController::class, 'index']);
Route::get('marcas', [MarcasController::class, 'index']);

Route::get('ajaxPesquisa/{idMarca}/{idProduto}', [ProdutoController::class, 'ajaxPesquisa']);


  // ajax
Route::get('/produto/{marca_id}', [ProdutoController::class, 'produtosPorMarca']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
