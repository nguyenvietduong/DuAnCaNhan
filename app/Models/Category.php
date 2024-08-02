<?php

namespace App\Models;

use App\Traits\QueryScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, QueryScopes;

    protected $fillable = [
        'name',
        'image',
        'publish',
        'slug',
        'description',
    ];

    protected $table = 'categories';

    public function article()
    {
        return $this->hasMany(Article::class);
    }
}
