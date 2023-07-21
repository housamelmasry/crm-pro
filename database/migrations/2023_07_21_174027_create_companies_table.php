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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('Name', 45);
            $table->string('Type_of_Business', 45);
            $table->string('Size', 45);
            $table->string('Country', 45);
            $table->string('City', 45);
            $table->string('Phone', 45);
            $table->string('Email', 45);
            $table->string('Password');
            $table->string('Website');
            $table->string('Slogan', 256);
            $table->string('Theme_Color', 45);
            $table->string('Logo');
            $table->string('Header_Poster');
            $table->text('About_Us');
            $table->text('Mission');
            $table->text('Vision');
            $table->string('Value_Icon_Benefits');
            $table->date('Subscription_Date');
            $table->string('Subscription_Duration');
            $table->date('Expiry_Date');
            $table->enum('Status', ['active', 'inactive']);
            $table->boolean('First_Login');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
