<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chapterquestions', function (Blueprint $table) {
            $table->id('chapter_question_id');
            $table->longText('question');
            $table->string('option_a');
            $table->string('option_b'); 
            $table->string('option_c');
            $table->string('option_d');
            $table->string('correct_answer');
            $table->longText('explanation')->nullable();
            $table->unsignedBigInteger('chapter_id');
            $table->unsignedBigInteger('subject_id');
            $table->timestamps();

            $table->foreign('chapter_id')->references('chapter_id')->on('chapters')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('subject_id')->references('subject_id')->on('subjects')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapterquestions');
    }
};
