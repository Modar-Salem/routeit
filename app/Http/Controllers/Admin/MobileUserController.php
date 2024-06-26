<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MobileUser;

class MobileUserController extends Controller
{
    public function index()
    {
        $mobile_users = MobileUser::all() ;
        return view('admin.mobile_user.index' , compact('mobile_users')) ;
    }

    public function block($id){

        $mobile_user = MobileUser::find($id) ;

        if(!$mobile_user)
        {
            return redirect()->back() ;
        }

        if($mobile_user->type == 'normal') {
            $mobile_user->update([
                'type' => 'blocked'
            ]);
        }
        elseif($mobile_user->type == 'blocked') {
            $mobile_user->update([
                'type' => 'normal'
            ]);
        }

        $mobile_user->tokens()->delete();
        return redirect()->back() ;
    }
}
