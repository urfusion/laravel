<?php namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
 
class UserProfileImage extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
		'image' => 'mimes:jpeg,bmp,png',	
		
		];
	}

	
	public function messages()
    {
        return [
           
            'image.mimes' => 'Not a valid file type. Valid types include jpeg, bmp and png.'
        ];
    }
	
	
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

}
