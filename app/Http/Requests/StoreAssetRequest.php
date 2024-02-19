<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssetRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'make' => 'required|string',
            'model' => 'required|string',
            'type' => 'required|string',
            'assettag' => 'required|string|unique:assets,assettag',
            'serial' => 'required|string',
            'age' => 'string',
            'purchase_date' => 'required|string',
            'warranty' => 'required|boolean',
            'warranty_expiry' => 'date',
            'assigned' => 'boolean',
            'active' => 'boolean',
            'user_id' => 'numeric',
            'departmenet_id' => 'numeric',
        ];
    }
}
