<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            Session::flash('success', 'Login successful.'); // Set success message
            return redirect('/');

            if (Auth::check()) {
                $user = Auth::user();
            
                if ($user->role === 'admin') {
                    return redirect('/');
                } elseif ($user->role === 'manager') {
                    return redirect('/');
                } else {
                    return redirect()->route('login');
                }
            }
            
            // return redirect()->intended('/manager/dashboard'); // Redirect to the intended page or another page
        }

        // Authentication failed
        Session::flash('error', 'Invalid credentials. Please try again.'); // Set error message
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput($request->except('password'));
    }

    public function register(Request $request)
    {
        // Validate user registration data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create and save a new user record using the User model
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Redirect or perform any other action after registration
        // return redirect('/login'); // Redirect to the dashboard or another page
        return back()->with('success', 'User added successfully.');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Session::flush(); // Flush the session
        Auth::logout(); // Log the user out

        return Redirect('login');

        // // Set cache control headers to prevent caching
        // $response = response()->view('login'); // Replace 'logout' with the actual view or route for logout
        // $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        // $response->header('Pragma', 'no-cache');
        // $response->header('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');
    
        // return $response;
    }
    
}
