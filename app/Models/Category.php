<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;


    protected $fillable =
    [
        'name',
        'parent_id',
        'description',
        'image',
        'status',
        // 'slug'
    ];

    //has many products

    public function product():HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function company():BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function proposal():BelongsTo
    {
        return $this->belongsTo(Proposal::class);
    }



}
