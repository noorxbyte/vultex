<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateMovieRequest extends Request
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
            'imdb' => 'required|max:16|unique:movies',
            'release_year' => 'required|integer',
            'language_id' => 'required|exists:languages,id',
            'quality_id' => 'required|exists:qualities,id',
        ];
    }
}
