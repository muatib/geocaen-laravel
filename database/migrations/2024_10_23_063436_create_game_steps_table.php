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
    Schema::create('game_steps', function (Blueprint $table) {
        $table->id('id');
        $table->string('clue', 50);
        $table->string('question', 50)->nullable();
        $table->string('funfact', 200);
        $table->smallInteger('step_order');
        $table->foreignId('game_id')->constrained('games');
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_steps');
    }
};
