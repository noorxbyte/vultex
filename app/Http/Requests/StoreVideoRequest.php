<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreVideoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'imdb' => 'unique:videos',
            'release_year' => 'required',
            'release_date' => 'date',
            'language_id' => 'exists:languages,id',
            'quality_id' => 'exists:qualities,id',
        ];
    }
}
