<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourierCarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courier_car', function (Blueprint $table) {
            $table->id();
            $table->foreignId('courier_id')->constrained();
            $table->foreignId('car_id')->constrained();
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['courier_id', 'car_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courier_car');
    }
}
