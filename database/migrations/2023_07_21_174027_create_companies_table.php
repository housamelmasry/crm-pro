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
            $table->string('name', 45);
            $table->string('type_of_Business', 45)->nullable();
            $table->string('size', 45)->nullable();
            $table->string('country', 45)->nullable();
            $table->string('city', 45)->nullable();
            $table->string('phone', 45)->nullable();
            $table->string('email', 45)->nullable();
            // $table->string('password')->nullable();
            $table->string('website')->nullable();
            $table->string('slogan', 256)->nullable();
            // $table->string('theme_color', 45)->nullable();
            $table->string('logo')->nullable();
            // $table->string('header_poster')->nullable();
            $table->text('about_us')->nullable();
            $table->text('mission')->nullable();
            $table->text('vision')->nullable();
            // $table->string('value_icon_benefits')->nullable();
            // $table->date('subscription_date')->nullable();
            // $table->string('subscription_duration')->nullable();
            // $table->date('expiry_date')->nullable();
            // $table->enum('status', ['active', 'inactive'])->nullable();
            // $table->boolean('first_login')->nullable();
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
