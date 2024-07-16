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
        Schema::create('orderItems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Books_id')->nullable()->references('id')->on('Books');
            $table->foreignId('order_id')->references('id')->on('order');
            $table->float('total_price');
            $table->integer('qty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderItems');
    }
};
