<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matters', function (Blueprint $table) {
            $table->id();
            $table->string('matter_type');
            $table->string('client_company');
            $table->string('description');
            $table->string('file_group');
            $table->string('control_account');
            $table->string('pic');
            $table->string('lawyer');
            $table->string('task_assign');
            $table->string('task_recipient');
            $table->string('file_ref');
            $table->string('remark');
            $table->string('purchaser_name');
            $table->string('purchaser_company');
            $table->string('vendor_name');
            $table->string('vendor_copmany');
            $table->string('status')->default('Pending');
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
        Schema::dropIfExists('matter');
    }
}
