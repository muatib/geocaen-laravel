<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStepLoreTable extends Migration
{
    public function up()
    {
        Schema::create('step_lore', function (Blueprint $table) {
            $table->id();
            $table->text('lore');
            $table->foreignId('game_step_id')->constrained('game_steps');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('step_lore');
    }
}
