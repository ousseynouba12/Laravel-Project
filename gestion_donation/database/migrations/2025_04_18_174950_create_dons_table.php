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
        Schema::create('dons', function (Blueprint $table) {
            $table->id();
            $table->decimal('montant', 10, 2);
            $table->timestamp('date');
            $table->string('type'); // type de don (ex: ponctuel, mensuel)
            $table->foreignId('donateur_id')->constrained()->onDelete('cascade');
            $table->foreignId('association_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dons');
    }
};