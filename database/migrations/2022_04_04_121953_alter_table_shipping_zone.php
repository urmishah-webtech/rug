<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableShippingZone extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::table('shipping_zone', function (Blueprint $table) {
            $table->float('start', 8, 2)->nullable();
            $table->float('end', 8, 2)->nullable();
            $table->float('price', 8, 2)->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::table('shipping_zone', function (Blueprint $table) {
           $table->dropColumn('from');
           $table->dropColumn('to');
           $table->dropColumn('price');
        });
    }
}
