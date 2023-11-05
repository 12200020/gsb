<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="Name">
    <input type="email" name="email" value="{{ old('email') }}" required placeholder="Email">
    <input type="password" name="password" required placeholder="Password">
    <input type="password" name="password_confirmation" required placeholder="Confirm Password">

    <input type="file" name="image" accept="image/*" placeholder="Choose Image">
    <input type="text" name="contact_number" value="{{ old('contact_number') }}" placeholder="Contact Number">

    <button type="submit">Register</button>
</form>

<div style="font-size: 12px">Already have an account? <a href="{{ route('login') }}">Login</a></div>
