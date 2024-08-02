<?php

namespace App\Services;

use App\Services\Interfaces\SearchServiceInterface;
use App\Repositories\Interfaces\SearchRepositoryInterface as SearchRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

/**
 * Class SearchService
 * @package App\Services
 */
class SearchService extends BaseService implements SearchServiceInterface
{
    protected $searchRepository;


    public function __construct(
        SearchRepository $searchRepository
    ) {
        $this->searchRepository = $searchRepository;
    }



    public function searchArticles($keyword)
    {
        return $this->searchRepository->search($keyword);
    }
}
