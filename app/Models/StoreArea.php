<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreArea extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'area_name',
    ];

    protected $hidden = [];

    /**
     * Get all of the comments for the StoreArea
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function store()
    {
        return $this->hasMany(Store::class);
    }
}
