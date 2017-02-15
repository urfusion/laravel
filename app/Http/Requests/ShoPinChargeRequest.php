<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShoPinChargeRequest extends FormRequest {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
          
            
             'email'=>'required|email',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|min:8|same:password',
             'first_name'=>'required',
            'last_name'=>'required',
           
            'email_1'=>'required|email',
            'phone_1'=>'required',
              'checkboxval' => 'required' 
           
                 ];
    }

    public function messages() {
        return [
            
            'email.required' => 'Please provide your valid email address.',
            'first_name.required' => 'Please provide your shop in-charge 1  first name.',
            'last_name.required' => 'Please provide your shop in-charge 1  last name.',
            'phone_1.required' => 'Please provide your valid Shop in-charge 1 contact number.',
             'email_1.required' => 'Please provide your valid Shop in-charge 1 eamil address.',
             'checkboxval.required' => 'Please select atleast one from claim your shops.',
             
            
          
          
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
