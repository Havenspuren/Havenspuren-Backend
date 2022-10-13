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
        Schema::create('waypoints', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('short_description');
            $table->string('long_description');
            $table->integer('latitude');
            $table->integer('longitude');
            $table->integer('index_of_route');
            $table->boolean('visited')->default(false);
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
        Schema::dropIfExists('waypoints');
    }
};
