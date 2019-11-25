<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('customer_id');
            $table->string('name',100)->nullable();
            $table->string('phone',12)->nullable();
            $table->string('city',100)->nullable();
            $table->string('district',100)->nullable();
            $table->string('commune',100)->nullable();
            $table->string('village',100)->nullable();
            $table->string('postcode',100)->nullable();
            $table->boolean('is_active')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('shipping_addresses');
    }
}
