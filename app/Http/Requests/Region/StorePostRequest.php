<?php

namespace App\Http\Requests\Region;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'province_id' => 'required|integer',
            'name' => 'required|string|min:2|max:50',
            'name_en' => 'required|string|min:2|max:50',
        ];
    }
}
