<?php

namespace App\Repositories;

use App\Models\Article;
use App\Repositories\Interfaces\SearchRepositoryInterface;
use App\Repositories\BaseRepository;

/**
 * Class UserService
 * @package App\Services
 */
class SearchRepository extends BaseRepository implements SearchRepositoryInterface
{
    protected $model;

    public function __construct(
        Article $model
    ) {
        $this->model = $model;
    }

    public function search($keyword, $paginate = null)
    {
        return Article::where   ('name'         , 'LIKE', "%{$keyword}%")
            ->orWhere           ('content'      , 'LIKE', "%{$keyword}%")
            ->orWhere           ('slug'         , 'LIKE', "%{$keyword}%")
            ->orWhere           ('summary'      , 'LIKE', "%{$keyword}%")
            ->paginate($paginate ?? 5);
    }
}
