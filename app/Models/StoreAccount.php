<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreAccount extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'account_name',
    ];

    protected $hidden = [];

    /**
     * Get all of the comments for the StoreAccount
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function store()
    {
        return $this->hasMany(Store::class);
    }
}
