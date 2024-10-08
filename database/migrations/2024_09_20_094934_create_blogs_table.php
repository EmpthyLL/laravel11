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
        Schema::create('myblogs', function (Blueprint $table) {
            $table->id("blog_id");
            $table->foreignId('category_id')->constrained('categories', 'id');
            $table->string("title");
            $table->text("body");
            $table->text("thumbnail");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('myblogs');
    }
};
