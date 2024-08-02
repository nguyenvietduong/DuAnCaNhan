<?php

namespace App\Repositories;

use App\Models\ArticleImage;
use App\Repositories\Interfaces\ArticlesImageRepositoryInterface;
use App\Repositories\BaseRepository;

/**
 * Class ArticlesImageRepository
 * @package App\Services
 */
class ArticlesImageRepository extends BaseRepository implements ArticlesImageRepositoryInterface
{
    protected $model;

    public function __construct(
        ArticleImage $model
    ) {
        $this->model = $model;
    }

}
