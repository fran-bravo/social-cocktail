<?php

namespace socialCocktail\Http\Requests;

use socialCocktail\Http\Requests\Request;

class CategoriasRequest extends Request
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
            'nombre'=>'required|max:20',
        ];
    }
}
