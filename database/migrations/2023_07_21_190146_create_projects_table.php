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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->String('name',45);
            $table->String('description',300);
            $table->dateTime('start_Date');
            $table->dateTime('end_Date');
            $table->String('priority',5);
            $table->String('progress',10);
            // $table->String('status',5);
            $table->String('location',45);
            $table->String('type',45);
            // $table->Bit('photo',100);
            $table->String('department',45);
            $table->foreignId('added_by')->references('id')->on('users'); //Relationship
            $table->foreignId('client_id')->references('id')->on('clients'); //Relationship
            // $table->foreignId('company_id')->references('id')->on('companies');//Relationship
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
