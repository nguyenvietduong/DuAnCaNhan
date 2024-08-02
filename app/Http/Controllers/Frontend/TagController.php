<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\TagRepositoryInterface as TagRepository;
use App\Services\Interfaces\TagServiceInterface as TagService;

class TagController extends Controller
{

    protected $tagService;
    protected $tagRepository;
    public function __construct(
        TagService $tagService,
        TagRepository $tagRepository
    ) {
        $this->tagService = $tagService;
        $this->tagRepository = $tagRepository;
    }
    public function index($id)
    {
        $tag        = $this->tagRepository->findById($id);
        $articles   = $tag->articles()->paginate(2);

        return view('frontend.tag', compact('tag', 'articles'));
    }
}
