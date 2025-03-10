<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeamInvitation extends Model
{
    protected $fillable = [
        'organization_id',
        'email',
        'accepted_at',
        'expired_at',
    ];

    protected function casts(): array
    {
        return [
            'accepted_at' => 'datetime',
            'expired_at' => 'datetime',
        ];
    }

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }
}
