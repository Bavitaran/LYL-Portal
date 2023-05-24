<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancierdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financierdetails', function (Blueprint $table) {
            $table->id();
            $table->string('financier_name');
            $table->string('financier_company_no');
            $table->string('financier_addres_1');
            $table->string('financier_addres_2');
            $table->string('financier_addres_3');
            $table->string('financier_addres_4');
            $table->string('financier_addres_5');
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
        Schema::dropIfExists('financierdetails');
    }
}