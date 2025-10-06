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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->text('summary')->nullable();
            $table->enum('type', ['movie', 'book', 'series']);
            $table->string('author_director')->nullable();
            $table->string('genre')->nullable();
            $table->integer('release_year')->nullable();
            $table->decimal('rating', 3, 1)->nullable(); // 0.0 to 10.0
            $table->string('image_url')->nullable();
            $table->string('trailer_url')->nullable();
            $table->boolean('featured')->default(false);
            $table->enum('status', ['published', 'draft'])->default('published');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
