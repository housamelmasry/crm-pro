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
            $table->String('Name',45);
            $table->String('Description',300);
            $table->dateTime('Start_Date');
            $table->dateTime('End_Date');
            $table->String('Priority',5);
            $table->String('Progress',10);
            $table->String('Status',5);
            $table->String('Location',45);
            $table->String('Type',45);
            $table->Bit('Photo',100);
            $table->String('Department',45);
            $table->Integer('Added_By');//Relationship
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
        Schema::dropIfExists('projects');
    }
};
