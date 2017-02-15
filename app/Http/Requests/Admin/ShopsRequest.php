<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ShopsRequest extends FormRequest {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            // user  validetion
             
//            'email' => 'required|email|unique:users',
//            'username' => 'required|unique:users',
//            'password' => 'required|confirmed|min:5',
//             
            
            
//            'contact_email' => 'required|email|unique:users',
//            'password' => 'required|confirmed|min:5',
            'shop_name'=>'required',
         //   'chain'=>'required',
             
        ];
    }

    public function messages() {
        return [
//            'first_name.required' => 'Please provide a First Name.',
//            'last_name.required' => 'Please provide a Last Name.',
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
