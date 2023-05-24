<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellerdetails', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('seller_1');
            $table->string('seller_1_nric');
            $table->string('seller_2');
            $table->string('seller_2_nric');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sellerdetails');
    }
}