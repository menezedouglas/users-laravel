<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Relationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addresses', function (Blueprint  $table) {

            $table
                ->foreign('state_id')
                ->references('id')
                ->on('states');

            $table
                ->foreign('city_id')
                ->references('id')
                ->on('cities');

        });

        Schema::table('user_addresses', function (Blueprint  $table) {

            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users');

            $table
                ->foreign('address_id')
                ->references('id')
                ->on('addresses');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses', function (Blueprint  $table) {
            $table->dropForeign(['state_id', 'city_id']);
        });

        Schema::table('user_addresses', function (Blueprint  $table) {
            $table->dropForeign(['user_id', 'address_id']);
        });
    }
}
