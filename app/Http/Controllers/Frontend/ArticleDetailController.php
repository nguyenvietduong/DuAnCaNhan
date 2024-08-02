<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ArticleDetailRepositoryInterface as ArticleDetailRepository;
use App\Services\Interfaces\ArticleDetailServiceInterface as ArticleDetailService;
use App\Repositories\Interfaces\CommentRepositoryInterface as CommentRepository;
use App\Services\Interfaces\CommentServiceInterface as CommentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleDetailController extends Controller
{
    protected $articleDetailService;
    protected $articleDetailRepository;
    protected $commentService;
    public function __construct(
        ArticleDetailService $articleDetailService,
        ArticleDetailRepository $articleDetailRepository,
        CommentService $commentService,
    ) {
        $this->articleDetailService = $articleDetailService;
        $this->articleDetailRepository = $articleDetailRepository;
        $this->commentService = $commentService;
    }

    public function index($id)
    {
        // Lấy bài viết
        $article        = $this->articleDetailService->getArticleDetail($id);

        // Phân trang các bình luận liên quan đến bài viết
        $comments       = $article->comments()->published()->paginate(5);

        // Trả về view với các dữ liệu đã phân trang
        return view('frontend.article_detail', compact('article', 'comments'));
    }

    public function store(Request $request, $id)
    {
        if (Auth::guest()) {
            // Lưu trữ dữ liệu form vào session
            $request->flashOnly(['content']); // Chỉ lưu trường 'content' cho form bình luận

            // Chuyển hướng người dùng chưa đăng nhập đến trang đăng nhập với thông báo
            return redirect()->guest('auth/login')->with('warning', 'Bạn cần đăng nhập để thêm bình luận.');
        }

        // Tạo bình luận
        $result = $this->commentService->create($request, $id);

        // Kiểm tra kết quả và đưa ra phản hồi tương ứng
        if ($result === true) {
            return redirect()->route('article.detail', $id)->with('success', 'Thêm mới bình luận thành công.');
        } elseif ($result === false) {
            return redirect()->route('article.detail', $id)->with('error', 'Bình luận không được chứa các từ không cho phép.');
        } else {
            return redirect()->route('article.detail', $id)->with('error', 'Thêm mới bình luận không thành công. Hãy thử lại.');
        }
    }
}
