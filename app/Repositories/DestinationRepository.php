<?php

namespace App\Repositories;

use App\Models\Destination;
use App\Repositories\Interfaces\DestinationRepositoryInterface;
use App\Repositories\BaseRepository;

/**
 * Class UserService
 * @package App\Services
 */
class DestinationRepository extends BaseRepository implements DestinationRepositoryInterface
{
    protected $model;

    public function __construct(
        Destination $model
    ) {
        $this->model = $model;
    }

}
