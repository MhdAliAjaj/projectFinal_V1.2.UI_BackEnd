<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
<<<<<<< HEAD:app/Http/Controllers/Api/ServiceController.php
=======
 
>>>>>>> 70d27c4d30f8057837f8f9e727e023bfc40734dd:app/Http/Controllers/ServiceController.php
    public function __construct()
    {
        
        $this->middleware('auth')->only('show');
    }
<<<<<<< HEAD:app/Http/Controllers/Api/ServiceController.php
=======
    
>>>>>>> 70d27c4d30f8057837f8f9e727e023bfc40734dd:app/Http/Controllers/ServiceController.php
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
