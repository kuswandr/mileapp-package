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
}
