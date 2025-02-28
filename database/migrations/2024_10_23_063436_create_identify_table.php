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
    Schema::create('identify', function (Blueprint $table) {
        $table->foreignId('user_id')->constrained('users');
        $table->foreignId('session_id')->constrained('game_sessions');
        $table->primary(['user_id', 'session_id']);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('identify');
    }
};
