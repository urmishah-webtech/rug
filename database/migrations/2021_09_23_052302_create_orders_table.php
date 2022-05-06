<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id', 1001);
            $table->bigInteger('uid');
            $table->Integer('user_id');
            $table->string('transactionid');
            $table->bigInteger('netamout');
            $table->enum('paymentstatus', ['success', 'pending', 'failed'])->default('failed');
            $table->string('first_name');
            $table->string('last_name');
            $table->text('address');
            $table->string('unit_number');
            $table->string('city');
            $table->string('country');
            $table->Integer('pincode');
            $table->bigInteger('mobile');   
            $table->enum('billing_type', ['yes', 'no']);
            $table->enum('new_address', ['yes', 'no']);
            $table->string('b_first_name');
            $table->string('b_last_name');
            $table->text('b_address');
            $table->string('b_unit_number');
            $table->string('b_city');
            $table->string('b_country');
            $table->Integer('b_pincode');
            $table->bigInteger('b_mobile');   
            $table->enum('b_billing_type', ['yes', 'no']);
            $table->enum('b_new_address', ['yes', 'no']);
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
        Schema::dropIfExists('orders');
    }
}
