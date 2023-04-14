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
        Schema::create('mouvements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produit_id')->constrained()
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('location_id')->constrained()
                ->onUpdate('cascade')->onDelete('cascade');

            $table->enum('type', ['entree', 'sortie', 'ajustement']);

            $table->double('quantity');
            $table->double('unit_cost');
            $table->double('total_cost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mouvements');
    }
};
