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
        Schema::create('order_details', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->unique;
            $table->foreign('product_id')->references('id')->on('products')->ondelete('cascade')->onupdate('cascade');
            $table->unsignedBigInteger('order_id')->unique;
            $table->foreign('order_id')->references('id')->on('orders')->ondelete('cascade')->onupdate('cascade');
            $table->integer('quantity');
            $table->integer('subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
