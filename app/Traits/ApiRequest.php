<?php

namespace App\Traits;

use App\Tools\SmartResponse;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Exceptions\HttpResponseException;

trait ApiRequest
{
    protected function failedValidation(Validator $validator)
    {
        $messages = $validator->errors()->getMessages();

        $errors = [];
        foreach ($messages as $field => $error) {
            if (isset($error[0])) {
                $errors[$field] = $error[0];
            }
        }

        $smartResponse = app()->make(SmartResponse::class);
        $smartResponse->setCode(Response::HTTP_UNPROCESSABLE_ENTITY);
        $smartResponse->setData($errors);
        $smartResponse->setMessage('The given data was invalid.');

        throw new HttpResponseException($smartResponse->render(true));
    }
}
