<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'name'=>'required|string|max:255',
            'email'=>'nullable|email|max:255',
            'phone'=>'nullable|string|max:20',
            'company'=>'nullable|string|max:255',
            'status'=>'required|in:lead,active,inactive',
            'notes'=>'nullable|string'
        ];
    }

    public function messages():array{
        return [
            'name.required' => 'Customer name is required.',
            'email.email' => 'Please enter a valid email address.',
            'status.required' => 'Please select a customer status.',
            'status.in' =>'invalid status selected.'
        ];
    }
}
