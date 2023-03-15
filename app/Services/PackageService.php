<?php
namespace App\Services;

use App\Parameters\PackageParameter;
use App\Repositories\Contract\PackageRepositoryContract as PackageRepository;
use App\Services\Contract\PackageServiceContract;

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
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function create(
        PackageParameter $packageParameter,
        PackageRepository $packageRepository
    ) {
        try {
            $this->data = app()->call(
                [$packageRepository, 'create'],
                ['packageParameter' => $packageParameter]
            );
            return $this;
        } catch (\Throwable $th) {
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
            return $this;
        } catch (\Throwable $th) {
            return $th;
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
                // threw error
            }

            $delete = app()->call(
                [$packageRepository, 'deleteByTransactionId'],
                [
                    'transaction_id' => $packageParameter->getTransactionId()
                ]
            );
        } catch (\Throwable $th) {
            return $th;
        }
    }
    
}
