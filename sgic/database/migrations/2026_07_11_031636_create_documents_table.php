<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Documents - Gestión de documentos digitales asociados a contratos, clientes y criptas
     * Almacena metadata y referencias a archivos en storage
     */
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete(); // Usuario que subió
            
            // Relacionamiento polimórfico
            $table->string('documentable_type'); // Modelo asociado (Contract, Client, Crypt, etc.)
            $table->unsignedBigInteger('documentable_id');
            
            // Información del documento
            $table->string('title'); // Título descriptivo
            $table->text('description')->nullable();
            $table->enum('type', ['contract', 'invoice', 'receipt', 'identification', 'certificate', 'photo', 'plan', 'other'])->default('other');
            
            // Archivo
            $table->string('file_name'); // Nombre original del archivo
            $table->string('file_path'); // Ruta de almacenamiento
            $table->string('file_mime_type'); // Tipo MIME
            $table->integer('file_size'); // Tamaño en bytes
            $table->string('file_hash')->nullable(); // Hash para verificación de integridad
            
            // Control
            $table->boolean('is_active')->default(true);
            $table->integer('download_count')->default(0);
            $table->timestamp('expires_at')->nullable(); // Fecha de expiración opcional
            
            $table->timestamps();
            $table->softDeletes();
            
            // Índices
            $table->index(['tenant_id', 'documentable_type', 'documentable_id']);
            $table->index(['tenant_id', 'type']);
            $table->index(['tenant_id', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
