<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class ProductVariant extends Model
{
    use HasFactory;
    
    protected $table = "product_variants";

    protected $guarded = [];

    public function variant_stock()
    {
        return $this->hasMany(VariantStock::class, 'variant_main_id', 'id');
    }

    public function product_join()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }

    public function detail($value='')
    {
        return $this->hasMany(ProductDetail::class, 'variant_id', 'id');
    }
    public function variantmedia($value='')
    {
        return $this->hasMany(VariantMedia::class, 'variant_id', 'id');
    }

}
