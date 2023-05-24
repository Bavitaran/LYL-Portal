<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowerdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowerdetails', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('borrower_1');
            $table->string('borrower_1_nric');
            $table->string('borrower_2');
            $table->string('borrower_2_nric');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrowerdetails');
    }
}