<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('paymentMethod');
            $table->datetime('paymentDate');
            $table->float('tax');
            $table->float('discount');
            $table->float('amount');
            $table->foreignId('roomBook_id')->references('id')->on('room_books');
            $table->foreignId('book_id')->references('id')->on('flight_books');
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
        Schema::dropIfExists('payments');
    }
}
