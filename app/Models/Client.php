<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'country',
        'city',
        'phone',
        'email',
        'website',
        'contact_Person',
        'contact_Person_Phone',
        'added_by',
    ];



    public function project(): HasMany
    {
        return $this->hasMany(Project::class);
    }


    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function proposal(): HasMany
    {
        return $this->hasMany(Proposal::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
