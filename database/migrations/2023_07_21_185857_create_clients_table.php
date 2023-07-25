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
            $table->String('Name',45);
            $table->String('End_User',45);
            $table->String('Country',45);
            $table->String('City',45);
            $table->String('Phone',45);
            $table->String('Email',45);
            $table->String('Website',45);
            $table->String('Contact_Person',45);
            $table->String('Contact_Person_Phone',45);
            $table->String('Status',10);
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
        Schema::dropIfExists('clients');
    }
};
