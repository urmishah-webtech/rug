<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Product extends Model
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
    use Uuids;
    
    protected $table = "product";

    protected $guarded =[];


    public function variants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id', 'id');
    }

    public function variant_groupby()
    {
        return $this->hasMany(ProductVariant::class, 'product_id', 'id')->groupBy(['attribute1','attribute2','attribute3']);;
    }

    public function favoriteget()
    {
        return $this->hasMany(favorite::class, 'product_id', 'id');
    }

    public function productmediaget()
    {
        return $this->hasMany(ProductMedia::class, 'product_id', 'id');
    }

    public function productDetail($value='')
    {
        return $this->hasMany(ProductDetail::class, 'product_id', 'id')->whereNULL('variant_id');
    }

    
}
