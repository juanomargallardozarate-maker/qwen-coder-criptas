<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tenant extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'rfc',
        'subdomain',
        'plan',
        'grace_period_days',
        'debt_months_threshold',
        'interest_rate',
        'is_active',
        'settings',
        'subscription_expires_at',
    ];

    protected $casts = [
        'settings' => 'array',
        'is_active' => 'boolean',
        'grace_period_days' => 'integer',
        'debt_months_threshold' => 'integer',
        'interest_rate' => 'decimal:2',
        'subscription_expires_at' => 'datetime',
    ];

    /**
     * Relaciones
     */
    public function cemeteries(): HasMany
    {
        return $this->hasMany(Cemetery::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function clients(): HasMany
    {
        return $this->hasMany(Client::class);
    }

    public function contracts(): HasMany
    {
        return $this->hasMany(Contract::class);
    }

    public function crypts(): HasMany
    {
        return $this->hasMany(Crypt::class);
    }

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function maintenances(): HasMany
    {
        return $this->hasMany(Maintenance::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }

    public function inventoryMovements(): HasMany
    {
        return $this->hasMany(InventoryMovement::class);
    }

    public function auditLogs(): HasMany
    {
        return $this->hasMany(AuditLog::class);
    }

    public function locations(): HasMany
    {
        return $this->hasMany(Location::class);
    }

    public function cryptTypes(): HasMany
    {
        return $this->hasMany(CryptType::class);
    }

    public function cryptStatuses(): HasMany
    {
        return $this->hasMany(CryptStatus::class);
    }
}
