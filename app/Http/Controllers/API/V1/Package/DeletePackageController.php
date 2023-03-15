<?php
namespace App\Http\Controllers\API\V1\Package;

use App\Http\Controllers\Controller;
use App\Parameters\PackageParameter;
use App\Services\Contract\PackageServiceContract as PackageService;

class DeletePackageController extends Controller
{
    function __invoke(
        $id,
        PackageService $packageService,
        PackageParameter $packageParameter
    )
    {
        try {
            $packageParameter->initRequestFilter();
            $packageParameter->setTransactionId($id);
            $response = app()->call(
                [$packageService, 'delete'],
                [
                    'packageParameter' => $packageParameter
                ]
            );
            return response()->json(['message' => 'success delete package'], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
