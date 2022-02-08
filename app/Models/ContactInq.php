<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInq extends Model
{
    use HasFactory;
    protected $table = 'contact_inqs';
    protected $fillable = [
        'first_name', 'last_name', 'email','phone','messages'
    ];
}
 