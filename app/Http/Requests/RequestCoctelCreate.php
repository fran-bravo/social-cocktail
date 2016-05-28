<?php

namespace socialCocktail\Http\Requests;

use socialCocktail\Http\Requests\Request;

class RequestCoctelCreate extends Request
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
            'nombre'=>'unique:cocteles|required|max:50',
            'metodo'=>'required|exist_metodo',
            'cristal_id'=>'required|exist_cristaleria',
            'preparacion'=>'required',
            'historia'=>'max:500',
            'tipococtel_id'=>'exists:tiposcoctel,id|required',
            'imagen'=>'image'
        ];
    }
}
