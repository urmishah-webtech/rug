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
            $table->boolean("custom_variant")->comment("unit cm")->nullable()->default(0);
            $table->float("cv_width_price", 8, 2)->comment("per unit")->nullable();
            $table->float("cv_height_price", 8, 2)->comment("per unit")->nullable();
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
            $table->dropColumn('custom_variant');
            $table->dropColumn('cv_width_price');
            $table->dropColumn('cv_height_price');
        });
    }
}
