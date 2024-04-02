<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class StatementStorePayloadRequest extends FormRequest
{
    public function authorize(): true
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'phone' => 'required|numeric|min:10',
            'message' => 'required:string'
        ];
    }

}
