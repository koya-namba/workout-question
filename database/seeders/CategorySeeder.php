<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_name' => 'トレーニング'
        ]);
        
        DB::table('categories')->insert([
            'category_name' => 'ダイエット'
        ]);
        
        DB::table('categories')->insert([
            'category_name' => '食事'
        ]);
        
        DB::table('categories')->insert([
            'category_name' => 'サプリメント'
        ]);
    }
}
