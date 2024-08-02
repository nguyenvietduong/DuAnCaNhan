<?php

namespace App\Services;

use App\Services\Interfaces\AdminServiceInterface;
use App\Repositories\Interfaces\AdminRepositoryInterface as AdminRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class AdminService
 * @package App\Services
 */
class AdminService extends BaseService implements AdminServiceInterface
{
    protected $adminRepository;

    public function __construct(
        AdminRepository $adminRepository
    )
    {
        $this->adminRepository = $adminRepository;
    }

    public function paginate($request)
    {

        $condition = [
            'keyword'   => addslashes($request->input('keyword')),
            'publish'   => $request->integer('publish'),
            'where'     => [
                ['role', '=', 'admin'],
            ],
        ];
        $perPage = ($request->integer('perpage') > 0) ? $request->integer('perpage') : 9;
        $guides = $this->adminRepository->pagination(
            $this->paginateSelect(),
            $condition,
            $perPage,
            ['path' => 'admin/guide/index'],
        );

        return $guides;
    }

    public function create($request){
        DB::beginTransaction();
        try {
            $payload = $request->except(['_token', 'send']);
            //Except nhận một mảng các khóa muốn loại bỏ khỏi dữ liệu yêu cầu, ở đây là _token và send
            $editer = $this->adminRepository->create($payload);
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
            $guide = $this->adminRepository->update($id, $payload);
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
            $guide = $this->adminRepository->delete($id);

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
            'phone',
            'email',
            'address',
            'name',
            'image',
            'birthday',
            'publish',
            'last_name',
            'publish',
            'first_name',
        ];
    }
}
