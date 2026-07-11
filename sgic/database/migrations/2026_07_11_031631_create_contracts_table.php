<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Contratos - Vinculan clientes con criptas y establecen términos de venta
     * Esenciales para RN-02 (ventas) y RN-04 (bloqueos por mora)
     */
    public function up(): void
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained()->onDelete('cascade');
            $table->foreignId('client_id')->constrained()->onDelete('restrict');
            $table->foreignId('crypt_id')->constrained()->onDelete('restrict');
            $table->foreignId('user_id')->constrained()->onDelete('set null'); // Usuario que realizó la venta
            
            // Información del contrato
            $table->string('contract_number')->unique(); // Número de contrato único
            $table->date('contract_date'); // Fecha de firma
            $table->enum('status', ['active', 'cancelled', 'expired', 'pending'])->default('active');
            
            // Términos financieros
            $table->decimal('total_amount', 12, 2); // Monto total de la venta
            $table->decimal('paid_amount', 12, 2)->default(0); // Monto pagado
            $table->integer('installments_total')->default(1); // Número total de cuotas
            $table->integer('installments_paid')->default(0); // Cuotas pagadas
            $table->date('first_payment_date'); // Fecha de primer pago
            $table->date('last_payment_date')->nullable(); // Fecha límite de pago
            
            // Condiciones especiales
            $table->text('conditions')->nullable(); // Condiciones adicionales
            $table->boolean('has_insurance')->default(false); // ¿Incluye seguro?
            $table->decimal('insurance_amount', 12, 2)->default(0); // Monto del seguro
            
            // Control
            $table->timestamp('cancelled_at')->nullable();
            $table->string('cancellation_reason')->nullable();
            $table->foreignId('cancelled_by_user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
            
            // Índices
            $table->index(['tenant_id', 'status']);
            $table->index(['tenant_id', 'client_id']);
            $table->index(['tenant_id', 'crypt_id']);
            $table->index('contract_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
