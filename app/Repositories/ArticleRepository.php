<?php

namespace App\Repositories;

use App\Models\Article;
use App\Repositories\Interfaces\ArticleRepositoryInterface;
use App\Repositories\BaseRepository;

/**
 * Class UserService
 * @package App\Services
 */
class ArticleRepository extends BaseRepository implements ArticleRepositoryInterface
{
    protected $model;

    public function __construct(
        Article $model
    ) {
        $this->model = $model;
    }

}
