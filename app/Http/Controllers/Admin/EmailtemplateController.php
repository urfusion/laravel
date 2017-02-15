<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Admin\EmailEditRequest;
use App\Http\Controllers\AdminController;
use App\Emailmanagement;
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

class EmailtemplateController extends AdminController {
    
    public function index() {
        $query = DB::table('emailtemplates');
         if (Request::isMethod('post')) {

            $query = $query->where(function($q) {
                $q->orWhere('title', 'LIKE', '%' . Request::input('searchbox') . '%')
                        ->orWhere('description', 'LIKE', '%' . Request::input('searchbox') . '%');
            });
        }
        $Data = $query->paginate(10);
        return view('admin.emailmanagement.index', compact('Data'));   
    }
    public function getedit($id) {
        $id = base64_decode($id);
        $Data = Emailmanagement::find($id);
       
        return view('admin.emailmanagement.edit', compact('Data'));
    }
      public function postedit(EmailEditRequest $request,$id){
           if ( Session::has('flash_message') )
	{
		Session::forget('flash_message');
	 //Session::reflash();	
	}
        $id = base64_decode($id);
        $Data = Emailmanagement::find($id);
        $Data->title = Input::get('title');
        $Data->description = Input::get('description');
       
       $Data->save();
       Session::flash('error_type', 'Well done!'); 
				Session::flash('flash_message', 'Email template successfully updated.');
				Session::flash('flash_type', 'alert-success');
        return Redirect::to('admin/emailmanagement/index');
    }
        public function emaildelete($id) {
        
        $id = base64_decode($id);
        $Data = Emailmanagement::find($id);
        $Data->delete();
         return Redirect::to('admin/emailmanagement/index');
    }                       
     public function getdetail($id){
         
          $id = base64_decode($id);
        $Data = Emailmanagement::find($id);
        return view('admin.emailmanagement.detail', compact('Data'));
     } 
     public function getactiveall() {
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
// Session::reflash();	
        }

        if (Request::ajax()) {

            $checkboxvalue = Request::get('checkboxvalue');
            $checkboxvalue = (explode(",", $checkboxvalue));
            $users = DB::table('users')
                    ->whereIn('id', $checkboxvalue)
                    ->update(['Status' => 1]);
            return ['success' => true, 'data' => $users];
        }
    }

    public function getinactiveall() {
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }

        if (Request::ajax()) {

            $checkboxvalue = Request::get('checkboxvalue');
            $checkboxvalue = (explode(",", $checkboxvalue));
            $Data = DB::table('emailtemplates')
                    ->whereIn('id', $checkboxvalue)
                    ->update(['Status' => 0]);
            return ['success' => true, 'data' => $Data];
        }
    }

    public function getdeleteall() {

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }

        if (Request::ajax()) {

            $checkboxvalue = Request::get('checkboxvalue');
            $checkboxvalue = (explode(",", $checkboxvalue));
            $Data = DB::table('emailtemplates')
                    ->whereIn('id', $checkboxvalue)
                    ->delete();
            return ['success' => true, 'data' => $Data];
        }
    }

     
    
}