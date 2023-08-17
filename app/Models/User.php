<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'password',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function client() : HasMany
    {
        return $this->hasMany(Client::class);
    }


    public function project() : HasMany
    {
        return $this->hasMany(Project::class);
    }


    public function company() : HasMany
    {
        return $this->hasMany(Company::class);
    }


    public function proposal() : HasMany
    {
        return $this->hasMany(Proposal::class);
    }


    public function order() : HasMany
    {
        return $this->hasMany(Order::class);
    }


    public function category() : HasMany
    {
        return $this->hasMany(Category::class);
    }


    public function product() : HasMany
    {
        return $this->hasMany(Product::class);
    }






}
