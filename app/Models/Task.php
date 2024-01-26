<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Add 'user_id' to the fillable array
        'worker_id',
        'date',
        'time',
        'end_time',   // Add end_time to fillable
        'status',
        'availability', // Add this line
        'total',

    ];

    public function address(){
        return $this->hasMany(Address::class,'task_id','id');
    }

    public function worker()
    {
        return $this->belongsTo(Worker::class, 'worker_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
