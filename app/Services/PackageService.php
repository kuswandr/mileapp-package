<?php
namespace App\Services;

use App\Exceptions\ServiceException;
use App\Parameters\PackageParameter;
use App\Repositories\Contract\PackageRepositoryContract as PackageRepository;
use App\Services\Contract\PackageServiceContract;
use GuzzleHttp\Exception\ServerException;

class PackageService implements PackageServiceContract
{
    public $data;
    public function list(
        PackageParameter $packageParameter,
        PackageRepository $packageRepository
    )
    {
        try {
            $this->data = app()->call(
                [$packageRepository, 'getAll']
            );
            return $this;
        } catch (ServiceException $th) {
            return $th;
        }
    }

    public function createOrUpdate(
        PackageParameter $packageParameter,
        PackageRepository $packageRepository
    ) {
        try {
            if ($packageParameter->getTransactionId()) {
                $package = app()->call(
                    [$packageRepository, 'getByTransactionId'],
                    [
                        'transaction_id' => $packageParameter->getTransactionId()
                    ]
                );

                if (!$package) {
                    $this->data = app()->call(
                        [$packageRepository, 'create'],
                        ['packageParameter' => $packageParameter]
                    );
                } else {
                    $this->data = app()->call(
                        [$packageRepository, 'updateByTransactionId'],
                        [
                            'id' => $packageParameter->getTransactionId(),
                            'packageParameter' => $packageParameter
                        ]
                        );
                }
                
            }
            
            return $this;
        } catch (ServiceException $th) {
            return $th;
        }
    }

    public function detail(
        PackageParameter $packageParameter,
        PackageRepository $packageRepository
    ) {
        try {
            $this->data = app()->call(
                [$packageRepository, 'getOne'],
                ['packageParameter' => $packageParameter]
            );

            if (!$this->data) {
                throw new ServiceException("Candidate Not Found", 404);
            }
            return $this;
        } catch (ServiceException $e) {
            throw new ServiceException($e->getMessage(), 500);
        }
    }

    public function delete(
        PackageParameter $packageParameter,
        PackageRepository $packageRepository
    ) {
        try {
            $package= app()->call(
                [$packageRepository, 'getOne'],
                ['packageParameter' => $packageParameter]
            );

            if (!$package) {
                throw new ServiceException('Data package not found', 404);
            }

            $delete = app()->call(
                [$packageRepository, 'deleteByTransactionId'],
                [
                    'transaction_id' => $packageParameter->getTransactionId()
                ]
            );
        } catch (ServiceException $e) {
            throw new ServiceException($e->getMessage(), 500);
        }
    }
    
}
