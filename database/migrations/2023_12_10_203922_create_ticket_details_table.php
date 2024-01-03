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
        Schema::create('ticket_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bus_id');  //no existe
            $table->unsignedBigInteger('route_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name',150);
            $table->string('lastname', 255);
            $table->string('dni', 15); //255
            $table->string('seat', 10);
            $table->string('locator');
            $table->string('buys_id'); //no existe
            $table->integer('state');

            $table->foreign('route_id')->references('id')->on('bus_routes');
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_details');
    }
};
