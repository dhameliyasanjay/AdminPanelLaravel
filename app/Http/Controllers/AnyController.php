<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class AnyController extends Controller
{
    public function index(Category $category, Subcategory $subcategory){
        return $subcategory;
    }
}
