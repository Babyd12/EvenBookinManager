<?php

use App\Models\Association;
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
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->string('date_limite_inscription');
            $table->string('image_mise_en_avant')->nullable();
            $table->boolean('est_cloturer_ou_pas');
            $table->string('date_evenement');
            $table->foreignIdFor(Association::class)->constrained()->cascadeOnDelete();   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenements');
    }
};
