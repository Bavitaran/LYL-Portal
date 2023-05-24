<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrioritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('priorities', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('priority_status');
        });

        DB::table('priorities')->upsert(
            [
                ['id' => 1, 'priority_status' => "To Do"],
                ['id' => 2, 'priority_status' => "Pending"],
                ['id' => 3, 'priority_status' => "Prioritise"],
                ['id' => 4, 'priority_status' => "Completed"],
            ],
            'id'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('priorities');
    }
}