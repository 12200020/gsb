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

        body {
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            overflow-x: hidden;
        }

        h1 {
            text-align: center;
        }

        .user-profile-container {
            display: flex;
            flex-direction: column;
            background-color: #fff;
            margin: 0 23rem; /* Adjusted margin for responsiveness */
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .user-container {
            display: flex;
            align-items: start;
            flex-wrap: wrap;
        }

        .user-image {
            max-width: 200px;
            /* border: 1px solid #ccc; */
            margin:1.5rem;
            border-radius: 4px;
            margin-right: 20px;
        }

        .user-details {
            flex: 1;
            max-width: 400px;
        }

        .add-services-container {
            margin: 0 2rem;
        }

        form {
            width: 100%;
            max-width: 600px; /* Adjusted maximum width for responsiveness */
            margin: 0 auto; /* Center the form on larger screens */
        }

        label {
            font-weight: bold;
        }

        input,
        textarea,
        button {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        @media screen and (max-width: 600px) {
            .user-profile-container {
                margin: 0 1rem; /* Adjusted margin for smaller screens */
            }

            .add-services-container {
                margin: 0 1rem;
            }

            form {
                max-width: 100%; /* Full width for smaller screens */
            }
        }

        /* Media query for screens between 601px and 900px */
        @media screen and (min-width: 601px) and (max-width: 900px) {
            .user-profile-container {
                margin: 0 2rem; /* Adjusted margin for medium-sized screens */
            }

            .add-services-container {
                margin: 0 2rem;
            }

            form {
                max-width: 80%; /* 80% width for medium-sized screens */
            }
        }
    </style>
</head>
<body>

    @include('nav')

    <h1>User Profile</h1>
    <div class="user-profile-container">
        @if($user)
        <div class="user-container">
            <div class="user-image">
                <img src="{{ asset('storage/' . $user->image) }}" alt="User Image" style="max-width: 100%; height: auto;">
            </div>
            <div class="user-details">
                <p style="font-size: 1.2em; font-weight: bold; margin-bottom: 8px;">Name: <span style="color: #333;">{{ $user->name }}</span></p>
                <p style="font-size: 1.2em; margin-bottom: 8px;">Email: <span style="color: #333;">{{ $user->email }}</span></p>
                <p style="font-size: 1.2em; margin-bottom: 8px;">Contact Number: <span style="color: #333;">{{ $user->contact_number }}</span></p>
                <p style="font-size: 1.2em; margin-bottom: 8px;">Created At: <span style="color: #333;">{{ $user->created_at }}</span></p>
            </div>
        </div>
        @else
            <p>No user found</p>
        @endif
    </div>

    <h1 style="text-align: center;">Add Services</h1>
    <div class="add-services-container">
        <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- CSRF Protection -->
            <!-- Service Name -->
            <label for="service_name">Service Name:</label><br>
            <input type="text" id="service_name" name="service_name" required><br>
            <!-- Price -->
            <label for="price">Price:</label><br>
            <input type="number" id="price" name="price" required><br>
            <!-- Description -->
            <label for="description">Description:</label><br>
            <textarea id="description" name="description" required></textarea><br>
            <!-- Image -->
            <label for="image">Image:</label><br>
            <input type="file" id="image" name="image"><br>
            <!-- Post By (User ID) -->
            <input type="hidden" id="post_by" name="post_by" value="{{ auth()->id() }}" required><br>
            <!-- Submit Button -->
            <button type="submit">Add Service</button>
        </form>
    </div>

    @include('services')
    @include('footer')

</body>
</html>
