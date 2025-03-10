<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'value',
        'is_verified',
        'verified_at',
        'verification_code',
        'verification_code_expires_at',
    ];

    protected function casts(): array
    {
        return [
            'is_verified' => 'bool',
            'verified_at' => 'datetime',
            'verification_code_expires_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
