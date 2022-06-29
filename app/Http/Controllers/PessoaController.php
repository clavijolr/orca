<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pessoa;
use Datatables;


class PessoaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $titulo='CFM - Cadastro de Pessoas';

        if(request()->ajax()) {
            return datatables()->of(Pessoa::select('*'))
            ->make(true);
        }

        return view('pessoas.pessoa',compact('titulo'));

    }

    public function edit(Request $request)
    {
        return Pessoa::findOrFail($request->id)  ;
    }
    public function store(Request $request)
    {
        $retorno = Pessoa::updateOrCreate(
             ['id' => $request->id ],
             ['nome'=>$request->input('pessoa_nome'),
              'razao'=>$request->input('pessoa_razao'),
              'cpfcnpj'=>$request->input('pessoa_cpfcnpj'),
             ]
         );
        //$retorno= $request->input('pessoa');

        return json_encode($retorno);
    }

    public function destroy(Request $request)
    {
        $pessoa = Pessoa::where('id',$request->id)->delete();
        return Response()->json($pessoa);
    }

}
