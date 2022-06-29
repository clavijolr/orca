<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Conta;

class CadastroContas extends Component
{
    public $conta_id, $descricao, $agencia, $conta, $saldo ;
    public $updateMode ;

    
    public function render()
    {

            return view('livewire.cadastro-contas');
        
    }
    public function edit()
    {
 
        $this->updateMode = true;
        dd($this);
        //$this->store();
    }
    public function store()
    {
        
        $convertedSaldo = floatval(str_replace(',', '.', str_replace('.', '', $this->saldo)));
        //dd($this->updateMode);
        if ($this->updateMode) {
            //Units::updateOrCreate([‘description’ => ‘kilogramas’],[‘abbreviation’ =>’kg’]);
            Conta::where('id','=',1)->firstOrFail()->update([
                'descricao'=>$this->descricao,
                'agencia'=>$this->agencia,
                'conta'=>$this->conta,
                'saldo'=>$convertedSaldo,
            ]);        
        }else{
            Conta::create([
                'descricao'=>$this->descricao,
                'agencia'=>$this->agencia,
                'conta'=>$this->conta,
                'saldo'=>$convertedSaldo,
            ]);
        }
        $this->descricao='';
        $this->agencia='';
        $this->conta='';
        $this->saldo='';

        $this->updateMode = false;
        $this->dispatchBrowserEvent('conta-gravada');
    }

}
