<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ShopUpdateRequest extends FormRequest {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
          
            'shop_name'=>'required',
            'shop_name_c'=>'required',
            
//            'region'=>'required',
//            'district'=>'required',
//            'address'=>'required',
        ];
    }

    public function messages() {
        return [
           'shop_name.required' => 'Please provide a Shop name.',
            'shop_name_c.required' => 'Please provide a Shop name.',
//            'shop_name.required' => 'Please provide a shop Name.',
//            'chain.required' => 'Please provide a chain Name.',
//            'region.required' => 'Please provide a region.',
//            'district.required' => 'Please provide a district.',
//            'address.required' => 'Please provide a address .'
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
