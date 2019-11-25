<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id');
            $table->string('customer_name');
            $table->string('sex');
            $table->date('dob')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password',200);
            $table->string('code')->nullable();
            $table->boolean('is_active')->default(0);
            $table->string('city',100)->nullable();
            $table->string('district',100)->nullable();
            $table->string('commune',100)->nullable();
            $table->string('village',100)->nullable();
            $table->string('lat',100)->nullable();
            $table->string('lng',100)->nullable();
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
        Schema::dropIfExists('customers');
    }
}
