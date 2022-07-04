<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Empresa;
use Datatables;


class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $titulo='ORCA - Cadastro de Empresas';

        if(request()->ajax()) {
            return datatables()->of(Empresa::get())
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
             'tipo_pessoa'=>$request->input('empresa_tipo_pessoa'),
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
