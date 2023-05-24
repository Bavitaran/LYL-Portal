<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancierparticularsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financierparticulars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('redem_name');
            $table->string('redem_designation');
            $table->string('redem_address');
            $table->string('redem_tel_office');
            $table->string('redem_tel_hp');
            $table->string('redem_fax');
            $table->string('redem_email');
            $table->string('mortg_name');
            $table->string('mortg_designation');
            $table->string('mortg_address');
            $table->string('mortg_tel_office');
            $table->string('mortg_tel_hp');
            $table->string('mortg_fax');
            $table->string('mortg_email');
            $table->string('disburs_name');
            $table->string('disburs_designation');
            $table->string('disburs_address');
            $table->string('disburs_tel_office');
            $table->string('disburs_tel_hp');
            $table->string('disburs_fax');
            $table->string('disburs_email'); 
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
        Schema::dropIfExists('financierparticulars');
    }
}