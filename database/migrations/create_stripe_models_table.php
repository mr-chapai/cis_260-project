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
        Schema::create('stripe_models', function (Blueprint $table) {

            $table->id();
            $table->text('product_name',50);
            $table->text('product_description',500);
            $table->integer('product_qty');
            $table->string('product_image')->nullable();
            $table->decimal('product_price', 8, 2);
            $table->string('product_category',20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stripe_models');
    }
};
