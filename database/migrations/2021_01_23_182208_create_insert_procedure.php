<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsertProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared($this->dropCourierCarRelation());
        DB::unprepared($this->createCourierCarRelation());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared($this->dropCourierCarRelation());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    private function createCourierCarRelation(): string
    {
        return "
            CREATE PROCEDURE insertCourierCarRelation(
                IN courierId BIGINT,
                IN carId BIGINT
            )
            BEGIN

                IF (checkActiveCourierCarRelation(courierId,carId) > 0) THEN
                    UPDATE courier_car SET delete_at = NOW()
                    WHERE (courier_id = courierId AND deleted_at IS NULL)
                    OR (car_id = carId AND deleted_at IS NULL);
                END IF;
                
                INSERT INTO courier_car(courier_id, car_id, created_at, updated_at)
                VALUES(courierId, carId, NOW(), NOW());
                

            END;
        ";
    }
   
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    private function dropCourierCarRelation(): string
    {
        return "DROP PROCEDURE IF EXISTS insertCourierCarRelation;";
    }
}
