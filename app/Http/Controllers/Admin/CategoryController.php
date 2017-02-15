<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Gallery;
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

class CategoryController extends AdminController {
    /*
     * Display a listing of the resource.
     *
     * @return Response
     */
    /* Shop Owner users */

    public function index() {

        $Data = Gallery::paginate(10);
        return view('admin.category.index', compact('Data'));
    }

    public function getAdd() {

        return view('admin.category.create_edit');
    }

     function postAdd() {
        
       $image =  Request::file('image');
//      echo public_path();die;
        if ($image != null) {
           // echo url(); die;
           
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $path =  'uploads/'.$filename ;
            Image::make($image->getRealPath())->resize(1253, 498)->save($path);
           
            $Data = new Gallery();
            $Data->imageurl = url().'/uploads/'.$filename;
          
         $Data->save();
        }
 
        return Redirect::to('admin/gallery/index');
    }
     public function getedit($id) {
       
          $id = base64_decode($id);
          $Data = Gallery::find($id);
        return view('admin.gallery.create_edit', compact('Data'));
    }
    public function postedit($id){
        $id = base64_decode($id);
        $Data = Gallery::find($id);
//        $Data->title = Input::get('title');
//        $Data->type = Input::get('type');
//        $Data->page = Input::get('page');
//        $Data->position = Input::get('position');
        $Data->Status='1';
       $image =  Request::file('image');
//      echo public_path();die;
        if ($image != null) {
           // echo url(); die;
           
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $path =  'uploads/'.$filename ;
            Image::make($image->getRealPath())->resize(1253, 498)->save($path);
           
            $Data->imageurl = url().'/uploads/'.$filename;
            $Data->save();
        }
 
        return Redirect::to('admin/gallery/index');
        $Data->save();
       return Redirect::to('admin/gallery/index');
        
}
    public function delete($id) {
        
        $id = base64_decode($id);
        $Data = Gallery::find($id);
        $Data->delete();
         return Redirect::to('admin/gallery/index');
    }
     public function getactive($id) {
        $id = base64_decode($id);
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }

        $Data = Gallery::find($id);
        $Data->Status = 1;
        $Data->save();

        return Redirect::to('admin/gallery/index');
    }
     public function getinactive($id) {
        $id = base64_decode($id);
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }
       $Data = Gallery::find($id);
        $Data->Status = 0;
        $Data->save();
        return Redirect::to('admin/gallery/index');
    }
     public function getdetail($id){
         
          $id = base64_decode($id);
        $Data = Gallery::find($id);
        return view('admin.gallery.detail', compact('Data'));
     } 
     public function getactiveall() {
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
// Session::reflash();	
        }

        if (Request::ajax()) {

            $checkboxvalue = Request::get('checkboxvalue');
            $checkboxvalue = (explode(",", $checkboxvalue));
            $Data = DB::table('gallerys')
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
            $Data = DB::table('gallerys')
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
            $Data = DB::table('gallerys')
                    ->whereIn('id', $checkboxvalue)
                    ->delete();
            return ['success' => true, 'data' => $Data];
        }
    }

}
