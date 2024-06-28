<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:show-orders-services', ['only' => ['index','show']]);   //للحذف
        $this->middleware('permission:handel-order-service', ['only' => ['update','handle']]); //للحذف
    }
    public function index()
    {
        $orders=Order::with('service' , 'user')->get();
        
      
        return view('Orders.index',compact('orders'));
    }

    public function handle(Order $order)
    {
        $order->update([
            'status' => 1
        ]);
        return redirect()->route('order.index'); 
    }

}
