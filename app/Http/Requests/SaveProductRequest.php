<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SaveProductRequest extends Request
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
            'category_id' => 'required|integer',
            'title' => 'required|min:2',
            'description' => 'required|min:20',
            'price' => 'required|numeric',
            'availability' => 'integer',
            'image' => 'required|image|mimes:jpeg,jpg,bmp,png,gif'
        ];
    }
}
