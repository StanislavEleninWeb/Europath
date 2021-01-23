<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddViewToCourier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared($this->dropView());
        DB::unprepared($this->createView());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared($this->dropView());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    private function createView(): string
    {
        return "
            CREATE VIEW courier_car_report AS
            SELECT courier_car.*, CONCAT(users.first_name, ' ', users.last_name) as name, cars.registration
            FROM courier_car
            LEFT JOIN users ON courier_car.courier_id = users.id
            LEFT JOIN cars ON courier_car.car_id = cars.id
            WHERE courier_car.created_at > DATE_SUB(CURDATE(), INTERVAL 30 DAY)
        ";
    }
   
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    private function dropView(): string
    {
        return "DROP VIEW IF EXISTS `courier_car_report`;";
    }
}
