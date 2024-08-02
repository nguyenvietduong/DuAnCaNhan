<?php

namespace App\Services;

use App\Services\Interfaces\ArticleServiceInterface;
use App\Repositories\Interfaces\ArticleRepositoryInterface as ArticleRepository;
use App\Repositories\Interfaces\ArticlesImageRepositoryInterface as ArticlesImageRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class ArticleService
 * @package App\Services
 */
class ArticleService extends BaseService implements ArticleServiceInterface
{
    protected $articleRepository;
    protected $articlesImageRepository;


    public function __construct(
        ArticleRepository $articleRepository,
        ArticlesImageRepository $articlesImageRepository
    ) {
        $this->articleRepository = $articleRepository;
        $this->articlesImageRepository = $articlesImageRepository;
    }



    public function paginate($request)
    {
        $condition['keyword'] = addslashes($request->input('keyword'));
        $condition['publish'] = $request->integer('publish');
        $perPage = ($request->integer('perpage') > 0) ? $request->integer('perpage') : 9;

        $articles = $this->articleRepository->pagination(
            $this->paginateSelect(),
            $condition,
            $perPage,
            ['path' => 'admin/article/index'],
        );

        return $articles;
    }


    public function create($request)
    {
        DB::beginTransaction();
        try {
            $payload = $request->except(['_token', 'send', 'image', 'tags']);
            $payload['user_id'] = Auth::user()->id;

            //Except nhận một mảng các khóa muốn loại bỏ khỏi dữ liệu yêu cầu, ở đây là _token và send
            $article = $this->articleRepository->create($payload);

            // dd($article->id);  
            // Thêm vào bảng trung gian article_tags
            $article->tags()->attach($request->tags);
            // Thêm vào bảng articles_image
            $this->createWithArticlesImage($article->id, $request->image);
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

            $payload = $request->except(['_token', 'send', 'image']);
            // dd($payload);
            $article = $this->articleRepository->update($id, $payload);

            // Cập nhật vào bảng trung gian article_tags
            $article->tags()->sync($request->tags);
            // Update vào bảng articles_image
            $this->updateWithArticlesImage($id, $request->image);
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
            $article = $this->articleRepository->delete($id);
            // Xóa vào bảng trung gian article_tags
            // $article->tags()->detach();
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

    private function createWithArticlesImage($articles_id, $image)
    {
        if ($articles_id > 0) {
            $data = [
                'article_id' => $articles_id,
                'image_url' => $image,
            ];
            $this->articlesImageRepository->create($data);
        }
    }

    private function updateWithArticlesImage($articles_id, $image)
    {
        if ($articles_id > 0) {
            $data = [
                'image_url' => $image,
            ];
            $this->articlesImageRepository->updateByWhereIn('article_id', [$articles_id], $data);
        }
    }

    private function paginateSelect()
    {
        return [
            'id',
            'name',
            'slug',
            'content',
            'summary',
            'user_id',
            'category_id',
            'publish',
            'deleted_at',
        ];
    }

    private function payload()
    {
        return [
            'article_id',
            'image',
        ];
    }
}
