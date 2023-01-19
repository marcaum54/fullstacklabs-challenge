<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class BattleStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'monsterA' => 'required|exists:App\Models\Monster,id',
            'monsterB' => 'required|exists:App\Models\Monster,id',
        ];
    }

    public function messages()
    {
        return [
            'monsterA.required' => 'Missing ID.',
            'monsterA.exists' => 'Invalid ID.',
            'monsterB.required' => 'Missing ID.',
            'monsterB.exists' => 'Invalid ID.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $message = $validator->errors()->first();
        $statusCode = strpos($message, 'Missing') !== false ? Response::HTTP_BAD_REQUEST : Response::HTTP_NOT_FOUND;

        throw new HttpResponseException(
            response()->json(compact('message'), $statusCode)
        );
    }
}
