<?php

namespace App\Services;

use App\Services\Interfaces\CommentServiceInterface;
use App\Repositories\Interfaces\CommentRepositoryInterface as CommentRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class CommemtService
 * @package App\Services
 */
class CommentService extends BaseService implements CommentServiceInterface
{
    protected $commentRepository;

    // Danh sách các từ không phù hợp (có thể được lưu trong cấu hình hoặc cơ sở dữ liệu)
    protected $badWords = ['Mẹ mày', 'Bố mày', 'Vãi ol']; // Thay đổi danh sách này theo nhu cầu


    public function __construct(
        CommentRepository $commentRepository
    ) {
        $this->commentRepository = $commentRepository;
    }



    public function paginate($request)
    {
        $condition['keyword']   = addslashes($request->input('keyword'));
        $condition['publish']   = $request->integer('publish');
        $perPage                = ($request->integer('perpage') > 0) ? $request->integer('perpage') : 9;
        $users                  = $this->commentRepository->pagination(
            $this->paginateSelect(),
            $condition,
            $perPage,
            ['path' => 'admin/tour-comment/index'],
        );

        return $users;
    }


    public function create($request, $id)
    {
        DB::beginTransaction();
        try {
            $payload = $request->except(['_token', 'send']);
            //Except nhận một mảng các khóa muốn loại bỏ khỏi dữ liệu yêu cầu, ở đây là _token và send
            $containsBadWords   = $this->containsBadWords($request->content);

            // Nếu không có từ không phù hợp, đặt publish thành 2, ngược lại đặt publish thành 1
            $publishStatus      = $containsBadWords ? 1 : 2;

            if ($publishStatus == 2) {
                $payload = [
                    'article_id'    => $id,
                    'user_id'       => Auth::user()->id,
                    'content'       => $request->content,
                    'publish'       => $publishStatus,
                ];

                $this->commentRepository->create($payload);
                DB::commit();
                return true;
            };
            return false;
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();
            die();
            return false;
        }
    }

    // Hàm kiểm tra bình luận có chứa từ không phù hợp
    protected function containsBadWords($content)
    {
        foreach ($this->badWords as $badWord) {
            if (stripos($content, $badWord) !== false) {
                return true;
            }
        }
        return false;
    }

    public function update($id, $request)
    {
        DB::beginTransaction();
        try {

            $payload = $request->except(['_token', 'send']);
            // dd($payload);
            $user = $this->commentRepository->update($id, $payload);
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
            $user = $this->commentRepository->delete($id);

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
            'article_id',
            'content',
            'publish',
            'user_id',
        ];
    }
}
