<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardStoreRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'first_edition' => 'required',
            'serial_code' => 'required',
            'ATK' => 'required|string|max:2',
            'DEF' => 'required|string|max:2',
            'starts' => 'required|string|max:2',
            'description' => 'string|max:50',
            'date_created' => 'date'
        ];
    }
}
