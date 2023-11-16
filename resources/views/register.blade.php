<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}"> 
    <style>
        /* CSS for the error message */
        .error-message {
            color: #ff6347;
            font-size: 12px;
            margin-top: 5px;
            display: none;
        }
        html {
            overflow-x: hidden;
        }
    </style>
</head>
<body style="padding-bottom: 2rem;">
    @include('nav')
    <div style="display: flex; justify-content:center; align-items:center; margin-top: 2rem;">
        <div class="login-container">
            <img src="{{ asset('images/logo.png') }}" alt="GSB logo" style="width:100%; height:auto">
            
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" onsubmit="return validateEmail()">
            @csrf
                <h4>Register to GSB</h4>
    
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
    
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <label>Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="Name">
                
                <label>Email</label>
                <input type="text" placeholder="Email" name="email" id="email" required onfocus="clearErrorMessage()">
                <span class="error-message" id="emailError">Invalid email format. Please enter a valid GCIT email address ending with .gcit@rub.edu.bt</span>

                <label>Password</label>
                <input type="password" name="password" required placeholder="Password">
                <input type="password" name="password_confirmation" required placeholder="Confirm Password">
                    
                <label>Contact Number</label>
                <input type="text" name="contact_number" value="{{ old('contact_number') }}" placeholder="Contact Number">
                
                <label>Profile Image</label>
                <div style="margin-top:1rem;"></div>
                <input type="file" name="image" accept="image/*" placeholder="Choose Image">
                <button type="submit">Register</button>

                <div style="font-size: 12px">Already have an account? <a href="{{ route('login') }}">Login</a></div>

            </form>
        </div>

    </div>

    <script>
        function validateEmail() {
            var emailInput = document.getElementById('email').value;
            var emailPattern = /^[a-zA-Z0-9._%+-]+@rub\.edu\.bt$/;

            if (!emailPattern.test(emailInput)) {
                document.getElementById('emailError').style.display = 'block'; // Show the error message
                return false; // Prevent form submission
            } else {
                document.getElementById('emailError').style.display = 'none'; // Hide the error message if it was previously shown
            }

            // Other checks or form submission
            return true; // Submit the form
        }

        function clearErrorMessage() {
            document.getElementById('emailError').style.display = 'none'; // Hide the error message on input focus
        }
    </script>
    
</body>
</html>

