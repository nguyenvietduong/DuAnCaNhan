<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\SearchRepositoryInterface as SearchRepository;
use App\Services\Interfaces\SearchServiceInterface as SearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected $searchService;
    protected $searchRepository;
    public function __construct(
        SearchService $searchService,
        SearchRepository $searchRepository
    ) {
        $this->searchService = $searchService;
        $this->searchRepository = $searchRepository;
    }

    public function index(Request $request)
    {
        $keyword = $request->input('search');
        $articles = $this->searchService->searchArticles($keyword);

        return view('frontend.search', compact('keyword', 'articles'));
    }

}
