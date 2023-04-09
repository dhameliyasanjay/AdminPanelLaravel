<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $products = Product::with('Category')->with('Subcategory')->get();
//       dd($products);
       return view('productIndex',compact('products'))
           ->with('i',(request()->input('page','1')-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('productCreate',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $image = $request->photo;
        $image_name = $image->getClientOriginalname();
        $destination_path = 'public/images';
        $path = $request->photo->storeAs($destination_path,$image_name);

        Product::create([
            'category_id' => $request->category,
            'subcategory_id' => $request->subcategory,
            'name' => $request->product,
            'company' => $request->company,
            'detail' => $request->detail,
            'photo' => $image_name,
        ]);
        return redirect (route('product.index'))
            ->with('success','Product Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('productShow',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories =Category::get();
        $subcategories = Subcategory::get();
        return view('productEdit',compact('product'),compact('categories'))
            ->with(compact('subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $Image=$product->photo;
        if($request->photo) {
            $Image= $request->photo->getClientOriginalname();
            $destination_path = 'public/images';
            $request->photo->storeAs($destination_path, $image_name);
        }

            $product->update([
                'category_id' => $request->category,
                'subcategory_id' => $request->subcategory,
                'product' => $request->product,
                'company' => $request->company,
                'detail' => $request->detail,
                'photo' => $Image,
            ]);

            return redirect(route('product.index'))
                ->with('success','Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return  redirect(route('product.index'))
            ->with('success','Product Deleted Successfully');
    }
}
