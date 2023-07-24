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
            $table->String('Financial_Notes',200);
            $table->String('Payment_Terms',200);
            $table->String('Offer_Validity',45);
            $table->String('Delivery_Terms',45);
            $table->String('Warranty',45);
            $table->String('Signatures',3);
            $table->String('Stamp',3);
            $table->Integer('Order_ID');//Relationship
            $table->Integer('Client_ID');//Relationship
            $table->Integer('Company_ID');//Relationship
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
