<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrganizationType extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name_fr',
        'name_en',
    ];

    public function organizations(): HasMany
    {
        return $this->hasMany(Organization::class);
    }
}
