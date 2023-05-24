<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilestatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filestatuses', function (Blueprint $table) {
            $table->id();
            $table->string('file_status');
            $table->timestamps();
        });

        DB::table('filestatuses')->insert(
            [
                ['id'=>1, 'file_status' => 'to_do'],
                ['id'=>2, 'file_status' => 'pending'],
                ['id'=>3, 'file_status' => 'ready'],
                ['id'=>4, 'file_status' => 'urgent'],
            ],

        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filestatuses');
    }
}