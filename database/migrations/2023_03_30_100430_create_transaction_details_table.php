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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->string('document_code', 50);
            $table->string('product_code', 50);
            $table->double('price', 10, 2);
            $table->double('discount', 10, 2);
            $table->double('total_amount', 10, 2);
            $table->integer('quantity');
            $table->foreign('document_code')->references('document_code')->on('transactions');
            $table->foreign('product_code')->references('product_code')->on('products');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_details');
    }
};
