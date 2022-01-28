<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function user()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
    public function UserOrder()
    {
        return $this->hasMany(order_item::class, 'user_id', 'user_id');
    }

    
}
