<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Grupo;
use Datatables;


class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        if(request()->ajax()) {
            return datatables()->of(Categoria::with('grupo')->get())
            ->make(true);
        }

        $titulo='ORCA - Cadastro de Categorias';
        //$categorias=Categoria::with('grupo')->get();
        //dd($categorias->grupo->grupo);

        return view('categorias.categoria',compact('titulo'));

    }

    public function edit(Request $request)
    {
        return Categoria::findOrFail($request->id)  ;
    }
    public function store(Request $request)
    {
        $retorno = Categoria::updateOrCreate(
             ['id' => $request->id ],
             ['categoria'=>$request->input('categoria'),
              'grupo_id'=>$request->input('categoria_grupo_id'),
             ]
         );

        return json_encode($retorno);
    }

    public function destroy(Request $request)
    {
        $categoria = Categoria::where('id',$request->id)->delete();
        return Response()->json($categoria);
    }
    public function get_grupos(Request $request)
    {
        $grupos = Grupo::get(['id','grupo']);
        return response()->json(['grupos' => $grupos]);
    }



}
