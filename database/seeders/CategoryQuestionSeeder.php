<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_question')->insert([
            'category_id' => 1,
            'question_id' => 1,
        ]);
        
        DB::table('category_question')->insert([
            'category_id' => 2,
            'question_id' => 1,
        ]);
        
        DB::table('category_question')->insert([
            'category_id' => 1,
            'question_id' => 2,
        ]);
        
        DB::table('category_question')->insert([
            'category_id' => 2,
            'question_id' => 2,
        ]);
        
        DB::table('category_question')->insert([
            'category_id' => 4,
            'question_id' => 2,
        ]);
        
        DB::table('category_question')->insert([
            'category_id' => 3,
            'question_id' => 3,
        ]);
    }
}
