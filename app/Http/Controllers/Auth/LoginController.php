<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Change this to your login view
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request): RedirectResponse
    {
        // Validate the request
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // If successful, then redirect to their intended location
            return redirect()->intended('/'); // Change '/' to the desired redirect path
        }

        // If unsuccessful, then redirect back to the login form with an error
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Logout the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        // Redirect to the login page
        return redirect('/login'); // Change this to your login route
    }
}

