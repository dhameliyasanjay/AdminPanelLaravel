<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubcategoryRequest;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories =Subcategory::with('Category')->get();
        return view('subcategoryIndex',compact('subcategories'))
            ->with('i',(request()->input('page','1')-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryname = Category::get();
        return view ('subcategoryCreate',compact('categoryname'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SubcategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubcategoryRequest $request)
    {
        Subcategory::create([
           'name' => $request->name,
            'category_id' => $request->category,
        ]);
        return redirect(route('subcategory.create'))
            ->with('success','Sub Category Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param Subcategory $subcategory
     * @return void
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Subcategory $subcategory
     * @return void
     */
    public function edit(Subcategory $subcategory)
    {
        $categories =Category::get();
        return view ('subcategoryEdit',compact('subcategory'),compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SubcategoryRequest $request
     * @param Subcategory $subcategory
     * @return void
     */
    public function update(SubcategoryRequest $request, Subcategory $subcategory)
    {
        $subcategory->update([
            'name' => $request->name,
            'category_id' => $request->category,
        ]);
        return redirect(route('subcategory.index'))
            ->with('success','Subcategory Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Subcategory $subcategory
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return redirect(route('subcategory.index'));
    }
}
