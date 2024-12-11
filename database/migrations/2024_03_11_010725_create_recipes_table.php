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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title');
            $table->json('alternative_titles')->nullable();

            $table->unsignedBigInteger('author_id'); // Foreign key
            $table->text('original_source')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('image')->nullable();
            $table->text('description');
            $table->text('preparation_steps');
            $table->integer('serving_size');
            $table->integer('cooking_time');

            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
