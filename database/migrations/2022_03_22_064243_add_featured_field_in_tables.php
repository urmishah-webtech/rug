<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFeaturedFieldInTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->boolean('featured')->after('seo_utl')->default(false);
        });
        Schema::table('collection', function (Blueprint $table) {
            $table->boolean('featured')->after('seo_url')->default(false);
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
            $table->dropColumn('featured');
        });
        Schema::table('collection', function (Blueprint $table) {
            $table->dropColumn('featured');
        });
    }
}
