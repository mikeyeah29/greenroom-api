<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_tier_id',
        'billing_type',
        'name',
        'logo',
        'enable',
        'billing_price',
        'address_line_1',
        'address_line_2',
        'city',
        'country',
        'postal_code'
    ];
}
