<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GamesRequest extends Request
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
            'platform' => 'exists:platforms,name',
            'genre' => 'exists:genres,name',
            'sort' => 'in:g.updated_at,g.release_date,price,name',
            'order' => 'in:ASC,DESC',
            'q' => 'max:64',
        ];
    }
}
