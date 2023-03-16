<?php

namespace App\Http\Controllers\API\V1\Package;

use App\Exceptions\ServiceException;
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

            $this->smartResponse->setMessage("Get Data Success");
            $this->smartResponse->setData($response->data);
        } catch (ServiceException $th) {
            $this->smartResponse->setCode($th->getCode());
            $this->smartResponse->setMessage($th->getMessage());
        }

        return $this->smartResponse->render(true);
    }
}
