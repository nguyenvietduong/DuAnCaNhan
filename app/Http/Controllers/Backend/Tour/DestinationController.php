<?php

namespace App\Http\Controllers\Backend\Tour;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tour\StoreDestinationRequest;
use App\Http\Requests\Tour\UpdateDestinationRequest;
use App\Repositories\Interfaces\DestinationRepositoryInterface as DestinationRepository;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
use App\Services\Interfaces\DestinationServiceInterface as DestinationService;
use Illuminate\Http\Request;

class DestinationController extends Controller
{

    protected $destinationService;
    protected $destinationRepository;
    protected $provinceRepository;
    public function __construct(
        DestinationService $destinationService,
        DestinationRepository $destinationRepository,
        ProvinceRepository $provinceRepository,
    ) {
        $this->destinationService = $destinationService;
        $this->destinationRepository = $destinationRepository;
        $this->provinceRepository = $provinceRepository;
    }
    public function index(Request $request)
    {

        $config['model'] = 'Destination';
        $config['seo'] = config('apps.messages.destination');
        $destinations = $this->destinationService->paginate($request);
        return view('backend.tour.destination.index', compact('config', 'destinations'));
    }

    public function create()
    {
        $provinces = $this->provinceRepository->all();
        $config['model'] = 'Destination';
        $config['seo'] = config('apps.messages.destination');
        return view('backend.tour.destination.create', compact('config', 'provinces'));
    }


    public function store(StoreDestinationRequest $request)
    {
        if ($this->destinationService->create($request)) {
            return redirect()->route('destination.index')->with('success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->route('destination.index')->with('error', 'Thêm mới bản ghi không thành công. Hãy thử lại');
    }


    public function edit($id)
    {
        $config['model'] = 'Destination';
        $config['seo'] = config('apps.messages.destination');
        $destination = $this->destinationRepository->findById($id);
        $provinces = $this->provinceRepository->all();
        return view('backend.tour.destination.edit', compact('destination', 'config', 'provinces'));
    }

    public function update(UpdateDestinationRequest $request, $id)
    {
        if ($this->destinationService->update($id, $request)) {
            return redirect()->route('destination.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('destination.index')->with('error', 'Cập nhật bản ghi không thành công. Hãy thử lại');
    }


    public function delete($id)
    {
        // $this->authorize('modules', 'user.delete');
        $config['seo'] = config('apps.messages.destination');
        $destination = $this->destinationRepository->findById($id);
        return view('backend.tour.destination.delete', compact('destination', 'config', ));
    }

    public function destroy($id)
    {
        if ($this->destinationService->destroy($id)) {
            return redirect()->route('destination.index')->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('destination.index')->with('error', 'Xóa bản ghi không thành công. Hãy thử lại');
    }
}
