<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateEndpointRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $id = $this->site->id ?? '';
        return [
            'endpoint' => [
                'required',
                'max:255',
                Rule::unique('endpoints')
                    ->where('site_id', $id)
                    ->ignore($this->segment(5)),
            ],
            'frequency' => [
                'required',
            ],
        ];
    }
}
