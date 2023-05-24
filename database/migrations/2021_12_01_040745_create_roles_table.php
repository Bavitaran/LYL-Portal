<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        DB::table('roles')->insert(
            [
                ['id'=> 1, 'name'=> 'Superadmin'],
                ['id'=> 2, 'name'=> 'Admin'],
                ['id'=> 3, 'name'=> 'Client'],
                ['id'=> 4, 'name'=> 'Agent_Developer'],
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
        Schema::dropIfExists('roles');
    }
}