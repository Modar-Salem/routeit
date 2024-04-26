<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MobileUser;
use Illuminate\Http\Request;

class MobileUserController extends Controller
{
    public function index()
    {
        $mobile_users = MobileUser::all() ;
        return view('admin.mobile_user.index' , compact('mobile_users')) ;
    }

}
