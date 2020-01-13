<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinalAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('final_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('f_name');
            $table->string('l_name');

            $table->integer('phn_number');
            $table->integer('alt_phn_number');

            $table->string('email');
            
            $table->string('division');
            $table->string('zilla');
            $table->string('upzilla');

            $table->string('curier_name');
            $table->string('curiare_ditails');

            $table->string('payment_method');
            $table->integer('sender_number');
            $table->string('translation_number');


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
        Schema::dropIfExists('final_addresses');
    }
}
