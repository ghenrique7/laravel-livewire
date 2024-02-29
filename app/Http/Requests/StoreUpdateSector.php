<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateSector extends FormRequest
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
            'name' => ['required'],
            'abbreviation' => ['required'],
            'type' => ['required'],
            'city' => ['required']
        ];
    }

    protected function prepareForValidation(): void
    {
            $this->merge([
                'abbreviation' => Str::upper($this->abbreviation),
            ]);
    }
}
