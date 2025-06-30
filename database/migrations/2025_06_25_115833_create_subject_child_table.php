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
        Schema::create('subject_child', function (Blueprint $table) {
            $table->id('subject_child_id');
                
            $table->longText('subject_topic_name');
            $table->string('subject_topic_pdf')->nullable();
            $table->boolean('subject_topic_status')->default(true);
            $table->foreign('subject_id')->references('subject_id')->on('subjects')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_child');
    }
};
