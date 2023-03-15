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
            $package->transaction_id = $packageParameter->getTransactionId();
            $package->customer_name = $packageParameter->getCustomerName();
            $package->customer_code = $packageParameter->getCustomerCode();
            $package->transaction_amount = $packageParameter->getTransactionAmount();
            $package->transaction_discount = $packageParameter->getTransactionDiscount();
            $package->transaction_additional_field = $packageParameter->getAdditionalField();
            $package->transaction_payment_type = $packageParameter->getTransactionPaymentType();
            $package->transaction_state = $packageParameter->getTransactionState();
            $package->transaction_code = $packageParameter->getTransactionCode();
            $package->transaction_order = $packageParameter->getTransactionOrder();
            $package->location_id = $packageParameter->getLocationId();
            $package->organization_id = $packageParameter->getOrganizationId();
            $package->transaction_payment_type_name = $packageParameter->getTransactionPaymentTypeName();
            $package->transaction_cash_amount = $packageParameter->getTransactionCashAmount();
            $package->transaction_cash_change = $packageParameter->getTransactionCashChange();
            $package->customer_attribute = $packageParameter->getCustomerAttribute();
            $package->connote = $packageParameter->getConnote();
            $package->connote_id = $packageParameter->getConnoteId();
            $package->origin_data = $packageParameter->getOriginData();
            $package->destination_data = $packageParameter->getDestinationData();
            $package->koli_data = $packageParameter->getKoliData();
            $package->custom_field = $packageParameter->getCustomField();
            $package->currentLocation = $packageParameter->getCurrentLocation();
            $package->save();

            return $package;
        } catch (\Exception $e) {
            report($e);

            return null;
        }
    }
}
