<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/** Messages sent through the website forms: registration enquiries, proposal requests and calendar requests. */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('type', 20);          // contact, proposal or calendar
            $table->string('locale', 2)->default('en');
            $table->string('name')->nullable();
            $table->string('organisation')->nullable();
            $table->string('email');
            $table->string('phone', 40)->nullable();
            $table->string('course')->nullable();
            $table->string('timing', 40)->nullable();
            $table->string('team_size', 20)->nullable();
            $table->text('message')->nullable();
            $table->string('page')->nullable();  // the page the form was sent from
            $table->timestamp('emailed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
