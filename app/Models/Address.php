<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'task_id',
        'firstName',
        'lastName',
        'email',
        'phone_number',
        'street_address',
        'city',
        'zip',
        'postal_code',
    ];

    public function tasks()
    {
        return $this->belongsTo(Task::class,'task_id','id');
    }
}
