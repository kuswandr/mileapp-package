<?php

namespace App\Repositories\Contract;

use App\Parameters\PackageParameter;
use Illuminate\Support\Collection;
use App\Models\Package;

/**
 * Interface PackageRepositoryContract
 * @package App\Repositories\Contracts
 */

interface PackageRepositoryContract
{
    public function getAll(Package $package): Collection;
    public function getOne(PackageParameter $packageParameter, Package $package): ?Package;
    public function create(PackageParameter $packageParameter, Package $package): ?Package;
    public function filter(PackageParameter $packageParameter, Package $package);
    public function deleteByTransactionId($id, Package $package): bool;
    public function getByTransactionId($transaction_id, Package $package): ?Package;
    public function updateByTransactionId($id, PackageParameter $packageParameter, Package $package): ?Package;

}
