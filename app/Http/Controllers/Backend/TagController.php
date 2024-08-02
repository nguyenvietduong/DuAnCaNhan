<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\StoreTagRequest;
use App\Http\Requests\Tag\UpdateTagRequest;
use App\Repositories\Interfaces\TagRepositoryInterface as TagRepository;
use App\Services\Interfaces\TagServiceInterface as TagService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected $tagService;
    protected $tagRepository;
    public function __construct(
        TagService $tagService,
        TagRepository $tagRepository
    ) {
        $this->tagService = $tagService;
        $this->tagRepository = $tagRepository;
    }

    public function index(Request $request)
    {
        $config['model'] = 'Tag';
        $config['seo'] = config('apps.messages.tag');
        $tags = $this->tagService->paginate($request);
        return view('backend.tag.index', compact('config', 'tags'));
    }

    public function create()
    {
        $config['model'] = 'Tag';
        $config['seo'] = config('apps.messages.tag');
        return view('backend.tag.create', compact('config'));
    }


    public function store(StoreTagRequest $request)
    {
        if ($this->tagService->create($request)) {
            return redirect()->route('tag.index')->with('success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->route('tag.index')->with('error', 'Thêm mới bản ghi không thành công. Hãy thử lại');
    }


    public function edit($id)
    {
        $config['model'] = 'Tag';
        $config['seo'] = config('apps.messages.tag');
        $tag = $this->tagRepository->findById($id);
        return view('backend.tag.edit', compact('tag', 'config'));
    }

    public function update(UpdateTagRequest $request, $id)
    {
        if ($this->tagService->update($id, $request)) {
            return redirect()->route('tag.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('tag.index')->with('error', 'Cập nhật bản ghi không thành công. Hãy thử lại');
    }


    public function delete($id)
    {
        // $this->authorize('modules', 'user.delete');
        $config['seo'] = config('apps.messages.tag');
        $tag = $this->tagRepository->findById($id);
        return view('backend.tag.delete', compact('tag', 'config', ));
    }

    public function destroy($id)
    {
        if ($this->tagService->destroy($id)) {
            return redirect()->route('tag.index')->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('tag.index')->with('error', 'Xóa bản ghi không thành công. Hãy thử lại');
    }

}
