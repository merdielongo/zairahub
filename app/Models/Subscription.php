<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'organization_id',
        'offer_id',
        'start_at',
        'end_at',
        'state',
    ];

    public function offer(): BelongsTo
    {
        return $this->belongsTo(Offer::class);
    }

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function authorizedAccounts(): HasMany
    {
        return $this->hasMany(AuthorizedAccount::class);
    }

    public function packConsumptions(): HasMany
    {
        return $this->hasMany(PackConsumption::class);
    }
}
