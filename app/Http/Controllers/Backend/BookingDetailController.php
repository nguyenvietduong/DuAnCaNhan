<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\BookingDetailRepositoryInterface as BookingDetailRepository;
use App\Repositories\Interfaces\GuideRepositoryInterface as GuideRepository;
use App\Services\Interfaces\BookingDetailServiceInterface as BookingDetailService;
use Illuminate\Http\Request;

class BookingDetailController extends Controller
{
    protected $bookingDetailService;
    protected $bookingDetailRepository;
    protected $guideRepository;
    public function __construct(
        BookingDetailService $bookingDetailService,
        BookingDetailRepository $bookingDetailRepository,
        GuideRepository $guideRepository
    ) {
        $this->bookingDetailService = $bookingDetailService;
        $this->bookingDetailRepository = $bookingDetailRepository;
        $this->guideRepository = $guideRepository;
    }

    public function index(Request $request)
    {
        $config['model'] = 'BookingDetail';
        $config['seo'] = config('apps.messages.booking');
        $bookings = $this->bookingDetailService->paginate($request);
        return view('backend.booking.booking_detail.index', compact('config', 'bookings'));
    }


    public function edit($id)
    {
        $config['model'] = 'BookingDetail';
        $config['seo'] = config('apps.messages.booking');
        $booking = $this->bookingDetailRepository->findByCondition([
            ['id', '=', $id]
        ], false, ['guide']);
        $guides = $this->guideRepository->all();
        // dd($booking);
        return view('backend.booking.booking_detail.edit', compact('booking', 'config', 'guides'));
    }

    public function update(Request $request, $id)
    {
        if ($this->bookingDetailService->update($id, $request)) {
            return redirect()->route('booking.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('booking.index')->with('error', 'Cập nhật bản ghi không thành công. Hãy thử lại');
    }


    // public function delete($id)
    // {
    //     // $this->authorize('modules', 'user.delete');
    //     $config['seo'] = config('apps.messages.tour');
    //     $tour = $this->tourRepository->findById($id);
    //     return view('backend.tour.tour.delete', compact('tour', 'config', ));
    // }

    // public function destroy($id)
    // {
    //     if ($this->tourService->destroy($id)) {
    //         return redirect()->route('tour.index')->with('success', 'Xóa bản ghi thành công');
    //     }
    //     return redirect()->route('tour.index')->with('error', 'Xóa bản ghi không thành công. Hãy thử lại');
    // }
}
