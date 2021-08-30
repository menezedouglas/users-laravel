<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateVwUserByCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        create or replace view vw_users_by_cities as
        select name                      as city,
               (select count(*)
                from users u,
                     addresses a,
                     user_addresses ua
                where a.city_id = c.id
                  and ua.address_id = a.id
                  and u.id = ua.user_id) as users
        from cities c
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("drop view if exists vw_users_by_cities");
    }
}
