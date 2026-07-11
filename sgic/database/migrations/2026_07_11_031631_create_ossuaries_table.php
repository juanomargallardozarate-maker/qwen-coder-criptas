<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Osarios - Espacios para restos óseos exhumados
     * Generalmente de menor tamaño y costo que las criptas tradicionales
     */
    public function up(): void
    {
        Schema::create('ossuaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained()->onDelete('cascade');
            $table->foreignId('cemetery_id')->constrained()->onDelete('cascade');
            $table->foreignId('section_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('block_id')->nullable()->constrained()->onDelete('set null');
            
            // Identificación
            $table->string('code')->unique(); // Código único del osario
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            
            // Características físicas
            $table->integer('capacity')->default(1); // Capacidad de restos óseos
            $table->integer('current_occupancy')->default(0);
            $table->string('dimensions')->nullable();
            
            // Estado y disponibilidad
            $table->foreignId('crypt_status_id')->constrained()->onDelete('restrict');
            $table->boolean('is_active')->default(true);
            
            // Pricing
            $table->decimal('price', 12, 2)->default(0);
            $table->decimal('maintenance_fee', 12, 2)->default(0);
            
            // Control
            $table->json('features')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            // Índices
            $table->index(['tenant_id', 'cemetery_id']);
            $table->index(['tenant_id', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ossuaries');
    }
};
