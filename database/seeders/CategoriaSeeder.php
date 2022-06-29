<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert(['grupo_id'=> '2','categoria'=> 'Administração',]);
        DB::table('categorias')->insert(['grupo_id'=> '1','categoria'=> 'Alimentação',]);
        DB::table('categorias')->insert(['grupo_id'=> '7','categoria'=> 'Aluguel recebido',]);
        DB::table('categorias')->insert(['grupo_id'=> '1','categoria'=> 'Cuidados Pessoais',]);
        DB::table('categorias')->insert(['grupo_id'=> '2','categoria'=> 'Dividendos pago',]);
        DB::table('categorias')->insert(['grupo_id'=> '5','categoria'=> 'Dividendos recebido',]);
        DB::table('categorias')->insert(['grupo_id'=> '1','categoria'=> 'Donativos',]);
        DB::table('categorias')->insert(['grupo_id'=> '1','categoria'=> 'Educação',]);
        DB::table('categorias')->insert(['grupo_id'=> '1','categoria'=> 'Empréstimos',]);
        DB::table('categorias')->insert(['grupo_id'=> '6','categoria'=> 'Entrada de cliente',]);
        DB::table('categorias')->insert(['grupo_id'=> '1','categoria'=> 'Entretenimento',]);
        DB::table('categorias')->insert(['grupo_id'=> '4','categoria'=> 'Honorários pago',]);
        DB::table('categorias')->insert(['grupo_id'=> '2','categoria'=> 'Honorários recebido',]);
        DB::table('categorias')->insert(['grupo_id'=> '1','categoria'=> 'Imóveis',]);
        DB::table('categorias')->insert(['grupo_id'=> '2','categoria'=> 'Impostos',]);
        DB::table('categorias')->insert(['grupo_id'=> '1','categoria'=> 'Investimentos',]);
        DB::table('categorias')->insert(['grupo_id'=> '1','categoria'=> 'Lazer',]);
        DB::table('categorias')->insert(['grupo_id'=> '1','categoria'=> 'Moradia',]);
        DB::table('categorias')->insert(['grupo_id'=> '1','categoria'=> 'Outras despesas pessoais',]);
        DB::table('categorias')->insert(['grupo_id'=> '3','categoria'=> 'Prestador de serviço',]);
        DB::table('categorias')->insert(['grupo_id'=> '8','categoria'=> 'Receita não Identificada',]);
        DB::table('categorias')->insert(['grupo_id'=> '8','categoria'=> 'Reembolso',]);
        DB::table('categorias')->insert(['grupo_id'=> '6','categoria'=> 'Reembolso cliente',]);
        DB::table('categorias')->insert(['grupo_id'=> '8','categoria'=> 'Rendimento',]);
        DB::table('categorias')->insert(['grupo_id'=> '1','categoria'=> 'Reparos',]);
        DB::table('categorias')->insert(['grupo_id'=> '2','categoria'=> 'Repasse',]);
        DB::table('categorias')->insert(['grupo_id'=> '8','categoria'=> 'Resgate Poupança',]);
        DB::table('categorias')->insert(['grupo_id'=> '5','categoria'=> 'RT',]);
        DB::table('categorias')->insert(['grupo_id'=> '1','categoria'=> 'Seguros',]);
        DB::table('categorias')->insert(['grupo_id'=> '1','categoria'=> 'Taxas bancárias',]);
        DB::table('categorias')->insert(['grupo_id'=> '1','categoria'=> 'Transporte',]);
    }
}
