<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-service|edit-service|delete-service', ['only' => ['index','show']]);
        $this->middleware('permission:create-service', ['only' => ['create','store']]);
        $this->middleware('permission:edit-service', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-service', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service=Service::with('user', 'category')->get(); 
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
$categories = Category::all();
return view('category.create', compact('users', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>['required','string'],
            'details'=>['required','string'],
            'price'=>['required','string'],
            'category_id'=>['required','integer','exists:categories,id'],
            'user_id'=>['required','integer','exists:users,id'],

                    ]);
                    $service=new Service();
                    $service->title=$request->title;
                    $service->details=$request->details;
                    $service->price=$request->price;
                    $service->category_id=$request->category_id;
                    $service->user_id=$request->user_id;
                    $service->save();
                    return redirect()->route('service.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title'=>['required','string'],
            'details'=>['required','string'],
            'price'=>['required','string'],
            'category_id'=>['required','integer','exists:categories,id'],
            'user_id'=>['required','integer','exists:users,id'],

                    ]);
                    $service=new Service();
                    $service->title=$request->title;
                    $service->details=$request->details;
                    $service->price=$request->price;
                    $service->category_id=$request->category_id??$service->category_id;
                    $service->user_id=$request->user_id?? $service->user_id;
                    $service->save();
                    return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('service.index');
    }
}
