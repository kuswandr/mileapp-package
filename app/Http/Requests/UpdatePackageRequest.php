<?php

namespace App\Http\Requests;

use App\Traits\ApiRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatePackageRequest extends FormRequest
{
    use ApiRequest;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            "transaction_id" => ['string'],
            "customer_name" => ['string'],
            "customer_code" => ['numeric'],
            "transaction_amount" => ['numeric'],
            "transaction_discount" => ['numeric'],
            "transaction_additional_field" => ['string', 'nullable'],
            "transaction_payment_type" => ['numeric'],
            "transaction_order" => ['integer'],
            "organization_id" => ['integer'],
            "created_at" => ['date'],
            "updated_at" => ['date'],
            "transaction_cash_amount" => ['integer'],
            "transaction_cash_change" => ['integer'],
            "customer_attribute.Nama_Sales" => ['string'],
            "customer_attribute.TOP" => ['string'],
            "customer_attribute.Jenis_Pelanggan" => ['string'],
            "connote_id" => ['string'],
            "koli_data" => ['array'],
        ];

        return $rules;
    }
}
