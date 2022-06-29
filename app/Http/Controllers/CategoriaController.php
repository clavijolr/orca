<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Datatables;


class CategoriaController extends Controller
{

    public function index()
    {
        $titulo='CFM - Cadastro de Categorias';
        
        if(request()->ajax()) {
            return datatables()->of(Categoria::select('*'))
            ->make(true);
        }

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
             ['grupo'=>$request->input('grupo'),
             ]
         );
        //$retorno= $request->input('categoria');

        return json_encode($retorno);
    }

    public function destroy(Request $request)
    {
        $categoria = Categoria::where('id',$request->id)->delete();
        return Response()->json($categoria);
    }    

}
