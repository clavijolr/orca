<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conta;
use Datatables;

use function PHPUnit\Framework\isEmpty;

class ContaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $titulo='CFM - Contas';
        if(request()->ajax()) {
            return datatables()->of(Conta::select('*'))
            ->make(true);
        }
        return view('contas.conta',compact('titulo'));

    }

    public function store(Request $request)
    {
        dd($request->id);

        $retorno = Conta::updateOrCreate(
            ['id' => $request->id ],
            ['descricao'=>$request->input('descricao'),
             'agencia'=>$request->input('agencia'),
             'conta'=>$request->input('conta'),
             'saldo'=>floatval(str_replace(',', '.', str_replace('.', '', $request->input('conta_saldo')))),
            ]
        );
        return json_encode($retorno);
    }

    public function edit(Request $request)
    {
        return Conta::findOrFail($request->id)  ;
    }

    public function destroy(Request $request)
    {
        $conta = Conta::where('id',$request->id)->delete();
        return Response()->json($conta);
    }
}
