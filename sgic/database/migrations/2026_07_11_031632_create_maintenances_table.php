<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Mantenimientos - Registro de servicios de mantenimiento realizados a criptas
     * Esenciales para RN-05 (mantenimiento preventivo y correctivo)
     */
    public function up(): void
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained()->onDelete('cascade');
            $table->foreignId('crypt_id')->constrained()->onDelete('restrict');
            $table->foreignId('contract_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('client_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete(); // Usuario que registró
            
            // Tipo de mantenimiento
            $table->enum('type', ['preventive', 'corrective', 'cleaning', 'repair', 'other'])->default('preventive');
            $table->string('title'); // Título descriptivo
            $table->text('description')->nullable(); // Descripción detallada
            
            // Programación
            $table->date('scheduled_date')->nullable(); // Fecha programada
            $table->date('completed_date')->nullable(); // Fecha de completado
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            
            // Estado
            $table->enum('status', ['pending', 'in_progress', 'completed', 'cancelled'])->default('pending');
            
            // Costos
            $table->decimal('labor_cost', 12, 2)->default(0);
            $table->decimal('materials_cost', 12, 2)->default(0);
            $table->decimal('total_cost', 12, 2)->default(0);
            $table->boolean('is_covered_by_contract')->default(false); // ¿Cubierto por contrato?
            
            // Personal asignado
            $table->string('assigned_to')->nullable(); // Nombre del responsable
            $table->text('observations')->nullable();
            $table->json('photos')->nullable(); // URLs de fotos del mantenimiento
            
            // Control
            $table->timestamps();
            $table->softDeletes();
            
            // Índices
            $table->index(['tenant_id', 'crypt_id']);
            $table->index(['tenant_id', 'type']);
            $table->index(['tenant_id', 'status']);
            $table->index(['tenant_id', 'scheduled_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};
