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
            /*
            $table->bigInteger('route_id')->unsigned();
            $table->bigInteger('waypoint_id')->unsigned();
            $table->foreign('route_id')->references('id')
                ->on('routes')
            $table->foreign('waypoint_id')->references('id')
                ->on('waypoints')
            */    
            $table->id();
            $table->foreignId('route_id')->constrained()->onDelete('cascade');
            $table->foreignId('waypoint_id')->constrained()->onDelete('cascade');
            $table->integer('index_of_route');
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
        Schema::dropIfExists('route_waypoint');
    }
};
