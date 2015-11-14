<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class VideosRequest extends Request
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
            'language' => 'exists:languages,name',
            'genre' => 'exists:genres,name',
            'sort' => 'in:v.release_year,price,name',
            'order' => 'in:ASC,DESC',
            'q' => 'max:64',
        ];
    }
}
