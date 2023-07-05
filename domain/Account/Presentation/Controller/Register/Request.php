<?php

namespace Domain\Account\Presentation\Controller\Register;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;

/**
 * @see https://laravel.com/docs/10.x/validation#form-request-validation
 * @see vendor/laravel/framework/src/Illuminate/Foundation/Http/FormRequest.php
 */
class Request extends FormRequest
{

    //public function authorize(): bool
    //{
    //    return true;
    //}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'string'
            ],
            'password' => [
                'required',
                'string'
            ]
        ];
    }


    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->slug),
        ]);
    }


    /**
     * Handle a failed validation attempt.
     *
     * @throws ValidationException|HttpResponseException
     */
    protected function failedValidation(Validator $validator): void
    {
        throw (new HttpResponseException(
            new JsonResponse(['reason' => $validator->errors()])
        ));

        //throw (new ValidationException($validator))
        //            ->errorBag($this->errorBag)
        //            ->redirectTo($this->getRedirectUrl());
    }
    
}
