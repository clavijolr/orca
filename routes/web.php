<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{
    CategoriaController,
    ContaController,
    EmpresaController,
    GrupoController,
    HomeController,
    LinguaController,
    SubcategoriaController,
    MovimentacaoController,
    ObraController,
    PessoaController,
};
//use App\Http\Livewire\Contas;

//Route::view('/', 'welcome');
//Auth::routes();
Auth::routes(['register' => false]);


Route::view('/dashboard', 'dashboard');
Route::get('/', [HomeController::class, 'index']);
Route::get('/data/locales/{id}', [LinguaController::class, 'vazio']);
Route::get('/home', [HomeController::class, 'index']);

//CATEGORIAS
Route::get('categorias', [CategoriaController::class, 'index']);
Route::post('categoria/apagar/{id}', [CategoriaController::class, 'destroy']);
Route::post('categoria/editar/{id}', [CategoriaController::class, 'edit']);
Route::post('categoria/gravar/{id}', [CategoriaController::class, 'store']);
Route::post('categoria/grupos', [CategoriaController::class, 'get_grupos']);

//CONTAS
Route::get('contas', [ContaController::class, 'index']);
Route::post('conta/editar/{id}', [ContaController::class, 'edit']);
Route::post('conta/apagar/{id}', [ContaController::class, 'destroy']);
Route::post('conta/gravar/{id}', [ContaController::class, 'store']);

//EMPRESAS
Route::get('empresas', [EmpresaController::class, 'index']);
Route::post('empresa/apagar/{id}', [EmpresaController::class, 'destroy']);
Route::post('empresa/editar/{id}', [EmpresaController::class, 'edit']);
Route::post('empresa/gravar/{id}', [EmpresaController::class, 'store']);
Route::post('empresa/gravar/novo', [EmpresaController::class, 'store']);

//GRUPOS
Route::get('grupos', [GrupoController::class, 'index']);
Route::post('grupo/apagar/{id}', [GrupoController::class, 'destroy']);
Route::post('grupo/editar/{id}', [GrupoController::class, 'edit']);
Route::post('grupo/gravar/{id}', [GrupoController::class, 'store']);
Route::post('grupo/gravar/novo', [GrupoController::class, 'store']);

//OBRAS
Route::get('obras', [ObraController::class, 'index']);
Route::post('obra/apagar/{id}', [ObraController::class, 'destroy']);
Route::post('obra/editar/{id}', [ObraController::class, 'edit']);
Route::post('obra/gravar/{id}', [ObraController::class, 'store']);
Route::post('obra/gravar/novo', [ObraController::class, 'store']);

//PESSOAS
Route::get('pessoas', [PessoaController::class, 'index']);
Route::post('pessoa/apagar/{id}', [PessoaController::class, 'destroy']);
Route::post('pessoa/editar/{id}', [PessoaController::class, 'edit']);
Route::post('pessoa/gravar/{id}', [PessoaController::class, 'store']);
Route::post('pessoa/gravar/novo', [PessoaController::class, 'store']);

//SUBCATEGORIAS
Route::get('subcategorias', [SubcategoriaController::class, 'index']);
Route::post('subcategoria/apagar/{id}', [SubcategoriaController::class, 'destroy']);
Route::post('subcategoria/editar/{id}', [SubcategoriaController::class, 'edit']);
Route::post('subcategoria/gravar/{id}', [SubcategoriaController::class, 'store']);
Route::post('subcategoria/gravar/novo', [SubcategoriaController::class, 'store']);
Route::post('subcategoria/categorias', [SubcategoriaController::class, 'get_categorias']);


//MOVIMENTAÇÕES
Route::get('movimentacoes', [MovimentacaoController::class, 'index']);
Route::get('movimentacao/lista', [MovimentacaoController::class, 'lista']);

Route::post('movimentacao/nova', [MovimentacaoController::class, 'store']);
Route::post('movimentacao/apagar/{id}', [MovimentacaoController::class, 'destroy']);
Route::post('movimentacao/get_empresa', [MovimentacaoController::class, 'get_empresa']);
Route::post('movimentacao/get_conta', [MovimentacaoController::class, 'get_conta']);
Route::post('movimentacao/get_grupo/{id}', [MovimentacaoController::class, 'get_grupo']);
Route::post('movimentacao/get_categoria/{id}', [MovimentacaoController::class, 'get_categoria']);
Route::post('movimentacao/get_subcategoria/{id}', [MovimentacaoController::class, 'get_subcategoria']);
Route::post('movimentacao/get_obra', [MovimentacaoController::class, 'get_obra']);
Route::post('movimentacao/get_pessoa', [MovimentacaoController::class, 'get_pessoa']);


Route::get('movimentacao/get_obra', [MovimentacaoController::class, 'get_obra']);

//Route::get('teste', [LinguaController::class, 'teste']);
//Route::get('movimentacao/get_subcategoria/{id}', [MovimentacaoController::class, 'get_subcategoria']);
//Route::get('movimentacao/get_empresa', [MovimentacaoController::class, 'get_empresa']);
//Route::get('movimentacao/get_categoria/{id}', [MovimentacaoController::class, 'get_categoria']);
//Route::get('movimentacao/get_conta', [MovimentacaoController::class, 'get_conta']);
//Route::get('teste', [MovimentacaoController::class, 'get_empresa']);
//Route::get('token', function () { return csrf_token();});