<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/** A text change can also turn the text into a link (update_page_text with link). */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('page_texts', function (Blueprint $table) {
            $table->string('link', 500)->nullable()->after('is_html');
        });
    }

    public function down(): void
    {
        Schema::table('page_texts', function (Blueprint $table) {
            $table->dropColumn('link');
        });
    }
};
