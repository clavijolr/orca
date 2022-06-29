<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('obras')->insert(['descricao'=> 'Obra não identificada','data_inicio'=> '2021-01-01', ]);
        DB::table('obras')->insert(['descricao'=> 'Boaz','data_inicio'=> '2021-01-01',]);
        DB::table('obras')->insert(['descricao'=> 'Cleide','data_inicio'=> '2021-01-01',]);
        DB::table('obras')->insert(['descricao'=> 'Igreja','data_inicio'=> '2021-01-01',]);
        DB::table('obras')->insert(['descricao'=> 'Penha PIB','data_inicio'=> '2021-01-01',]);
        DB::table('obras')->insert(['descricao'=> 'Studio','data_inicio'=> '2021-01-01',]);
        DB::table('obras')->insert(['descricao'=> 'Tanquinho','data_inicio'=> '2021-01-01',]);
        DB::table('obras')->insert(['descricao'=> 'Vladimir','data_inicio'=> '2021-01-01',]);

    }
}

//Obra - Boaz
//Obra - Cleide
//Obra - Igreja
//Obra - PIB PENHA
//Obra - Studio
//Obra - Tanquinho
//Obra - Vladimir Rodrigues de Oliveira
//Obra - Vladimir Rodrigues de Oliveira 