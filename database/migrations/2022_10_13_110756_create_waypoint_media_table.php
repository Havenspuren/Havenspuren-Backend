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
        Schema::create('waypoint_media', function (Blueprint $table) {
            $table->bigInteger('waypoint_id')->unsigned();
            $table->bigInteger('media_id')->unsigned();
            
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
        Schema::dropIfExists('waypoint_media');
    }
};
