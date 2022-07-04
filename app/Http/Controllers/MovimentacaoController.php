<?php

namespace App\Http\Controllers;
use App\Models\Empresa;
use App\Models\Pessoa;
use App\Models\Conta;
use App\Models\Grupo;
use App\Models\Categoria;
use App\Models\Movimentacao;
use App\Models\Subcategoria;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MovimentacaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {


        $titulo='ORCA - Movimentação';
        // dd($categorias->grupo->grupo);
       // dd('movimentacao');

        return view('movimentacoes.movimentacao',compact('titulo'));

    }
    public function store(Request $request)
    {
        $procurado = array('/Janeiro/' ,'/Fevereiro/' ,'/Marco|Março/' ,'/Abril/' ,'/Maio/' ,'/Junho/' ,'/Julho/' ,'/Agosto/' ,'/Novembro/' ,'/Setembro/' ,'/Outubro/' ,'/Dezembro/');
        $alterado = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Nov','Sep','Oct','Dec');

        //$emissao = preg_replace($procurado, $alterado,$request->input('mv_emissao_submit'));
        $emissao = $request->input('mv_emissao_submit');
        $vencimento = $request->input('mv_vencimento_submit');
        $baixa = $request->input('mv_baixa_submit');

       /// return json_encode( Carbon::parse($emissao)->format('Y-m-d H:i:s'));

        $retorno = Movimentacao::updateOrCreate(
            ['id' => $request->id ],
            ['emissao'=> Carbon::parse($emissao)->format('Y-m-d'),
             'vencimento'=> Carbon::parse($vencimento)->format('Y-m-d'),
             'baixa'=> Carbon::parse($baixa)->format('Y-m-d'),
             'empresa_id'=> $request->input('mv_empresa_id'),
             'conta_id'=> $request->input('mv_conta_id'),
             'grupo_id'=> $request->input('mv_grupo_id'),
             'categoria_id'=> $request->input('mv_categoria_id'),
             'subcategoria_id'=> $request->input('mv_subcategoria_id'),
             'tipo'=> $request->input('mv_tipo'),
             'pessoa_id'=> $request->input('mv_pessoa_id'),
             'descricao'=> $request->input('mv_descricao'),
             'valor'=>floatval(str_replace(',', '.', str_replace('.', '', $request->input('mv_valor')))),
            ]
        );
        return json_encode($retorno);
    }
    public function destroy(Request $request)
    {
        $retorno = Movimentacao::where('id',$request->id)->delete();
        return Response()->json($retorno);
    }

    public function get_empresa()
    {
        $empresas = Empresa::get(['id','empresa','tipo_pessoa']);
        return response()->json(['empresas' => $empresas]);
    }
    public function get_conta()
    {
        $contas = Conta::get(['id','descricao']);
        return response()->json(['contas' => $contas]);
    }
    public function get_grupo(Request $request)
    {
        $tipo_pessoa = $request->id;
        //dd($request->id);
        if ($tipo_pessoa=='A') {
            $grupos = Grupo::get(['id','grupo','tipo','tipo_pessoa']);
        } elseif ($tipo_pessoa=='J'||$tipo_pessoa=='F') {
            $grupos = Grupo::where('tipo_pessoa',$tipo_pessoa)->get(['id','grupo','tipo','tipo_pessoa']);
        }else{
            $grupos=[];
        }
        return response()->json(['grupos' => $grupos]);
    }
    public function get_categoria(Request $request)
    {
        $grupo_id = $request->id;
       // dd($request->id);
        if ($grupo_id) {
            //$categorias = Conta::where('grupo_id',$grupo_id)->get(['id','grupo']);
            $categorias = Categoria::where('grupo_id',$grupo_id)->get(['id','categoria']);
        }else{
            $categorias = Categoria::get(['id','categoria']);
        }
        return response()->json(['categorias' => $categorias]);
    }
    public function get_subcategoria(Request $request)
    {
        $categoria_id = $request->id;
       // dd($request->id);
        if ($categoria_id) {
            //$categorias = Conta::where('grupo_id',$grupo_id)->get(['id','grupo']);
            $subcategorias = Subcategoria::where('categoria_id',$categoria_id)->get(['id','subcategoria']);
        }else{
            $subcategorias = Subcategoria::get(['id','subcategoria']);
        }
        return response()->json(['subcategorias' => $subcategorias]);
    }
    public function get_pessoa()
    {
        $pessoas = Pessoa::get(['id','nome']);
        return response()->json(['pessoas' => $pessoas]);
    }

    public function lista()
    {


        $titulo='ORCA - Movimentação';
        // dd($categorias->grupo->grupo);
        // dd('movimentacao');

        return view('movimentacoes.lista',compact('titulo'));

    }


}
