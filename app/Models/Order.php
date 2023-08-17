<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'payment_method',
        'value',
        'status',
    ];

    public function product(): HasMany
    {
      return $this->hasMany(Product::class);
    }


    public function company(): BelongsTo
    {
      return $this->belongsTo(Company::class);
    }


    public function client(): BelongsTo
    {
      return $this->belongsTo(Client::class);
    }


    public function user(): BelongsTo
    {
      return $this->belongsTo(User::class);
    }




}
