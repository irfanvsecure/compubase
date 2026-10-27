<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/** Page copy edited through the MCP server: category page copy, and text changes on any page. */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('category_copy', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('locale', 2);
            $table->json('content');
            $table->timestamps();
            $table->unique(['slug', 'locale']);
        });

        Schema::create('page_texts', function (Blueprint $table) {
            $table->id();
            $table->string('path')->index();
            $table->text('find');
            $table->text('replace');
            $table->boolean('is_html')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_texts');
        Schema::dropIfExists('category_copy');
    }
};
