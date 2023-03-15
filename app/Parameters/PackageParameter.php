<?php
namespace App\Parameters;

/**
 * PackageParameter
 */
class PackageParameter
{
    private $transaction_id;
    private $customer_name;
    private $customer_code;
    private $transaction_amount;
    private $transaction_discount;
    private $transaction_additional_field;
    private $transaction_payment_type;
    private $transaction_state;
    private $transaction_code;
    private $transaction_order;
    private $location_id;
    private $organization_id;
    private $transaction_payment_type_name;
    private $transaction_cash_amount;
    private $transaction_cash_change;
    private $customer_attribute;
    private $connote;
    private $connote_id;
    private $origin_data;
    private $destination_data;
    private $koli_data;
    private $custom_field;
    private $currentLocation;

    public function initRequestFilter() {
        $this->transaction_id = request('transaction_id');
    }

    /**
     * Get the value of id
     */
    public function getTransactionId()
    {
        return $this->transaction_id;
    }

    /**
     * Set the value of id
     */
    public function setTransactionId($transaction_id): self
    {
        $this->transaction_id = $transaction_id;

        return $this;
    }

    /**
     * Get the value of customer_name
     */
    public function getCustomerName()
    {
        return $this->customer_name;
    }

    /**
     * Set the value of customer_name
     */
    public function setCustomerName($customer_name): self
    {
        $this->customer_name = $customer_name;

        return $this;
    }

    /**
     * Get the value of customer_code
     */
    public function getCustomerCode()
    {
        return $this->customer_code;
    }

    /**
     * Set the value of customer_code
     */
    public function setCustomerCode($customer_code): self
    {
        $this->customer_code = $customer_code;

        return $this;
    }

    /**
     * Get the value of transaction_amount
     */
    public function getTransactionAmount()
    {
        return $this->transaction_amount;
    }

    /**
     * Set the value of transaction_amount
     */
    public function setTransactionAmount($transaction_amount): self
    {
        $this->transaction_amount = $transaction_amount;
        return $this;
    }

    /**
     * Get the value of transaction_discount
     */
    public function getTransactionDiscount()
    {
        return $this->transaction_discount;
    }

    /**
     * Set the value of transaction_discount
     */
    public function setTransactionDiscount($transaction_discount): self
    {
        $this->transaction_discount = $transaction_discount;
        return $this;
    }

    /**
     * Get the value of transaction_additional_field
     */
    public function getAdditionalField()
    {
        return $this->transaction_additional_field;
    }

    /**
     * Set the value of transaction_additional_field
     */
    public function setAdditionalField($transaction_additional_field): self
    {
        $this->transaction_additional_field = $transaction_additional_field;
        return $this;
    }

    /**
     * Get the value of transaction_payment_type
     */
    public function getTransactionPaymentType()
    {
        return $this->transaction_payment_type;
    }

    /**
     * Set the value of transaction_payment_type
     */
    public function setTransactionPaymentType($transaction_payment_type): self
    {
        $this->transaction_payment_type = $transaction_payment_type;
        return $this;
    }

    /**
     * Get the value of transaction_state
     */
    public function getTransactionState()
    {
        return $this->transaction_state;
    }

    /**
     * Set the value of transaction_state
     */
    public function setTransactionState($transaction_state): self
    {
        $this->transaction_state = $transaction_state;
        return $this;
    }

    /**
     * Get the value of transaction_code
     */
    public function getTransactionCode()
    {
        return $this->transaction_code;
    }

    /**
     * Set the value of transaction_code
     */
    public function setTransactionCode($transaction_code): self
    {
        $this->transaction_code = $transaction_code;
        return $this;
    }

    /**
     * Get the value of transaction_order
     */
    public function getTransactionOrder()
    {
        return $this->transaction_order;
    }

    /**
     * Set the value of transaction_order
     */
    public function setTransactionOrder($transaction_order): self
    {
        $this->transaction_order = $transaction_order;
        return $this;
    }

