<?php

namespace App\Http\Controllers\Api;

use App\Models\CompanyInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyInfoResource;

class CompanyInfoController extends Controller
{
    public function info()
    {
        $CompanyInfo = CompanyInfoResource::collection(CompanyInfo::all());

        return response()->json($CompanyInfo, 200);
    }
}
