<?php

namespace App\Services;

use App\Services\Interfaces\TagServiceInterface;
use App\Repositories\Interfaces\TagRepositoryInterface as TagRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

/**
 * Class TagService
 * @package App\Services
 */
class TagService extends BaseService implements TagServiceInterface
{
    protected $tagRepository;


    public function __construct(
        TagRepository $tagRepository
    ) {
        $this->tagRepository = $tagRepository;
    }



    public function paginate($request)
    {
        $condition['keyword']   = addslashes($request->input('keyword'));
        $condition['publish']   = $request->integer('publish');
        $perPage                = ($request->integer('perpage') > 0) ? $request->integer('perpage') : 9;
        $tags                   = $this->tagRepository->pagination(
            $this->paginateSelect(),
            $condition,
            $perPage,
            ['path' => 'admin/tag/index'],
        );

        return $tags;
    }

    public function paginateFrontEnd($request, $id)
    {
        $condition = [
            'keyword'   => addslashes($request->input('keyword')),
            'publish'   => $request->integer('publish'),
            'where'     => [
                ['id', '=', $id],
            ],
        ];

        $perPage                = ($request->integer('perpage') > 0) ? $request->integer('perpage') : 5;
        $tags                  = $this->tagRepository->pagination(
            $this->paginateSelect(),
            $condition,
            $perPage,
            ['path' => 'admin/tag/index'],
        );

        return $tags;
    }


    public function create($request)
    {
        DB::beginTransaction();
        try {
            $payload = $request->except(['_token', 'send']);
            //Except nhận một mảng các khóa muốn loại bỏ khỏi dữ liệu yêu cầu, ở đây là _token và send
            $tour = $this->tagRepository->create($payload);
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
            $user = $this->tagRepository->update($id, $payload);
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
            $user = $this->tagRepository->delete($id);

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
            'slug',
        ];
    }


}
