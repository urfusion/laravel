<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopClosureRequest extends FormRequest {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
          
            'shop_name'=>'required',
            'shop_name_c'=>'required',
            
                 ];
    }

    public function messages() {
        return [
            'shop_name.required' => 'Please provide a Shop Name.',
            'shop_name_c.required' => 'Please provide a Shop Name.',
            'region.required' => 'Please provide a Region Name.',
            'district.required' => 'Please provide a District',
            //'address.required' => 'Please provide a address.',
          
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

}
