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
        Schema::create('genre_musique', function (Blueprint $table) {
            $table->foreignId('id_musique')->constrained('musiques')->onDelete('cascade');
            $table->foreignId('id_genre')->constrained('genres')->onDelete('cascade');
            $table->primary(['id_musique', 'id_genre']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genre_musique');
    }
};
