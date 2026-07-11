<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Cementerios - Cada tenant puede tener uno o múltiples cementerios
     * Incluye información de ubicación y configuración específica
     */
    public function up(): void
    {
        Schema::create('cemeteries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained()->onDelete('cascade');
            $table->string('name'); // Nombre del cementerio
            $table->string('code')->unique(); // Código único para identificación interna
            $table->text('address'); // Dirección completa
            $table->string('municipality'); // Municipio
            $table->string('state'); // Estado
            $table->string('zip_code', 10); // Código postal
            $table->string('phone')->nullable(); // Teléfono de contacto
            $table->string('email')->nullable(); // Email de contacto
            $table->decimal('latitude', 10, 8)->nullable(); // Coordenadas GPS
            $table->decimal('longitude', 10, 8)->nullable(); // Coordenadas GPS
            $table->time('opening_time')->default('08:00'); // Hora de apertura
            $table->time('closing_time')->default('18:00'); // Hora de cierre
            $table->boolean('is_active')->default(true);
            $table->json('services')->nullable(); // Servicios disponibles (capilla, crematorio, etc.)
            $table->timestamps();
            $table->softDeletes();
            
            // Índices para rendimiento y multi-tenancy
            $table->index(['tenant_id', 'is_active']);
            $table->index('code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cemeteries');
    }
};
