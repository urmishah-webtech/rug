<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class order_item extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function order_product()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
    public function media_product()
    {
        return $this->hasMany(ProductMedia::class, 'product_id', 'product_id');
    }
    public function order()
    {
        return $this->hasOne(Orders::class, 'id', 'order_id');
    }
}
