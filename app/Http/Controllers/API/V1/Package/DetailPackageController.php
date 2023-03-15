<?php

namespace App\Http\Controllers\API\V1\Package;

use App\Http\Controllers\Controller;
use App\Parameters\PackageParameter;
use App\Services\Contract\PackageServiceContract as PackageService;
use Illuminate\Http\Request;

class DetailPackageController extends Controller
{
    function __invoke(
        $id,
        PackageService $packageService,
        PackageParameter $packageParameter
    ) {
        try {
            $packageParameter->initRequestFilter();
            $packageParameter->setTransactionId($id);
            $response = app()->call(
                [$packageService, 'detail'],
                ['packageParameter' => $packageParameter]
            );

            return response()->json($response, 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
