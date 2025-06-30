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
        Schema::create('questions_bookmark', function (Blueprint $table) {
            $table->id('question_bookmark_id');
            $table->unsignedBigInteger('chapter_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('chapter_question_id'); // Assuming this is needed, otherwise remove it
            $table->enum('bookmark', ['0','1','2','3'])->nullable();
            $table->timestamps();
            $table->foreign('chapter_question_id')->references('chapter_question_id')->on('chapterquestions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('chapter_id')->references('chapter_id')->on('chapters')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('subject_id')->references('subject_id')->on('subjects')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions_bookmark');
    }
};
