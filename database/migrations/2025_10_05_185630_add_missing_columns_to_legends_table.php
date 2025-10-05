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
        Schema::table('legends', function (Blueprint $table) {
            $table->text('excerpt')->nullable()->after('content');
            $table->string('featured_image')->nullable()->after('excerpt');
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft')->after('featured_image');
            $table->foreignId('category_id')->nullable()->constrained()->after('status');
            $table->foreignId('user_id')->nullable()->constrained()->after('category_id');
            $table->timestamp('published_at')->nullable()->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('legends', function (Blueprint $table) {
            $table->dropColumn(['excerpt', 'featured_image', 'status', 'category_id', 'user_id', 'published_at']);
        });
    }
};
