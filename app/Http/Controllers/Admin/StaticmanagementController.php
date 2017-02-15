<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\NewStaticRequest;
use App\Http\Controllers\AdminController;
use App\Staticpage;
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

class StaticmanagementController extends AdminController {
    
    public function index() {
        $query = DB::table('staticpages');
         if (Request::isMethod('post')) {

            $query = $query->where(function($q) {
                $q->orWhere('title', 'LIKE', '%' . Request::input('searchbox') . '%')
                        ->orWhere('title_c', 'LIKE', '%' . Request::input('searchbox') . '%');
            });
        }
        $Data = $query->paginate(10);
        return view('admin.staticpages.index', compact('Data'));   
    }
    public function getAdd() {
 
        return view('admin.staticpages.add_edit');
    }
    public function getedit($id) {
        $id = base64_decode($id);
        $Data = Staticpage::find($id);
        return view('admin.staticpages.add_edit', compact('Data'));
    }
     public function postAdd(NewStaticRequest $request) {
         if ( Session::has('flash_message') )
	{
		Session::forget('flash_message');
	 //Session::reflash();	
	}
        $Staticpage = new Staticpage();
        $Staticpage->title = Input::get('title');
        $Staticpage->title_c = Input::get('title_c');
        $Staticpage->description = Input::get('description');
        $Staticpage->metatag = Input::get('metatag');
        $Staticpage->metakeyword = Input::get('metakeyword');
       
        $Staticpage->save();
       Session::flash('error_type', 'Well done!'); 
				Session::flash('flash_message', 'Page successfully Add.');
				Session::flash('flash_type', 'alert-success'); 
        return Redirect::to('admin/staticpages/index');
    }
    public function postedit(NewStaticRequest $request, $id){
          if ( Session::has('flash_message') )
	{
		Session::forget('flash_message');
	 //Session::reflash();	
	}
        $id = base64_decode($id);
        $Staticpage = Staticpage::find($id);
        $Staticpage->title = Input::get('title');
        $Staticpage->title_c = Input::get('title_c');
        $Staticpage->description = Input::get('description');
        $Staticpage->metatag = Input::get('metatag');
        $Staticpage->metakeyword = Input::get('metakeyword');
        $Staticpage->save();
       Session::flash('error_type', 'Well done!'); 
				Session::flash('flash_message', 'Page successfully updated.');
				Session::flash('flash_type', 'alert-success');
        return Redirect::to('admin/staticpages/index');
    }
        public function pagedelete($id) {
        
        $id = base64_decode($id);
        $Staticpage = Staticpage::find($id);
        $Staticpage->delete();
         return Redirect::to('admin/staticpages/index');
    }                       
     public function getdetail($id){
         
          $id = base64_decode($id);
        $Data = Staticpage::find($id);
        return view('admin.staticpages.detail', compact('Data'));
     } 
     public function getactive($id) {
        $id = base64_decode($id);
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }

        $Data = Staticpage::find($id);
        $Data->Status = 1;
        $Data->save();

        return Redirect::to('admin/staticpages/index');
    }
     public function getinactive($id) {
        $id = base64_decode($id);
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }
        $Data = Staticpage::find($id);
        $Data->Status =  0;
        $Data->save();
        return Redirect::to('admin/staticpages/index');
    }
    
    
    public function getactiveall() {
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
// Session::reflash();	
        }

        if (Request::ajax()) {

            $checkboxvalue = Request::get('checkboxvalue');
            $checkboxvalue = (explode(",", $checkboxvalue));
            $Data = DB::table('staticpages')
                    ->whereIn('id', $checkboxvalue)
                    ->update(['Status' => 1]);
            return ['success' => true, 'data' => $Data];
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
            $Data = DB::table('staticpages')
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
            $Data = DB::table('staticpages')
                    ->whereIn('id', $checkboxvalue)
                    ->delete();
            return ['success' => true, 'data' => $Data];
        }
    }

    }