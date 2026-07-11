<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Notifications - Sistema de notificaciones para alertas y recordatorios
     * Esencial para RN-03 (notificaciones de decadencia) y RN-04 (alertas de mora)
     */
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained()->onDelete('cascade');
            
            // Relacionamiento polimórfico para el destinatario
            $table->string('notifiable_type'); // Modelo que recibe la notificación (User, Client, etc.)
            $table->unsignedBigInteger('notifiable_id');
            
            // Tipo y categoría
            $table->enum('type', ['info', 'warning', 'error', 'success'])->default('info');
            $table->string('category')->nullable(); // 'decay', 'payment', 'maintenance', 'general', etc.
            
            // Contenido
            $table->string('title'); // Título de la notificación
            $table->text('message'); // Mensaje completo
            $table->json('data')->nullable(); // Datos adicionales en JSON
            
            // Estado
            $table->boolean('is_read')->default(false);
            $table->timestamp('read_at')->nullable();
            
            // Programación
            $table->timestamp('scheduled_at')->nullable(); // Para notificaciones programadas
            $table->timestamp('sent_at')->nullable(); // Fecha de envío
            
            // Control
            $table->timestamps();
            
            // Índices
            $table->index(['tenant_id', 'notifiable_type', 'notifiable_id']);
            $table->index(['tenant_id', 'is_read']);
            $table->index(['tenant_id', 'category']);
            $table->index(['tenant_id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
