<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string|email',
            'domain' => 'required|string|url',
            'category' => 'required_if:private,public'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Er is geen email ingevuld.',
            'name.required' => 'Er is geen naam ingevuld',
            'domain.required' => 'Er is geen domein ingevuld',
            'domain.url' => 'Dit is een onjuist domein',
            'category.required' => 'Er is geen categorie gekozen waar producten in komen',
        ];
    }
}
