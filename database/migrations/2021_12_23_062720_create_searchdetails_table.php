<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSearchdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('searchdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('land_search_made');
            $table->datetime('comapny_search_made');
            $table->datetime('bankruptcy_search_made_on');
            $table->datetime('bankruptcy_search_result_received');
            $table->datetime('insolvency_search_made_on');
            $table->datetime('insolvency_search_result_received');
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
        Schema::dropIfExists('searchdetails');
    }
}