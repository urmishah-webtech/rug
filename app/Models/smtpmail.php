<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class smtpmail extends Model
{
	use HasFactory;
	
	protected $table = "smtpmail";
    protected $guarded = [];
}
