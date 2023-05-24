<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendordetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendordetails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vendor_name');
            $table->string('vendor_nric');
            $table->string('vendor_address');
            $table->string('vendor_tel_office');
            $table->string('vendor_tel_hp');
            $table->string('vendor_email');
            $table->string('vendor_fax');
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
        Schema::dropIfExists('vendordetails');
    }
}