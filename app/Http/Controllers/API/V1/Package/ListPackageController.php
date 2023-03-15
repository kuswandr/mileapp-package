<?php

namespace App\Http\Controllers\API\V1\Package;

use App\Http\Controllers\Controller;
use App\Services\Contract\PackageServiceContract as PackageService;
use Illuminate\Http\Request;

class ListPackageController extends Controller {
    function __invoke(
        Request $request,
        PackageService $packageService
    )
    {
        try {
            $response = app()->call(
                [$packageService, 'list']
            );
            dd($response);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
