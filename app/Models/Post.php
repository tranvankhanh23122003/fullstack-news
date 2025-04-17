<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'content',
        'image',
        // 'view_counts',
        'user_id',
        'new_post',
        'slug',
        'category_id',
        'hightlight_post',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }
    public function comment()
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    public function imageUrl()
    {
        return asset('image/post/' . $this->image);
    }
}
