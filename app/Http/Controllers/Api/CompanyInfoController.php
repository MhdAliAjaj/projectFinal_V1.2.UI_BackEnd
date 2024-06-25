<?php

namespace App\Http\Controllers\Api;

use App\Models\CompanyInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Trait\ApiResponseTrait;
use App\http\Trait\ApiResponseTrait;
use App\Http\Resources\CompanyInfoResource;
// use App\Http\Controllers\Api\CompanyInfoController;

class CompanyInfoController extends Controller
{
    use ApiResponseTrait;

    public function info()
    {
        $CompanyInfo = CompanyInfoResource::collection(CompanyInfo::all());

        return $this->customApi($CompanyInfo,"successfully",200);
    }
}
