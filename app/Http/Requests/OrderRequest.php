<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name'=>'string',
            'last_name'=>'string',
            'phone_number'=>'string',
            'email'=>'required|email',
            'street'=>'string',
            'house'=>'Integer',
            'housing'=>'Integer',
            'entrance'=>'Integer',
            'apartment'=>'Integer',
            'total'=>'decimal:0,99999999'
            
        ];
    }
}
