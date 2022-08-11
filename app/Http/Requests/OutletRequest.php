<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OutletRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'outlet_name' => 'required',
            'opening_hours' => 'required',
            'closing_hours' => 'required',
            'outlet_phone' => 'required',
            'instagram_link' => 'required',
            'price_outlet_per_hour' => 'required'
        ];
    }
}
