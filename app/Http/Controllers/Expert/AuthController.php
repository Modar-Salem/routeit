<?php

namespace App\Http\Controllers\Expert;

use App\Models\Expert;
use App\Models\User;
use App\Traits\FileStorageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $user = Auth::guard('expert')->user() ;
        $roadmaps= $user->roadmaps;

        return view('expert.dashboard' , compact('user' , 'roadmaps')) ;
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

        if (!Auth::guard('expert')->attempt($data)) {
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
            'image'                => 'required|image',
            'terms'                => 'accepted',
        ])->validate();
        $path = $this->storefile($request['image'],'expert_profile_image');

        Expert::create([
            'name' => $request['firstname'] . ' ' . $request['lastname'],
            'email' => $request['email']
            ,'password' => Hash::make($request['password'])
            ,'image' => $path[0]
            ,'bio'=> $request['bio']
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
        auth()->guard('expert')->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('expert.login'); // Redirect to the login route after logging out
    }

}
