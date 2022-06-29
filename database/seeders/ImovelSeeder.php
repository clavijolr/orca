<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImovelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('imovels')->insert(['descricao'=> 'não informado',]);   //2    
        DB::table('imovels')->insert(['descricao'=> 'Ivai',]);            //1    
        DB::table('imovels')->insert(['descricao'=> 'Tanquinho',]);       //3    
        DB::table('imovels')->insert(['descricao'=> 'Umbó Casa 3',]);     //4    
        DB::table('imovels')->insert(['descricao'=> 'Umbó Casa 5',]);     //5    
        DB::table('imovels')->insert(['descricao'=> 'Umbó Casa 6',]);     //6    
    }
}
