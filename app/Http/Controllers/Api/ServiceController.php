<?php

namespace App\Http\Controllers\Api;

<<<<<<< HEAD
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // public function __construct()
    // {

    //     $this->middleware('auth')->only('show');
    // }
    public function show(Service $service)
    {

        $service->load(['category', 'user']);
        return new ServiceResource($service);
    }

    public function index()
    {

        $services = Service::with(['category', 'user'])->get();
        return ServiceResource::collection($services);
    }

=======
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;

class ServiceController extends Controller
{
    public function index()
    {
        $service = ServiceResource::collection(Service::all());

        return response()->json($service, 200);
    }
>>>>>>> e8c5f1935990507f1d204e619f21bd4422eddded
}
