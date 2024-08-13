<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserFollowedCompanyController extends Controller
{
    public function showFollowedCompanies(Request $request)
    {
        $user = $request->user();
        $followedCompanies = $user->followedCompanies()->get();

        return response()->json([
            'status' => 'success',
            'followedCompanies' => $followedCompanies
        ], 200);
    }

    public function followCompany(Request $request)
    {
        $companyId = $request['company_id'];
        $user = $request->user();

        $user->followedCompanies()->attach($companyId);

        return response()->json([
            'status' => 'success',
            'message' => 'You have followed this company successfully.'
        ], 200);
    }

    public function unfollowCompany(Request $request)
    {
        $companyId = $request['company_id'];
        $user = $request->user();

        $user->followedCompanies()->detach($companyId);

        return response()->json([
            'status' => 'success',
            'message' => 'You have unfollowed this company successfully.'
        ], 200);
    }
}
