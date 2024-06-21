<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\News;


class Comment extends Model
{
    use HasFactory;


        // Adjust the relationship
        protected $fillable = ['user_id', 'news_id', 'content'];

        public function user()
        {
            return $this->belongsTo(User::class);
        }


        public function news()
        {
            return $this->belongsTo(News::class);
        }
        public function front()
        {
            return $this->belongsTo(Front::class);
        }


}
