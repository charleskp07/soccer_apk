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
        Schema::create('mthes', function (Blueprint $table) {
            $table->id();
            $table->string('competition');
            $table->string('stadium');
            $table->string('team_one');
            $table->string('team_two');
            $table->integer('ScoreTeamOne')->default(0);
            $table->integer('ScoreTeamTwo')->default(0);
            $table->dateTime('matchDate');
            $table->string('location');
            $table->string('matchStatus')->default("à venir");
            $table->string('referee')->default("Non défini");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mthes');
    }
};
