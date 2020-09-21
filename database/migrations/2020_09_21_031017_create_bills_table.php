<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->integer('totalPrice');
            $table->date('dateBook');
            $table->string('status');
            $table->string('orderer');
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('house_id');

            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('house_id')->references('id')->on('houses');
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
        Schema::dropIfExists('bills');
    }
}
