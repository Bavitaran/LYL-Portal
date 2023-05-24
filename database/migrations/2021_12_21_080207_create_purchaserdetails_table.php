<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaserdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchaserdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('purchaser_name');
            $table->string('purchaser_nric');
            $table->string('purchaser_address');
            $table->string('purchaser_tel_office');
            $table->string('purchaser_tel_hp');
            $table->string('purchaser_email');
            $table->string('purchaser_fax');
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
        Schema::dropIfExists('purchaserdetails');
    }
}