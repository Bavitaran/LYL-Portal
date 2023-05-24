<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date');
            $table->string('due_date');
            $table->string('invoice_to');
            $table->string('item');
            $table->string('cost');
            $table->string('quantity');
            $table->string('price');
            $table->string('description');
            $table->string('sales_person');
            $table->string('note');
            $table->string('payment_method');
            $table->boolean('payment_terms');
            $table->boolean('client_notes');
            $table->boolean('payment_stub');
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
        Schema::dropIfExists('invoices');
    }
}
