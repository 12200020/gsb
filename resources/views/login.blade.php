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
            <form method="POST" action="{{ route('login') }}" onsubmit="return validateEmail()">
            @csrf
                <h4>Login to GSB</h4>
    
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
    
                <label>Email</label>
                <input type="text" placeholder="Email" name="email" id="email" required onfocus="clearErrorMessage()">
                <span class="error-message" id="emailError">Invalid email format. Please enter a valid GCIT email address ending with .gcit@rub.edu.bt</span>
    
                <label>Password</label>
                <input type="password" placeholder="Password" name="password" required>
    
                <div class="forgot-password">
                    <a href="{{ ('forgot-password') }}">Forgot Password?</a>
                </div>
    
                <button type="submit">Login</button>

                <div style="font-size: 12px">Don't have an account? <a href="{{ ('register') }}">Register</a></div>
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
