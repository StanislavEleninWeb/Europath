<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared($this->dropProcedureGetCourierById());
        DB::unprepared($this->createProcedureGetCourierById());
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
    private function createProcedureGetCourierById(): string
    {
        return '
            CREATE PROCEDURE getCourierById(
                IN courierId BIGINT
            )
            BEGIN
                SELECT t1.id, t1.uuid, t2.first_name, t2.last_name
                FROM couriers t1
                LEFT JOIN users t2 ON t1.id = t2.id
                WHERE t1.id = courierId;
            END
        ';
    }
   
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    private function dropProcedureGetCourierById(): string
    {
        return "DROP PROCEDURE IF EXISTS getCourierById;";
    }
}
