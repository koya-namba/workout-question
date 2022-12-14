<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'name' => 'demo',
            'email' => 'demo@mail.com',
            'password' => bcrypt('asdfasdf'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'test@mail.com',
            'password' => bcrypt('asdfasdf'),
            'training_start_month' => 202010,
        ]);
    }
}
