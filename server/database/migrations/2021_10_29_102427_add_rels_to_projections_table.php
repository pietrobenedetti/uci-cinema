<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelsToProjectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projections', function (Blueprint $table) {
            $table->bigInteger("movie_id")->unsigned()->nullable();
            $table->foreign("movie_id")->references("id")->on("movies");
            $table->bigInteger("room_id")->unsigned()->nullable();
            $table->foreign("room_id")->references("id")->on("rooms");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projections', function (Blueprint $table) {
            $table->dropForeign(["movie_id"]);
            $table->dropColumn(["movie_id"]);
            $table->dropForeign(["room_id"]);
            $table->dropColumn(["room_id"]);
        });
    }
}
