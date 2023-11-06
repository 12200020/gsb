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
            <p>Created At: {{ $user->created_at }}</p>
        @else
            <p>No user found</p>
        @endif

        <h1>Add Services</h1>

        <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- CSRF Protection -->
        
            <!-- Service Name -->
            <label for="service_name">Service Name:</label><br>
            <input type="text" id="service_name" name="service_name" required><br><br>
        
            <!-- Price -->
            <label for="price">Price:</label><br>
            <input type="number" id="price" name="price" required><br><br>
        
            <!-- Description -->
            <label for="description">Description:</label><br>
            <textarea id="description" name="description" required></textarea><br><br>
        
            <!-- Image -->
            <label for="image">Image:</label><br>
            <input type="file" id="image" name="image"><br><br>
        
            <!-- Post By (User ID) -->
            <input type="hidden" id="post_by" name="post_by" value="{{ auth()->id() }}" required><br><br>
        
            <!-- Submit Button -->
            <button type="submit">Add Service</button>
        </form>

        @include('services')
        
        @include('footer')
        
    </body>
</html>