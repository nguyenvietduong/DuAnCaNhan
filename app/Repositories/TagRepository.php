<?php

namespace App\Repositories;

use App\Models\Tag;
use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Repositories\BaseRepository;

/**
 * Class UserService
 * @package App\Services
 */
class TagRepository extends BaseRepository implements TagRepositoryInterface
{
    protected $model;

    public function __construct(
        Tag $model
    ) {
        $this->model = $model;
    }

}
