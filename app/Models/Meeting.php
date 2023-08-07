<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;
    protected $fillable = [
        // 'date',
        // 'time',
        'reference',
        'type',
        'notes',
        'company_ID',

];

}
