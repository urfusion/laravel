<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ShopeditRequest extends FormRequest {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            // user  validetion
           // 'first_name' => 'required|min:3',
          //  'last_name' => 'required|min:3',
         //   'full_name' => 'required|min:3',
                //  'phone' => 'required|min:3',
                //  'contact_email' => 'required|email',
//            'contact_email' => 'required|email|unique:users',
//            'password' => 'required|confirmed|min:5',
        //     'shop_name'=>'required',
        //    'chain'=>'required',
             
        ];
    }

    public function messages() {
        return [
//            'first_name.required' => 'Please provide a First Name.',
//            'last_name.required' => 'Please provide a Last Name.'
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
