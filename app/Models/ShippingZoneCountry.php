<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingZoneCountry extends Model
{
    use HasFactory;
    
    protected $table = "shipping_zone_country";

    protected $guarded =[];
}
