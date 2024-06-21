<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'category','slug', 'author','editor', 'image1','image2','image3','image4','caption', 'created_at'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
public function category()
{
    return $this->belongsTo(Category::class);
}


}
