<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        // Lấy các bài viết "hot"
        $hotPosts       = Article::hot()->take(1)->get();

        // Lấy các bài viết "xu hướng" trong tuần qua
        $trendingPosts  = Article::trending()->take(5)->get();

        $popularPosts   = Article::popular()->take(2)->get();

        return view('frontend.index', compact('hotPosts', 'trendingPosts', 'popularPosts'));
    }
}
