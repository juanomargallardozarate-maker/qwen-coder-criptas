<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Mausoleos - Estructuras funerarias especiales que contienen múltiples criptas
     * Se manejan como entidades independientes con su propia jerarquía
     */
    public function up(): void
    {
        Schema::create('mausoleums', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained()->onDelete('cascade');
            $table->foreignId('cemetery_id')->constrained()->onDelete('cascade');
            $table->foreignId('section_id')->nullable()->constrained()->onDelete('set null');
            
            // Identificación
            $table->string('code')->unique(); // Código único del mausoleo
            $table->string('name'); // Nombre del mausoleo
            $table->text('description')->nullable();
            
            // Características físicas
            $table->integer('total_crypts')->default(0); // Número total de criptas
            $table->integer('floors')->default(1); // Número de pisos
            $table->string('construction_material')->nullable(); // Material de construcción
            $table->string('architectural_style')->nullable(); // Estilo arquitectónico
            $table->decimal('area_sqm', 8, 2)->nullable(); // Área en metros cuadrados
            
            // Estado y disponibilidad
            $table->foreignId('crypt_status_id')->constrained()->onDelete('restrict');
            $table->boolean('is_active')->default(true);
            
            // Pricing
            $table->decimal('base_price', 12, 2)->default(0);
            $table->decimal('maintenance_fee', 12, 2)->default(0);
            
            // Control
            $table->json('features')->nullable(); // Características adicionales
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
        Schema::dropIfExists('mausoleums');
    }
};
