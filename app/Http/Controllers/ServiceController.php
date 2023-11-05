<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service; // Don't forget to import your Service model

class ServiceController extends Controller
{

    // Method to store the new service in the database
    public function store(Request $request)
    {
        // Validate and process the incoming request data
        $validatedData = $request->validate([
            'service_name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'image|nullable|max:1999', // Assuming image file validation
        ]);

        // Handle file upload if image is present
        if ($request->hasFile('image')) {
            $fileName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images', $fileName);
        } else {
            $fileName = 'noimage.jpg'; // Default image if no image is uploaded
        }

        // Create and save the service to the database
        $service = new Service;
        $service->service_name = $validatedData['service_name'];
        $service->price = $validatedData['price'];
        $service->description = $validatedData['description'];
        $service->image = $fileName;
        $service->post_by = auth()->id(); // Assign the currently authenticated user's ID

        $service->save();

        return back();
    }
}
