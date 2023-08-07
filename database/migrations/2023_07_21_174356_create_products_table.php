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
            $table->String('name',45);
            $table->foreignId('category_id')->references('id')->on('categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->Integer('available_qty');
            $table->decimal('price', 8, 2);
            $table->decimal('cost', 8, 2);
            $table->String('brand',45);
            // $table->Bit('photo',100);   // morphs
            $table->String('status',5);
            $table->dateTime('last_order_date');
            $table->dateTime('date_added');
            $table->foreignId('added_by')->references('id')->on('users');//Relationship
            $table->foreignId('company_id')->references('id')->on('companies');//Relationship
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
