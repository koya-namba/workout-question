<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answers')->insert([
            'user_id' => 1,
            'context' => 'this is test. this is test. this is test.',
            'question_id' => 1,
            'created_at' => DateTime::dateTimeThisDecade(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('answers')->insert([
            'user_id' => 2,
            'context' => 'this is test. this is test. this is test.',
            'question_id' => 1,
            'created_at' => DateTime::dateTimeThisDecade(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('answers')->insert([
            'user_id' => 1,
            'context' => 'this is test. this is test. this is test.',
            'question_id' => 2,
            'created_at' => DateTime::dateTimeThisDecade(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('answers')->insert([
            'user_id' => 2,
            'context' => 'this is test. this is test. this is test.',
            'question_id' => 3,
            'created_at' => DateTime::dateTimeThisDecade(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
