<?php

namespace App\Services;

use App\Services\Interfaces\ArticlesImageServiceInterface;
use App\Repositories\Interfaces\ArticlesImageRepositoryInterface as ArticlesImageRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

/**
 * Class ArticlesImageService
 * @package App\Services
 */
class ArticlesImageService extends BaseService implements ArticlesImageServiceInterface
{
    protected $articlesImageRepository;


    public function __construct(
        ArticlesImageRepository $articlesImageRepository
    ) {
        $this->articlesImageRepository = $articlesImageRepository;
    }



    public function paginate($request)
    {
        $condition['keyword']   = addslashes($request->input('keyword'));
        $condition['publish']   = $request->integer('publish');
        $perPage                = ($request->integer('perpage') > 0) ? $request->integer('perpage') : 9;
        $users                  = $this->articlesImageRepository->pagination(
            $this->paginateSelect(),
            $condition,
            $perPage,
            ['path' => 'admin/tour-category/index'],
        );

        return $users;
    }


    public function create($request)
    {
        DB::beginTransaction();
        try {
            $payload = $request->except(['_token', 'send']);
            //Except nhận một mảng các khóa muốn loại bỏ khỏi dữ liệu yêu cầu, ở đây là _token và send
            $tour = $this->articlesImageRepository->create($payload);
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
            $user = $this->articlesImageRepository->update($id, $payload);
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
            $user = $this->articlesImageRepository->delete($id);

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
            'name',
            'image',
            'publish',
            'slug',
            'description',
        ];
    }


}
