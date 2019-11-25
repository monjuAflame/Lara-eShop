<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oder_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('oder_id');
            $table->integer('product_id');
            $table->integer('color_id');
            $table->integer('qty')->nullable();
            $table->float('price');
            $table->float('amount')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('oder__items');
    }
}
