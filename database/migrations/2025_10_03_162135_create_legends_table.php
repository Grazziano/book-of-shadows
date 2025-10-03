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
        Schema::create('legends', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author', 100);
            $table->string('location');
            $table->enum('category', ['urbana', 'sobrenatural', 'psicologica', 'gotica', 'folclorica']);
            $table->tinyInteger('danger_level')->unsigned()->comment('1-5 stars');
            $table->text('content');
            $table->text('moral')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legends');
    }
};
