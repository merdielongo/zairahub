<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonType extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name_fr',
        'name_en',
    ];

    public function people(): HasMany
    {
        return $this->hasMany(Person::class);
    }
}
