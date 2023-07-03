<?php
declare(strict_types=1);
namespace Domain\System\Log\Presentation\Controller\Add;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;

class Request extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'trace_id' => [
                'required',
                'string'
            ],
            'span_id' => [
                'required',
                'string'
            ],
            'request_time' => [
                'required',
                'date_format:Y-m-d\TH:i:sp'
            ],
            'tags' => [
                'nullable',
                'array'
            ],
            'tags.*' => [
                'nullable',
                'string'
            ],
            'log' => [
                'required'
            ]
        ];
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
