<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDictionaryTable extends Migration
{
    public function up(): void
    {
        Schema::create('dictionary', function (Blueprint $table) {
            $table->id();
            $table->string('english_word');
            $table->text('meaning')->nullable(); // Empty for now, you can fill later
            $table->string('part_of_speech');
            $table->string('creole_translation');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dictionary');
    }
}
