<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Mail\ServiceConfirmation;
use App\Mail\ServiceRequestConfirmation;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

class ServiceRequestController extends Controller
{

    public function create(ServiceRequest $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'service_id' => 'required|integer|exists:services,id',
            'description' => 'required|string|min:2|max:500',
        ]);

        // Create a new service request
        $order = Order::create([
            'user_id' => $validatedData['user_id'],
            'service_id' => $validatedData['service_id'],
            'description' => $validatedData['description'],
            'status' => false, // Default status is pending
        ]);



        Mail::to($order->user)->send(new ServiceConfirmation($order));


        return response()->json(['message' => 'Service request submitted successfully']);
    }
}
