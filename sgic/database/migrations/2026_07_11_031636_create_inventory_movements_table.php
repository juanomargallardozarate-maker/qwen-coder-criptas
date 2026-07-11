<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Inventory Movements - Control de entradas y salidas de inventario
     * Esencial para gestión de materiales, herramientas y suministros del cementerio
     */
    public function up(): void
    {
        Schema::create('inventory_movements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained()->onDelete('cascade');
            $table->foreignId('location_id')->nullable()->constrained()->onDelete('set null'); // Ubicación de almacén
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete(); // Usuario que realizó el movimiento
            
            // Tipo de movimiento
            $table->enum('type', ['in', 'out', 'transfer', 'adjustment', 'return'])->default('in');
            $table->string('reference')->unique(); // Referencia única del movimiento
            
            // Item
            $table->string('item_name'); // Nombre del item
            $table->string('item_code')->nullable(); // Código/SKU del item
            $table->text('description')->nullable();
            $table->string('category')->nullable(); // Categoría del item
            $table->string('unit')->default('piece'); // Unidad de medida (pieza, kg, litro, etc.)
            
            // Cantidades
            $table->integer('quantity'); // Cantidad movida
            $table->integer('previous_balance')->default(0); // Balance anterior
            $table->integer('new_balance')->default(0); // Nuevo balance después del movimiento
            
            // Costos
            $table->decimal('unit_cost', 12, 2)->default(0);
            $table->decimal('total_cost', 12, 2)->default(0);
            
            // Información adicional
            $table->string('supplier')->nullable(); // Proveedor (para entradas)
            $table->string('responsible')->nullable(); // Responsable (para salidas)
            $table->text('observations')->nullable();
            $table->date('movement_date'); // Fecha del movimiento
            
            $table->timestamps();
            $table->softDeletes();
            
            // Índices
            $table->index(['tenant_id', 'type']);
            $table->index(['tenant_id', 'location_id']);
            $table->index(['tenant_id', 'movement_date']);
            $table->index('reference');
            $table->index('item_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_movements');
    }
};
