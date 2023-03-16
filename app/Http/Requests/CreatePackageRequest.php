<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreatePackageRequest extends FormRequest
{
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
            "transaction_id" => ['required', 'string', 'unique:package'],
            "customer_name" => ['required', 'string'],
            "customer_code" => ['required', 'numeric'],
            "transaction_amount" => ['required', 'numeric'],
            "transaction_discount" => ['required', 'numeric'],
            "transaction_additional_field" => ['string', 'nullable'],
            "transaction_payment_type" => ['required', 'numeric'],
            "transaction_state" => ['required'],
            "transaction_code" => ['required'],
            "transaction_order" => ['required', 'integer'],
            "location_id" => ['required'],
            "organization_id" => ['required', 'integer'],
            "created_at" => ['required', 'date'],
            "updated_at" => ['required', 'date'],
            "transaction_payment_type_name" => ['required'],
            "transaction_cash_amount" => ['required', 'integer'],
            "transaction_cash_change" => ['required', 'integer'],
            // "customer_attribute"
        ];

        return $rules;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
