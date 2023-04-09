<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AnyController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\templateController;
use App\Http\Controllers\UserroleController;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::post('login',[LoginController::class,'login'])->name('login')->middleware('ageCheck');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('category',CategoryController::class);
Route::resource('product',ProductController::class);
Route::resource('subcategory',SubcategoryController::class);
Route::resource('student',StudentController::class);
Route::resource('role',RoleController::class);
Route::resource('userRole',UserroleController::class);
Route::post('ajax/selected/value',[AjaxController::class,'ajaxSelectValue'])->name('ajax.selected.value');

//Route::get('subcategories/{subcategory:category_id}',[AnyController::class,'index']);
//Route::get('/users', function () {
//    return UserResource::collection(User::all()->keyBy->name);
//});
Route::get('/user/{id}', function ($id) {
    return new UserResource(User::findOrFail($id));
});