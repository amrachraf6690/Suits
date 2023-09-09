<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date('day');
            $table->integer('duration');
            $table->string('secret_code');
            $table->string('name');
            $table->string('phone');
            $table->foreignId('suit_id')->constrained('suits')->onUpdate('cascade')->onDelete('cascade');
            $table->string('email');
            $table->boolean('taken');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
