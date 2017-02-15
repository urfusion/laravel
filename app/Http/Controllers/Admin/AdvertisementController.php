<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Admin\NewAddRequest;
use App\Http\Requests\Admin\EditAddRequest;
use App\Http\Controllers\AdminController;
use App\Advertisement;
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

class AdvertisementController extends AdminController {
    /*
     * Display a listing of the resource.
     *
     * @return Response
     */
    /* Shop Owner users */

    public function index() {

        $query = DB::table('advertisements');
         if (Request::isMethod('post')) {

            $query = $query->where(function($q) {
                $q->orWhere('title', 'LIKE', '%' . Request::input('searchbox') . '%')
                        ->orWhere('image_url', 'LIKE', '%' . Request::input('searchbox') . '%');
            });
        }
        $Data = $query->paginate(10);
        return view('admin.advertisement.index', compact('Data'));
    }
    public function getAdd() {

        return view('admin.advertisement.create_edit');
    }

    public function postAdd(NewAddRequest $request) {
         if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }
        $Advertisement = new Advertisement();
        $Advertisement->title = Input::get('title');
        $Advertisement->type = Input::get('type');
        $Advertisement->page = Input::get('page');
        $Advertisement->position = Input::get('position');
        $Advertisement->Status = '1';


        if (Input::get('googlescript') != null) {
            $Advertisement->googlescript = Input::get('googlescript');
        }
        
        $image = Input::file('image');
        if ($image != null) {

            $image_name = time() . "-shop_image_1" . $image->getClientOriginalName();
            $image->move('uploads/Advertisement', $image_name);
            $Advertisement->image_url = url() . '/uploads/advertisement/' . $image_name;
        }
        $Advertisement->save();
Session::flash('error_type', 'Well done!'); 
				Session::flash('flash_message', 'Advertisement successfully Added.');
				Session::flash('flash_type', 'alert-success');
        return Redirect::to('admin/advertisement/index');
    }

    public function getedit($id) {
        $id = base64_decode($id);
        $Data = Advertisement::find($id);
        return view('admin.advertisement.create_edit', compact('Data'));
    }

    public function postedit(EditAddRequest $request, $id) {
         if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }
        $id = base64_decode($id);
        $Advertisement = Advertisement::find($id);
        $Advertisement->title = Input::get('title');
        $Advertisement->type = Input::get('type');
        $Advertisement->page = Input::get('page');
        $Advertisement->position = Input::get('position');
        $Advertisement->Status = '1';
        $image = Input::file('image');
        if ($image != null) {

            $image_name = time() . "-shop_image_1" . $image->getClientOriginalName();
            $image->move('uploads/advertisement', $image_name);
            $Advertisement->image_url = url() . '/uploads/advertisement/' . $image_name;
        }
        $Advertisement->save();
        Session::flash('error_type', 'Well done!'); 
				Session::flash('flash_message', 'Advertisement successfully updated.');
				Session::flash('flash_type', 'alert-success');
        return Redirect::to('admin/advertisement/index');
    }

    public function advdelete($id) {

        $id = base64_decode($id);
        $Advertisement = Advertisement::find($id);
        $Advertisement->delete();
        return Redirect::to('admin/advertisement/index');
    }

    public function getactive($id) {
        $id = base64_decode($id);
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }

        $Advertisement = Advertisement::find($id);
        $Advertisement->Status = 1;
        $Advertisement->save();

        return Redirect::to('admin/advertisement/index');
    }

    public function getinactive($id) {
        $id = base64_decode($id);
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }
        $Advertisement = Advertisement::find($id);
        $Advertisement->Status = 0;
        $Advertisement->save();
        return Redirect::to('admin/advertisement/index');
    }

    public function getdetail($id) {

        $id = base64_decode($id);
        $Data = Advertisement::find($id);
        return view('admin.advertisement.detail', compact('Data'));
    }
    
    public function getactiveall() {
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
// Session::reflash();	
        }

        if (Request::ajax()) {

            $checkboxvalue = Request::get('checkboxvalue');
            $checkboxvalue = (explode(",", $checkboxvalue));
            $Data = DB::table('advertisements')
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
            $Data = DB::table('advertisements')
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
            $Data = DB::table('advertisements')
                    ->whereIn('id', $checkboxvalue)
                    ->delete();
            return ['success' => true, 'data' => $Data];
        }
    }


}
