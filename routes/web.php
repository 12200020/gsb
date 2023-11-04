<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/admin/products', function () {
    $products = Product::all(); // Fetch all products

    return view('admin.products', ['products' => $products]);
});

Route::get('/admin/users', function () {
    $users = User::where('role', 'user')->get(); // Fetch users with the role 'user'

    return view('admin.users', ['users' => $users]); // Pass the filtered users data to the view
});

Route::namespace('App\Http\Controllers')->group(function () {
    // student
    Route::post('/login', 'LoginController@login')->name('login');
    Route::post('/register', 'LoginController@register')->name('register');
    Route::post('/logout', 'LoginController@logout')->name('logout');
});

// Route for adding a product
Route::post('/products', [ProductController::class, 'addProduct'])->name('products.add');

// Route for deleting a product
Route::delete('/products/{id}', [ProductController::class, 'deleteProduct']);

Route::delete('/users/{id}', [UserController::class, 'deleteUser'])->name('users.delete');
