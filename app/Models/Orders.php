<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function order_items()
    {
        return $this->hasMany(order_item::class, 'order_id', 'id');
    }
    
    public function user()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
    public function UserOrder()
    {
        return $this->hasMany(order_item::class, 'user_id', 'user_id');
    }
     public function user_data()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function session_user()
    {
        return $this->hasOne(User::class, 'session_id', 'session_id');
    }



    
}
