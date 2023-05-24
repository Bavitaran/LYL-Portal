<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentstatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymentstatuses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('payment_status');
        });

        DB::table('paymentstatuses')->upsert(
          [
              ['id' => 1, 'payment_status' => "Pending Payment"],
              ['id' => 2, 'payment_status' => "Pending Balance Payment"],
              ['id' => 3, 'payment_status' => "Partial Payment"],
              ['id' => 4, 'payment_status' => "Paid"],
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
        Schema::dropIfExists('paymentstatuses');
    }
}