<?php

namespace App\Http\Controllers\Api;


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
}

