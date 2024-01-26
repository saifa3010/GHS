<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['body', 'user_id', 'worker_id','approved','rating'];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function worker()
    {
        return $this->belongsTo(Worker::class,'worker_id','id');
    }

}
