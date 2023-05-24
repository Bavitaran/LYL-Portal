<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOriginaldocDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('originaldoc_details', function (Blueprint $table) {
            $table->id();
            $table->string('original_title');
            $table->string('deposited_in_safe');
            $table->string('removed_from_safe');
            $table->string('released_to');
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
        Schema::dropIfExists('originaldoc_details');
    }
}