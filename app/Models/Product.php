<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function proposal():BelongsTo
    {
        return $this->belongsTo(Proposal::class);
    }

}
