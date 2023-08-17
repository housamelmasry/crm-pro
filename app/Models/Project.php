<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'description',
        'start_Date',
        'end_Date',
        'priority',
        'progress',
        'status',
        'location',
        'type',
        'department',
        'added_By',
        'client_ID',
        'company_ID',
    ];


    public function client(): BelongsToMany
    {
        return $this->belongsToMany(Client::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function category(): HasMany
    {
        return $this->hasMany(Category::class);
    }


    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }

}
