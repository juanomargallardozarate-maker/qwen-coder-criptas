<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Jerarquía de Infraestructura: Sections → Blocks → Levels → Crypts
     * Implementa RN-01: Organización física del cementerio
     */
    public function up(): void
    {
        // Tabla: sections (Secciones del cementerio)
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained()->onDelete('cascade');
            $table->foreignId('cemetery_id')->constrained()->onDelete('cascade');
            $table->string('code'); // Código único: A, B, C...
            $table->string('name'); // Nombre: "Sección Principal", "Jardín del Recuerdo"...
            $table->text('description')->nullable();
            $table->integer('total_blocks')->default(0); // Número total de bloques en esta sección
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
            
            $table->unique(['tenant_id', 'code']);
            $table->index(['tenant_id', 'cemetery_id', 'is_active']);
        });

        // Tabla: blocks (Bloques dentro de secciones)
        Schema::create('blocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained()->onDelete('cascade');
            $table->foreignId('section_id')->constrained()->onDelete('cascade');
            $table->string('code'); // Código único: A1, A2, B1...
            $table->string('name')->nullable();
            $table->integer('total_levels')->default(0); // Número de niveles en este bloque
            $table->integer('crypts_per_level')->default(0); // Criptas por nivel
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
            
            $table->unique(['tenant_id', 'code']);
            $table->index(['tenant_id', 'section_id', 'is_active']);
        });

        // Tabla: levels (Niveles dentro de bloques)
        Schema::create('levels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained()->onDelete('cascade');
            $table->foreignId('block_id')->constrained()->onDelete('cascade');
            $table->string('code'); // Código único: A1-N1, A1-N2...
            $table->string('name')->nullable(); // "Nivel 1", "Nivel 2"...
            $table->integer('level_number'); // Número ordinal del nivel
            $table->integer('total_crypts')->default(0); // Total de criptas en este nivel
            $table->decimal('price_multiplier', 5, 2)->default(1.0); // Multiplicador de precio por nivel
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
            
            $table->unique(['tenant_id', 'code']);
            $table->index(['tenant_id', 'block_id', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('levels');
        Schema::dropIfExists('blocks');
        Schema::dropIfExists('sections');
    }
};
