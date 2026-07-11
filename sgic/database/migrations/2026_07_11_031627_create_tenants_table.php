<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Tabla principal para multi-tenancy (Single DB + tenant_id)
     * Cada cementerio/empresa es un tenant independiente
     */
    public function up(): void
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre del cementerio/empresa
            $table->string('rfc')->nullable(); // RFC para facturación
            $table->string('subdomain')->unique(); // Subdominio para identificación
            $table->enum('plan', ['basic', 'professional', 'enterprise'])->default('basic');
            $table->integer('grace_period_days')->default(30); // Días de gracia para decadencia (RN-03)
            $table->integer('debt_months_threshold')->default(3); // Meses de deuda para bloqueo (RN-04)
            $table->decimal('interest_rate', 5, 2)->default(1.5); // Tasa de interés moratorio mensual
            $table->boolean('is_active')->default(true);
            $table->json('settings')->nullable(); // Configuración específica del tenant
            $table->timestamp('subscription_expires_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            // Índices para rendimiento
            $table->index('subdomain');
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
