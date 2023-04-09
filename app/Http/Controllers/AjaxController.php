<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //
    public function ajaxSelectValue(Request $request){
        $categoryid = $request->selectcategory;
//        dd($categoryid);
        $subcategories = Category::find($categoryid)->subcategory;
        return response()->json($subcategories);

    }
}
