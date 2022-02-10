<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingInfo extends Model
{
    use HasFactory;

    protected $table = "shipping_info";

    protected $fillable = ['user_id','first_name','last_name','address','city','country','state','zip_code','email','phone'];
}
