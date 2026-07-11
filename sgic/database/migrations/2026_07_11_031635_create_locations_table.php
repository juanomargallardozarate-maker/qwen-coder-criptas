<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Locations - Ubicaciones geográficas dentro del cementerio para inventario y activos
     * Utilizado para seguimiento de equipos, materiales y recursos
     */
    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained()->onDelete('cascade');
            $table->foreignId('cemetery_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('section_id')->nullable()->constrained()->onDelete('set null');
            
            // Identificación
            $table->string('code')->unique(); // Código único de ubicación
            $table->string('name'); // Nombre descriptivo
            $table->text('description')->nullable();
            
            // Tipo de ubicación
            $table->enum('type', ['warehouse', 'office', 'workshop', 'storage', 'other'])->default('other');
            
            // Capacidad y dimensiones
            $table->decimal('area_sqm', 8, 2)->nullable(); // Área en m²
            $table->string('capacity_unit')->nullable(); // Unidad de capacidad (piezas, kg, etc.)
            $table->integer('max_capacity')->nullable(); // Capacidad máxima
            
            // Estado
            $table->boolean('is_active')->default(true);
            
            $table->timestamps();
            $table->softDeletes();
            
            // Índices
            $table->index(['tenant_id', 'type']);
            $table->index(['tenant_id', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
