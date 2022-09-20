<?php

use Illuminate\Support\Facades\Route;
#Controllers
use App\Http\Controllers\CentroCustoController;
use App\Http\Controllers\LancamentoController;
use App\Http\Controllers\TipoController;

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

Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
|Elton Bueno - 19-09-2022
*/
Route::prefix('dashboard')
    ->middleware(['auth'])
    ->group( function(){
        Route::get('/', function () { 
            return view('dashboard');
        })->name('dashboard');

});

/*
|--------------------------------------------------------------------------
| TIPOS
|--------------------------------------------------------------------------
|Elton Bueno - 19-09-2022
*/
Route::prefix('tipo')
    ->middleware(['auth'])
    ->controller(TipoController::class)
    ->group(function ()
    {
        route::get('/', 'index')->name('tipo.index');
        route::get('/novo', 'create')->name('tipo.create');
        route::get('/editar/{id}', 'edit')->name('tipo.edit');
        route::get('/mostrar/{id}', 'show')->name('tipo.show');
        route::post('/cadastrar', 'store')->name('tipo.store');
        route::post('/atualizar', 'update')->name('tipo.update');
        route::post('/deletar', 'destroy')->name('tipo.destroy');
    });
/*
|--------------------------------------------------------------------------
| CENTRO DE CUSTO
|--------------------------------------------------------------------------
|Elton Bueno - 19-09-2022
*/
Route::prefix('centro-de-custo')
    ->middleware(['auth'])
    ->controller(CentroCustoController::class)
    ->group(function ()
    {
        route::get('/', 'index')->name('centro.index');
        route::get('/novo', 'create')->name('centro.create');
        route::get('/editar/{id}', 'edit')->name('centro.edit');
        route::get('/mostrar/{id}', 'show')->name('centro.show');
        route::post('/cadastrar', 'store')->name('centro.store');
        route::post('/atualizar', 'update')->name('centro.update');
        route::post('/deletar', 'destroy')->name('centro.destroy');
    });
/*
|--------------------------------------------------------------------------
| LANÇAMENTOS
|--------------------------------------------------------------------------
|Elton Bueno - 19-09-2022
*/
Route::prefix('lancamento')
    ->middleware(['auth'])
    ->controller(LancamentoController::class)
    ->group(function ()
    {
        route::get('/', 'index')->name('lancamento.index');
        route::get('/novo', 'create')->name('lancamento.create');
        route::get('/editar/{id}', 'edit')->name('lancamento.edit');
        route::get('/mostrar/{id}', 'show')->name('lancamento.show');
        route::post('/cadastrar', 'store')->name('lancamento.store');
        route::post('/atualizar', 'update')->name('lancamento.update');
        route::post('/deletar', 'destroy')->name('lancamento.destroy');
    });
/*
|--------------------------------------------------------------------------
| RELATORIOS
|--------------------------------------------------------------------------
|Elton Bueno - 19-09-2022
*/



require __DIR__.'/auth.php';
