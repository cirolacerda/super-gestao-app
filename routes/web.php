<?php

use App\Http\Controllers\ContatoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;

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

Route::get('/', [PrincipalController::class, 'principal']);

Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos']);

Route::get('/contato', [ContatoController::class, 'contato']);

Route::get('/login', function(){
    return 'Login';
});

Route::get('/clientes', function(){
    return 'Clientes';
});

Route::get('/fornecedores', function(){
    return 'Fornecedores';
});

Route::get('/produtos', function(){
    return 'Produtos';
});

// Rota estudo expressao regular
/*Route::get('/contato/{nome}/{categoria_id}',
    function(string $nome = "Desconhecido", int $categoria = 1) {
        echo "Estamos aqui: $nome - $categoria";
    }
)->where('nome','[A-Za-z]+')->where('categoria_id','[0-9]+');*/
