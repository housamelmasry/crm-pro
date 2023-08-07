<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = [
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

protected $guarded = [


];

}
