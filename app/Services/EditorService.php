<?php

namespace App\Services;

use App\Services\Interfaces\EditorServiceInterface;
use App\Repositories\Interfaces\EditorRepositoryInterface as EditorRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class EditorService
 * @package App\Services
 */
class EditorService extends BaseService implements EditorServiceInterface
{
    protected $editorRepository;

    public function __construct(
        EditorRepository $editorRepository
    )
    {
        $this->editorRepository = $editorRepository;
    }

    public function paginate($request)
    {

        $condition = [
            'keyword' => addslashes($request->input('keyword')),
            'publish' => $request->integer('publish'),
            'where' => [
                ['role', '=', 'editor'],
            ],
        ];
        $perPage = ($request->integer('perpage') > 0) ? $request->integer('perpage') : 9;
        $guides = $this->editorRepository->pagination(
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
            $editer = $this->editorRepository->create($payload);
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
            $guide = $this->editorRepository->update($id, $payload);
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
            $guide = $this->editorRepository->delete($id);

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
