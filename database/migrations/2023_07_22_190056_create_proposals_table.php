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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->String('financial_notes',200);
            $table->String('payment_terms',200);
            $table->String('offer_validity',45);
            $table->String('delivery_terms',45);
            $table->String('warranty',45);
            $table->String('signatures',3);
            $table->String('stamp',3);
            $table->foreignId('order_ID')->references('id')->on('orders'); //Relationship
            $table->foreignId('client_ID')->references('id')->on('clients'); //Relationship
            $table->foreignId('company_ID')->references('id')->on('companies');//Relationship
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposals');
    }
};
