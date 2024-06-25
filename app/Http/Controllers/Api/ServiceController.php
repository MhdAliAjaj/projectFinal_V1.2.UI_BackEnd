<?php

namespace App\Http\Controllers\Api;





use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\http\Trait\ApiResponseTrait;
use App\Http\Resources\ServiceResource;

class ServiceController extends Controller
{
    // public function __construct()
    // {

    //     $this->middleware('auth')->only('show');
    // }
    public function show(Service $service)
    {

        $service->load(['category', 'user']);
        return $this->customApi( new ServiceResource($service),'successfully',200);
    }

    use ApiResponseTrait;
    public function index()
    {

        $services = Service::with(['category', 'user'])->get();
        return $this->customApi( ServiceResource::collection($services),'successfully',200);
    }
}


// =======
// use App\Models\Service;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use App\Http\Resources\ServiceResource;

// class ServiceController extends Controller
// {
//     public function index()
//     {
//         $service = ServiceResource::collection(Service::all());

//         return response()->json($service, 200);
//     }

// }
// }

