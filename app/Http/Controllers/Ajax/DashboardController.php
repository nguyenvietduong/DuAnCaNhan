<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class DashboardController extends Controller
{
    protected $language;

    public function __construct(

    ) {

    }

    public function changeStatus(Request $request)
    {
        $data = $request->input();
        $serviceInterfaceNamespace = '\App\Services\\' . ucfirst($data['model']) . 'Service';
        if (class_exists($serviceInterfaceNamespace)) {
            $serviceInstance = app($serviceInterfaceNamespace);
        }
        $flag = $serviceInstance->updateStatus($data);

        return response()->json(['flag' => $flag]);

    }

    public function changeStatusAll(Request $request)
    {
        $post = $request->input();
        $serviceInterfaceNamespace = '\App\Services\\' . ucfirst($post['model']) . 'Service';
        if (class_exists($serviceInterfaceNamespace)) {
            $serviceInstance = app($serviceInterfaceNamespace);
        }
        $flag = $serviceInstance->updateStatusAll($post);
        return response()->json(['flag' => $flag]);

    }

}

