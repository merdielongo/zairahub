<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name_fr',
        'name_en',
        'status',
        'category_application_id',
        'module_id',
    ];

    public function categoryApplication(): BelongsTo
    {
        return $this->belongsTo(CategoryApplication::class);
    }

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }

    public function institution(): HasMany
    {
        return $this->hasMany(Installation::class);
    }
}
