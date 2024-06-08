<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
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
