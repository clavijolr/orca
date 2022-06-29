<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Roberto Guedes',
            'email' => 'clavijolr@gmail.com',
            'password' => '$2y$10$otImEkAt4AS5PfAKE0PnpOVLxHgO1s42/WS0p.TrPRhQ77QGewwma',
        ]);
        DB::table('users')->insert([
            'name' => 'Raiane Santos',
            'email' => 'despesaspessoaisfrocha@gmail.com',
            'password' => '$2y$10$ujnNvMkcsY.7oPolcG8H4ufkPA6MS6qpoXHkxxfJuRJE7LYLD.h3K',
        ]);
        DB::table('users')->insert([
            'name' => 'Angelica Blanco',
            'email' => 'ablancorocha@uol.com.br',
            'password' => '$2y$10$iD.u59m2uU06WaFvFbjaju2zg2diFty98YbAMd6S8PMf1hqJKYy7u',
        ]);

        //
    }
}
