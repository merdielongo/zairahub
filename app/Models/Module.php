<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'label_fr',
        'label_en',
        'status',
        'name',
        'description_fr',
        'description_en',
        'order',
    ];

    protected function casts()
    {
        return [
            'order' => 'integer',
        ];
    }

    public function dependencies(): HasMany
    {
        return $this->hasMany(Dependency::class);
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }
}
