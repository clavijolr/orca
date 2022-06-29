<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Grupo;
use Datatables;


class GrupoController extends Controller
{

    public function index()
    {
        $titulo='CFM - Cadastro de Grupos';
        
        if(request()->ajax()) {
            return datatables()->of(Grupo::select('*'))
            ->make(true);
        }

        return view('grupos.grupo',compact('titulo'));

    }

    public function edit(Request $request)
    {
        return Grupo::findOrFail($request->id)  ;
    }
    public function store(Request $request)
    {
         $retorno = Grupo::updateOrCreate(
            ['id' => $request->id ],
            ['grupo'=>$request->input('grupo'),
            'tipo'=>$request->input('tipo'),
            ]
        );

        return json_encode($retorno);
    }

    public function destroy(Request $request)
    {
        $grupo = Grupo::where('id',$request->id)->delete();
        return Response()->json($grupo);
    }    

}
