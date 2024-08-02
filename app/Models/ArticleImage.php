<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'article_id',
        'image_url'
    ];

    public function articlesImage()
    {
        return $this->belongsTo(Article::class);
    }
}
