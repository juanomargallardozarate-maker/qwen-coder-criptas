<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Audit Logs - Registro de auditoría para trazabilidad de operaciones críticas
     * Esencial para seguridad y cumplimiento normativo
     */
    public function up(): void
    {
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            
            // Información de la acción
            $table->string('action'); // 'create', 'update', 'delete', 'view', 'export', etc.
            $table->string('model_type'); // Clase del modelo afectado
            $table->unsignedBigInteger('model_id')->nullable(); // ID del modelo
            $table->string('description')->nullable(); // Descripción legible
            
            // Cambios realizados
            $table->json('old_values')->nullable(); // Valores antes del cambio
            $table->json('new_values')->nullable(); // Valores después del cambio
            $table->json('diff')->nullable(); // Diferencias específicas
            
            // Contexto
            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->string('url')->nullable(); // URL donde se realizó la acción
            $table->string('method')->nullable(); // Método HTTP
            
            // Control
            $table->timestamps();
            
            // Índices para rendimiento en consultas
            $table->index(['tenant_id', 'action']);
            $table->index(['tenant_id', 'user_id']);
            $table->index(['tenant_id', 'created_at']);
            $table->index(['model_type', 'model_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
    }
};
