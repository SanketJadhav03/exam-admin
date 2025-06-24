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
        Schema::create('festival_post', function (Blueprint $table) {
            $table->id();
            $table->string("festival_id"); 
            $table->string("language_id");
            $table->string("post_image")->nullable();
            $table->string("paid")->default(1);
            $table->string("post_type")->default(1);
            $table->string("status")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('festival_post');
    }
};
