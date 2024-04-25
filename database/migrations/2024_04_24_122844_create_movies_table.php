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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title_uk');
            $table->string('title_en');
            $table->boolean('is_hidden')->nullable();
            $table->text('description_uk');
            $table->text('description_en');
            $table->string('image')->nullable();
            $table->string('youtube_trailer_id');
            $table->year('released_at');
            $table->date('start_rental');
            $table->date('end_rental');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cast_movies');
        Schema::dropIfExists('tags_movies');
        Schema::dropIfExists('movies');
    }
};
