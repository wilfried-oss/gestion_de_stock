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
        Schema::create('transferts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('source_location_id');
            $table->foreign('source_location_id')->references('id')
                ->on('locations')->constrained()
                ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('destination_location_id');
            $table->foreign('destination_location_id')->references('id')
                ->on('locations')->constrained()
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreignId('produit_id')->constrained()
                ->onUpdate('cascade')->onDelete('cascade');

            $table->double('quantity');
            $table->double('unit_cost');
            $table->double('total_cost');

            $table->enum('status', ['en cours', 'terminé', 'annulé'])->default('en cours');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transferts');
    }
};
