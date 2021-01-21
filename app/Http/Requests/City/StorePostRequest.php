<?php

namespace App\Http\Requests\City;

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
            'region_id' => 'required|integer',
            'post_code' => 'required|string|min:3|max:10',
            'name' => 'required|string|min:2|max:50',
            'name_en' => 'required|string|min:2|max:50',
        ];
    }
}
