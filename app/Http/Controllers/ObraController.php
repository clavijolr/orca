<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obra;
use Carbon\Carbon;
use Datatables;

class ObraController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $titulo='CFM - Obras';
        if(request()->ajax()) {
            return datatables()->of(Obra::select('*'))
            ->make(true);
        }
        return view('obras.obra',compact('titulo'));

    }

    public function store(Request $request)
    {
        $data_inicio = $request->input('obra_data_inicio');
        $data_fim =$request->input('obra_data_fim') ;

        if (empty($data_fim)){
            $retorno = Obra::updateOrCreate(
                ['id' => $request->id ],
                ['descricao'=>$request->input('obra_descricao'),
                'data_inicio'=>Carbon::parse($data_inicio)->format('Y-m-d'),
                'data_fim'=>null,
                ]
            );
        }else{
            $retorno = Obra::updateOrCreate(
                ['id' => $request->id ],
                ['descricao'=>$request->input('obra_descricao'),
                'data_inicio'=>Carbon::parse($data_inicio)->format('Y-m-d'),
                'data_fim'=>Carbon::parse($data_fim)->format('Y-m-d'),
                ]
            );

        }
       //return json_encode(array($data_inicio, $data_fim));
        return json_encode($retorno);
    }

    public function edit(Request $request)
    {
        return Obra::findOrFail($request->id)  ;
    }

    public function destroy(Request $request)
    {
        $conta = Obra::where('id',$request->id)->delete();
        return Response()->json($conta);
    }
}
