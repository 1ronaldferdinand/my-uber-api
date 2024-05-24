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
        Schema::create('pigeons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('speed', 10, 2); 
            $table->decimal('range', 10, 2); 
            $table->decimal('cost', 10, 2); 
            $table->decimal('downtime', 10, 2); 
            $table->decimal('maximum_weight', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pigeons');
    }
};