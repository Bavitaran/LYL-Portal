<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgreementdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agreementdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('matter_id')->constrained();
            $table->datetime('spa_date');
            $table->datetime('completion_due_date');
            $table->datetime('extnd_completion_due_date');
            $table->datetime('doa_mot_date');
            $table->datetime('reg_form_14a_dateline');
            $table->datetime('charge_discharge_of_rr');
            $table->timestamp('modified_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agreementdetails');
    }
}