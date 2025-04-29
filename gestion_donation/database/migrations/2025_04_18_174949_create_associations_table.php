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
       Schema::create('associations', function (Blueprint $table) {
    $table->id();
    $table->string('nom');
    $table->decimal('montantTotal', 10, 2)->default(0);
    $table->enum('statut', ['en_attente', 'validée', 'refusée'])->default('en_attente');
    $table->text('description')->nullable();
    $table->string('logo')->nullable();
    $table->string('adresse')->nullable();
    $table->string('telephone')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('associations');
    }
};
