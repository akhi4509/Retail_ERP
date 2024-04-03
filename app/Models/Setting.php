<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $fillable = [
        'business_name',
        'business_address',
        'business_phone_no',
        'gst_no',
        'sales_profit',
        'discount',
        'cgst',
        'sgst'
    ];
    // protected $attributes = [
    //     'business_name' => 'Default Business Name',
    // ];
}
