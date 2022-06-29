<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pessoas')->insert(['nome'=> ' Pessoa não informado','razao'=> 'Sem cadastro','cpfcnpj'=> '0',]);
        DB::table('pessoas')->insert(['nome'=> 'Adriano','razao'=> '','cpfcnpj'=> '0',]);
        DB::table('pessoas')->insert(['nome'=> 'André Blanco','razao'=> '','cpfcnpj'=> '0',]);
        DB::table('pessoas')->insert(['nome'=> 'BEATRIZ','razao'=> '','cpfcnpj'=> '0',]);
        DB::table('pessoas')->insert(['nome'=> 'Boaz','razao'=> '','cpfcnpj'=> '0',]);
        DB::table('pessoas')->insert(['nome'=> 'Carlos','razao'=> '','cpfcnpj'=> '0',]);
        DB::table('pessoas')->insert(['nome'=> 'Cleide','razao'=> '','cpfcnpj'=> '0',]);
        DB::table('pessoas')->insert(['nome'=> 'Condomínio','razao'=> '','cpfcnpj'=> '0',]);
        DB::table('pessoas')->insert(['nome'=> 'ELETROPAULO ','razao'=> '','cpfcnpj'=> '0',]);
        DB::table('pessoas')->insert(['nome'=> 'Gilmar','razao'=> '','cpfcnpj'=> '0',]);
        DB::table('pessoas')->insert(['nome'=> 'Hélio Do Carmo Carvalho','razao'=> '','cpfcnpj'=> '0',]);
        DB::table('pessoas')->insert(['nome'=> 'Itaú','razao'=> '','cpfcnpj'=> '0',]);
        DB::table('pessoas')->insert(['nome'=> 'José Carlos Gomes dos Santos','razao'=> '','cpfcnpj'=> '0',]);
        DB::table('pessoas')->insert(['nome'=> 'José Domingos Rocha','razao'=> '','cpfcnpj'=> '0',]);
        DB::table('pessoas')->insert(['nome'=> 'Leroy','razao'=> '','cpfcnpj'=> '0',]);
        DB::table('pessoas')->insert(['nome'=> 'Maria','razao'=> '','cpfcnpj'=> '0',]);
        DB::table('pessoas')->insert(['nome'=> 'Nino','razao'=> '','cpfcnpj'=> '0',]);
        DB::table('pessoas')->insert(['nome'=> 'Otilio','razao'=> '','cpfcnpj'=> '0',]);
        DB::table('pessoas')->insert(['nome'=> 'Palhinha','razao'=> '','cpfcnpj'=> '0',]);
        DB::table('pessoas')->insert(['nome'=> 'Sodimac','razao'=> '','cpfcnpj'=> '0',]);
        DB::table('pessoas')->insert(['nome'=> 'Ulisses','razao'=> '','cpfcnpj'=> '0',]);
        DB::table('pessoas')->insert(['nome'=> 'Vladimir Rodrigues de Oliveira','razao'=> '','cpfcnpj'=> '0',]);
        DB::table('pessoas')->insert(['nome'=> 'Zezo','razao'=> '','cpfcnpj'=> '0',]);
    }
}
