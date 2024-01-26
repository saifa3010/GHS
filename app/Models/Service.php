<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name','image', 'description'];


    public function categories(){
        return $this->hasMany(Category::class,'service_id','id');
    }

}
