<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Repositories\Interfaces\AdminRepositoryInterface as AdminRepository;
use App\Services\Interfaces\AdminServiceInterface as AdminService;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $adminService;
    protected $adminRepository;
    protected $provinceRepository;

    public function __construct(
        AdminRepository $adminRepository,
        AdminService $adminService,
        ProvinceRepository $provinceRepository,
    ) {
        $this->adminRepository = $adminRepository;
        $this->adminService = $adminService;
        $this->provinceRepository = $provinceRepository;
    }

    public function index(Request $request)
    {
        $admins = $this->adminService->paginate($request);
        $config['model'] = 'Admin';
        $config['seo'] = config('apps.messages.admin');

        // dd($config);
        return view('backend.user.admin.index', compact('config', 'admins'));
    }

    public function create()
    {
        $config['model'] = 'Admin';
        $config['seo'] = config('apps.messages.admin');
        $provinces = $this->provinceRepository->all();

        return view('backend.user.admin.create', compact('config', 'provinces'));
    }

    public function store(StoreUserRequest $request)
    {
        if ($this->adminService->create($request)) {
            return redirect()->route('admin.index')->with('success', 'Thêm mới thành công.');
        }
        return redirect()->route('admin.index')->with('error', 'Thêm mới không thành công. Vui lòng thử lại');
    }

    public function edit($id)
    {
        $provinces = $this->provinceRepository->all();
        $admin = $this->adminRepository->findById($id);
        $config['seo'] = config('apps.messages.admin');
        $config['model'] = 'admin';

        return view('backend.user.admin.update', compact('config', 'admin', 'provinces'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        if ($this->adminService->update($id, $request)) {
            return redirect()->route('admin.index')->with('success', 'Sửa thành công.');
        }
        return redirect()->route('admin.index')->with('error', 'Sửa không thành công. Vui lòng thử lại');
    }

    public function delete($id)
    {
        // $this->authorize('modules', 'user.delete');
        $config['seo'] = config('apps.messages.admin');
        $admin = $this->adminRepository->findById($id);
        return view('backend.user.admin.delete', compact('admin', 'config'));
    }

    public function destroy($id)
    {

        if ($this->adminService->destroy($id)) {
            return redirect()->route('admin.index')->with('success', 'Xóa thành công.');
        }
        return redirect()->route('admin.index')->with('error', 'Xóa không thành công. Vui lòng thử lại');
    }
}

