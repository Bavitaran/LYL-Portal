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
    {
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
            $table->foreignId('client_id')->constrained;
            $table->foreignId('vendor_id')->constrained;
            $table->foreignId('purchaser_id')->constrained;
            $table->foreignId('developer_id')->constrained;
            $table->foreignId('financier_id')->constrained;
            $table->foreignId('property_id')->constrained;
            $table->foreignId('searches_id')->constrained;
            $table->foreignId('caveats_id')->constrained;
            $table->foreignId('agreement_id')->constrained;
            $table->foreignId('originaldoc_id')->constrained;
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
        Schema::dropIfExists('matteroverviews');
    }
}