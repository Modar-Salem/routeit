<?php

namespace App\Http\Controllers\Company;

use App\Models\Company;
use App\Models\User;
use App\Traits\FileStorageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    use FileStorageTrait ;
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        return view('company.dashboard') ;
    }

    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function login()
    {
        return view('company.auth.login');
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

        if (!auth()->guard('company')->attempt($data)) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }

        $request->session()->regenerate();
        return redirect()->route('company.dashboard');
    }


    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('company.auth.register') ;
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
            'image'                => 'required|image',
            'description'          => 'required|string' ,
            'terms'                => 'accepted',
        ])->validate();

        $path = $this->storefile($request->file('image') , 'Company/profile/images');

        Company::create([
            'name' => $request['firstname'] . ' ' . $request['lastname'],
            'email'           => $data['email'],
            'description'=> $data['description'] ,
            'password'        => Hash::make($data['password']),
            'image' => $path
        ]);

        return redirect()->route('company.login');
    }

    /**
     * Handle the user logout.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        auth()->guard('company')->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('company.login'); // Redirect to the login route after logging out
    }

}
