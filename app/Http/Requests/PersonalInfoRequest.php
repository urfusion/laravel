<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalInfoRequest extends FormRequest {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
          
            'guest_name'=>'required',
            'guest_email'=>'required|email',
            
                 ];
    }

    public function messages() {
        return [
            'guest_name.required' => 'Please provide your name.',
            'guest_email.required' => 'Please provide your valid.',
          
          
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
