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
        Schema::table('syllabus', function (Blueprint $table) {
            $table->enum('syllabus_status', ['1', '0'])->default('1')->after('syllabus_name');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('syllabus', function (Blueprint $table) {
            //
        });
    }
};
