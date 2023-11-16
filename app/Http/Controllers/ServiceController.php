<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service; // Don't forget to import your Service model

class ServiceController extends Controller
{

    // Method to store the new service in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'service_name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'image|nullable|max:1999', // Assuming image file validation
        ]);

        $service = new Service;

        $service->service_name = $validatedData['service_name'];
        $service->price = $validatedData['price'];
        $service->description = $validatedData['description'];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $service->image = $imageName;
        }

        $service->post_by = auth()->id(); // Assign the currently authenticated user's ID

        $service->save();

        return back();
    }

        // Method to delete a service
        public function destroy($id)
        {
            $service = Service::findOrFail($id);
    
            // Check if the authenticated user is the owner of the service
            if (auth()->id() != $service->post_by) {
                return redirect()->back()->with('error', 'You do not have permission to delete this service.');
            }
    
            // Delete the service's image if it exists
            if (!empty($service->image)) {
                $imagePath = public_path('images/' . $service->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
    
            // Delete the service from the database
            $service->delete();
    
            return redirect()->back()->with('success', 'Service deleted successfully.');
        }

}
