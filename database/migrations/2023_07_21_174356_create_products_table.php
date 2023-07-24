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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->String('Name',45);
            $table->String('Category',45);
            $table->Integer('Available_Qty');
            $table->decimal('Price', 8, 2);
            $table->decimal('Cost', 8, 2);
            $table->String('Brand',45);
            $table->Bit('Photo',100);
            $table->String('Status',5);
            $table->dateTime('Last_Order_Date');
            $table->dateTime('Date_Added');
            $table->Integer('Added_By');//Relationship
            $table->Integer('Company_ID');//Relationship
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
