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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->String('name',45);
            // $table->String('end_User',45)->nullable();
            $table->String('country',45);
            $table->String('city',45);
            $table->String('phone',45)->nullable();
            $table->String('email',45);
            $table->String('website',45)->nullable();
            $table->String('contact_Person',45)->nullable();
            $table->String('contact_Person_Phone',45)->nullable();
            // $table->String('status',10)->nullable();
            $table->foreignId('added_by')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();//Relationship
            // $table->foreignId('parent_id')->nullable()->constrained('clients','id') ->nullOnDelete();
            // $table->foreignId('company_id')->references('id')->on('companies')->cascadeOnUpdate()->cascadeOnDelete();//Relationship
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
