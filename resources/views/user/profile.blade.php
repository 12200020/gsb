<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Services</title>
    <style>
        html {
            overflow: scroll;
            overflow-x: hidden;
        }
        ::-webkit-scrollbar {
            width: 0;  /* Remove scrollbar space */
            background: transparent;  /* Optional: just make scrollbar invisible */
        }
        /* Optional: show position indicator in red */
        ::-webkit-scrollbar-thumb {
            background: #FF0000;
        }
    </style>
</head>
    <body style="background-color: #f3f3f3; margin: 0; padding: 0; display: flex;
     flex-direction: column; min-height: 100vh; overflow-x: hidden;">
       
        @include('nav')

        <h1>User Profile</h1>
        
        @if($user)
            <p>Name: {{ $user->name }}</p>
            <p>Email: {{ $user->email }}</p>
            <p>Contact Number {{ $user->contact_number }}</p>
            <p>Created At: {{ $user->created_at }}</p>
        @else
            <p>No user found</p>
        @endif

        <h1 style="text-align: center">Add Services</h1>

        <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data" style="max-width: 400px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px;">
            @csrf <!-- CSRF Protection -->
        
            <!-- Service Name -->
            <label for="service_name" style="font-weight: bold;">Service Name:</label><br>
            <input type="text" id="service_name" name="service_name" required style="width: 100%; padding: 5px; margin-bottom: 10px;"><br>
        
            <!-- Price -->
            <label for="price" style="font-weight: bold;">Price:</label><br>
            <input type="number" id="price" name="price" required style="width: 100%; padding: 5px; margin-bottom: 10px;"><br>
        
            <!-- Description -->
            <label for="description" style="font-weight: bold;">Description:</label><br>
            <textarea id="description" name="description" required style="width: 100%; padding: 5px; margin-bottom: 10px;"></textarea><br>
        
            <!-- Image -->
            <label for="image" style="font-weight: bold;">Image:</label><br>
            <input type="file" id="image" name="image" style="margin-bottom: 10px;"><br>
        
            <!-- Post By (User ID) -->
            <input type="hidden" id="post_by" name="post_by" value="{{ auth()->id() }}" required style="margin-bottom: 10px;"><br>
        
            <!-- Submit Button -->
            <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Add Service</button>
        </form>

        @include('services')
        
        @include('footer')
        
    </body>
</html>