<?php

use App\Models\Client;
use App\Models\Evenement;
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
        Schema::create('client_reservations', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->date('date_reservation');
            $table-> string('est_accepte_ou_pas');
            $table->foreignIdFor(Client::class)->constrained()->cascadeOnDelete(); 
            $table->foreignIdFor(Evenement::class)->constrained()->cascadeOnDelete(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
