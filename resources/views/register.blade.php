<div>add users</div>
<form method="POST" action="{{ route('register') }}">
    @csrf
    <input type="text" name="name" value="{{ old('name') }}" required autofocus>
    <input type="email" name="email" value="{{ old('email') }}" required>
    <input type="password" name="password" required>
    <input type="password" name="password_confirmation" required>

    <button type="submit">Register</button>
</form>

<div style="font-size: 12px">Already have an account? <a href="{{ ('login') }}">Login</a></div>
