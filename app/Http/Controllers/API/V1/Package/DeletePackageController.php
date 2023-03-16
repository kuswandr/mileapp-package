<?php
namespace App\Http\Controllers\API\V1\Package;

use App\Exceptions\ServiceException;
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
            $this->smartResponse->setCode(200);
            $this->smartResponse->setMessage('Delete candidate success');
        } catch (ServiceException $e) {
            $this->smartResponse->setCode($e->getCode());
            $this->smartResponse->setMessage($e->getMessage());
        }

        return $this->smartResponse->render(true);
    }
}
