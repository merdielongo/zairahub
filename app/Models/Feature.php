<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feature extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'label_fr',
        'label_en',
        'description_fr',
        'description_en',
        'module_id',
    ];

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }
}
