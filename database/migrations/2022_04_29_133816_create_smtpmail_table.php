<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmtpmailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smtpmail', function (Blueprint $table) {
            $table->id();
            $table->string('mailmailer')->nullable();
            $table->string('mailhost')->nullable();
            $table->string('mailport')->nullable();
            $table->string('mailusername')->nullable();
            $table->string('mailpassword')->nullable();
            $table->string('mailformaddress')->nullable();
            $table->string('mailfrom_name')->nullable();
            $table->string('mailfrom_encypation')->nullable();
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
        Schema::dropIfExists('smtpmail');
    }
}
