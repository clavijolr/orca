<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grupos')->insert(['grupo'=> 'Despesas pessoais','tipo'=>'C','tipo_pessoa'=>'F']);            //1    
        DB::table('grupos')->insert(['grupo'=> 'Despesas administrativas','tipo'=>'C','tipo_pessoa'=>'J']);     //2        
        DB::table('grupos')->insert(['grupo'=> 'Despesas obras','tipo'=>'C','tipo_pessoa'=>'J']);               //3
        DB::table('grupos')->insert(['grupo'=> 'Despesas ímoveis','tipo'=>'C','tipo_pessoa'=>'J']);             //4
        DB::table('grupos')->insert(['grupo'=> 'Receitas serviços','tipo'=>'D','tipo_pessoa'=>'J']);            //5    
        DB::table('grupos')->insert(['grupo'=> 'Receitas obras','tipo'=>'D','tipo_pessoa'=>'J']);               //6
        DB::table('grupos')->insert(['grupo'=> 'Receitas ímoveis','tipo'=>'D','tipo_pessoa'=>'J']);             //7
        DB::table('grupos')->insert(['grupo'=> 'Receitas outras','tipo'=>'D','tipo_pessoa'=>'J']);              //8
    }
}
