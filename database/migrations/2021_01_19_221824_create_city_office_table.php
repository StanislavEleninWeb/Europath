<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCityOfficeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_office', function (Blueprint $table) {
            $table->foreignId('city_id')->constrained('cities');
            $table->foreignId('office_id')->constrained('cities');

            $table->primary(['city_id', 'office_id']);
            $table->index('office_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city_office');
    }
}
