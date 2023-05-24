<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeveloperdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developerdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('developer_name');
            $table->string('developer_nric');
            $table->string('developer_address');
            $table->string('developer_tel_office');
            $table->string('developer_tel_hp');
            $table->string('developer_email');
            $table->string('developer_fax');
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
        Schema::dropIfExists('developerdetails');
    }
}