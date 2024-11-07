<?php

namespace Modules\OpportunitiesManagement\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Modules\OpportunitiesManagement\Enums\OpportunityStatus;

class OpportunityStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth('api')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'subject' => 'required|string|max:255',
            'customer' => 'required|integer',
            'estimated_price' => 'required|integer|min:0',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:' . implode(',', array_column(OpportunityStatus::cases(), 'value'))
        ];
    }
}
