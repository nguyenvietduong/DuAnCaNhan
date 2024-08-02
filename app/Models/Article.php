<?php

namespace App\Models;

use App\Traits\QueryScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, QueryScopes, SoftDeletes;



    protected $fillable = [
        'id',
        'name',
        'slug',
        'content',
        'summary',
        'views',
        'likes',
        'shares',
        'comments_count',
        'user_id',
        'category_id',
        'publish',
        'deleted_at',
    ];

    protected $table = 'articles';

    // Định nghĩa scope để truy vấn bài viết "hot"
    public function scopeHot($query)
    {
        return $query->orderBy('views', 'desc')
            ->orderBy('likes', 'desc')
            ->orderBy('shares', 'desc');
    }

    // Định nghĩa scope để truy vấn bài viết "xu hướng"
    public function scopeTrending($query)
    {
        $weekAgo = now()->subWeek();
        return $query->where('created_at', '>=', $weekAgo)
            ->orderBy('views', 'desc')
            ->orderBy('likes', 'desc')
            ->orderBy('shares', 'desc');
    }

    // Scope để lấy các bài viết phổ biến.
    public function scopePopular($query)
    {
        return $query->orderBy('views', 'desc')
                     ->orderBy('likes', 'desc')
                     ->orderBy('shares', 'desc');
    }

    // Định nghĩa bài viết gần đây theo created_at
    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tags', 'article_id', 'tag_id');
    }

    public function articlesImage()
    {
        return $this->hasOne(ArticleImage::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
