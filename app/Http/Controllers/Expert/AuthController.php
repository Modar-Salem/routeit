<?php

namespace App\Http\Controllers\Expert;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        return view('expert.dashboard') ;
    }

    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function login()
    {
        return view('expert.auth.login');
    }

    /**
     * Handle the login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function loginAction(Request $request)
    {
        $data = $request->only(['email', 'password']);

        Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        if (!auth()->attempt($data)) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }

        $request->session()->regenerate();
        return redirect()->route('expert.dashboard');
    }


    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('expert.auth.register') ;
    }

    /**
     * Handle the registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(Request $request)
    {
        $data = $request->all();

        Validator::make($data, [
            'firstname'            => 'required|string|max:255',
            'lastname'             => 'required|string|max:255',
            'email'                => 'required|string|email|max:255|unique:users',
            'password'             => 'required|string|min:8|confirmed',
            'terms'                => 'accepted',
        ])->validate();

        User::create([
            'name' => $request['firstname'] . ' ' . $request['lastname'],
            'email'           => $data['email'],
            'password'        => Hash::make($data['password']),
        ]);

        return redirect()->route('expert.login');
    }

    /**
     * Handle the user logout.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('expert.login'); // Redirect to the login route after logging out
    }

}
