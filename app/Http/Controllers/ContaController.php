<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conta;
use Datatables;

use function PHPUnit\Framework\isEmpty;

class ContaController extends Controller
{

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
        //dd($request);
        //$data = Input::all();
        $ret = ['verdadeiro'=>'recebeu'];
        if(empty($request->id)){
            
            $result=false;
            //$result=$request->id;
        }else{
            $result=Conta::where('id','=',$request->id)->firstOrFail()->update([
                    'descricao'=>$request->input('descricao'),
                    'agencia'=>$request->input('agencia'),
                    'conta'=>$request->input('conta'),
                    'saldo'=>$request->input('saldo'),
                ]);        
        }

        return json_encode($result);
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
