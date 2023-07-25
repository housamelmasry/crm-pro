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
            $table->String('end_User',45);
            $table->String('country',45);
            $table->String('city',45);
            $table->String('phone',45);
            $table->String('email',45);
            $table->String('website',45);
            $table->String('contact_Person',45);
            $table->String('contact_Person_Phone',45);
            $table->String('status',10);
            $table->foreignId('added_By')->references('id')->on('users');//Relationship
            $table->foreignId('company_ID')->references('id')->on('companies');//Relationship
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
