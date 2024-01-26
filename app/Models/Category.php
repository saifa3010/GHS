<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Queue\Worker;

// use App\Models\Service;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'service_id'];

    public function service(){
        return $this->belongsTo(Service::class,'service_id','id');
    }


    public function workers()
    {
        return $this->hasMany(Worker::class, 'category_id', 'id');
    }
}
