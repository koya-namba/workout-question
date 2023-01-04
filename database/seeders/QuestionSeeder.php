<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            'title' => 'テスト質問1',
            'user_id' => 1,
            'context' => 'this is test. this is test. this is test.',
            'created_at' => DateTime::dateTimeThisDecade(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('questions')->insert([
            'title' => 'テスト質問2',
            'user_id' => 2,
            'context' => 'this is test. this is test. this is test.',
            'created_at' => DateTime::dateTimeThisDecade(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('questions')->insert([
            'title' => 'テスト質問3',
            'user_id' => 1,
            'context' => 'this is test. this is test. this is test.',
            'created_at' => DateTime::dateTimeThisDecade(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
