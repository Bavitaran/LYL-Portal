<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertydetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propertydetails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address');
            $table->string('type');
            $table->string('title_particulars');
            $table->string('geran_mukim_master_title');
            $table->string('lot_pt_no');
            $table->string('mukim');
            $table->string('district');
            $table->string('state');
            $table->string('developer');
            $table->string('company_no');
            $table->string('pic');
            $table->string('designation');
            $table->string('tel_office');
            $table->string('tel_hp');
            $table->string('fax');
            $table->string('email');
            $table->string('particulars');
            $table->string('restrictions');
            $table->string('encumbrances');
            $table->string('terms_conditions');
            $table->string('purchase_price');
            $table->string('earnest_deposit');
            $table->string('balance_deposit');
            $table->string('balance');
            $table->string('loan_sum');
            $table->string('differential_sum');
            $table->string('tenanted');
            $table->string('tenure');
            $table->string('rental');
            $table->boolean('copy_of_tenancy_agreement');
            $table->string('vendor_purchaser_solicitors');
            $table->string('vp_pic');
            $table->string('vp_tel_fax');
            $table->string('vp_email');
            $table->string('purchaser_financier_solicitors');
            $table->string('pf_pic');
            $table->string('pf_tel_fax');
            $table->string('pf_email');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('propertydetails');
    }
}