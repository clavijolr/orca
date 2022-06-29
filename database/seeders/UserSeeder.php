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

        //
    }
}
