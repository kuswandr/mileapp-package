<?php

namespace App\Services\Contract;

use App\Parameters\PackageParameter;
use App\Repositories\Contract\PackageRepositoryContract as PackageRepository;

/**
 * Interface PackageServiceContract
 * @package App\Services\Contracts
 */

interface PackageServiceContract
{
    public function list(
        PackageParameter $packageParameter,
        PackageRepository $packageRepository
    );
    public function detail(
        PackageParameter $packageParameter,
        PackageRepository $packageRepository
    );
    public function createOrUpdate(
        PackageParameter $packageParameter,
        PackageRepository $packageRepository
    );
    public function Update(
        PackageParameter $packageParameter,
        PackageRepository $packageRepository
    );
    public function delete(
        PackageParameter $packageParameter,
        PackageRepository $packageRepository
    );
}