    /**
     * Get the value of location_id
     */
    public function getLocationId()
    {
        return $this->location_id;
    }

    /**
     * Set the value of location_id
     */
    public function setLocationId($location_id): self
    {
        $this->location_id = $location_id;
        return $this;
    }

    /**
     * Get the value of organization_id
     */
    public function getOrganizationId()
    {
        return $this->organization_id;
    }

    /**
     * Set the value of organization_id
     */
    public function setOrganizationId($organization_id): self
    {
        $this->organization_id = $organization_id;
        return $this;
    }

    /**
     * Get the value of transaction_payment_type_name
     */
    public function getTransactionPaymentTypeName()
    {
        return $this->transaction_payment_type_name;
    }

    /**
     * Set the value of transaction_payment_type_name
     */
    public function setTransactionPaymentTypeName($transaction_payment_type_name): self
    {
        $this->transaction_payment_type_name = $transaction_payment_type_name;
        return $this;
    }

    /**
     * Get the value of transaction_cash_amount
     */
    public function getTransactionCashAmount()
    {
        return $this->transaction_cash_amount;
    }

    /**
     * Set the value of transaction_cash_amount
     */
    public function setTransactionCashAmount($transaction_cash_amount): self
    {
        $this->transaction_cash_amount = $transaction_cash_amount;
        return $this;
    }

    /**
     * Get the value of transaction_cash_change
     */
    public function getTransactionCashChange()
    {
        return $this->transaction_cash_change;
    }

    /**
     * Set the value of transaction_cash_change
     */
    public function setTransactionCashChange($transaction_cash_change): self
    {
        $this->transaction_cash_change = $transaction_cash_change;
        return $this;
    }

    /**
     * Get the value of customer_attribute
     */
    public function getCustomerAttribute()
    {
        return $this->customer_attribute;
    }

    /**
     * Set the value of customer_attribute
     */
    public function setCustomerAttribute($customer_attribute): self
    {
        $this->customer_attribute = $customer_attribute;
        return $this;
    }

    /**
     * Get the value of connote
     */
    public function getConnote()
    {
        return $this->connote;
    }

    /**
     * Set the value of connote
     */
    public function setConnote($connote): self
    {
        $this->connote = $connote;
        return $this;
    }

    /**
     * Get the value of connote_id
     */
    public function getConnoteId()
    {
        return $this->connote_id;
    }

    /**
     * Set the value of connote_id
     */
    public function setConnoteId($connote_id): self
    {
        $this->connote_id = $connote_id;
        return $this;
    }

    /**
     * Get the value of origin_data
     */
    public function getOriginData()
    {
        return $this->origin_data;
    }

    /**
     * Set the value of origin_data
     */
    public function setOriginData($origin_data): self
    {
        $this->origin_data = $origin_data;
        return $this;
    }

    /**
     * Get the value of destination_data
     */
    public function getDestinationData()
    {
        return $this->destination_data;
    }

    /**
     * Set the value of destination_data
     */
    public function setDestinationData($destination_data): self
    {
        $this->destination_data = $destination_data;
        return $this;
    }

    /**
     * Get the value of koli_data
     */
    public function getKoliData()
    {
        return $this->koli_data;
    }

    /**
     * Set the value of koli_data
     */
    public function setKoliData($koli_data): self
    {
        $this->koli_data = $koli_data;
        return $this;
    }

    /**
     * Get the value of custom_field
     */
    public function getCustomField()
    {
        return $this->custom_field;
    }

    /**
     * Set the value of custom_field
     */
    public function setCustomField($custom_field): self
    {
        $this->custom_field = $custom_field;
        return $this;
    }

    /**
     * Get the value of currentLocation
     */
    public function getCurrentLocation()
    {
        return $this->currentLocation;
    }

    /**
     * Set the value of currentLocation
     */
    public function setCurrentLocation($currentLocation): self
    {
        $this->currentLocation = $currentLocation;
        return $this;
    }
}
