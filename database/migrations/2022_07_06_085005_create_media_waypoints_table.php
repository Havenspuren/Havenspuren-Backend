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
        Schema::create('media_waypoints', function (Blueprint $table) {
            $table->integer('waypoint_id')->unsigned();
            $table->integer('media_id')->unsigned();
            
            $table->foreign('waypoint_id')->references('id')
                ->on('waypoints');
            $table->foreign('media_id')->references('id')
                ->on('media');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media_waypoints');
    }
};
