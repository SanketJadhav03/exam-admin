<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class ChapterQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
{
    for ($i = 30; $i <= 150; $i++) {
        DB::table('chapterquestions')->insert([
            'chapter_question_id' => $i,
            'question' => "Sample Question $i?",
            'option_a' => 'Option A',
            'option_b' => 'Option B',
            'option_c' => 'Option C',
            'option_d' => 'Option D',
            'correct_answer' => ['A','B','C','D'][rand(0,3)],
            'explanation' => "This is explanation for question $i.",
            'chapter_id' => rand(2, 5),
            'subject_id' => rand(3,5),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
}
