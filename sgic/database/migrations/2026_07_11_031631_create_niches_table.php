<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Nichos - Espacios funerarios empotrados en muros
     * Se gestionan como parte de la jerarquía de bloques/niveles
     */
    public function up(): void
    {
        Schema::create('niches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained()->onDelete('cascade');
            $table->foreignId('cemetery_id')->constrained()->onDelete('cascade');
            $table->foreignId('section_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('block_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('level_id')->nullable()->constrained()->onDelete('set null');
            
            // Identificación
            $table->string('code')->unique(); // Código único del nicho
            $table->string('name')->nullable(); // Nombre descriptivo
            $table->text('description')->nullable();
            
            // Características físicas
            $table->integer('capacity')->default(1); // Capacidad de restos
            $table->integer('current_occupancy')->default(0); // Ocupación actual
            $table->string('dimensions')->nullable(); // Dimensiones
            $table->enum('door_type', ['none', 'marble', 'granite', 'glass', 'metal'])->default('none');
            
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
            $table->index(['tenant_id', 'section_id', 'block_id', 'level_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('niches');
    }
};
