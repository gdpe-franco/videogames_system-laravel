<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

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
            'rating_id' => [
                'required',
                'exists:ratings,id'
            ],
            'console_id' => [
                'required',
                'exists:consoles,id'
            ],
            'purchase_price' => 'required',
            //'sale_price' => 'required',
            'url' => [
                'required', 
                Rule::unique('videogames')->ignore($this->route('videogame'))], //Pide url unica pero ignora la url de este proyecto
            'image' => [
                $this->route('videogame')? 'nullable' : 'required',
                'image',
                //'max:2000'
                //'dimensions:min_width=600, min_height=400'
            ],  // 'image' => jepg, png, bmp, gif, svg o webp
        ];
    }
}
