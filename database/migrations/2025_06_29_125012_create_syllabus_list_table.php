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
        Schema::create('syllabus_list', function (Blueprint $table) {
            $table->id('syllabusTopic_id');
            $table->unsignedBigInteger('syallabus_id');
            $table->string('syllabusTopic_name');
             $table->string('syllabusTopic_pdf')->nullable();
            $table->string('syllabusTopic_status');
            $table->foreign('syallabus_id')->references('syallabus_id')->on('syllabus')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('syllabus_list');
    }
};
