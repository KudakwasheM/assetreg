<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAssetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string',
            'make' => 'string',
            'model' => 'string',
            'type' => 'string',
            'assettag' => 'string|unique:assets,assettag',
            'serial' => 'string',
            'age' => 'string',
            'purchase_date' => 'string',
            'warranty' => 'boolean',
            'warranty_expiry' => 'date',
            'assigned' => 'boolean',
            'active' => 'boolean',
            'user_id' => 'numeric',
            'departmenet_id' => 'numeric',
        ];
    }
}
