<?php

namespace Modules\OpportunitiesManagement\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Modules\OpportunitiesManagement\Enums\OpportunityStatus;

class OpportunityUpdateRequest extends FormRequest
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
            'subject' => 'string|max:255',
            'customer' => 'integer',
            'estimated_price' => 'integer|min:0',
            'user_id' => 'exists:users,id',
            'status' => 'in:' . implode(',', array_column(OpportunityStatus::cases(), 'value'))
        ];
    }
}
