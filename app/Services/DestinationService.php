<?php

namespace App\Services;

use App\Services\Interfaces\DestinationServiceInterface;
use App\Repositories\Interfaces\DestinationRepositoryInterface as DestinationRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

/**
 * Class DestinationService
 * @package App\Services
 */
class DestinationService extends BaseService implements DestinationServiceInterface
{
    protected $destinationRepository;


    public function __construct(
        DestinationRepository $destinationRepository
    ) {
        $this->destinationRepository = $destinationRepository;
    }



    public function paginate($request)
    {
        $condition['keyword'] = addslashes($request->input('keyword'));
        $perPage = ($request->integer('perpage') > 0) ? $request->integer('perpage') : 9;
        $destination = $this->destinationRepository->pagination(
            $this->paginateSelect(),
            $condition,
            $perPage,
            ['path' => 'admin/destination/index'],
        );

        return $destination;
    }


    public function create($request)
    {
        DB::beginTransaction();
        try {
            $payload = $request->except(['_token', 'send']);
            $destination = $this->destinationRepository->create($payload);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();
            die();
            return false;
        }
    }


    public function update($id, $request)
    {
        DB::beginTransaction();
        try {

            $payload = $request->except(['_token', 'send']);
            // dd($payload);
            $destination = $this->destinationRepository->update($id, $payload);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();
            die();
            return false;
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $destination = $this->destinationRepository->delete($id);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();
            die();
            return false;
        }
    }
    private function paginateSelect()
    {
        return [
            'id',
            'province_id',
            'district_id',
            'ward_id',
            'name',
            'description'
        ];
    }


}
