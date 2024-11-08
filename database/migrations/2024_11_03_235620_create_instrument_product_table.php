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
        Schema::create('instrument_product', function (Blueprint $table) { 
            $table->id(); $table->unsignedBigInteger('instrument_id'); 
            $table->unsignedBigInteger('product_id'); 
            $table->foreign('instrument_id')->references('id')->on('instruments')->onDelete('cascade'); 
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade'); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instrument_product');
    }
};
