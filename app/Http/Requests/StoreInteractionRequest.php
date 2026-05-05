<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreInteractionRequest extends FormRequest
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
            'type'=>'required|in:call,email,meeting',
            'notes'=>'nullable|string',
            'interaction_date'=>'required|date'
        ];
    }

    public function messages():array{
        return [
            'type.required' => 'Please select the type of interaction.',
            'type.in' =>'Invalid type selected.',
            'interaction_date.required' => 'Please provide the interaction date.',
            'interaction_date.date'=>'Invalid date format.',
        ];
    }

}
