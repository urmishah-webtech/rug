<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCustomeCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cart', function (Blueprint $table) {
            $table->integer('cutomeid')->nullable();
            $table->integer('varient1')->nullable();
            $table->string('attribute1')->nullable();
            $table->integer('varient2')->nullable();
            $table->string('attribute2')->nullable();
            $table->integer('varient3')->nullable();
            $table->string('attribute3')->nullable();
            $table->string('varient4')->nullable();
            $table->integer('height')->nullable();
            $table->integer('width')->nullable();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cart', function (Blueprint $table) {
            //
        });
    }
}
