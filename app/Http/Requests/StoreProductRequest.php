<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Auth;

class StoreProductRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'active' => 'required|boolean',
            'type' => 'required|in:MOVIE,SERIES,ANIME,VIDEO',
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0.01|regex:/^\d*(\.\d{2})?$/',
        ];
    }
}
