<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveVideogameRequest extends FormRequest
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
            'title' => 'required',
            'rating' => 'required',
            'console' => 'required',
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'url' => [
                'required', 
                //Pide url unica pero ignora la url de este proyecto
                Rule::unique('videogames')->ignore($this->route('videogame'))],
        ];
    }
}
