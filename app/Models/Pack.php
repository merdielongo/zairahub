<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pack extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name_fr',
        'name_en',
    ];

    public function packOffers(): HasMany
    {
        return $this->hasMany(PackOffer::class);
    }

    public function offers(): BelongsToMany
    {
        return $this->belongsToMany(Offer::class, 'pack_offers', 'pack_id', 'offer_id');
    }

    public function offerOptions(): HasMany
    {
        return $this->hasMany(OfferOption::class);
    }

    public function packExtensions(): HasMany
    {
        return $this->hasMany(PackExtension::class);
    }

    public function packConsumptions(): HasMany
    {
        return $this->hasMany(PackConsumption::class);
    }

}
