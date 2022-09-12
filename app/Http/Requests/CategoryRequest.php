<?php

namespace App\Http\Requests;

use App\Rules\SeriaRule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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

    public function prepareForValidation()
    {
        $this->merge([
            'slug'=>'222',
        ]);
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:4|max:255',
            'slug' => [ new SeriaRule()],
        ];
    }

    public function messages(){
        return[
            'name.min'=> 'Поле :attribute не должно быть короче :min-x символов',
            'name.required'=>'Обязательное поле',

        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Название категории'
        ];
    }



}
