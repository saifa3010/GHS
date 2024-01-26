<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taskv extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'worker_id',
        'date',
        'status',
    ];
}
