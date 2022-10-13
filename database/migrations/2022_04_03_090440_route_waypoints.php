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

        Schema::create('route_waypoint', function (Blueprint $table) {
            $table->bigInteger('route_id')->unsigned();
            $table->bigInteger('waypoint_id')->unsigned();
            
            $table->foreign('route_id')->references('id')
                ->on('routes');
            $table->foreign('waypoint_id')->references('id')
                ->on('waypoints');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('route_waypoints');
    }
};
