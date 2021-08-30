<?php

namespace App\Http\Requests\User;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => 'required|exists:users,id',
            'name' => 'required|string',
            'email' => 'required|email:rfc,dns',
            'age' => 'required|numeric|min:18',
            'street' => 'required|string',
            'location' => 'required|string',
            'number' => 'required|numeric',
            'complement' => 'nullable|numeric',
            'postal_code' => 'required|numeric',
            'city' => 'required|string',
            'state' => 'required|string',
            'uf' => 'required|string'
        ];
    }



    /**
     * Determine response errors attributes
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'id' => 'Identificador',
            'name' => 'Nome',
            'email' => 'E-mail',
            'age' => 'Idade',
            'street' => 'Rua',
            'location' => 'Bairro',
            'number' => 'Número',
            'complement' => 'Complemento',
            'postal_code' => 'CEP',
            'city' => 'Cidade',
            'state' => 'Estado',
            'uf' => 'Unidade Federativa (UF)',
        ];
    }

    /**
     * Errors detected are returned
     *
     * @param Validator $validator
     * @return JsonResponse
     */
    public function failedValidation(Validator $validator): JsonResponse
    {
        throw new HttpResponseException(
            response()->json(
                $validator->errors(),
                422
            )
        );
    }
}
