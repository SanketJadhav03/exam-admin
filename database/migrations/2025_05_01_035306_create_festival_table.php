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
        Schema::create('festival', function (Blueprint $table) {
            $table->id();
            $table->string("title")->unique();
            $table->string("image")->nullable();
            $table->date("festival_date")->nullable();
            $table->date("activation_date")->nullable();
            $table->string("festival_feature")->default(1);
            $table->string("status")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('festival');
    }
};
