<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryApplication extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name_fr',
        'name_en',
    ];

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }
}
