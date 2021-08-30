<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateVwUserByStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        create or replace view vw_users_by_states as
        select s.name                    as state,
               s.code                    as uf,
               (select count(*)
                from users u,
                     addresses a,
                     user_addresses ua
                where a.state_id = s.id
                  and ua.address_id = a.id
                  and u.id = ua.user_id) as users
        from states s
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("drop view if exists vw_users_by_states");
    }
}
