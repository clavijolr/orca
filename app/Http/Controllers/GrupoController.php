<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Grupo;
use Datatables;


class GrupoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $titulo='ORCA - Cadastro de Grupos';

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
            ['grupo'=>$request->input('grupo_grupo'),
            'tipo'=>$request->input('grupo_tipo'),
            'tipo_pessoa'=>$request->input('grupo_tipo_pessoa'),
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
