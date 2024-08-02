<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ArticleRepositoryInterface as ArticleRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface as CategoryRepository;
use App\Repositories\Interfaces\TagRepositoryInterface as TagRepository;
use App\Services\Interfaces\ArticleServiceInterface as ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $articleService;
    protected $articleRepository;
    protected $categoryRepository;
    protected $tagRepository;


    public function __construct(
        ArticleService $articleService,
        ArticleRepository $articleRepository,
        CategoryRepository $categoryRepository,
        TagRepository $tagRepository,
    ) {
        $this->articleService       = $articleService;
        $this->articleRepository    = $articleRepository;
        $this->categoryRepository   = $categoryRepository;
        $this->tagRepository        = $tagRepository;
    }

    public function index(Request $request)
    {
        //
        $config['model']            = 'Article';
        $config['seo']              = config('apps.messages.article');
        $articles                   = $this->articleService->paginate($request);

        return view('backend.article.index', compact('config', 'articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $config['model']            = 'Article';
        $config['seo']              = config('apps.messages.article');
        $categories                 = $this->categoryRepository->all();
        $tags                       = $this->tagRepository->all();
        return view('backend.article.create', compact('config', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($this->articleService->create($request)) {
            return redirect()->route('article.index')->with('success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->route('article.index')->with('error', 'Thêm mới bản ghi không thành công. Hãy thử lại');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $config['model']            = 'Article';
        $config['seo']              = config('apps.messages.article');
        $categories                 = $this->categoryRepository->all();
        $article                    = $this->articleRepository->findById($id);
        $tags                       = $this->tagRepository->all();
        
        return view('backend.article.edit', compact('article', 'config', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if ($this->articleService->update($id, $request)) {
            return redirect()->route('article.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('article.index')->with('error', 'Cập nhật bản ghi không thành công. Hãy thử lại');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        // $this->authorize('modules', 'user.delete');
        $config['seo']      = config('apps.messages.article');
        $article            = $this->articleRepository->findById($id);
        return view('backend.article.delete', compact('article', 'config', ));
    }

    public function destroy($id)
    {
        if ($this->articleService->destroy($id)) {
            return redirect()->route('article.index')->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('article.index')->with('error', 'Xóa bản ghi không thành công. Hãy thử lại');
    }
}
