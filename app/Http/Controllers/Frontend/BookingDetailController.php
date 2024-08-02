<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Booking\BookingDetailRequest;
use App\Services\Interfaces\BookingDetailServiceInterface as BookingDetailService;
use Illuminate\Http\Request;

class BookingDetailController extends Controller
{
    protected $bookingDetailService;
    public function __construct(
        BookingDetailService $bookingDetailService
    ) {
        $this->bookingDetailService = $bookingDetailService;
    }

    public function confirm(BookingDetailRequest $request)
    {
        if ($this->bookingDetailService->create($request)) {
            return redirect()->route('home.index')->with('success', 'Đặt tour thành công, vui lòng kiểm tra email xác nhận!');
        }
        return redirect()->route('home.index')->with('error', 'Đặt tour không thành công. Hãy thử lại!');
    }
}
