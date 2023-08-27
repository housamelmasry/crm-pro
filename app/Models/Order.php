<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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


    public function client(): BelongsTo
    {
      return $this->belongsTo(Client::class);
    }


    public function user(): BelongsTo
    {
      return $this->belongsTo(User::class);
    }

    public function proposal(): BelongsTo
    {
        return $this->belongsTo(Proposal::class);
    }


}
