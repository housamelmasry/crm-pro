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
            $table->string('type_of_Business', 45);
            $table->string('size', 45);
            $table->string('country', 45);
            $table->string('city', 45);
            $table->string('phone', 45);
            $table->string('email', 45);
            $table->string('password');
            $table->string('website');
            $table->string('slogan', 256);
            $table->string('theme_color', 45);
            $table->string('logo');
            $table->string('header_poster');
            $table->text('about_us');
            $table->text('mission');
            $table->text('vision');
            $table->string('value_icon_benefits');
            $table->date('subscription_date');
            $table->string('subscription_duration');
            $table->date('expiry_date');
            $table->enum('status', ['active', 'inactive']);
            $table->boolean('first_login');
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
