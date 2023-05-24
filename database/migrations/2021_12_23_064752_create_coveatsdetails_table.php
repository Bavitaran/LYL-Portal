<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoveatsdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coveatsdetails', function (Blueprint $table) {
            $table->id();
            $table->string('entered');
            $table->string('removal_of_private_coveat_from_signed');
            $table->datetime('fic_obtained_deadline');
            $table->datetime('state_authority_obtained_deadline');
            $table->datetime('developer_consent_obtained_deadline');
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
        Schema::dropIfExists('coveatsdetails');
    }
}