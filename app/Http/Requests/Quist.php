<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Quist extends Request
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
        $rules =[

            'pregunta_id' => 'required',
            'estado' => 'required',

        ];

        foreach ($this->request->get('name') as $key => $val) {
            
            $rules['name.'.$key] = 'required';
        }

        return $rules;
    }
}
