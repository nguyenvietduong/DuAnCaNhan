<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\EditorRepositoryInterface;
use App\Repositories\BaseRepository;

/**
 * Class EditorRepository
 * @package App\Services
 */
class EditorRepository extends BaseRepository implements EditorRepositoryInterface
{
    protected $model;

    public function __construct(
        User $model
    )
    {
        $this->model = $model;
    }
}
