<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-service|edit-category|delete-category', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-service', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-service', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-service', ['only' => ['destroy']]);
        // $this->middleware('permission:show-details-service', ['only' => ['']]);
        // $this->middleware('permission:show-report-orde', ['only' => ['']]);
        // $this->middleware('permission:order-servic', ['only' => ['']]);
        // $this->middleware('permission:send-messag', ['only' => ['']]);
        // $this->middleware('permission:show-orders-service', ['only' => ['']]);
        // $this->middleware('permission:handel-order-servic', ['only' => ['']]);

    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $services = Service::with('category', 'user')->get();

        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $users = User::all();
        return view('services.create', compact('categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        // return $request;
        $request->validated();
        $service = new Service();
        $service->title = $request->title;
        $service->details = $request->details;
        $service->price = $request->price;
        $service->category_id = $request->category_id;
        $service->user_id = $request->user_id;
        $service->save();

        // Service::create([
        //     'title' => $request->title,
        //     'details' => $request->details,
        //     'price' => $request->price,
        //     'category_id' => $request->category_id,
        //     'user_id' => $request->user_id,
        // ]);
        return redirect()->route('services.index');
    }

    public function show(Service $service)
    {
        $categories = Category::all();
        $users = User::all();
        return view('services.show', compact('service', 'categories', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $categories = Category::all();
        $users = User::all();
        return view('services.edit', compact('service', 'categories', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, int $id)
    {
        $request->validated();
        $services = Service::findOrFail($id);
        $services->title = $request->title;
        $services->details = $request->details;
        $services->price = $request->price;
        $services->category_id = $request->category_id;
        $services->user_id = $request->user_id;
        $services->save();
        //    $services->update([
        //     'title' => $request->title,
        //     'details' => $request->details,
        //     'price' => $request->price,
        //     'category_id' => $request->category_id,
        //     'user_id' => $request->user_id,
        // ]);
        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index');
    }

    public function str(Request $request)
    {
        $request->validate([
            'str' => ['string'],
        ]);
        $services = Service::where('title', 'LIKE', '%' . $request->str . '%')->get();
        return view('services.index', compact('services'));
    }
}
