<?php

namespace App\Repositories;

use App\Models\Tour;
use App\Repositories\Interfaces\TourRepositoryInterface;
use App\Repositories\BaseRepository;

/**
 * Class UserService
 * @package App\Services
 */
class TourRepository extends BaseRepository implements TourRepositoryInterface
{
    protected $model;

    public function __construct(
        Tour $model
    ) {
        $this->model = $model;
    }

}
