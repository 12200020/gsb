<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Models\Product;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
    $products = Product::take(8)->get(); // Fetch the first eight products from the database
    
    foreach ($products as $product) {
        // Assuming 'post_by' is the foreign key in the 'products' table
        $userId = $product->post_by;

        // Fetch the contact number using the User model
        $user = User::find($userId);

        if ($user) {
            // Add contact number to the product
            $product->contact_number = $user->contact_number;
        }
    }
    
    $services = Service::take(8)->get(); // Fetch the first eight services from the database
    foreach ($services as $service) {
        // Assuming 'post_by' is the foreign key in the 'products' table
        $userId = $service->post_by;

        // Fetch the contact number using the User model
        $user = User::find($userId);

        if ($user) {
            // Add contact number to the product
            $service->contact_number = $user->contact_number;
        }
    }

    return view('home', ['products' => $products, 'services' => $services]);
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/products', function () {
    $products = Product::all(); // Fetch all products

    foreach ($products as $product) {
        // Assuming 'post_by' is the foreign key in the 'products' table
        $userId = $product->post_by;

        // Fetch the contact number using the User model
        $user = User::find($userId);

        if ($user) {
            // Add contact number to the product
            $product->contact_number = $user->contact_number;
        }
    }
    
    return view('user/products', ['products' => $products]);
});

Route::get('/sort', [ProductController::class, 'sort'])->name('sortProducts');
Route::get('/search', [ProductController::class, 'search'])->name('searchProducts');

Route::get('/services', function () {
    $services = Service::all(); // Fetch all products

    foreach ($services as $service) {
        // Assuming 'post_by' is the foreign key in the 'products' table
        $userId = $service->post_by;

        // Fetch the contact number using the User model
        $user = User::find($userId);

        if ($user) {
            // Add contact number to the product
            $service->contact_number = $user->contact_number;
        }
    }

    return view('user/services', ['services' => $services]);
});

// Route to store a newly created service in the database
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');

Route::get('/profile', function () {
    // Get the authenticated user
    $user = Auth::user();

    // Retrieve all products
    $products = Product::all(); // Or fetch the products related to the user, if needed
    // Retrieve the authenticated user
   // Retrieve the authenticated user
    $user = auth()->user();

    if ($user) {
        // Retrieve all services added by the authenticated user
        $services = Service::all()->where('post_by', $user->id);
    }

    // Pass the user and products data to the user profile view
    return view('user.profile', ['user' => $user, 'products' => $products, 'services' => $services]);
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
Route::delete('/products/{id}', [ProductController::class, 'deleteProduct'])->name('products.delete');
Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.delete');

Route::delete('/users/{id}', [UserController::class, 'deleteUser'])->name('users.delete');
