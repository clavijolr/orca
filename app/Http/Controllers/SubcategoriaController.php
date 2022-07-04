<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Subcategoria;
use Datatables;


class SubcategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Subcategoria::with('categoria')->get())->make(true);
        }

        $titulo='CFM - Subcategoria';

        //dd($categorias[1]->grupo->tipo);

        return view('subcategorias.subcategoria',compact('titulo'));
    }

    public function edit(Request $request)
    {
        return Subcategoria::findOrFail($request->id)  ;
    }
    public function store(Request $request)
    {
        $retorno = Subcategoria::updateOrCreate(
             ['id' => $request->id ],
             ['subcategoria'=>$request->input('subcategoria'),
              'categoria_id'=>$request->input('subcategoria_categoria_id'),
             ]
         );

        return json_encode($retorno);
    }

    public function destroy(Request $request)
    {
        $subcategoria = Subcategoria::where('id',$request->id)->delete();
        return Response()->json($subcategoria);
    }
    public function jcategorias()
    {
        return json_encode( Categoria::get(['id','categoria']) )  ;
    }
    public function get_categorias()
    {
        $categorias = Categoria::get(['id','categoria']);
        return response()->json(['categorias' => $categorias]);

    }
}
