<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class OfferPaymentPlan extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'offer_id',
        'amount',
        'proportion',
        'reduction_percent',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'float',
            'proportion' => 'float',
        ];
    }

    public function offer(): BelongsTo
    {
        return $this->belongsTo(Offer::class);
    }
}
