<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use App\Repositories\BaseRepository;

/**
 * Class AdminRepository
 * @package App\Services
 */
class AdminRepository extends BaseRepository implements AdminRepositoryInterface
{
    protected $model;

    public function __construct(
        User $model
    )
    {
        $this->model = $model;
    }
}
