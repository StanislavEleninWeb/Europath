<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoredFunction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared($this->dropCheckActiveCourierCarRelation());
        DB::unprepared($this->createCheckActiveCourierCarRelation());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared($this->dropProcedure());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    private function createCheckActiveCourierCarRelation(): string
    {
        return '
            CREATE FUNCTION checkActiveCourierCarRelation(courierId BIGINT, carId BIGINT) RETURNS INT DETERMINISTIC
            BEGIN

            DECLARE counter INT DEFAULT 0;

            SELECT COUNT(id) 
            INTO counter 
            FROM courier_car 
            WHERE (courier_id = courierId AND deleted_at IS NULL)
            OR (car_id = carId AND deleted_at IS NULL);

            RETURN counter;

            END;
        ';
    }
   
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    private function dropCheckActiveCourierCarRelation(): string
    {
        return "DROP FUNCTION IF EXISTS checkActiveCourierCarRelation;";
    }
}
