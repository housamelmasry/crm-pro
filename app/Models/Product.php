<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'category_id',
        'available_qty',
        'price',
        'cost',
        'brand',
        'status',
        'last_order_date',
        'date_added',
        'added_by',
        'company_id',
        'price',

    ];

    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }


}
