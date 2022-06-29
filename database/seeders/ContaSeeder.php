<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ContaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contas')->insert(['descricao'=> 'Itaú']);
        DB::table('contas')->insert(['descricao'=> 'Nubank ']);
        DB::table('contas')->insert(['descricao'=> 'Nubank - JDR']);
        DB::table('contas')->insert(['descricao'=> 'Nubank - ADM imoveis']);
    
    }
}