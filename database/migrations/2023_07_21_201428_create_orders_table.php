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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->enum('payment_method',['card', 'cash']);
            $table->decimal('value', 10,2);
            $table->decimal('profit', 10,2);
            $table->enum('status', ['done', 'inactive','in progress']);
            $table->foreignId('added_by')->references('id')->on('users');
            $table->foreignId('client_id')->references('id')->on('clients');
            $table->foreignId('proposal')->references('id')->on('proposals');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
