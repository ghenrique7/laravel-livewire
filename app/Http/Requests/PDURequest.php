<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PDURequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'sector_id' => 'required',
            'initial_year'=>  ['required', 'digits:4'],
            'status'=> 'required',
            'vision' => 'nullable',
            'mission'=> 'nullable'
        ];
    }

}
