<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trophies', function (Blueprint $table) {
            $table->id();
            $table->integer('waypoint_id')->unsigned();
            $table->integer('x');
            $table->integer('y');
            $table->string('name');
            $table->string('description');
            $table->string('path_to_image'); 
            $table->timestamps();

            $table->foreign('waypoint_id')->references('id')->on('waypoints');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trophies');
    }
};
