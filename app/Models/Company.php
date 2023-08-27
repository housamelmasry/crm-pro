<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $fillable =
    [

        'name',
        // 'type_of_Business'
    ];


    public function client(): HasMany
    {
        return $this->hasMany(Client::class);
    }

    public function project(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function meeting(): HasMany
    {
        return $this->hasMany(Meeting::class);
    }

    public function proposal(): HasMany
    {
        return $this->hasMany(Proposal::class);
    }

    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function category(): HasMany
    {
        return $this->hasMany(Category::class);
    }
    
    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
