<?php

    namespace App\Repositories;

    use App\Models\Service;
    use App\Repositories\Interfaces\ServiceRepositoryInterface;
    use App\Repositories\BaseRepository;

    /**
     * Class UserService
     * @package App\Services
     */
    class ServiceRepository extends BaseRepository implements ServiceRepositoryInterface
    {
        protected $model;

        public function __construct(
            Service $model
        ) {
            $this->model = $model;
        }

    }