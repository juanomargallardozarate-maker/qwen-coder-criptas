<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Pagos - Registro de pagos realizados por clientes
     * Vinculados a contratos y criptas, esenciales para RN-04 (bloqueos por mora)
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained()->onDelete('cascade');
            $table->foreignId('contract_id')->constrained()->onDelete('restrict');
            $table->foreignId('client_id')->constrained()->onDelete('restrict');
            $table->foreignId('crypt_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete(); // Usuario que registró el pago
            
            // Información del pago
            $table->string('reference')->unique(); // Referencia única del pago
            $table->date('payment_date'); // Fecha del pago
            $table->enum('payment_method', ['cash', 'credit_card', 'debit_card', 'bank_transfer', 'check', 'other'])->default('cash');
            $table->string('payment_details')->nullable(); // Detalles adicionales (número de tarjeta, cheque, etc.)
            
            // Montos
            $table->decimal('amount', 12, 2); // Monto pagado
            $table->decimal('interest_amount', 12, 2)->default(0); // Intereses moratorios
            $table->decimal('discount_amount', 12, 2)->default(0); // Descuentos aplicados
            $table->decimal('total_amount', 12, 2); // Total (amount + interest - discount)
            
            // Periodo que cubre
            $table->integer('installment_number')->nullable(); // Número de cuota que paga
            $table->date('period_start')->nullable(); // Inicio del periodo que cubre
            $table->date('period_end')->nullable(); // Fin del periodo que cubre
            
            // Estado
            $table->enum('status', ['pending', 'approved', 'rejected', 'cancelled'])->default('pending');
            $table->text('observations')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->foreignId('approved_by_user_id')->nullable()->constrained('users')->nullOnDelete();
            
            // Control
            $table->timestamps();
            $table->softDeletes();
            
            // Índices
            $table->index(['tenant_id', 'contract_id']);
            $table->index(['tenant_id', 'client_id']);
            $table->index(['tenant_id', 'payment_date']);
            $table->index(['tenant_id', 'status']);
            $table->index('reference');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
