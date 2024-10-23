<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('earn', function (Blueprint $table) {
        $table->foreignId('session_id')->constrained('game_sessions'); // Changé ici
        $table->foreignId('trophy_id')->constrained('trophies');
        $table->primary(['session_id', 'trophy_id']);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('earn');
    }
};
