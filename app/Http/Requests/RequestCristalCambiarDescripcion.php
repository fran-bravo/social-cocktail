<?php

namespace socialCocktail\Http\Requests;

use socialCocktail\Http\Requests\Request;

class RequestCristalCambiarDescripcion extends Request
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
            'capacidad'=>'numeric|max:100|required',
            'descripcion'=>'max:500',
        ];
    }
}
