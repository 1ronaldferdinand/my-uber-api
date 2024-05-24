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
        Schema::create('pigeon_orders', function (Blueprint $table) {
            $table->id();
            $table->string('pigeon_id');
            $table->string('code');
            $table->decimal('cost', 20, 2);
            $table->decimal('distance', 10, 2); 
            $table->dateTime('deadline');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pigeon_orders');
    }
};
