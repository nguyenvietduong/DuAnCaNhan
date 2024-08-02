<?php

namespace App\Repositories;

use App\Models\Article;
use App\Repositories\Interfaces\ArticleDetailRepositoryInterface;

/**
 * Class UserService
 * @package App\Services
 */
class ArticleDetailRepository implements ArticleDetailRepositoryInterface
{
    protected $model;

    public function __construct(
        Article $model
    ) {
        $this->model = $model;
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }
}
