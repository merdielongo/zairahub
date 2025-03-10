<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name_fr',
        'name_en',
        'description_fr',
        'description_en',
        'options',
        'price',
        'discount',
        'currency_id',
        'is_trial',
        'status',
    ];

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function packOffers(): HasMany
    {
        return $this->hasMany(PackOffer::class);
    }

    public function packs(): BelongsToMany
    {
        return $this->belongsToMany(Pack::class, 'pack_offers');
    }

    public function offerPaymentPlans(): HasMany
    {
        return $this->hasMany(OfferPaymentPlan::class);
    }

    public function offerOptions(): HasMany
    {
        return $this->hasMany(OfferOption::class);
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }
}
