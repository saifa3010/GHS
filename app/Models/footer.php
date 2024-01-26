<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class footer extends Model
{
    use HasFactory;
    protected $fillable = [
        'email_company',
        'phone_company',
        'location_company',
        'image',
        'text',
        'copy_right',
    ];
}
