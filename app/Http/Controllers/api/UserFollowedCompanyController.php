<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserFollowedCompanyController extends Controller
{
    public function showFollowedCompanies(Request $request)
    {
        $userId = $request['mobile_user_id'];
        $followedCompanies = MobileUser::find($userId)->followedCompanies;

        return response()->json([
            'status' => 'success',
            'followedCompanies' => $followedCompanies
        ], 200);
    }

    public function toggleFollowCompany(Request $request)
    {
        $companyId = $request['company_id'];
        $user = $request->user();

        // Check if the user already follows the company
        $isFollowing = $user->followedCompanies()->where('company_id', $companyId)->exists();

        if ($isFollowing) {
            // If the user is already following the company, detach (unfollow) it
            $user->followedCompanies()->detach($companyId);
            $message = 'You have unfollowed this company successfully.';
        } else {
            // If the user is not following the company, attach (follow) it
            $user->followedCompanies()->attach($companyId);
            $message = 'You have followed this company successfully.';
        }

        return response()->json([
            'status' => 'success',
            'message' => $message
        ], 200);
    }

}
