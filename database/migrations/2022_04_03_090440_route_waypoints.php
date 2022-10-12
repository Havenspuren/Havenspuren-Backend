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
        Schema::create('route_waypoints', function (Blueprint $table) {
            $table->foreignId('route_id')->references('id')
                ->on('routes');
            $table->foreignId('waypoint_id')->references('id')
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
