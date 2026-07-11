<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Tablas de referencia para tipos y estados de criptas
     * Esenciales para RN-01 (inventario) y RN-03 (decadencia)
     */
    public function up(): void
    {
        // Tabla: crypt_types (Tipos de espacios funerarios)
        Schema::create('crypt_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained()->onDelete('cascade');
            $table->string('code'); // 'crypt', 'niche', 'mausoleum', 'ossuary'
            $table->string('name'); // 'Cripta', 'Nicho', 'Mausoleo', 'Osario'
            $table->text('description')->nullable();
            $table->integer('min_capacity')->default(1); // Capacidad mínima de restos
            $table->integer('max_capacity')->default(1); // Capacidad máxima de restos (1-6)
            $table->decimal('base_price', 12, 2)->default(0); // Precio base
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->unique(['tenant_id', 'code']);
            $table->index(['tenant_id', 'is_active']);
        });

        // Tabla: crypt_statuses (Estados posibles de una cripta)
        Schema::create('crypt_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained()->onDelete('cascade');
            $table->string('code'); // 'available', 'occupied', 'reserved', 'maintenance', 'decaying', 'blocked'
            $table->string('name'); // Nombre legible
            $table->string('color')->default('#CCCCCC'); // Color para UI (hex)
            $table->text('description')->nullable();
            $table->boolean('allows_sale')->default(false); // ¿Se puede vender?
            $table->boolean('requires_maintenance')->default(false); // ¿Requiere mantenimiento?
            $table->boolean('is_critical')->default(false); // ¿Estado crítico que requiere atención?
            $table->timestamps();
            
            $table->unique(['tenant_id', 'code']);
        });

        // Tabla principal: crypts (Criptas, nichos, mausoleos, osarios)
        Schema::create('crypts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained()->onDelete('cascade');
            $table->foreignId('cemetery_id')->constrained()->onDelete('cascade');
            $table->foreignId('section_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('block_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('level_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('crypt_type_id')->constrained()->onDelete('restrict');
            $table->foreignId('crypt_status_id')->constrained()->onDelete('restrict');
            
            // Identificación única
            $table->string('code'); // Código único de la cripta: A-B1-N1-C001
            $table->string('qr_code')->nullable()->unique(); // Código QR para identificación física
            
            // Características físicas
            $table->integer('capacity')->default(1); // Capacidad total (1-6)
            $table->integer('current_occupancy')->default(0); // Ocupación actual
            $table->string('dimensions')->nullable(); // Dimensiones: "2.0m x 1.0m x 1.5m"
            $table->enum('door_type', ['none', 'marble', 'granite', 'glass', 'metal'])->default('none');
            $table->text('observations')->nullable();
            
            // Pricing
            $table->decimal('price', 12, 2)->default(0);
            $table->decimal('maintenance_fee', 12, 2)->default(0); // Cuota de mantenimiento anual
            
            // Estados críticos (RN-03, RN-04)
            $table->boolean('is_blocked')->default(false); // Bloqueo por mora (RN-04)
            $table->string('blocked_reason')->nullable(); // Razón del bloqueo
            $table->timestamp('blocked_at')->nullable();
            $table->foreignId('blocked_by_user_id')->nullable()->constrained('users')->nullOnDelete();
            
            $table->boolean('is_in_decay_process')->default(false); // En proceso de decadencia (RN-03)
            $table->timestamp('decay_started_at')->nullable();
            $table->timestamp('decay_notified_at')->nullable();
            
            // Control
            $table->boolean('is_active')->default(true);
            $table->json('features')->nullable(); // Características adicionales (ventilación, iluminación, etc.)
            $table->timestamps();
            $table->softDeletes();
            
            // Índices críticos
            $table->unique(['tenant_id', 'code']);
            $table->index(['tenant_id', 'crypt_status_id', 'is_active']);
            $table->index(['tenant_id', 'cemetery_id', 'section_id', 'block_id', 'level_id']);
            $table->index(['is_blocked', 'is_in_decay_process']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crypts');
        Schema::dropIfExists('crypt_statuses');
        Schema::dropIfExists('crypt_types');
    }
};
