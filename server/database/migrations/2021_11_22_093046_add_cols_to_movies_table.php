<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColsToMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->string("img")->nullable();
            $table->string("director")->nullable();
            $table->string("director_img")->nullable();
            $table->float("rated")->nullable();
            $table->string("description")->nullable();
            $table->string("description_long")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {
            Schema::dropIfExists('movies');
        });
    }
}
