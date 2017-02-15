<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\User;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\Admin\UserEditRequest;
use App\Http\Requests\Admin\UserProfileImage;

use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\UserPasswordtRequest;
use Datatables;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class SubadminController extends AdminController {
    /*
     * Display a listing of the resource.
     *
     * @return Response
     */
 
    public function index() {
	
	echo "manish"; die;
        if ( Session::has('flash_message') )
	{
		Session::forget('flash_message');
		 	
	}
	    
         $query = User::where('role_id',2);
		   
		   if (Request::isMethod('post')) { 
   
   $query =  $query->where(function($q)
            {
                $q->orWhere('name', 'LIKE', '%'. Request::input('searchbox') .'%')
                    ->orWhere('email', 'LIKE', '%'. Request::input('searchbox') .'%');
                   
            });
   
     
	 
} 
		   
		 $User =  $query->paginate(10);
    
 
  return view('admin.users.index', compact('User'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate() {
 if ( Session::has('flash_message') )
	{
		Session::forget('flash_message');
	// Session::reflash();	
	}
        return view('admin.users.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate(UserRequest $request) {
         if ( Session::has('flash_message') )
	{
		Session::forget('flash_message');
	 //Session::reflash();	
	}
        $user = new User();
        $user->name = $request->name;
         $user->role_id = $request->role_id;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->confirmation_code = str_random(32);
        $user->confirmed = '0';   
		$user->phone = $request->phone;
		$user->address = $request->address;
		$user->state = $request->state;
		$user->city = $request->city;
		 $user->admin = '1';  
		$user->postal_Code = $request->postal_Code;		
        
        $user->save();
		return Redirect::to('admin/users/index');                       
	 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $user
     * @return Response
     */
    public function editprofile($id) {
 if ( Session::has('flash_message') )
	{
		Session::forget('flash_message');
	// Session::reflash();	
	}  
	    $id=base64_decode($id);
        $user = User::find($id);
        return view('admin.users.editprofile', compact('user'));
    }
	
	 public function changeProfileImage($id) {
		  $id=base64_decode($id);
          if ( Session::has('flash_message') )
	{
		Session::forget('flash_message');
	 
	}
$id=base64_decode($id);
        $user = User::find($id);
        return view('admin.users.changeProfileImage', compact('user'));
    }


 public function postchangeProfileImage(UserProfileImage $request, $id) {
	  $id=base64_decode($id);
          if ( Session::has('flash_message') )
	{
		Session::forget('flash_message');
	// Session::reflash();	
	}
		   
		$file = Request::file('image');	
 		if($file!=null){
        $image_name = time()."-".$file->getClientOriginalName();		 
        $file->move('uploads/users', $image_name);  
        $user = User::find($id);
        $user->image = $image_name;
        $user->save();
		Session::flash('error_type', 'Well done!'); 
				Session::flash('flash_message', 'Profile Image successfully updated.');
				Session::flash('flash_type', 'alert-success');
		}
		 
        $user = User::find($id);
        
        return view('admin.users.changeProfileImage', compact('user'));
    }


    public function postEditProfile(UserEditRequest $request, $id) {
    if ( Session::has('flash_message') )
	{
		Session::forget('flash_message');
	 //Session::reflash();	
	}   
	 
	   $id=base64_decode($id);
        $user = User::find($id);
        $user->name = $request->name;
		$user->phone = $request->phone;
		$user->address = $request->address;
		$user->state = $request->state;
		$user->city = $request->city;
		$user->postal_Code = $request->postal_Code;
		
		 
        $user->save();
		
		Session::flash('error_type', 'Well done!'); 
	    Session::flash('flash_message', 'Profile successfully Updated.');
	    Session::flash('flash_type', 'alert-success');
        return view('admin.users.editprofile', compact('user'));
    }

    public function getChangePasswor($id) {

	   $id=base64_decode($id);
	 if (Session::has('flash_message'))
	{
	//echo "manish";die;
	Session::forget('flash_message');
	 //Session::reflash();	
	}
        $user = User::find($id);
        return view('admin.users.changepassword', compact('user'));
    }

    public function postChangePasswor(UserPasswordtRequest $request, $id) {

	   $id=base64_decode($id);
	 if ( Session::has('flash_message') )
	{
		Session::forget('flash_message');
	 //Session::reflash();	
	}
	
        $user = User::find($id);
        $password = $request->password;
        if (!empty($password)) {

            $passwordConfirmation = $request->password_confirmation;
            if ($password === $passwordConfirmation) {
                $user->password = bcrypt($password);				 
				$user->save();
				
				Session::flash('error_type', 'Well done!'); 
				Session::flash('flash_message', 'Password update successfully.');
				Session::flash('flash_type', 'alert-success');
            }else{
				Session::flash('error_type', 'Oh snap!'); 
				Session::flash('flash_message', 'Password not Match.');
				Session::flash('flash_type', 'alert-danger');
			}
        }
 
        
        return view('admin.users.changepassword', compact('user'));
    }

    public function getEdit($id) {
		 
	 if ( Session::has('flash_message') )
	{
		Session::forget('flash_message');
	 //Session::reflash();	
	}   
	    $id=base64_decode($id);
        $user = User::find($id);
        return view('admin.users.create_edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $user
     * @return Response
     */
    public function postEdit(UserEditRequest $request, $id) {
	 if ( Session::has('flash_message') )
	{
		Session::forget('flash_message');
	// Session::reflash();	
	}  
	    $id=base64_decode($id);
        $user = User::find($id);
        $user->name = $request->name;
		$user->phone = $request->phone;
		$user->address = $request->address;
		$user->state = $request->state;
		$user->city = $request->city;
		$user->postal_Code = $request->postal_Code;
		
		
        $user->save();
		Session::flash('error_type', 'Well done!'); 
		Session::flash('flash_message', 'Sub admin update successfully.');
		Session::flash('flash_type', 'alert-success');
        return view('admin.users.create_edit', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $user
     * @return Response
     */
    public function getDelete($id) {
	 if ( Session::has('flash_message') )
	{
		Session::forget('flash_message');
	 //Session::reflash();	
	}
	 $id=base64_decode($id);
        
         $user = User::find($id);
        $user->delete();
		return Redirect::to('admin/users/index');     
        
    }
    
	 public function getactive($id) {
		  $id=base64_decode($id);
	  if ( Session::has('flash_message') )
	{
		Session::forget('flash_message');
	 //Session::reflash();	
	}
	 
        $user = User::find($id);
        $user->Status =1;
        $user->save();
		       
       return Redirect::to('admin/users/index');   
    }
	public function getincative($id) {	
$id=base64_decode($id);	
 if ( Session::has('flash_message') )
	{
		Session::forget('flash_message');
	 //Session::reflash();	
	}	
        $user = User::find($id);
        $user->Status =0;
        $user->save();
       return Redirect::to('admin/users/index');   
    }
	
	
	 public function getactiveall( ) {
	  if ( Session::has('flash_message') )
	{
		Session::forget('flash_message');
	// Session::reflash();	
	}
	 
	  if(Request::ajax()){
	  
	$checkboxvalue = Request::get('checkboxvalue');
	$checkboxvalue= (explode(",",$checkboxvalue));	   
	$users = DB::table('users')
                    ->whereIn('id', $checkboxvalue)
                     ->update(['Status' => 1]); 	  
	return ['success' => true, 'data' =>$users ];
	   
	   }
	    
    }
	
	public function getinactiveall( ) {
	 if ( Session::has('flash_message') )
	{
		Session::forget('flash_message');
	 //Session::reflash();	
	}
	 
	  if(Request::ajax()){
	  
	$checkboxvalue = Request::get('checkboxvalue');
	$checkboxvalue= (explode(",",$checkboxvalue));	   
	$users = DB::table('users')
                    ->whereIn('id', $checkboxvalue)
                     ->update(['Status' => 0]); 	  
	return ['success' => true, 'data' =>$users ];
	   
	   }
	    
    }
	public function getdeleteall( ) {
		
	 if ( Session::has('flash_message') )
	{
		Session::forget('flash_message');
	 //Session::reflash();	
	}
	 
	  if(Request::ajax()){
	  
	$checkboxvalue = Request::get('checkboxvalue');
	$checkboxvalue= (explode(",",$checkboxvalue));	   
	$users = DB::table('users')
                    ->whereIn('id', $checkboxvalue)
                     ->delete(); 	  
	return ['success' => true, 'data' =>$users ];
	   
	   }
	    
    }
	
    /**
     * Remove the specified resource from storage.
     *
     * @param $user
     * @return Response
     */
    public function postDelete(DeleteRequest $request, $id) {
	 if ( Session::has('flash_message') )
	{
		Session::forget('flash_message');
	 //Session::reflash();	
	}
        $user = User::find($id);
        $user->delete();
    }

	  public function getdetail($id) {
		   $id=base64_decode($id);
	   if ( Session::has('flash_message') )
	{
		Session::forget('flash_message');
	// Session::reflash();	
	}
        $user = User::find($id);
        return view('admin.users.detail', compact('user'));
    }
    

}
