<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatteroverviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {if(!Schema::hasTable('matteroverviews')){
        Schema::create('matteroverviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mattertypes_id');
            $table->foreign('mattertypes_id')->references('id')->on('mattertypes');
            $table->datetime('open_file_date');
            $table->string('file_ref');
            $table->string('related_file_ref');
            $table->string('agency');
            $table->string('agent_name');
            $table->string('bank_detail');
            $table->string('contact');
            $table->foreignId('client_id');
            $table->foreignId('vendor_id');
            $table->foreignId('purchaser_id');
            $table->foreignId('developer_id');
            $table->foreignId('financier_id');
            $table->foreignId('property_id');
            $table->foreignId('searches_id');
            $table->foreignId('caveats_id');
            $table->foreignId('agreement_id');
            $table->foreignId('originaldoc_id');
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matteroverviews');
    }
}
