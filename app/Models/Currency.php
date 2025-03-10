<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'symbol',
        'prefix',
    ];

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

    public function offerPayments(): HasMany
    {
        return $this->hasMany(OfferPayment::class);
    }
}
