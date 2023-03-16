<?php

namespace App\Http\Controllers\API\V1\Package;

use App\Exceptions\ServiceException;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePackageRequest;
use App\Parameters\PackageParameter;
use App\Services\Contract\PackageServiceContract as PackageService;

class UpdatePackageController extends Controller
{
    function __invoke(
        $id,
        UpdatePackageRequest $request,
        PackageService $packageService,
        PackageParameter $packageParameter
    ) {
        try {
            $packageParameter->setTransactionId($id);
            $packageParameter->setCustomerName($request->customer_name);
            $packageParameter->setCustomerCode($request->customer_code);
            $packageParameter->setTransactionAmount($request->transaction_amount);
            $packageParameter->setTransactionDiscount($request->transaction_discount);
            $packageParameter->setAdditionalField($request->transaction_additional_field);
            $packageParameter->setTransactionPaymentType($request->transaction_payment_type);
            $packageParameter->setTransactionState($request->transaction_state);
            $packageParameter->setTransactionCode($request->transaction_code);
            $packageParameter->setTransactionOrder($request->transaction_order);
            $packageParameter->setLocationId($request->location_id);
            $packageParameter->setOrganizationId($request->organization_id);
            $packageParameter->setTransactionPaymentTypeName($request->transaction_payment_type_name);
            $packageParameter->setTransactionCashAmount($request->transaction_cash_amount);
            $packageParameter->setTransactionCashChange($request->transaction_cash_change);
            $packageParameter->setCustomerAttribute($request->customer_attribute);
            $packageParameter->setConnote($request->connote);
            $packageParameter->setConnoteId($request->connote_id);
            $packageParameter->setOriginData($request->origin_data);
            $packageParameter->setDestinationData($request->destination_data);
            $packageParameter->setKoliData($request->koli_data);
            $packageParameter->setCustomField($request->custom_field);
            $packageParameter->setCurrentLocation($request->currentLocation);
            $response = app()->call(
                [$packageService, 'createOrUpdate'],
                [
                    'packageParameter' => $packageParameter
                ]
            );
            $this->smartResponse->setCode(201);
            $this->smartResponse->setMessage('Update Package Success');
            $this->smartResponse->setData($response->data);
        } catch (ServiceException $th) {
            $this->smartResponse->setCode($th->getCode());
            $this->smartResponse->setMessage($th->getMessage());
        }

        return $this->smartResponse->render(true);
    }
}
