<?php

namespace App\Http\Controllers\Backend\Tour;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tour\StoreTourRequest;
use App\Repositories\Interfaces\DestinationRepositoryInterface as DestinationRepository;
use App\Repositories\Interfaces\ServiceRepositoryInterface as ServiceRepository;
use App\Repositories\Interfaces\TourCategoryRepositoryInterface as TourCategoryRepository;
use App\Repositories\Interfaces\TourRepositoryInterface as TourRepository;
use App\Services\Interfaces\TourServiceInterface as TourService;
use Illuminate\Http\Request;

class TourController extends Controller
{
    protected $tourService;
    protected $tourRepository;
    protected $destinationRepository;
    protected $serviceRepository;
    protected $tourCategoryRepository;
    public function __construct(
        TourService $tourService,
        TourRepository $tourRepository,
        DestinationRepository $destinationRepository,
        ServiceRepository $serviceRepository,
        TourCategoryRepository $tourCategoryRepository
    ) {
        $this->tourService = $tourService;
        $this->tourRepository = $tourRepository;
        $this->destinationRepository = $destinationRepository;
        $this->serviceRepository = $serviceRepository;
        $this->tourCategoryRepository = $tourCategoryRepository;
    }
    public function index(Request $request)
    {
        $config['model'] = 'Tour';
        $config['seo'] = config('apps.messages.tour');
        $tours = $this->tourService->paginate($request);
        return view('backend.tour.tour.index', compact('config', 'tours'));
    }

    public function create()
    {
        $config['model'] = 'Tour';
        $config['seo'] = config('apps.messages.tour');
        $destinations = $this->destinationRepository->all();
        $services = $this->serviceRepository->all();
        $tourCategories = $this->tourCategoryRepository->all();
        return view('backend.tour.tour.create', compact('config', 'destinations', 'services', 'tourCategories'));
    }


    public function store(StoreTourRequest $request)
    {
        if ($this->tourService->create($request)) {
            return redirect()->route('tour.index')->with('success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->route('tour.index')->with('error', 'Thêm mới bản ghi không thành công. Hãy thử lại');
    }


    public function edit($id)
    {
        $config['model'] = 'tour';
        $config['seo'] = config('apps.messages.tour');
        $tour = $this->tourRepository->findByCondition([
            ['id', '=', $id]
        ], false, ['tour_dates']);
        // dd($tour);
        $destinations = $this->destinationRepository->all();
        $services = $this->serviceRepository->all();
        $tourCategories = $this->tourCategoryRepository->all();
        return view('backend.tour.tour.edit', compact('tour', 'config', 'destinations', 'services', 'tourCategories'));
    }

    public function update(Request $request, $id)
    {
        if ($this->tourService->update($id, $request)) {
            return redirect()->route('tour.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('tour.index')->with('error', 'Cập nhật bản ghi không thành công. Hãy thử lại');
    }


    public function delete($id)
    {
        // $this->authorize('modules', 'user.delete');
        $config['seo'] = config('apps.messages.tour');
        $tour = $this->tourRepository->findById($id);
        return view('backend.tour.tour.delete', compact('tour', 'config', ));
    }

    public function destroy($id)
    {
        if ($this->tourService->destroy($id)) {
            return redirect()->route('tour.index')->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('tour.index')->with('error', 'Xóa bản ghi không thành công. Hãy thử lại');
    }

}
