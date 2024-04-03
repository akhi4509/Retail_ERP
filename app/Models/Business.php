<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Business extends Model
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
    use HasFactory;
}
