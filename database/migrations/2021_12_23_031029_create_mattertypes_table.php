<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMattertypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mattertypes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matter_type');
            $table->timestamps();
        });

        DB::table('mattertypes')->insert(
            [            
                ['id'=> 1, 'matter_type' => "Conveyancing"],
                ['id'=> 2, 'matter_type' => "Litigation"],
                ['id'=> 3, 'matter_type' => "Corporate Commercial"],
                ['id'=> 4, 'matter_type' => "Probate Administrational"],
                ['id'=> 5, 'matter_type' => "Intellectual Properties"],
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
        Schema::dropIfExists('mattertypes');
    }
}