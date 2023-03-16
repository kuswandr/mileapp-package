<?php

namespace App\Http\Controllers\API\V1\Package;

use App\Exceptions\ServiceException;
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

            $this->smartResponse->setMessage("Get List Success");
            $this->smartResponse->setData($response->data);
        } catch (ServiceException $th) {
            $this->smartResponse->setCode($th->getCode());
            $this->smartResponse->setMessage($th->getMessage());
        }
        return $this->smartResponse->render(true);
    }
}
