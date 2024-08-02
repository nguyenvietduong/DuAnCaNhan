<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Service\StoreServiceRequest;
use App\Http\Requests\Service\UpdateSeviceRequest;
use App\Repositories\Interfaces\ServiceRepositoryInterface as ServiceRepository;
use App\Services\Interfaces\ServiceServiceInterface as ServiceService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $serviceRepository;
    protected $serviceService;
    public function __construct(
        ServiceRepository $ServiceRepository,
        ServiceService $ServiceService
    ) {
        $this->serviceRepository = $ServiceRepository;
        $this->serviceService = $ServiceService;
    }

    public function index(Request $request)
    {
        $config['model'] = 'Service';
        $config['seo'] = config('apps.messages.service');
        $service = $this->serviceService->paginate($request);
        return view('backend.service.index', compact('config', 'service'));
    }

    public function create()
    {
        $config['model'] = 'Service';
        $config['seo'] = config('apps.messages.service');
        return view('backend.service.create', compact('config'));
    }


    public function store(StoreServiceRequest $request)
    {
        if ($this->serviceService->create($request)) {
            return redirect()->route('service.index')->with('success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->route('service.index')->with('error', 'Thêm mới bản ghi không thành công. Hãy thử lại');
    }


    public function edit($id)
    {
        $config['model'] = 'Service';
        $config['seo'] = config('apps.messages.service');
        $service = $this->serviceRepository->findById($id);
        
        return view('backend.service.edit', compact('service', 'config'));
    }

    public function update(UpdateSeviceRequest $request, $id)
    {
        if ($this->serviceService->update($id, $request)) {
            return redirect()->route('service.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('service.index')->with('error', 'Cập nhật bản ghi không thành công. Hãy thử lại');
    }


    public function delete($id)
    {
        // $this->authorize('modules', 'user.delete');
        $config['seo'] = config('apps.messages.service');
        $service = $this->serviceRepository->findById($id);
        return view('backend.service.delete', compact('service', 'config', ));
    }

    public function destroy($id)
    {
        if ($this->serviceService->destroy($id)) {
            return redirect()->route('service.index')->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('service.index')->with('error', 'Xóa bản ghi không thành công. Hãy thử lại');
    }

}