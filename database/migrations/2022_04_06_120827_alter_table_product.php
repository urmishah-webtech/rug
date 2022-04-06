<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::table('product', function (Blueprint $table) {
            $table->float('shipping_weight', 8, 1)->comment("unit kg")->nullable()->default(0);
            $table->integer('width')->comment("unit cm")->nullable()->default(0);
            $table->integer('height')->comment("unit cm")->nullable()->default(0);
            $table->integer('depth')->comment("unit cm")->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->dropColumn('shipping_weight');
            $table->dropColumn('width');
            $table->dropColumn('height');
            $table->dropColumn('depth');
        });
    }
}
