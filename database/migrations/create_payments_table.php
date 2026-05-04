<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('stripe_session_id')->unique(); // store Stripe ID here
            $table->string('email');
            $table->string('name');
            $table->string('phone');
          /*  $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('user_id');*/
            $table->string('currency');
            $table->string('amount',10);
            $table->string('payment_status');
            $table->timestamps();


            //$table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
