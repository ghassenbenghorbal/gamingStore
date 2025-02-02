<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 100);
            $table->float('buying_price');
            $table->float('selling_price')->nullable();
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')
                ->references('id')->on('products');
            $table->integer('command_id')->unsigned()->nullable();
            $table->foreign('command_id')
                ->references('id')->on('commands');
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
        Schema::dropIfExists('keys');
    }
}
