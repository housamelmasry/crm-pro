<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'financial_notes',
        'payment_terms',
        'offer_validity',
        'delivery_terms',
        'warranty',
        'client_ID',
        'company_ID',
        'signatures',
        'stamp',
        'order_ID',
    ];



    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function project(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    //has many categories and products

    public function category(): HasMany
    {
        return $this->hasMany(Category::class);
    }


    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }



}
