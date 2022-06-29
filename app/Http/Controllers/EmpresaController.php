<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Empresa;
use Datatables;


class EmpresaController extends Controller
{

    public function index()
    {
        $titulo='CFM - Cadastro de Empresas';
        
        if(request()->ajax()) {
            return datatables()->of(Empresa::select('*'))
            ->make(true);
        }

        return view('empresas.empresa',compact('titulo'));

    }

    public function edit(Request $request)
    {
        return Empresa::findOrFail($request->id)  ;
    }
    public function store(Request $request)
    {
        $retorno = Empresa::updateOrCreate(
             ['id' => $request->id ],
             ['empresa'=>$request->input('empresa'),
             'cpfcnpj'=>$request->input('cpfcnpj'),
             ]
         );
        //$retorno= $request->input('empresa');

        return json_encode($retorno);
    }

    public function destroy(Request $request)
    {
        $empresa = Empresa::where('id',$request->id)->delete();
        return Response()->json($empresa);
    }    

}
