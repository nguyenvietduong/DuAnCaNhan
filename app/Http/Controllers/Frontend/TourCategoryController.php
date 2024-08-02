<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\TourCategoryRepositoryInterface as TourCategoryRepository;
use App\Repositories\Interfaces\TourRepositoryInterface as TourRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TourCategoryController extends Controller
{

    protected $tourCategoryRepository;
    protected $tourRepository;

    public function __construct(
        TourCategoryRepository $tourCategoryRepository,
        TourRepository $tourRepository
    ) {
        $this->tourCategoryRepository = $tourCategoryRepository;
        $this->tourRepository = $tourRepository;
    }


    public function show($slug)
    {
        $tourCategory = $this->tourCategoryRepository->findByCondition(...$this->agrument($slug));
        $tours = $tourCategory->tours()->where('publish', 2)->get();

        // dd($tours);
        return view('frontend.tour_list', compact('tours', 'tourCategory'));
    }

    public function compose(View $view)
    {
        $tourCategories = $this->tourCategoryRepository->all();
        //Lấy ra danh sách danh mục
        $view->with('tourCategories', $tourCategories);
        //Sử dụng ViewCompose để chia sẻ view với frontend.layout
    }

    public function agrument($slug)
    {
        return [
            'condition' => [
                ['slug', '=', $slug]
            ],
            'flag' => false
        ];
    }
}
