<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'store_name',
        'store_account_id',
        'store_area_id',
        'is_active'
    ];

    protected $hidden = [];

    /**
     * Get the user that owns the Store
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function store_account()
    {
        return $this->belongsTo(StoreAccount::class, 'store_account_id');
    }

    /**
     * Get the user that owns the Store
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function store_area()
    {
        return $this->belongsTo(StoreArea::class, 'store_area_id');
    }

    /**
     * Get all of the comments for the Store
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function report_product()
    {
        return $this->hasMany(ReportProduct::class);
    }
}
