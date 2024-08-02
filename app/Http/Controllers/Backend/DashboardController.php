<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\ArticleRepositoryInterface as ArticleRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface as CategoryRepository;

class DashboardController extends Controller
{
    protected $articleRepository;
    protected $categoryRepository;

    public function __construct(
        ArticleRepository $articleRepository,
        CategoryRepository $categoryRepository,
    ) {
        $this->articleRepository        = $articleRepository;
        $this->categoryRepository       = $categoryRepository;
    }
    public function index()
    {
        $countArticles                  = $this->articleRepository->count();
        $countCategory                  = $this->categoryRepository->count();

        return view('backend.dashboard.index', compact('countArticles', 'countCategory'));
    }
}
