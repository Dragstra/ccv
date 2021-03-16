<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class ConfigurationValidator extends FormRequest
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
            'products' => 'required',
            'productsToConnect' => 'required',
            'baseCategory' => 'required',
            'link' => 'required|integer',
            'percentage' => 'required|boolean',
            'productLength' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'productWidth' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'length' => 'required|boolean',
            'order' => 'required|integer',
            'price' => 'required'
        ];
    }
}
