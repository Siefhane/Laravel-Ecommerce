<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct(){
        $this->middleware('auth')->only(['store', 'update', 'destroy']);
         $this->middleware(['amazon'])->only(['store', 'update']);

    }
    public function index()
    {
        $categories = Category::paginate(5);
        return view('categories.index', ['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $request_data = $request->all();
        if($request->hasFile("logo")){
            $logo= $request_data["logo"];
            $path = $logo->store("uploadedfile",'track_logo' );
            $request_data["logo"]= $path;
        }
        Category::create($request_data);

        return to_route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.show', ['category'=>$category]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', ['category'=>$category]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $request_data = $request->all();
        if($request->hasFile("logo")){
            $logo= $request_data["logo"];
            $path = $logo->store("uploadedfile",'track_logo' );
            $request_data["logo"]= $path;
        }
        $category->update($request_data);
        return to_route('category.show', $category->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->trashed()){
            $category->forceDelete();
            return to_route('category.index');
        }
        $category->delete();
        return to_route('category.index');

    }
    public function archive(){
        $categories = Category::onlyTrashed()->paginate(5);
        return view('categories.archive', ['categories' => $categories]);

    }
    public function restore(Category $category)
    {
        $category->restore();
        return to_route('category.index');

    }
}
