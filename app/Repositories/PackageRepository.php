<?php
namespace App\Repositories;

use App\Models\Package;
use App\Parameters\PackageParameter;
use App\Repositories\Contract\PackageRepositoryContract;
use Illuminate\Support\Collection;

class PackageRepository implements PackageRepositoryContract
{
    /**
     * Get All Data
     * @param Package $package
     * @return Collection
     */
    public function getAll(Package $package): Collection
    {
        return $package->all();
    }

    /**
     * Get Data By Transaction Id
     * @param $transaction_id
     * @param Candidate $candidate
     * @return Candidate|null
     */
    public function getOne(PackageParameter $packageParameter, Package $package): ?Package
    {
        $package = $this->filter($packageParameter, $package);

        return $package->first();
    }

    /**
     * Package Filter
     * @param  PackageParameter $packageParameter
     * @param  Package $package
     */
    public function filter(PackageParameter $packageParameter, Package $package)
    {
        if (!empty($packageParameter->getTransactionId())) {
            $package = $package->where('transaction_id', $packageParameter->getTransactionId());
        }
        return $package;
    }

    /**
     * Create New Data
     * @param  PackageParameter $packageParameter
     * @param  Package $package
     * @return Package|null
     */
    public function create(PackageParameter $packageParameter, Package $package): ?Package
    {
        try {
            $packageParameter->getTransactionId() ? $package->transaction_id = $packageParameter->getTransactionId() : null;
            $packageParameter->getCustomerName() ? $package->customer_name = $packageParameter->getCustomerName() : null;
            $packageParameter->getCustomerCode() ? $package->customer_code = $packageParameter->getCustomerCode() : null;
            $packageParameter->getTransactionAmount() ? $package->transaction_amount = $packageParameter->getTransactionAmount() : null;
            $packageParameter->getTransactionDiscount() ? $package->transaction_discount = $packageParameter->getTransactionDiscount() : null;
            $packageParameter->getAdditionalField() ? $package->transaction_additional_field = $packageParameter->getAdditionalField() : null;
            $packageParameter->getTransactionPaymentType() ? $package->transaction_payment_type = $packageParameter->getTransactionPaymentType() : null;
            $packageParameter->getTransactionState() ? $package->transaction_state = $packageParameter->getTransactionState() : null;
            $packageParameter->getTransactionCode() ? $package->transaction_code = $packageParameter->getTransactionCode() : null;
            $packageParameter->getTransactionOrder() ? $package->transaction_order = $packageParameter->getTransactionOrder() : null;
            $packageParameter->getLocationId() ? $package->location_id = $packageParameter->getLocationId() : null;
            $packageParameter->getOrganizationId() ? $package->organization_id = $packageParameter->getOrganizationId() : null;
            $packageParameter->getTransactionPaymentTypeName() ? $package->transaction_payment_type_name = $packageParameter->getTransactionPaymentTypeName() : null;
            $packageParameter->getTransactionCashAmount() ? $package->transaction_cash_amount = $packageParameter->getTransactionCashAmount() : null;
            $packageParameter->getTransactionCashChange() ? $package->transaction_cash_change = $packageParameter->getTransactionCashChange() : null;
            $packageParameter->getCustomerAttribute() ? $package->customer_attribute = $packageParameter->getCustomerAttribute() : null;
            $packageParameter->getConnote() ? $package->connote = $packageParameter->getConnote() : null;
            $packageParameter->getConnoteId() ? $package->connote_id = $packageParameter->getConnoteId() : null;
            $packageParameter->getOriginData() ? $package->origin_data = $packageParameter->getOriginData() : null;
            $packageParameter->getDestinationData() ? $package->destination_data = $packageParameter->getDestinationData() : null;
            $packageParameter->getKoliData() ? $package->koli_data = $packageParameter->getKoliData() : null;
            $packageParameter->getCustomField() ? $package->custom_field = $packageParameter->getCustomField() : null;
            $packageParameter->getCurrentLocation() ? $package->currentLocation = $packageParameter->getCurrentLocation() : null;
            $package->save();

            return $package;
        } catch (\Exception $e) {
            report($e);

            return null;
        }
    }

    /**
     * Delete Data By Transaction Id
     * @param  $id
     * @param  Package $package
     * @return bool
     */
    public function deleteByTransactionId($transaction_id, Package $package): bool
    {
        try {
            $package = $this->getByTransactionId($transaction_id, $package);

            if ($package != null) {
                $package->delete();

                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            report($e);

            return false;
        }
    }

    /**
     * Get Data By ID
     * @param $id
     * @param Package $package
     * @return Candidate|null
     */
    public function getByTransactionId($transaction_id, Package $package): ?Package
    {
        return $package->where('transaction_id', $transaction_id)->first();
    }

    /**
     * Update Data By ID
     * @param  $id
     * @param  PackageParameter $packageParameter
     * @param  Package $package
     * @return Package|null
     */
    public function updateByTransactionId($id, PackageParameter $packageParameter, Package $package): ?Package
    {
        try {
            $getPackage = $this->getByTransactionId($id, $package);

            if ($getPackage != null) {
                $package = $getPackage;
            }

            return $this->create($packageParameter, $package);
        } catch (\Exception $e) {
            report($e);

            return null;
        }
    }
}
