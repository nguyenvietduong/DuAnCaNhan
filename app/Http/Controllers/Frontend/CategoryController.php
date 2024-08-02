<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\CategoryRepositoryInterface as CategoryRepository;
use App\Services\Interfaces\CategoryServiceInterface as CategoryService;

class CategoryController extends Controller
{

    protected $categoryService;
    protected $categoryRepository;
    public function __construct(
        CategoryService $categoryService,
        CategoryRepository $categoryRepository
    ) {
        $this->categoryService = $categoryService;
        $this->categoryRepository = $categoryRepository;
    }
    public function index($id)
    {
        $category           = $this->categoryRepository->findById($id);
        $articles           = $category->article()->paginate(2);

        return view('frontend.category', compact('category', 'articles'));
    }
}
