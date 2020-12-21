<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commands', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')
                ->references('id')->on('products');
            $table->integer('sale_id')->unsigned();
            $table->foreign('sale_id')
                ->references('id')->on('sales');
            $table->tinyInteger('order_status'); // 0 in progress, 1 accepted, -1 rejected
            $table->integer('subtotal');
            $table->integer('quantity');
            $table->string('order_id', 50);
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
        Schema::dropIfExists('commands');
    }
}
