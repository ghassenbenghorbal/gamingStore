<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comp_lieu');
            $table->text('description');
            $table->string('comp_nom');
            $table->string('nom_gagnant')->nullable();
            $table->string('comp_date');
            $table->string('comp_image')->nullable();
            $table->integer("nbr_participant");
            $table->integer('product_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competiton');
    }
}




