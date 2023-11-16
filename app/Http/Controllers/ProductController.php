<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Assuming your Product model resides in the 'App\Models' namespace

class ProductController extends Controller
{
    public function addProduct(Request $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->post_by = $request->input('post_by');
        
        // Handle image upload if needed
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        // return response()->json(['message' => 'Product added successfully']);
        return back()->with('success', 'Product added successfully');
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Delete the image if it exists
        if ($product->image) {
            $imagePath = public_path('images') . '/' . $product->image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $product->delete();

        return back()->with('success', 'Product deleted successfully');
        // return response()->json(['message' => 'Product deleted successfully']);
    }

    public function sort(Request $request)
    {
        $sortOption = $request->input('sort');

        // Fetch products based on the sorting option
        if ($sortOption === 'price_asc') {
            $products = Product::orderBy('price')->get();
        } elseif ($sortOption === 'price_desc') {
            $products = Product::orderBy('price', 'desc')->get();
        } elseif ($sortOption === 'name_asc') {
            $products = Product::orderBy('name')->get();
        } elseif ($sortOption === 'name_desc') {
            $products = Product::orderBy('name', 'desc')->get();
        }

        return view('user/products', ['products' => $products]);
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
    
        $products = Product::where(function($query) use ($searchTerm) {
            $query->where('name', 'like', '%'.$searchTerm.'%')
                  ->orWhere('price', 'like', '%'.$searchTerm.'%')
                  ->orWhere('description', 'like', '%'.$searchTerm.'%');
        })->get();
    
        return view('user/products', ['products' => $products]);
    }
    
}
