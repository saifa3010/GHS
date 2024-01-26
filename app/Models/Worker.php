<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class worker extends Model
{
    use HasFactory;


    protected $casts = [
        'work_image' => 'array',
    ];
    protected $fillable = [
        'firstName','lastName',
        'phone_number','city',
        'image','description','profession',
        'skillsExperience','aboutMe',
        'work_image','price','minHour',
        'category_id','user_id',

];

public function user()
{
    return $this->belongsTo(User::class);
}

// Relationship with Category
public function category()
{
    return $this->belongsTo(Category::class);
}

// public function comments()
//     {
//         return $this->hasMany(Comment::class,'worker_id','id');
//     }
public function tasks()
{
    return $this->hasMany(Task::class);
}

public function comments()
{
    return $this->hasMany(Comment::class);


}

public function averageRating()
    {
        return $this->comments()->where('approved', true)->avg('rating');
    }
}
