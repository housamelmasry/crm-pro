<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meeting extends Model
{
    use HasFactory;
    protected $fillable =
    [
        // 'date',
        // 'time',
        'reference',
        'type',
        'notes',
        'company_ID',

    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

}
