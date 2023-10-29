<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}"> <!-- Link to the external CSS file -->
</head>
<body>
    @include('nav')
    <div style="display: flex; justify-content:center; align-items:center; margin-top: 4rem;">
    <div class="login-container">
        <img src="{{ asset('images/logo.png') }}" alt="GSB logo" style="width:100%; height:auto"> 

        <form method="POST" action="{{ route('login') }}">
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
            <input type="text" placeholder="Email" name="email" required>

            <label >Password</label>
            <input type="password" placeholder="Password" name="password" required>

            <div class="forgot-password">
                <a href="{{ ('forgot-password') }}">Forgot Password?</a>
            </div>

            <button type="submit">Login</button>
        </form>

    <div style="font-size: 12px">Don't have an account? <a href="{{ ('register') }}">Register</a></div>

    </div>
    </div>
</body>
</html>
