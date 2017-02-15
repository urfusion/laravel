<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ShopUpdateRequest;
use App\Http\Requests\Admin\ShopOwnerUpdateRequest;
use App\Http\Controllers\AdminController;
use App\ShopTemp;
use App\Landmark;
use App\Shop;
use App\User;
use App\ShopOwner;
use Datatables;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Helpers\Text;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ShopOwnerController extends AdminController {
    /*
     * Display a listing of the resource.
     *
     * @return Response
     */
    /* Shop Owner users */

    public function index() {

         
        $query = ShopOwner::with('Shop');
        $query = $query->where('role_id', 4);
        
        $Data = $query->paginate(10);
        return view('admin.shopowner.index', compact('Data')); 
             
       
    }
    public function getmembers() {
               
             $query = DB::table('users')->where('role_id', 0);
		   
		   if (Request::isMethod('post')) { 
   
   $query =  $query->where(function($q)
            {
                $q->orWhere('name', 'LIKE', '%'. Request::input('searchbox') .'%')
                    ->orWhere('email', 'LIKE', '%'. Request::input('searchbox') .'%');
                   
            });
   
     
	 
} 
		   
		 $Data =  $query->paginate(10);
//    echo"<pre>";
//                 print_r($Data);
//                 die;
//   
        return view('admin.members.index', compact('Data')); 
             
       
    }

      public function getdeleteall() {

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }

        if (Request::ajax()) {

            $checkboxvalue = Request::get('checkboxvalue');
            $checkboxvalue = (explode(",", $checkboxvalue));
            $Data = DB::table('shop_owners')
                    ->whereIn('id', $checkboxvalue)
                    ->delete();
            Session::flash('error_type', 'Well done!');
            Session::flash('flash_message', 'Shop owner request deleted successfully.');
            Session::flash('flash_type', 'alert-success');
            return ['success' => true, 'data' => $Data];
        }
    }


    

   
    

    

    

    public function getupdate($id) {

       if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }
        $id = base64_decode($id);
        $Data = ShopOwner::find($id);
        
        return view('admin.shopowner.update', compact('Data'));
    }

    public function postupdate(ShopOwnerUpdateRequest $request, $id) {
        
        $id = base64_decode($id);
        $shopOwner = ShopOwner::find($id);
//        $ShopS_ID = $shopOwner->shops_id;
       $ShopS_ID= explode(',', $shopOwner->shops_id);
                     
                    foreach ($ShopS_ID as $key => $item) { 
        $shop = Shop::find($item);
        $shop->contact_name = Request::input('name');
        $shop->contact_email = Request::input('email');
        $shop->shop_email = Request::input('email_1');
        $shop->shop_phone_1 = Request::input('phone_1');
        $shop->shop_email_2 = Request::input('email_2');
        $shop->shop_phone_2 = Request::input('phone_2');
        $shop->role_id = '4';
        $shop->save();
                    }
                    
      $user = new User();
        
        $user->email =  $request->email;
        $user->password =  $request->password ;
        $user->confirmation_code = str_random(32);
        $user->confirmed = '0';
        $user->first_name =  $request->first_name;
        $user->last_name =  $request->last_name;
        $user->phone_1 =  $request->phone_1;
        $user->email_1 = $request->email_1;
        $user->first_name_2 =  $request->first_name_2;
        $user->last_name_2 = $request->last_name_2;
        $user->phone_2 =  $request->phone_2;
        $user->email_2 =  $request->email_2;
        $user->shops_id =  $shopOwner->shops_id;
         $user->role_id = '4';
        // $user->confirmed = '1';
          
        $user->save();  
        
        $confirmation_code = $user->confirmation_code;
            $datac['confirmation_code'] = $confirmation_code ;
         Mail::send('emails.welcome', $datac, function($message) {
            $message->to(Input::get('email') )
                ->subject('Verify your email address');
        });
        
        return Redirect::to('admin/shopowner/index');
    }
    public function ownconfirm($confirmation_code)
    {
         
        die('fghfghfh');
        if( ! $confirmation_code)
        {
            //throw new InvalidConfirmationCodeException;
        }

        $user = User::whereConfirmationCode($confirmation_code)->first();

        if ( ! $user)
        {
            //throw new InvalidConfirmationCodeException;
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

       // Flash::message('You have successfully verified your account.');

          return view('auth.login');
    }
    public function getdetail($id) {
 
        $id = base64_decode($id);
        $Data = ShopOwner::find($id);
//        print_r($Data);
//        die;
        return view('admin.shopowner.detail', compact('Data'));
    }

   

     
    

     

 

   
}
