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
        Schema::create('bus_infos', function (Blueprint $table) {
            $table->id();
            $table->string('no_bus');
            $table->unsignedBigInteger('route_id');
            $table->string('hour');
            $table->string('days');
            $table->integer('seats');
            $table->string('duration');
            $table->decimal('price');
            $table->integer('state');
            $table->foreign('route_id')->references('id')->on('bus_routes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus_infos');
    }
};
