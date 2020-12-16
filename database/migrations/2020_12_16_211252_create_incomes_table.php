<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('type'); // 0 bank, 1 D17
            $table->integer('amount');
            $table->string('code', 100);
            $table->integer('deposit_id')->unsigned()->nullable(); // Null when no one claims it
            $table->foreign('deposit_id')
                ->references('id')->on('deposits');
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
        Schema::dropIfExists('incomes');
    }
}
