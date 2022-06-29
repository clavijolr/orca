<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert([
            'empresa'=> 'Pessoal',
            'cpfcnpj'=> '1',
            'tipo_pessoa'=> 'F',
        ]);
        DB::table('empresas')->insert([
            'empresa'=> 'Juridico',
            'cpfcnpj'=> '1',
            'tipo_pessoa'=> 'J',
        ]);
        DB::table('empresas')->insert([
            'empresa'=> 'JDR',
            'cpfcnpj'=> '1',
            'tipo_pessoa'=> 'J',
        ]);
        DB::table('empresas')->insert([
            'empresa'=> 'Livers',
            'cpfcnpj'=> '1',
            'tipo_pessoa'=> 'J',
        ]);
        DB::table('empresas')->insert([
            'empresa'=> 'ADM Imóveis',
            'cpfcnpj'=> '1',
            'tipo_pessoa'=> 'J',
        ]);


    }
}
