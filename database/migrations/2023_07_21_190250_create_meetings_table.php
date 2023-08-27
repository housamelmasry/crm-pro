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
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            // $table->date('date');
            // $table->time('time');
            $table->String('reference',45);
            $table->String('type',45);
            $table->String('notes',200);
            $table->foreignId('user_id')->constrained('users','id');//Relationship
            $table->foreignId('clients_id')->constrained('clients','id');//Relationship
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meetings');
    }
};
