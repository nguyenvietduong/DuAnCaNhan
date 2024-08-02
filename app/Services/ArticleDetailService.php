<?php

namespace App\Services;

use App\Services\Interfaces\ArticleDetailServiceInterface;
use App\Repositories\Interfaces\ArticleDetailRepositoryInterface as ArticleDetailRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

/**
 * Class ArticleDetailService
 * @package App\Services
 */
class ArticleDetailService implements ArticleDetailServiceInterface
{
    protected $articleDetailRepository;


    public function __construct(
        ArticleDetailRepository $articleDetailRepository
    ) {
        $this->articleDetailRepository = $articleDetailRepository;
    }

    public function getArticleDetail($id)
    {
        return $this->articleDetailRepository->findById($id);
    }
}
