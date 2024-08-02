<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Controller\StoreCategoryRequest;
use App\Http\Requests\Controller\UpdateCategoryRequest;
use App\Repositories\Interfaces\CategoryRepositoryInterface as CategoryRepository;
use App\Services\Interfaces\CategoryServiceInterface as CategoryService;
use Illuminate\Http\Request;

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

    public function index(Request $request)
    {
        $config['model'] = 'Category';
        $config['seo'] = config('apps.messages.category');
        $categories = $this->categoryService->paginate($request);
        return view('backend.category.index', compact('config', 'categories'));
    }

    public function create()
    {
        $config['model'] = 'Category';
        $config['seo'] = config('apps.messages.category');
        return view('backend.category.create', compact('config'));
    }


    public function store(StoreCategoryRequest $request)
    {
        if ($this->categoryService->create($request)) {
            return redirect()->route('category.index')->with('success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->route('category.index')->with('error', 'Thêm mới bản ghi không thành công. Hãy thử lại');
    }


    public function edit($id)
    {
        $config['model'] = 'Category';
        $config['seo'] = config('apps.messages.category');
        $category = $this->categoryRepository->findById($id);
        return view('backend.category.edit', compact('category', 'config'));
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        if ($this->categoryService->update($id, $request)) {
            return redirect()->route('category.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('category.index')->with('error', 'Cập nhật bản ghi không thành công. Hãy thử lại');
    }


    public function delete($id)
    {
        // $this->authorize('modules', 'user.delete');
        $config['seo'] = config('apps.messages.category');
        $category = $this->categoryRepository->findById($id);
        return view('backend.category.delete', compact('category', 'config', ));
    }

    public function destroy($id)
    {
        if ($this->categoryService->destroy($id)) {
            return redirect()->route('category.index')->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('category.index')->with('error', 'Xóa bản ghi không thành công. Hãy thử lại');
    }

}
