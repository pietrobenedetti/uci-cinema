<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelsToActorMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actor_movies', function (Blueprint $table) {
            $table->bigInteger("actor_id")->unsigned()->nullable();
            $table->foreign("actor_id")->references("id")->on("actors");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('actor_movies', function (Blueprint $table) {
            $table->dropForeign(["actor_id"]);
            $table->dropColumn(["actor_id"]);
        });
    }
}
