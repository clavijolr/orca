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
            'password' => '$2y$10$b3POugHL3DP66bH.1xrs.u4zVeF8ZcLdgSMcbC6.ARhJV.llXyjtW',
        ]);
        //
    }
}
