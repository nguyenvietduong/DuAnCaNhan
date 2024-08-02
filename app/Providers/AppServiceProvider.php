<?php

namespace App\Providers;

use App\Http\Controllers\Frontend\TourCategoryController;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    //Khai Báo Interface và Implementation
    public $bindings = [
        'App\Services\Interfaces\UserServiceInterface'                      => 'App\Services\UserService',
        'App\Repositories\Interfaces\UserRepositoryInterface'               => 'App\Repositories\UserRepository',

        'App\Services\Interfaces\EditorServiceInterface'                    => 'App\Services\EditorService',
        'App\Repositories\Interfaces\EditorRepositoryInterface'             => 'App\Repositories\EditorRepository',

        'App\Services\Interfaces\AdminServiceInterface'                     => 'App\Services\AdminService',
        'App\Repositories\Interfaces\AdminRepositoryInterface'              => 'App\Repositories\AdminRepository',

        'App\Services\Interfaces\CategoryServiceInterface'                  => 'App\Services\CategoryService',
        'App\Repositories\Interfaces\CategoryRepositoryInterface'           => 'App\Repositories\CategoryRepository',

        'App\Services\Interfaces\TagServiceInterface'                       => 'App\Services\TagService',
        'App\Repositories\Interfaces\TagRepositoryInterface'                => 'App\Repositories\TagRepository',

        'App\Services\Interfaces\SearchServiceInterface'                    => 'App\Services\SearchService',
        'App\Repositories\Interfaces\SearchRepositoryInterface'             => 'App\Repositories\SearchRepository',

        'App\Services\Interfaces\ArticleDetailServiceInterface'             => 'App\Services\ArticleDetailService',
        'App\Repositories\Interfaces\ArticleDetailRepositoryInterface'      => 'App\Repositories\ArticleDetailRepository',

        'App\Repositories\Interfaces\ProvinceRepositoryInterface'           => 'App\Repositories\ProvinceRepository',
        'App\Repositories\Interfaces\DistrictRepositoryInterface'           => 'App\Repositories\DistrictRepository',

        'App\Services\Interfaces\ArticlesImageServiceInterface'             => 'App\Services\ArticlesImageService',
        'App\Repositories\Interfaces\ArticlesImageRepositoryInterface'      => 'App\Repositories\ArticlesImageRepository',

        'App\Services\Interfaces\DestinationServiceInterface'               => 'App\Services\DestinationService',
        'App\Repositories\Interfaces\DestinationRepositoryInterface'        => 'App\Repositories\DestinationRepository',

        'App\Services\Interfaces\ArticleServiceInterface'                   => 'App\Services\ArticleService',
        'App\Repositories\Interfaces\ArticleRepositoryInterface'            => 'App\Repositories\ArticleRepository',

        'App\Services\Interfaces\CommentServiceInterface'                   => 'App\Services\CommentService',
        'App\Repositories\Interfaces\CommentRepositoryInterface'            => 'App\Repositories\CommentRepository',

        'App\Services\Interfaces\SystemServiceInterface'                    => 'App\Services\SystemService',
        'App\Repositories\Interfaces\SystemRepositoryInterface'             => 'App\Repositories\SystemRepository',

        //Việc đăng ký các interface và implementation trong container của Laravel cho phép framework này biết cách tạo ra các instance của các class khi cần thiết.
    ];

    /**
     * Register any application services.
     */
    public function register(): void            //register Method: Đây là nơi đăng ký các bindings trong ứng dụng.
    {
        //Đăng Ký Binding trong Service Provider
        foreach ($this->bindings as $key => $val) {
            $this->app->bind($key, $val);
            //bạn đăng ký các interface và lớp cụ thể của chúng bằng bind, giúp Laravel biết cách cung cấp các instance của lớp cụ thể khi một interface được yêu cầu
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // view()->composer('layout.client', function ($view) {      //Đăng ký một view composer cho view frontend.layout
        //     app(TourCategoryController::class)->compose($view);
        //     //Sử dụng hàm app() để tạo một instance của HomeController và gọi method compose trên nó, truyền vào đối tượng view hiện tại.
        // });

        $categories     = Category::all();
        $tags           = Tag::all();

        // Lấy 10 bài viết gần đây nhất
        $recentPosts    = Article::recent()->take(10)->paginate(2);
        $authors        = User::editors()
            ->latest('created_at') // Sắp xếp theo ngày tạo, từ mới nhất
            ->take(5) // Lấy 5 bản ghi
            ->get();

        view()->share([
            'categories'    => $categories,
            'tags'          => $tags,
            'recentPosts'   => $recentPosts,
            'authors'       => $authors,
        ]);

        Paginator::useBootstrapFive();

        Schema::defaultStringLength(255);
    }
}
