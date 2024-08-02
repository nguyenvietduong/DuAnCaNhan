<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\BookingDetailRepositoryInterface as BookingDetailRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderTrackingController extends Controller
{
    protected $bookingDetailRepository;
    public function __construct(
        BookingDetailRepository $bookingDetailRepository
    ) {
        $this->bookingDetailRepository = $bookingDetailRepository;
    }

    public function index()
    {
        $email = Auth::user()->email;
        $bookings = $this->bookingDetailRepository->findByCondition(...$this->agrument($email));
        // dd($booking);
        return view('frontend.order_tracking', compact('bookings'));
    }

    private function agrument($email)
    {
        return [
            'condition' => [
                ['email', '=', $email]
            ],
            'flag' => true
        ];
    }
}
