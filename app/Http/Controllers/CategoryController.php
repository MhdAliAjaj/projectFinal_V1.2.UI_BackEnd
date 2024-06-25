<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-category|edit-category|delete-category', ['only' => ['index','show']]);
        $this->middleware('permission:create-category', ['only' => ['create','store']]);
        $this->middleware('permission:edit-category', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-category', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::with('user')->get();
        
      
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user=User::all();
        return view('category.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     
        $request->validate([
            'name'=>['required','string'],
            'user_id'=>['integer','exists:users,id'],
                    ]);
                    $categories=new Category();
                    $categories->name=$request->name;
                    $categories->user_id= Auth::id(); 
                    $categories->save();
                    return redirect()->route('category.index');

                
                }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /** 
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>['required','string'],
            'user_id'=>['integer','exists:users,id'],
                    ]);
                    $categories= Category::find($id);
                    $categories->name=$request->name??$categories->name;
                    $categories->user_id= Auth::id(); ;
                    $categories->save();
           
                    return redirect()->route('category.index');    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }

  

     
    }

