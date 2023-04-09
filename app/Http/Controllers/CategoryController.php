<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use function Sodium\compare;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::get();
        return view('category',compact('categories'))
            ->with('i',(request()->input('page','1')-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $slug=Str::slug($request->name,'-');
        Category::create([
            'name' => $request->name,
                'slug' => $slug,
        ]);
        return redirect(route('category.index'))
            ->with('success','Category added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param Category $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Category $categories)
    {
        //
        return view('template',compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('editCategory',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $slug=Str::slug($request->name,'-');
        $category->update([
            'name' => $request->name,
            'slug' => $slug,
        ]);
        return redirect(route('category.index'))
            ->with('success','category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('category.index'))
            ->with('success','Category Deleted Successfully');

    }
}
