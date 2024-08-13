<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Database\Seeders\CompanySeeder;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function getCompanyProfile(Request $request)
    {
        $companyId = $request['company_id'];
        $company = Company::find($companyId);

        return response()->json([
            'status' => 'success',
            'company' => $company
        ], 200);
    }
}
