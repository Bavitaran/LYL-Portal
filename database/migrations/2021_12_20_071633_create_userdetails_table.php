<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role');
            $table->datetime('register_date');
            $table->string('fullname');
            $table->string('new_nric');
            $table->string('passport_no');
            $table->string('gender');
            $table->string('nationality');
            $table->string('company_name');
            $table->string('company_reg_new_no');
            $table->string('company_reg_old_no')->nullable();
            $table->string('registration_add');
            $table->string('business_add');
            $table->string('person_in_charge');
            $table->string('primary_mobile_no');
            $table->string('primary_social_contact_no');
            $table->string('primary_email');
            $table->string('primary_add_line_1');
            $table->string('primary_add_line_2');
            $table->string('primary_add_line_3');
            $table->string('primary_add_postcode');
            $table->string('primary_add_state');
            $table->string('primary_add_country');
            $table->string('secondary_mobile_no')->nullable();
            $table->string('secondary_social_contact_no')->nullable();
            $table->string('secondary_email')->nullable();
            $table->string('secondary_add_line_1')->nullable();
            $table->string('secondary_add_line_2')->nullable();
            $table->string('secondary_add_line_3')->nullable();
            $table->string('secondary_add_postcode')->nullable();
            $table->string('secondary_add_state')->nullable();
            $table->string('secondary_add_country')->nullable();
            $table->datetime('last_login');
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
        Schema::dropIfExists('userdetails');
    }
}