<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\TourRepositoryInterface as TourRepository;
use Illuminate\Http\Request;

class TourController extends Controller
{
    protected $tourRepository;
    public function __construct(
        TourRepository $tourRepository
    ) {
        $this->tourRepository = $tourRepository;
    }

    public function show($category, $slug)
    {
        $tour = $this->tourRepository->findByCondition(...$this->agrument($slug));
        return view('frontend.tour_detail', compact('tour'));
    }

    public function tourComfirm(){
        
    }


    public function agrument($slug)
    {
        return [
            'condition' => [
                ['slug', '=', $slug],
                ['publish', '=', 2]
            ],
            'flag' => false
        ];
    }
}
