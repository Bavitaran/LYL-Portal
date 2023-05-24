<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailTrackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mails', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('despatch');
            $table->string('ref_no');
            $table->string('recipient_add');
            $table->string('description');
            $table->string('total_amount');
            $table->string('incoming');
            $table->string('paid_amount');
            $table->string('due_date');
            $table->string('outgoing_date');
            $table->string('pic');
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
        Schema::dropIfExists('mail_track');
    }
}
