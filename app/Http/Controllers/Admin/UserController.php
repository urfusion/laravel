<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\User;
use App\Shop;
use App\Country;
use App\Procuct;
use App\Shoptime;
use App\Shopimage;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\Admin\UserEditRequest;
use App\Http\Requests\Admin\UserProfileImage;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\UserPasswordtRequest;
use App\Http\Requests\Admin\ShopsRequest;
use App\Http\Requests\Admin\ShopeditRequest;
use App\Http\Requests\Admin\ManagerRequest;
use App\Http\Requests\Admin\ManagerRequestEdit;
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
use Illuminate\Support\Facades\File;
use App\Region;
use App\District;
use App\Landmark;
use League\Geotools\Coordinate\Ellipsoid;
use Toin0u\Geotools\Facade\Geotools;
use Illuminate\Support\Facades\Auth;

class UserController extends AdminController {
    /*
     * Display a listing of the resource.
     *
     * @return Response
     */
    /* Shop Owner users */

    public function sho_index() {

// $users = User::with('Shop')->get();
//  print($users); die;
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }
        $query = User::with('Shop');
        $query = $query->where('role_id', 4);
        if (Request::isMethod('post')) {
            $query = $query->where(function($q) {
                $q->orWhere('name', 'LIKE', '%' . Request::input('searchbox') . '%')
                        ->orWhere('email', 'LIKE', '%' . Request::input('searchbox') . '%');
            });
        }
        $User = $query->paginate(10);

        return view('admin.shopusers.index', compact('User'));
    }

    public function sho_getactive($id) {
        $id = base64_decode($id);
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }

        $user = User::find($id);
        $user->Status = 1;
        $user->save();

        return Redirect::to('admin/users/sho_index');
    }

    public function sho_getincative($id) {
        $id = base64_decode($id);
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }
        $user = User::find($id);
        $user->Status = 0;
        $user->save();
        return Redirect::to('admin/users/sho_index');
    }

    public function sho_getEdit($id) {

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }
        $id = base64_decode($id);
        $user = User::find($id);
        //  print_r($user);
        //  die;
        return view('admin.shopusers.create_edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $user
     * @return Response
     */
    public function sho_postEdit(UserEditRequest $request, $id) {
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
// Session::reflash();	
        }
        $id = base64_decode($id);
        $user = User::find($id);
        $user->name = $request->name;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->postal_Code = $request->postal_Code;


        $user->save();
        Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'Shop owner update successfully.');
        Session::flash('flash_type', 'alert-success');
        // return Redirect::to('admin/users/sho_index')->withSuccess( 'Shop owner updated successfully' );
        return Redirect::to('admin/users/sho_index');
        //return view('admin.shopusers.create_edit', compact('user'));
    }

    public function sho_getdetail($id) {
        $id = base64_decode($id);
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }
        $user = User::find($id);
        return view('admin.shopusers.detail', compact('user'));
    }

    public function sho_getDelete($id) {
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }
        $id = base64_decode($id);

        $user = User::find($id);
        $user->delete();
        Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'Shop user delete successfully.');
        Session::flash('flash_type', 'alert-success');
        return Redirect::to('admin/users/sho_index');
    }

    public function sho_getactiveall() {
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

    public function sho_getinactiveall() {
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }

        if (Request::ajax()) {

            $checkboxvalue = Request::get('checkboxvalue');
            $checkboxvalue = (explode(",", $checkboxvalue));
            $users = DB::table('users')
                    ->whereIn('id', $checkboxvalue)
                    ->update(['Status' => 0]);
            return ['success' => true, 'data' => $users];
        }
    }

    public function sho_getdeleteall() {

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }

        if (Request::ajax()) {

            $checkboxvalue = Request::get('checkboxvalue');
            $checkboxvalue = (explode(",", $checkboxvalue));
            $users = DB::table('users')
                    ->whereIn('id', $checkboxvalue)
                    ->delete();
            Session::flash('error_type', 'Well done!');
            Session::flash('flash_message', 'Shop users delete successfully.');
            Session::flash('flash_type', 'alert-success');
            return ['success' => true, 'data' => $users];
        }
    }

    public function sho_getCreate() {
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
// Session::reflash();	
        }
        return view('admin.shopusers.create_edit');
    }

    public function galleryIndex() {

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
// Session::reflash();	
        }
        return view('admin.shopusers.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function sho_postCreate(UserRequest $request) {
        if (Session::has('flash_message')) {
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
        Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'User successfully created.');
        Session::flash('flash_type', 'alert-success');
        return Redirect::to('admin/users/sho_index');
    }

    /* sub admin */

    public function sub_index() {
//      
//        
//        $writeConfig = new October\Rain\Config\Rewrite;
//$writeConfig->toFile( base_path().'/config/setting.php', [
//    'item' => 'new value',
//    'nested.config.item' => 'value'
//]);
//       echo  $path =  base_path().'/config/setting.php';
//    echo    $contents = File::get($path);
//   $contents = str_replace("'page'      => '*********'", "'host'      => 'dadsa'", $contents);
////    $contents = str_replace('%page%', "345", $contents);
//    File::put($path, $contents);
// and so on
//File::put($path, $contents);
//      $value= base_path().'/config/setting.php';  
//       $value =  File::put($value,'John Doe');//config('setting');
//       // Config::set('setting.ShopType', 'America/Chicago');
//print_r($value); die;
//Config::set('constants.manish', 'America/Chicago');
        //  $page=
//      $settings=  Config::write('constants.my_val', 'America/Chicago');
////        Setting::set('foo', 'bar');
////Setting::get('foo', 'default value');
////Setting::get('nested.element');
////Setting::forget('foo');
// 
//        
//// $value = Config::get('constants.timezone');
//// //print_r($value);
////$value1=Config::set('constants.timezone', 'America/Chicago');
////Config::set('app.myvar','myval');
//print_r($settings);
// die;
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }
        $query = User::where('role_id', 2);
        if (Request::isMethod('post')) {

            $query = $query->where(function($q) {
                $q->orWhere('name', 'LIKE', '%' . Request::input('searchbox') . '%')
                        ->orWhere('email', 'LIKE', '%' . Request::input('searchbox') . '%');
            });
        }
        $User = $query->paginate(10);
        return view('admin.subadmin.index', compact('User'));
    }

    public function sub_getactive($id) {
        $id = base64_decode($id);
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }

        $user = User::find($id);
        $user->Status = 1;
        $user->save();
        Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'Sub admin active successfully.');
        Session::flash('flash_type', 'alert-success');
        return Redirect::to('admin/users/sub_index');
    }

    public function sub_getincative($id) {
        $id = base64_decode($id);
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }
        $user = User::find($id);
        $user->Status = 0;
        $user->save();
        Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'Sub admin anactive successfully.');
        Session::flash('flash_type', 'alert-success');
        return Redirect::to('admin/users/sub_index');
    }

    public function sub_getEdit($id) {

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }
        $id = base64_decode($id);
        $user = User::find($id);
        return view('admin.subadmin.create_edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $user
     * @return Response
     */
    public function sub_postEdit(UserEditRequest $request, $id) {
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
// Session::reflash();	
        }
        $id = base64_decode($id);
        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->postal_Code = $request->postal_Code;


        $user->save();
        Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'Sub admin update successfully.');
        Session::flash('flash_type', 'alert-success');
        //   return Redirect::to('admin/users/sub_index');
        return view('admin.subadmin.create_edit', compact('user'));
    }

    public function sub_getdetail($id) {
        $id = base64_decode($id);
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }
        $user = User::find($id);
        return view('admin.subadmin.detail', compact('user'));
    }

    public function sub_getDelete($id) {
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }
        $id = base64_decode($id);

        $user = User::find($id);
        $user->delete();
        Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'Sub admin delete successfully.');
        Session::flash('flash_type', 'alert-success');
        return Redirect::to('admin/users/sub_index');
    }

    public function sub_getactiveall() {
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
            Session::flash('error_type', 'Well done!');
            Session::flash('flash_message', 'Sub admin active successfully.');
            Session::flash('flash_type', 'alert-success');
            return ['success' => true, 'data' => $users];
        }
    }

    public function sub_getinactiveall() {
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }

        if (Request::ajax()) {

            $checkboxvalue = Request::get('checkboxvalue');
            $checkboxvalue = (explode(",", $checkboxvalue));
            $users = DB::table('users')
                    ->whereIn('id', $checkboxvalue)
                    ->update(['Status' => 0]);
            Session::flash('error_type', 'Well done!');
            Session::flash('flash_message', 'Sub admin inactive successfully.');
            Session::flash('flash_type', 'alert-success');
            return ['success' => true, 'data' => $users];
        }
    }

    public function sub_getdeleteall() {

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }

        if (Request::ajax()) {

            $checkboxvalue = Request::get('checkboxvalue');
            $checkboxvalue = (explode(",", $checkboxvalue));
            $users = DB::table('users')
                    ->whereIn('id', $checkboxvalue)
                    ->delete();
            Session::flash('error_type', 'Well done!');
            Session::flash('flash_message', 'Sub admin delete successfully.');
            Session::flash('flash_type', 'alert-success');
            return ['success' => true, 'data' => $users];
        }
    }

    public function sub_getCreate() {
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
// Session::reflash();	
        }
        return view('admin.subadmin.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function sub_postCreate(UserRequest $request) {
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }
        $user = new User();
        $user->name = $request->name;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
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
        Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'Sub admin added successfully.');
        Session::flash('flash_type', 'alert-success');
        return Redirect::to('admin/users/sub_index');
    }

    public function sho_getupload_excel() {
        
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
// Session::reflash();	
        }


        return view('admin.shopusers.upload_excel');
    }

    public function sho_postUpload_excel() {



        $file = Request::file('excel');
//echo '<pre>'. print($file); die;
//   $image_name = time() . "-" . $file->getClientOriginalName(); 

        Excel::load($file, function($reader) {
            //  $results = $reader->get();
//            print_r($results);
//            die;
// Getting all results
// ->all() is a wrapper for ->get() and will work the same
            $results1 = $reader->all();
            foreach ($results1 as $data) {


//                foreach ($data as $a => $b) {
//                    echo $a . "=" . $b . '<br/>';
//                     die;
//                }
//               
//                  echo $data['status'] ; die;
                if ($data['status'] == 'ready' || $data['status'] == 'Ready') {



//                   Region;
// District;
// Landmark;




                    $shop = new Shop();
                    $shop->freelancer = $data['freelancer'];
                    $shop->status = $data['status'];
                    $shop->source = $data['source'];
                    $shop->chain = $data['chain'];
                    $shop->chain_c = $data['chain_c'];
                    $shop->shop_name = $data['shop_name'];
                    $shop->shop_name_c = $data['shop_name_c'];


                    if ($data['region'] != null) {
                        $regionCount = Region::Where('name_e', '=', $data['region'])->count();
                        if ($regionCount == 0) {
                            $Region = new Region();
                          $Region->name_e = $data['region'];
                         $Region->name_c = $data['region_c'];
                           
                            $Region->save();
                            $shop->region = $Region->id;
                            $shop->region_c = $Region->id;
                        } else {
                            $Region = Region::where('name_e', $data['region'])->first();
                             
                            $shop->region = $Region->id;
                            $shop->region_c = $Region->id;
                        }
                    }




                    if ($data['district'] != null) {
                        $districtCount = District::Where('name_e', '=', $data['district'])->count();
                        if ($districtCount == 0) {
                            $District = new District();
                            $District->region_id = $Region->id;
                            $District->name_e = $data['district'];
                            $District->name_c = $data['district_c'];
                            $District->save();
                            $shop->district = $District->id;
                            $shop->district_c = $District->id;
                        } else {
                            $District = District::where('name_e', $data['district'])->first();
                             
                            $shop->district = $District->id;
                            $shop->district_c = $District->id;
                        }
                    }


//                    $shop->district_c = $data['district_c'];

                    if ($data['mall'] != null || $data['landmark'] != null) {

                        if ($data['mall'] != null && $data['landmark'] != null) {

                            $mallLandmarkCount = Landmark::Where('mall_e', '=', $data['mall'])->Where('landmark_e', '=', $data['landmark'])->count();

                            if ($mallLandmarkCount == 0) {
                                $MallLandmark = new Landmark();
                                $MallLandmark->district_id = $District->id;
                                $MallLandmark->mall_e = $data['mall'];
                                $MallLandmark->mall_c = $data['mall_c'];
                                $MallLandmark->landmark_e = $data['landmark'];
                                $MallLandmark->landmark_c = $data['landmark_c'];
                                $MallLandmark->save();

                                $shop->mall = $MallLandmark->id;
                                $shop->landmark = $MallLandmark->id;
                            } else {
                                $MallLandmark = Landmark::Where('mall_e', '=', $data['mall'])->Where('landmark_e', '=', $data['landmark'])->first();
                                $shop->mall = $MallLandmark->id;
                                $shop->landmark = $MallLandmark->id;
                            }
                        } else {
                            if ($data['mall'] != null) {
                                $mallLandmarkCount = Landmark::Where('mall_e', '=', $data['mall'])->count();

                                if ($mallLandmarkCount == 0) {
                                    $MallLandmark = new Landmark();
                                    $MallLandmark->district_id = $District->id;
                                    $MallLandmark->mall_e = $data['mall'];
                                    $MallLandmark->mall_c = $data['mall_c'];
                                    $MallLandmark->save();
                                    $shop->mall = $MallLandmark->id;
                                    $shop->landmark = $MallLandmark->id;
                                } else {
                                    $MallLandmark = Landmark::Where('mall_e', '=', $data['mall'])->first();
                                    $shop->mall = $MallLandmark->id;
                                    $shop->landmark = $MallLandmark->id;
                                }
                            } else {
                                $mallLandmarkCount = Landmark::Where('landmark_e', '=', $data['landmark'])->count();
                                if ($mallLandmarkCount == 0) {
                                    $MallLandmark = new Landmark();
                                    $MallLandmark->district_id = $District->id;
                                    $MallLandmark->landmark_e = $data['landmark'];
                                    $MallLandmark->landmark_c = $data['landmark_c'];
                                    $MallLandmark->save();
                                    $shop->mall = $MallLandmark->id;
                                    $shop->landmark = $MallLandmark->id;
                                } else {
                                    $MallLandmark = Landmark::Where('landmark_e', '=', $data['landmark'])->first();
                                    $shop->mall = $MallLandmark->id;
                                    $shop->landmark = $MallLandmark->id;
                                }
                            }
                        }
                    }




//                    $shop->mall_c = $data['mall_c'];
//                    $shop->landmark_c = $data['landmark_c'];

                    $shop->street = $data['street'];
                    $shop->street_c = $data['street_c'];
                    $ADDRESS = null;

                    if ($data['shop_line_2'] != null) {

                        $ADDRESS = $data['shop_line_2'];
                    }
                    if ($data['floor_line_2'] != null) {
                        $ADDRESS = $ADDRESS . ',' . $data['floor_line_2'];
                    }
                    if ($data['shop_no'] != null) {
                        $ADDRESS = $ADDRESS . ',' . $data['shop_no'];
                    }
                    if ($data['floor'] != null) {
                        $ADDRESS = $ADDRESS . ',' . $data['floor'];
                    }
                    if ($data['retailer'] != null) {
                        $ADDRESS = $ADDRESS . ',' . $data['retailer'];
                    }
                    if ($data['phase_block'] != null) {
                        $ADDRESS = $ADDRESS . ',' . $data['phase_block'];
                    }
                    if ($data['landmark'] != null) {
                        $ADDRESS = $ADDRESS . ',' . $data['landmark'];
                    }
                    if ($data['mtr_station'] != null) {
                        $ADDRESS = $ADDRESS . ',' . $data['mtr_station'];
                    }
                    if ($data['building'] != null) {
                        $ADDRESS = $ADDRESS . ',' . $data['building'];
                    }
                    if ($data['mall'] != null) {
                        $ADDRESS = $ADDRESS . ',' . $data['mall'];
                    }
                    if ($data['street'] != null) {
                        $ADDRESS = $ADDRESS . ',' . $data['street'];
                    }

                    $ADDRESS = trim($ADDRESS, ",");
                    $ADDRESS = str_replace(",,", ",", $ADDRESS);
                    $shop->address = $ADDRESS;

                    $ADDRESS_C = $data['street_c'] . $data['mall_c'] . $data['building_c'] . $data['mtr_station_c'] . $data['landmark_c'] . $data['phase_block_c'] . $data['retailer_c'] . $data['floor_c'] . $data['shop_no_c'] . $data['floor_line_2_c'] . $data['shop_line_2_c'];

                    $shop->address_c = $ADDRESS_C;


                    $shop->building = $data['building'];
                    $shop->building_c = $data['building_c'];
                    $shop->mtr_station = $data['mtr_station'];
                    $shop->mtr_station_c = $data['mtr_station_c'];
                    $shop->phase_block = $data['phase_block'];
                    $shop->phase_block_c = $data['phase_block_c'];
                    $shop->retailer = $data['retailer'];
                    $shop->retailer_c = $data['retailer_c'];
                    $shop->floor = $data['floor'];
                    $shop->floor_c = $data['floor_c'];
                    $shop->shop_no = $data['shop_no'];
                    $shop->shop_no_c = $data['shop_no_c'];
                    $shop->floor_line_2 = $data['floor_line_2'];
                    $shop->floor_line_2_c = $data['floor_line_2_c'];
                    $shop->shop_line_2 = $data['shop_line_2'];
                    $shop->shop_line_2_c = $data['shop_line_2_c'];
                    $shop->contact_name = $data['contact_name'];
                    $shop->contact_email = $data['contact_email'];
                    $shop->contact_phone_1 = $data['contact_phone_1'];
                    $shop->contact_phone_2 = $data['contact_phone_2'];
                    $shop->shop_email = $data['shop_email'];
                    $shop->shop_phone_1 = $data['shop_phone_1'];
                    $shop->shop_phone_2 = $data['shop_phone_2'];
                    $shop->shop_fax = $data['shop_fax'];
                    $shop->description = $data['description'];
                    $shop->description_c = $data['description_c'];
                    $shop->shop_type = $data['shop_type'];
                    $shop->fashion_category = $data['fashion_category'];
                    $shop->beauty_retail_category = $data['beauty_retail_category'];
                    $shop->beauty_service_category = $data['beauty_service_category'];
                    $shop->refined_shop_type = $data['refined_shop_type'];
                    $shop->age_gender = $data['age_gender'];
                    $shop->price_range = $data['price_range'];
                    $shop->payment_option = $data['payment_option'];
                    $shop->membership = $data['membership'];
                    $shop->fitting = $data['fitting'];
                    $shop->refund = $data['refund'];
                    $shop->exchange = $data['exchange'];
                    $shop->facebook = $data['facebook'];
                    $shop->website_english = $data['website_english'];
                    $shop->website_chinese = $data['website_chinese'];
                    $shop->twitter = $data['twitter'];
                    $shop->instagram = $data['instagram'];
                    $shop->weibo = $data['weibo'];

                    if ($data['last_update'] != null) {
                        $shop->updated_at = $data['last_update'];
                    }
//Shopimage

                    if ($data['monday'] != 'Off' && $data['monday'] != null && $data['monday'] != 'off') {
                
                        $monday = explode("-", $data['monday']);
             
                        if ($monday != null) {
                            if ($monday['0'] != null) {
                                $shop->mondayopen = trim($monday['0']);
                            }
                            if ($monday['1'] != null) {
                                $shop->mondayclosed = trim($monday['1']);
                            }
                        }
                    }

                    
                    if ($data['tuesday'] != 'Off' && $data['tuesday'] != null && $data['tuesday'] != 'off') {
                        $tuesday = explode("-", $data['tuesday']);
                        if ($tuesday != null) {
                            if ($tuesday['0'] != null) {
                                $shop->tuesdayopen = trim($tuesday['0']);
                            }
                            if ($tuesday['1'] != null) {
                                $shop->tuesdayclosed = trim($tuesday['1']);
                            }
                        }
                    }

                    if ($data['wednesday'] != 'Off' && $data['wednesday'] != null && $data['wednesday'] != 'off') {
                        $wednesday = explode("-", $data['wednesday']);
                        if ($wednesday != null) {
                            if ($wednesday['0'] != null) {
                                $shop->wednesdayopen = trim($wednesday['0']);
                            }
                            if ($wednesday['1'] != null) {
                                $shop->wednesdayclosed = trim($wednesday['1']);
                            }
                        }
                    }

                    if ($data['thursday'] != 'Off' && $data['thursday'] != null && $data['thursday'] != 'off') {
                        $thursday = explode("-", $data['thursday']);
                        if ($thursday != null) {
                            if ($thursday['0'] != null) {
                                $shop->thursdayopen = trim($thursday['0']);
                            }
                            if ($thursday['1'] != null) {
                                $shop->thursdayclosed = trim($thursday['1']);
                            }
                        }
                    }
                    if ($data['friday'] != 'Off' && $data['friday'] != null && $data['friday'] != 'off') {
                        $friday = explode("-", $data['friday']);
                        if ($friday != null) {
                            if ($friday['0'] != null) {
                                $shop->fridayopen = trim($friday['0']);
                            }
                            if ($friday['1'] != null) {
                                $shop->fridayclosed = trim($friday['1']);
                            }
                        }
                    }

                    if ($data['saturday'] != 'Off' && $data['saturday'] != null && $data['saturday'] != 'off') {
                        $saturday = explode("-", $data['saturday']);
                        if ($saturday != null) {
                            if ($saturday['0'] != null) {
                                $shop->saturdayopen = trim($saturday['0']);
                            }
                            if ($saturday['1'] != null) {
                                $shop->saturdayclosed = trim($saturday['1']);
                            }
                        }
                    }

                    if ($data['sunday'] != 'Off' && $data['sunday'] != null && $data['sunday'] != 'off') {
                        $sunday = explode("-", $data['sunday']);
                        if ($sunday != null) {
                            if ($sunday['0'] != null) {
                                $shop->sundayopen = trim($sunday['0']);
                            }
                            if ($sunday['1'] != null) {
                                $shop->sundayclosed = trim($sunday['1']);
                            }
                        }
                    }

                    if ($data['public_holiday'] != 'Off' && $data['public_holiday'] != null && $data['public_holiday'] != 'off') {
                        $public_holiday = explode("-", $data['public_holiday']);
                        if ($public_holiday != null) {
                            if ($public_holiday['0'] != null) {
                                $shop->public_holidayopen = trim($public_holiday['0']);
                            }
                            if ($public_holiday['1'] != null) {
                                $shop->public_holidayclosed = trim($public_holiday['1']);
                            }
                        }
                    }

                    $shop->shop_image_1 = $data['shop_image_1'];
                    $shop->shop_image_2 = $data['shop_image_2'];
                    $shop->shop_image_3 = $data['shop_image_3'];
                    $shop->shop_image_4 = $data['shop_image_4'];
//                    $url = "http://www.example.com/any-url";
//                    if (@is_array(@getimagesize($url))) {
//                        echo "Yes' image url";
//                    } else {
//                        echo "No! not an image url";
//                    }
//                    $url1 = trim($data['shop_image_1']);
//                    if ($url1 != null) {
//                        if (@is_array(@getimagesize($url1))) {
//                            $orgimg = trim($data['shop_image_1']);
//                            $image_name = time() . "-shop_image_1" . substr(strrchr($orgimg, '/'), 1);
//                            $img = 'uploads/shop/' . $image_name;
//                            if (@getimagesize($orgimg)) {
//                                $file = file($orgimg);
//                                $result = @file_put_contents($img, $file);
//                                $shop->shop_image_1 = $image_name;
//                            }
//                        }
//                    }
//                    $url2 = trim($data['shop_image_2']);
//                    if ($url2 != null) {
//                        if (@is_array(@getimagesize($url2))) {
//                            $orgimg = trim($data['shop_image_2']);
//                            $image_name = time() . "-shop_image_2" . substr(strrchr($orgimg, '/'), 1);
//                            $img = 'uploads/shop/' . $image_name;
//                            if (@getimagesize($orgimg)) {
//                                $file = file($orgimg);
//                                $result = @file_put_contents($img, $file);
//                                $shop->shop_image_2 = $image_name;
//                            }
//                        }
//                    }
//                    $url3 = trim($data['shop_image_3']);
//                    if ($url3 != null) {
//                        if (@is_array(@getimagesize($url3))) {
//                            $orgimg = trim($data['shop_image_3']);
//                            $image_name = time() . "-shop_image_3" . substr(strrchr($orgimg, '/'), 1);
//                            $img = 'uploads/shop/' . $image_name;
//                            if (@getimagesize($orgimg)) {
//                                $file = file($orgimg);
//                                $result = @file_put_contents($img, $file);
//                                $shop->shop_image_3 = $image_name;
//                            }
//                        }
//                    }
//                    $url4 = trim($data['shop_image_4']);
//                    if ($url4 != null) {
//                        if (@is_array(@getimagesize($url4))) {
//                            $orgimg = trim($data['shop_image_4']);
//                            $image_name = time() . "-shop_image_4" . substr(strrchr($orgimg, '/'), 1);
//                            $img = 'uploads/shop/' . $image_name;
//                            if (@getimagesize($orgimg)) {
//                                $file = file($orgimg);
//                                $result = @file_put_contents($img, $file);
//                                $shop->shop_image_4 = $image_name;
//                            }
//                        }
//                    }
                 
                    $shop->save();
                }
            }
        });

        return Redirect::to('admin/users/shops_index');
    }

    /* ################################### User ############################################ */

    public function index() {
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }

        $query = User::where('role_id', 3);

        if (Request::isMethod('post')) {

            $query = $query->where(function($q) {
                $q->orWhere('name', 'LIKE', '%' . Request::input('searchbox') . '%')
                        ->orWhere('email', 'LIKE', '%' . Request::input('searchbox') . '%');
            });
        }

        $User = $query->paginate(10);


        return view('admin.users.index', compact('User'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate() {
        if (Session::has('flash_message')) {
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
        if (Session::has('flash_message')) {
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
        Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'User successfully created.');
        Session::flash('flash_type', 'alert-success');
        return Redirect::to('admin/users/index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $user
     * @return Response
     */
    public function editprofile($id) {
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }
        $id = base64_decode($id);
        $user = User::find($id);
        return view('admin.users.editprofile', compact('user'));
    }

    public function postEditProfile(UserEditRequest $request, $id) {
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }

        $id = base64_decode($id);
        $user = User::find($id);
//        $user->name = $request->name;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
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

    public function changeProfileImage($id) {
        $id = base64_decode($id);
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }
        $id = base64_decode($id);
        $user = User::find($id);
        return view('admin.users.changeProfileImage', compact('user'));
    }

    public function postchangeProfileImage(UserProfileImage $request, $id) {
        $id = base64_decode($id);
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }

        $file = Request::file('image');
        if ($file != null) {
            $image_name = time() . "-" . $file->getClientOriginalName();
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

    public function getChangePasswor($id) {

        $id = base64_decode($id);
        if (Session::has('flash_message')) {
//echo "manish";die;
            Session::forget('flash_message');
//Session::reflash();	
        }
        $user = User::find($id);
        return view('admin.users.changepassword', compact('user'));
    }

    public function postChangePasswor(UserPasswordtRequest $request, $id) {

        $id = base64_decode($id);
        if (Session::has('flash_message')) {
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
            } else {
                Session::flash('error_type', 'Oh snap!');
                Session::flash('flash_message', 'Password not Match.');
                Session::flash('flash_type', 'alert-danger');
            }
        }


        return view('admin.users.changepassword', compact('user'));
    }

    public function getEdit($id) {

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }
        $id = base64_decode($id);
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
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
// Session::reflash();	
        }
        $id = base64_decode($id);
        $user = User::find($id);
        $user->name = $request->name;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->postal_Code = $request->postal_Code;


        $user->save();
        Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'Sub admin update successfully.');
        Session::flash('flash_type', 'alert-success');
        //return Redirect::to('admin/users/index');
        return view('admin.users.create_edit', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $user
     * @return Response
     */
    public function getDelete($id) {
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }
        $id = base64_decode($id);

        $user = User::find($id);
        $user->delete();
        return Redirect::to('admin/users/index');
    }

    public function getactive($id) {
        $id = base64_decode($id);
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }

        $user = User::find($id);
        $user->Status = 1;
        $user->save();

        return Redirect::to('admin/users/index');
    }

    public function getincative($id) {
        $id = base64_decode($id);
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }
        $user = User::find($id);
        $user->Status = 0;
        $user->save();
        return Redirect::to('admin/users/index');
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
            $users = DB::table('users')
                    ->whereIn('id', $checkboxvalue)
                    ->update(['Status' => 0]);
            return ['success' => true, 'data' => $users];
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
            $users = DB::table('users')
                    ->whereIn('id', $checkboxvalue)
                    ->delete();
            return ['success' => true, 'data' => $users];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $user
     * @return Response
     */
    public function postDelete(DeleteRequest $request, $id) {
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }
        $user = User::find($id);
        $user->delete();
    }

    public function getdetail($id) {
        $id = base64_decode($id);
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
// Session::reflash();	
        }
        $user = User::find($id);
        return view('admin.users.detail', compact('user'));
    }

// ##################################################################################################
########    Shopes  ############
//###################################################################################################

    public function getshop_index($id) {



        $id = base64_decode($id);
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }
//       $query=User::with('Shop');
//       $query= $query ->where('role_id', 4);
//        $query=Shop::with('User')->get();
//        echo '<pre>'.  print($query); die;
//         $query = Shop::with('Subuser')->get();  
//         echo '<pre>'.  print($query); die;
        $query = Shop::with('User') ;
       
        $query = Shop::with('Subuser');
        $query = $query->with('Procuct');
        $query = $query->where('role_id', '4');
        if (Request::isMethod('post')) {
            $query = $query->where(function($q) {
                $q->orWhere('name', 'LIKE', '%' . Request::input('searchbox') . '%')
                        ->orWhere('email', 'LIKE', '%' . Request::input('searchbox') . '%');
            });
        }
        $Data = $query->orderBy('shop_name', 'ASC')->paginate(5);
// echo '<pre>'. print($Data); die;

        return view('admin.shopes.index', compact('Data', 'id'));
    }

    public function shop_getCreate($id) {
//   $id = base64_decode($id); 
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }
        return view('admin.shopes.create_edit', compact('id'));
    }

    public function shop_postCreate(UserRequest $request) {



//        $input = Request::file('manish');
//        $filename = $input->getRealPath();
//        if ($input != null) {
//            Excel::load($filename, function($reader) {
//                $results = $reader->get();
//// ->all() is a wrapper for ->get() and will work the same
//                $results1 = $reader->all();
//                foreach ($results1 as $data) {
//                    foreach ($data as $a => $b) {
//                        echo $a . '=' . $b . '</br>';
//                    }
////                die; 
//                }
//            });
//            die;
//        }


        if (Session::has('flash_message')) {

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
// $user->id
        $shop = new Shop();
        $shop->shopename = $request->shopename;
        $shop->manager_name = $request->name;
        $shop->user_id = base64_decode($request->user_id);
        $shop->sub_user_id = $user->id;
        $shop->save();

        return Redirect::to('admin/users/' . $request->user_id . '/shop_index');
    }

    public function shop_getEdit($id) {

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }
        $id = base64_decode($id);

        $Data = Shop::find($id);
        $User = User::find($Data->sub_user_id);
//echo '<pre>'. print($User);die;
        return view('admin.shopes.create_edit', compact('Data', 'User'));
    }

    public function shop_postEdit(UserEditRequest $request, $id) {

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
// Session::reflash();	
        }

        $user = User::find(base64_decode($request->user_id));
        $user->name = $request->manager_name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->postal_Code = $request->postal_Code;
        $user->save();

//        echo $request->shopename; die;
        $shop = Shop::find(base64_decode($id));
        $shop->shopename = $request->shopename;
        $shop->manager_name = $request->name;
        $shop->save();
//echo '<pre>'.print($shop); die;
        Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'Sub admin update successfully.');
        Session::flash('flash_type', 'alert-success');
// return view('admin.shopes.create_edit', compact('user'));
        return Redirect::to('admin/users/' . base64_encode($shop->user_id) . '/shop_index');
    }

    public function shop_getdisplay($id) {

        $id = base64_decode($id);
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }

        $Data = Shop::find($id);
        $Data->display_top = '1';
        $Data->save();
return redirect()->back()->with('data' );
       // return Redirect::to('admin/users/shops_index');
    }
    public function shop_getundisplay($id) {

        $id = base64_decode($id);
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }

        $Data = Shop::find($id);
        $Data->display_top = '0';
        $Data->save();
return redirect()->back()->with('data' );
      //  return Redirect::to('admin/users/shops_index');
    }
    public function shop_getactive($id) {

        $id = base64_decode($id);
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }

        $Data = Shop::find($id);
        $Data->status = 'ready';
        $Data->save();
         Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'Shop deleted successfully.');
        Session::flash('flash_type', 'alert-success');
return redirect()->back()->with('data' );
       // return Redirect::to('admin/users/shops_index');
    }

    public function shop_getincative($id) {
        $id = base64_decode($id);
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }
        $Data = Shop::find($id);
        $Data->status = 0;
        $Data->save();
         Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'Shop Inactive successfully.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->back()->with('data' );
      //  return Redirect::to('admin/users/shops_index');
    }

    public function shop_getdetail($id) {

        $id = base64_decode($id);
        $Data = Shop::find($id);
        return view('admin.shopes.shopdetail', compact('Data'));
    }

    public function shop_getDelete($id) {
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }
        $id = base64_decode($id);

        $shop = Shop::find($id);
        $shop->delete();
        Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'Shop deleted successfully.');
        Session::flash('flash_type', 'alert-success');
       return redirect()->back()->with('data' );
    }

    public function shop_getactiveall() {

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
// Session::reflash();	
        }

        if (Request::ajax()) {

            $checkboxvalue = Request::get('checkboxvalue');
            $checkboxvalue = (explode(",", $checkboxvalue));
            $Data = DB::table('shopes')
                    ->whereIn('id', $checkboxvalue)
                    ->update(['Status' => 1]);
            return ['success' => true, 'data' => $Data];
        }
    }

    public function shop_getinactiveall() {
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }

        if (Request::ajax()) {

            $checkboxvalue = Request::get('checkboxvalue');
            $checkboxvalue = (explode(",", $checkboxvalue));
            $Data = DB::table('shopes')
                    ->whereIn('id', $checkboxvalue)
                    ->update(['Status' => 0]);
            return ['success' => true, 'data' => $Data];
        }
    }

    public function shop_getdeleteall() {

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }

        if (Request::ajax()) {

            $checkboxvalue = Request::get('checkboxvalue');
            $checkboxvalue = (explode(",", $checkboxvalue));
            $Data = DB::table('shopes')
                    ->whereIn('id', $checkboxvalue)
                    ->delete();
            Session::flash('error_type', 'Well done!');
            Session::flash('flash_message', 'Shops deleted successfully.');
            Session::flash('flash_type', 'alert-success');
            return ['success' => true, 'data' => $Data];
        }
    }

    public function getshops_index() {

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }
        $query = Shop::with('User');
        $query = Shop::with('Subuser');
        $query = $query->with('Procuct');
         if (Request::isMethod('post')) {
            $query = $query->where(function($q) {
                $q->orWhere('shop_name', 'LIKE', '%' . Request::input('searchbox') . '%')
                        ->orWhere('shop_name_c', 'LIKE', '%' . Request::input('searchbox') . '%');
            });
        
             
            } 
     $Data = $query->orderBy('shop_name', 'ASC')->paginate(500);
             
  return view('admin.shopes.shoplist', [
            'Data' => $Data->appends(Input::except('shopes'))
        ]);
       // return view('admin/shopes/shoplist')->with('Data', $Data);
    }

    public function shops_getCreate() {

//   $id = base64_decode($id); 
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }
        return view('admin.shopes.shop_add');
    }

    public function getshop_catogary($id) {

        if ($id == 1) {
            return view('admin.ajax.FashionCategory');
        }
        if ($id == 2) {
            return view('admin.ajax.BeautyRetailCategory'); //Config::get('constants.BeautyRetailCategory');
        }
        if ($id == 3) {
            return view('admin.ajax.BeautyServicingCategory'); //Config::get('constants.BeautyServicingCategory');
        }
    }

    public function shops_postCreate(ShopsRequest $request) {

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }

// shop informetion
//        $user = new User();
//        $user->first_name = $request->first_name;
//        $user->last_name = $request->last_name;
//        $user->email = $request->email;
//        $user->username = $request->username;
//        $user->password = bcrypt($request->password);
//        $user->confirmation_code = str_random(32);
//        $user->confirmed = '0';
//        $user->role_id = '4';
//        $user->admin = '1';
//        $user->email_2 = Request::input('email_2');
//        $user->phone = Request::input('phone');
//        $user->phone_2 = Request::input('phone_2');
// $request->password_confirmation;
//Shop owner Personal information
        $shop = new Shop();
        if (Request::input('display_top') != null) {
            $shop->display_top = Request::input('display_top');
        }
//        $request->full_name;
//        $request->phone;
//        $request->contact_email;
//        $shop->facebook = $request->facebook;
//        $shop->twitter = $request->twitter;
//Shop information
        $shop->chain = Request::input('chain');
        $shop->chain_c = Request::input('chain_c');
        $shop->shop_name = Request::input('shop_name');
        $shop->shop_name_c = Request::input('shop_name_c');
        $shop->shop_email = Request::input('shop_email');
        $shop->source = Request::input('source');
        $shop->contact_phone_1 = Request::input('contact_phone_1');
        $shop->contact_phone_2 = Request::input('contact_phone_2');
        $shop->shop_fax = Request::input('shop_fax');
        $shop->shop_no = Request::input('shop_no');
        $shop->shop_no_c = Request::input('shop_no_c');
        $shop->shop_line_2 = Request::input('shop_line_2');
        $shop->shop_line_2_c = Request::input('shop_line_2_c');
        $shop->floor = Request::input('floor');
        $shop->floor_c = Request::input('floor_c');
        $shop->floor_line_2 = Request::input('floor_line_2');
        $shop->floor_line_2_c = Request::input('floor_line_2_c');
        $shop->mall = Request::input('mall');
        $shop->mall_c = Request::input('mall_c');
        $shop->building = Request::input('building');
        $shop->building_c = Request::input('building_c');
        $shop->landmark = Request::input('landmark');
        $shop->landmark_c = Request::input('landmark_c');
        $shop->phase_block = Request::input('phase_block');
        $shop->phase_block_c = Request::input('phase_block_c');
        $shop->street = Request::input('street');
        $shop->street_c = Request::input('street_c');
        $shop->mtr_station = Request::input('mtr_station');
        $shop->mtr_station_c = Request::input('mtr_station_c');
        $shop->region = Request::input('regionf');
        $shop->district = Request::input('districtf');
        if (Request::input('mall') != null || Request::input('landmark') != null) {

            if (Request::input('mall') != null && Request::input('landmark') != null) {

                $mallLandmarkCount = Landmark::Where('mall_e', '=', Request::input('mall'))->Where('landmark_e', '=', Request::input('landmark'))->count();

                if ($mallLandmarkCount == 0) {
                    $MallLandmark = new Landmark();
                    $MallLandmark->district_id = $shop->district;
                    $MallLandmark->mall_e = Request::input('mall');
                    $MallLandmark->mall_c = Request::input('mall_c');
                    $MallLandmark->landmark_e = Request::input('landmark');
                    $MallLandmark->landmark_c = Request::input('landmark_c');
                    $MallLandmark->save();

                    $shop->mall = $MallLandmark->id;
                    $shop->landmark = $MallLandmark->id;
                } else {
                    $MallLandmark = Landmark::Where('mall_e', '=', Request::input('mall'))->Where('landmark_e', '=', Request::input('landmark'))->first();
                    $shop->mall = $MallLandmark->id;
                    $shop->landmark = $MallLandmark->id;
                }
            } else {
                if (Request::input('mall') != null) {
                    $mallLandmarkCount = Landmark::Where('mall_e', '=', Request::input('mall'))->count();

                    if ($mallLandmarkCount == 0) {
                        $MallLandmark = new Landmark();
                        $MallLandmark->district_id = $shop->district;
                        $MallLandmark->mall_e = Request::input('mall');
                        $MallLandmark->mall_c = Request::input('mall_c');
                        $MallLandmark->save();
                        $shop->mall = $MallLandmark->id;
                        $shop->landmark = $MallLandmark->id;
                    } else {
                        $MallLandmark = Landmark::Where('mall_e', '=', Request::input('mall'))->first();
                        $shop->mall = $MallLandmark->id;
                        $shop->landmark = $MallLandmark->id;
                    }
                } else {
                    $mallLandmarkCount = Landmark::Where('landmark_e', '=', Request::input('landmark'))->count();
                    if ($mallLandmarkCount == 0) {
                        $MallLandmark = new Landmark();
                        $MallLandmark->district_id = $shop->district;
                        $MallLandmark->landmark_e = Request::input('landmark');
                        $MallLandmark->landmark_c = Request::input('landmark_c');
                        $MallLandmark->save();
                        $shop->mall = $MallLandmark->id;
                        $shop->landmark = $MallLandmark->id;
                    } else {
                        $MallLandmark = Landmark::Where('landmark_e', '=', Request::input('landmark'))->first();
                        $shop->mall = $MallLandmark->id;
                        $shop->landmark = $MallLandmark->id;
                    }
                }
            }
        }
//        $shop->address = Request::input('address');
//        $shop->address_c = Request::input('address_c');
      //  $shop->shop_type = Request::input('shop_type');

        if (Request::input('shop_type') != null) {
            $shop->shop_type = implode(',', Request::input('shop_type'));
        }
        if (Request::input('payment_option') != null) {
            $shop->payment_option = implode(',', Request::input('payment_option'));
        }
        if (Request::input('age_gender') != null) {
            $shop->age_gender = implode(',', Request::input('age_gender'));
        }
        if (Request::input('price_range') != null) {
            $shop->price_range = implode(',', Request::input('price_range'));
        }



        if (Request::input('FashionCategory') != null) {
            $shop->fashion_category = implode(',', Request::input('FashionCategory'));
        }

        if (Request::input('BeautyRetailCategory') != null) {
            $shop->beauty_retail_category = implode(',', Request::input('BeautyRetailCategory'));
        }

        if (Request::input('BeautyServicingCategory') != null) {
            $shop->beauty_service_category = implode(',', Request::input('BeautyServicingCategory'));
        }
        if (Request::input('ShopTypeo') != null) {
            $shop->refined_shop_type = implode(',', Request::input('ShopTypeo'));
        }
        if (Request::input('display_top') != null) {
            $shop->display_top = implode(',', Request::input('display_top'));
            ;
        }

        $shop->fitting = Request::input('fitting');
        $shop->fitting_detail = Request::input('fitting_detail');
        $shop->refund = Request::input('refund');
        $shop->refund_detail = Request::input('refund_detail');
        $shop->exchange = Request::input('exchange');
        $shop->exchange_detail = Request::input('exchange_detail');
        $shop->membership = Request::input('membership');
        $shop->membership_detail = Request::input('membership_detail');
        $shop->description = Request::input('description');
        $shop->description_c = Request::input('description_c');
        $shop->website_english = Request::input('website_english');
        $shop->website_chinese = Request::input('website_chinese');
        $shop->facebook = Request::input('facebook');
        $shop->instagram = Request::input('instagram');
        $shop->twitter = Request::input('twitter');
        $shop->weibo = Request::input('weibo');

        $shop->mondayopen = date('G:i:s', strtotime(Request::input('mondayopen')));
        $shop->mondayclosed = date('G:i:s', strtotime(Request::input('mondayclosed')));
        $shop->tuesdayopen = date('G:i:s', strtotime(Request::input('tuesdayopen')));
        $shop->tuesdayclosed = date('G:i:s', strtotime(Request::input('tuesdayclosed')));
        $shop->wednesdayopen = date('G:i:s', strtotime(Request::input('wednesdayopen')));
        $shop->wednesdayclosed = date('G:i:s', strtotime(Request::input('wednesdayclosed')));
        $shop->thursdayopen = date('G:i:s', strtotime(Request::input('thursdayopen')));
        $shop->thursdayclosed = date('G:i:s', strtotime(Request::input('thursdayclosed')));
        $shop->fridayopen = date('G:i:s', strtotime(Request::input('fridayopen')));
        $shop->fridayclosed = date('G:i:s', strtotime(Request::input('fridayclosed')));
        $shop->saturdayopen = date('G:i:s', strtotime(Request::input('saturdayopen')));
        $shop->saturdayclosed = date('G:i:s', strtotime(Request::input('saturdayclosed')));
        $shop->sundayopen = date('G:i:s', strtotime(Request::input('sundayopen')));
        $shop->sundayclosed = date('G:i:s', strtotime(Request::input('sundayclosed')));
        $shop->public_holidayopen = date('G:i:s', strtotime(Request::input('public_holidayopen')));
        $shop->public_holidayclosed = date('G:i:s', strtotime(Request::input('public_holidayclosed')));
        $shop->public_holidayevopen = date('G:i:s', strtotime(Request::input('public_holidayevopen')));
        $shop->public_holidayevclosed = date('G:i:s', strtotime(Request::input('public_holidayevclosed')));

        $shop->shop_image_1 = Request::input('shop_image_1');
        $shop->shop_image_1 = Request::input('shop_image_2');
        $shop->shop_image_1 = Request::input('shop_image_3');
        $shop->shop_image_1 = Request::input('shop_image_4');
        $shop->shop_image_1 = Request::input('shop_image_5');
        Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'Shop Detail successfully updated.');
        Session::flash('flash_type', 'alert-success');
        $shop->save();
//echo '<pre>'.print($shop); die;
        Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'Shop update successfully.');
        Session::flash('flash_type', 'alert-success');
// return view('admin.shopes.create_edit', compact('user'));
        return Redirect::to('admin/users/shops_index');
    }

    public function shops_getEdit($id) {
 
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }
        $id = base64_decode($id);

        $Data = Shop::find($id);
        $User = User::find($Data->user_id);

        //print_r($User );die;
        return view('admin.shopes.shop_update', compact('Data', 'User'));
    }

    public function shops_postEdit(ShopeditRequest $request, $id) {
 
        $userS_iD = Auth::user()->id;


        if (Session::has('flash_message')) {
            Session::forget('flash_message');
// Session::reflash();	
        }
//  echo $request->user_id ; die;
//        $user = User::find($userS_iD);
//
//
//        $user->first_name = Request::input('first_name');
//        $user->last_name = Request::input('last_name');
//
//        $user->email_2 = Request::input('email_2');
//        $user->phone = Request::input('phone');
//        $user->phone_2 = Request::input('phone_2');
//
//        $user->save();

//    echo $request->shopename; die;
        $shop = Shop::find(base64_decode($id));



//        $request->full_name;
//        $request->phone;
//        $request->contact_email;
//        $shop->facebook = $request->facebook;
//        $shop->twitter = $request->twitter;
//Shop information


        $shop->chain = Request::input('chain');
        $shop->chain_c = Request::input('chain_c');
        $shop->shop_name = Request::input('shop_name');
        $shop->shop_name_c = Request::input('shop_name_c');
        $shop->shop_email = Request::input('shop_email');
        $shop->contact_email = Request::input('contact_email');
        $shop->source = Request::input('source');
        
        $shop->contact_phone_1 = Request::input('contact_phone_1');
        $shop->contact_phone_2 = Request::input('contact_phone_2');
        $shop->shop_phone_1 = Request::input('shop_phone_1');
        $shop->shop_phone_2 = Request::input('shop_phone_2');
         $shop->shop_fax = Request::input('shop_fax');
        $shop->shop_no = Request::input('shop_no');
        $shop->shop_no_c = Request::input('shop_no_c');
        $shop->shop_line_2 = Request::input('shop_line_2');
        $shop->shop_line_2_c = Request::input('shop_line_2_c');
        $shop->floor = Request::input('floor');
        $shop->floor_c = Request::input('floor_c');
        $shop->floor_line_2 = Request::input('floor_line_2');
        $shop->floor_line_2_c = Request::input('floor_line_2_c');
        $shop->mall = Request::input('mall');
        $shop->mall_c = Request::input('mall_c');
        $shop->building = Request::input('building');
        $shop->building_c = Request::input('building_c');
        $shop->landmark = Request::input('landmark');
        $shop->landmark_c = Request::input('landmark_c');
        $shop->phase_block = Request::input('phase_block');
        $shop->phase_block_c = Request::input('phase_block_c');
        $shop->street = Request::input('street');
        $shop->street_c = Request::input('street_c');
        $shop->mtr_station = Request::input('mtr_station');
        $shop->mtr_station_c = Request::input('mtr_station_c');
        $shop->region = Request::input('regionf');
        $shop->district = Request::input('districtf');
        if (Request::input('mall') != null || Request::input('landmark') != null) {

            if (Request::input('mall') != null && Request::input('landmark') != null) {

                $mallLandmarkCount = Landmark::Where('mall_e', '=', Request::input('mall'))->Where('landmark_e', '=', Request::input('landmark'))->count();

                if ($mallLandmarkCount == 0) {
                    $MallLandmark = new Landmark();
                    $MallLandmark->district_id = $shop->district;
                    $MallLandmark->mall_e = Request::input('mall');
                    $MallLandmark->mall_c = Request::input('mall_c');
                    $MallLandmark->landmark_e = Request::input('landmark');
                    $MallLandmark->landmark_c = Request::input('landmark_c');
                    $MallLandmark->save();

                    $shop->mall = $MallLandmark->id;
                    $shop->landmark = $MallLandmark->id;
                } else {
                    $MallLandmark = Landmark::Where('mall_e', '=', Request::input('mall'))->Where('landmark_e', '=', Request::input('landmark'))->first();
                    $shop->mall = $MallLandmark->id;
                    $shop->landmark = $MallLandmark->id;
                }
            } else {
                if (Request::input('mall') != null) {
                    $mallLandmarkCount = Landmark::Where('mall_e', '=', Request::input('mall'))->count();

                    if ($mallLandmarkCount == 0) {
                        $MallLandmark = new Landmark();
                        $MallLandmark->district_id = $shop->district;
                        $MallLandmark->mall_e = Request::input('mall');
                        $MallLandmark->mall_c = Request::input('mall_c');
                        $MallLandmark->save();
                        $shop->mall = $MallLandmark->id;
                        $shop->landmark = $MallLandmark->id;
                    } else {
                        $MallLandmark = Landmark::Where('mall_e', '=', Request::input('mall'))->first();
                        $shop->mall = $MallLandmark->id;
                        $shop->landmark = $MallLandmark->id;
                    }
                } else {
                    $mallLandmarkCount = Landmark::Where('landmark_e', '=', Request::input('landmark'))->count();
                    if ($mallLandmarkCount == 0) {
                        $MallLandmark = new Landmark();
                        $MallLandmark->district_id = $shop->district;
                        $MallLandmark->landmark_e = Request::input('landmark');
                        $MallLandmark->landmark_c = Request::input('landmark_c');
                        $MallLandmark->save();
                        $shop->mall = $MallLandmark->id;
                        $shop->landmark = $MallLandmark->id;
                    } else {
                        $MallLandmark = Landmark::Where('landmark_e', '=', Request::input('landmark'))->first();
                        $shop->mall = $MallLandmark->id;
                        $shop->landmark = $MallLandmark->id;
                    }
                }
            }
        }
//        $shop->address = Request::input('address');
//        $shop->address_c = Request::input('address_c');
        if (Request::input('shop_type') != null) {
            $shop->shop_type = implode(',', Request::input('shop_type'));
        }
        if (Request::input('payment_option') != null) {
            $shop->payment_option = implode(',', Request::input('payment_option'));
        }
        if (Request::input('age_gender') != null) {
            $shop->age_gender = implode(',', Request::input('age_gender'));
        }
        if (Request::input('price_range') != null) {
            $shop->price_range = implode(',', Request::input('price_range'));
        }



        if (Request::input('FashionCategory') != null) {
            $shop->fashion_category = implode(',', Request::input('FashionCategory'));
        }

        if (Request::input('BeautyRetailCategory') != null) {
            $shop->beauty_retail_category = implode(',', Request::input('BeautyRetailCategory'));
        }

        if (Request::input('BeautyServicingCategory') != null) {
            $shop->beauty_service_category = implode(',', Request::input('BeautyServicingCategory'));
        }
        if (Request::input('ShopTypeo') != null) {
            $shop->refined_shop_type = implode(',', Request::input('ShopTypeo'));
        }
        if (Request::input('display_top') != null) {
            $shop->display_top = Request::input('display_top');
        }
        $shop->fitting = Request::input('fitting');
        $shop->fitting_detail = Request::input('fitting_detail');
        $shop->refund = Request::input('refund');
        $shop->refund_detail = Request::input('refund_detail');
        $shop->exchange = Request::input('exchange');
        $shop->exchange_detail = Request::input('exchange_detail');
        $shop->membership = Request::input('membership');
        $shop->membership_detail = Request::input('membership_detail');
        $shop->description = Request::input('description');
        $shop->description_c = Request::input('description_c');
        $shop->website_english = Request::input('website_english');
        $shop->website_chinese = Request::input('website_chinese');
        $shop->facebook = Request::input('facebook');
        $shop->instagram = Request::input('instagram');
        $shop->twitter = Request::input('twitter');
        $shop->weibo = Request::input('weibo');

        $shop->mondayopen = date('G:i:s', strtotime(Request::input('mondayopen')));
        $shop->mondayclosed = date('G:i:s', strtotime(Request::input('mondayclosed')));
        $shop->tuesdayopen = date('G:i:s', strtotime(Request::input('tuesdayopen')));
        $shop->tuesdayclosed = date('G:i:s', strtotime(Request::input('tuesdayclosed')));
        $shop->wednesdayopen = date('G:i:s', strtotime(Request::input('wednesdayopen')));
        $shop->wednesdayclosed = date('G:i:s', strtotime(Request::input('wednesdayclosed')));
        $shop->thursdayopen = date('G:i:s', strtotime(Request::input('thursdayopen')));
        $shop->thursdayclosed = date('G:i:s', strtotime(Request::input('thursdayclosed')));
        $shop->fridayopen = date('G:i:s', strtotime(Request::input('fridayopen')));
        $shop->fridayclosed = date('G:i:s', strtotime(Request::input('fridayclosed')));
        $shop->saturdayopen = date('G:i:s', strtotime(Request::input('saturdayopen')));
        $shop->saturdayclosed = date('G:i:s', strtotime(Request::input('saturdayclosed')));
        $shop->sundayopen = date('G:i:s', strtotime(Request::input('sundayopen')));
        $shop->sundayclosed = date('G:i:s', strtotime(Request::input('sundayclosed')));
        $shop->public_holidayopen = date('G:i:s', strtotime(Request::input('public_holidayopen')));
        $shop->public_holidayclosed = date('G:i:s', strtotime(Request::input('public_holidayclosed')));
        $shop->public_holidayevopen = date('G:i:s', strtotime(Request::input('public_holidayevopen')));
        $shop->public_holidayevclosed = date('G:i:s', strtotime(Request::input('public_holidayevclosed')));
 
        
      
      $file1 = Input::file('shop_image_1');
        if ($file1 != null) {
            $image_name = time() . "-shop_image_1" . $file1->getClientOriginalName();
            $file1->move('uploads/shop', $image_name);
           
            $shop->shop_image_1 = url() . '/uploads/shop/' . $image_name;
            
        }

        $file2 = Input::file('shop_image_2');
        if ($file2 != null) {
            $image_name = time() . "-shop_image_2" . $file2->getClientOriginalName();
            $file2->move('uploads/shop', $image_name);
             
            $shop->shop_image_2 = url() . '/uploads/shop/' . $image_name;
            
        }
        $file3 = Input::file('shop_image_3');
        if ($file3 != null) {
            $image_name = time() . "-shop_image_3" . $file3->getClientOriginalName();
            $file3->move('uploads/shop', $image_name);
            
            $shop->shop_image_3 = url() . '/uploads/shop/' . $image_name;
            
        }
        $file4 = Input::file('shop_image_4');
        if ($file4 != null) {
            $image_name = time() . "-shop_image_4" . $file4->getClientOriginalName();
            $file4->move('uploads/shop', $image_name);
             
            $shop->shop_image_4 = url() . '/uploads/shop/' . $image_name;
             
        }

        $file5 = Input::file('shop_image_5');
        if ($file5 != null) {
            $image_name = time() . "-shop_image_5" . $file5->getClientOriginalName();
            $file5->move('uploads/shop', $image_name);
            
            $shop->shop_image_5 = url() . '/uploads/shop/' . $image_name;
            
        }
        Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'Shop Detail successfully updated.');
        Session::flash('flash_type', 'alert-success');
        $shop->save();
        // print_r($shop); die;
        Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'Shop update successfully.');
        Session::flash('flash_type', 'alert-success');
// return view('admin.shopes.create_edit', compact('user'));
          
       return Redirect::to('admin/users/shops_index');
    }

    public function getAddManager($id) {

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
// Session::reflash();	
        }

        return view('admin.shopes.managerCreate_edit');
    }

    public function postAddManager(ManagerRequest $request, $id) {

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
// Session::reflash();	
        }

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->confirmation_code = str_random(32);
        $user->confirmed = '0';
        $user->role_id = '5';

        $user->save();

//        echo $request->shopename; die;
        $shop = Shop::find(base64_decode($id));

        $shop->sub_user_id = $user->id;

        $shop->save();
//echo '<pre>'.print($shop); die;
        Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'Sub admin update successfully.');
        Session::flash('flash_type', 'alert-success');
// return view('admin.shopes.create_edit', compact('user'));
        return Redirect::to('admin/users/shops_index');
    }

    public function getEditManager($id) {

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
// Session::reflash();	
        }


        $user = User::find(base64_decode($id));

        return view('admin.shopes.managerCreate_edit', compact('user'));
    }

    public function postEditManager(ManagerRequestEdit $request, $id) {
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
// Session::reflash();	
        }
        $id = base64_decode($id);
        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->save();
        Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'Sub admin update successfully.');
        Session::flash('flash_type', 'alert-success');
        return Redirect::to('admin/users/shops_index');
    }

    public function getshop_Image($id) {

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
// Session::reflash();	
        }

        $data = Shop::find(base64_decode($id));


        return view('admin.shopes.shop_image', compact('data'));
    }

    public function postshop_Image($id) {

        $id = base64_decode($id);
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }


        $file1 = Input::file('shop_image_1');
        if ($file1 != null) {
            $image_name = time() . "-shop_image_1" . $file1->getClientOriginalName();
            $file1->move('uploads/shop', $image_name);
            $Shop = Shop::find($id);
            $Shop->shop_image_1 = url() . '/uploads/shop/' . $image_name;
            $Shop->save();
        }

        $file2 = Input::file('shop_image_2');
        if ($file2 != null) {
            $image_name = time() . "-shop_image_2" . $file2->getClientOriginalName();
            $file2->move('uploads/shop', $image_name);
            $Shop = Shop::find($id);
            $Shop->shop_image_2 = url() . '/uploads/shop/' . $image_name;
            $Shop->save();
        }
        $file3 = Input::file('shop_image_3');
        if ($file3 != null) {
            $image_name = time() . "-shop_image_3" . $file3->getClientOriginalName();
            $file3->move('uploads/shop', $image_name);
            $Shop = Shop::find($id);
            $Shop->shop_image_3 = url() . '/uploads/shop/' . $image_name;
            $Shop->save();
        }
        $file4 = Input::file('shop_image_4');
        if ($file4 != null) {
            $image_name = time() . "-shop_image_4" . $file4->getClientOriginalName();
            $file4->move('uploads/shop', $image_name);
            $Shop = Shop::find($id);
            $Shop->shop_image_4 = url() . '/uploads/shop/' . $image_name;
            $Shop->save();
        }

        $file5 = Input::file('shop_image_5');
        if ($file5 != null) {
            $image_name = time() . "-shop_image_5" . $file5->getClientOriginalName();
            $file5->move('uploads/shop', $image_name);
            $Shop = Shop::find($id);
            $Shop->shop_image_5 = url() . '/uploads/shop/' . $image_name;
            $Shop->save();
        }

        return Redirect::to('admin/users/shops_index');
//           $shop->shop_image_1 = $data['shop_image_1'];
//                $shop->shop_image_2 = $data['shop_image_2'];
//                $shop->shop_image_3 = $data['shop_image_3'];
//                $shop->shop_image_4 = $data['shop_image_4'];
//        $id = base64_decode($id);
//        $user = User::find($id);
//        $user->first_name = $request->first_name;
//        $user->last_name = $request->last_name;
//        $user->save();
//        Session::flash('error_type', 'Well done!');
//        Session::flash('flash_message', 'Sub admin update successfully.');
//        Session::flash('flash_type', 'alert-success');
//        return Redirect::to('admin/users/shops_index');
    }

    public function getimage() {


        $query = Shop::paginate(30);
        foreach ($query as $value) {
            echo $value->id . '</br>';

            $url1 = trim($value->shop_image_1);
        
            if ($url1 != null) {
                $Shop = Shop::find($value->id);
                if (@is_array(@getimagesize($url1))) {
                    $orgimg = trim($url1);
                   $image_name = time() ."_".$value->id .  "-shop_image_1.jpg" ;
                    
                 $img = 'uploads/shop/' . $image_name;
                    if (@getimagesize($orgimg)) {
                        $file = file($orgimg);
                        $result = @file_put_contents($img, $file);
                        echo $Shop->shop_image_1 = url() . '/' . $img;
                        $Shop->save();
                        // $shop->shop_image_1 = $image_name;
                    }
                } else {
                    $Shop->shop_image_1 = null;
                    $Shop->save();
                }
            }
            $url2 = trim($value->shop_image_2);
            
            if ($url2 != null) {
                $Shop = Shop::find($value->id);
                if (@is_array(@getimagesize($url2))) {
                    $orgimg = trim($url2);
                   $image_name = time() ."_".$value->id .   "-shop_image_2.jpg" ;
                    $img = 'uploads/shop/' . $image_name;
                    if (@getimagesize($orgimg)) {
                        $file = file($orgimg);
                        $result = @file_put_contents($img, $file);

                        echo $Shop->shop_image_2 = url() . '/' . $img;
                        $Shop->save();
                        // $shop->shop_image_1 = $image_name;
                    }
                } else {
                    $Shop->shop_image_2 = null;
                    $Shop->save();
                }
            }
            $url3 = trim($value->shop_image_3);
            if ($url3 != null) {
                $Shop = Shop::find($value->id);
                if (@is_array(@getimagesize($url3))) {
                    $orgimg = trim($url3);
                 $image_name = time() ."_".$value->id .  "-shop_image_3.jpg" ;
                    $img = 'uploads/shop/' . $image_name;
                    if (@getimagesize($orgimg)) {
                        $file = file($orgimg);
                        $result = @file_put_contents($img, $file);

                        echo $Shop->shop_image_3 = url() . '/' . $img;
                        $Shop->save();
                        // $shop->shop_image_1 = $image_name;
                    }
                } else {
                    $Shop->shop_image_3 = null;
                    $Shop->save();
                }
            }

            $url4 = trim($value->shop_image_4);
            if ($url4 != null) {
                $Shop = Shop::find($value->id);
                if (@is_array(@getimagesize($url4))) {
                    $orgimg = trim($url4);
                 $image_name = time() ."_".$value->id .  "-shop_image_4.jpg" ;
                    $img = 'uploads/shop/' . $image_name;
                    if (@getimagesize($orgimg)) {
                        $file = file($orgimg);
                        $result = @file_put_contents($img, $file);

                        echo $Shop->shop_image_4 = url() . '/' . $img;
                        $Shop->save();
                        // $shop->shop_image_1 = $image_name;
                    }
                } else {
                    $Shop->shop_image_4 = null;
                    $Shop->save();
                }
            }
        }
        die;
    }

    public function getletlong() {



//        try {
//    $geocode = Geocoder::geocode('10 rue Gambetta, Paris, France');
//    // The GoogleMapsProvider will return a result
//    var_dump($geocode);
//} catch (\Exception $e) {
//    // No exception will be thrown here
//    echo $e->getMessage();
//}die;
        $query = Shop::paginate(10);
        foreach ($query as $Data) {
            // echo $Data->id . '</br>';


            echo $Data->id . '<br/>';

            $ADDRESS = null;

            if ($Data->mall != null) {
                $landmark = Text::landmarkname($Data->mall);
                $ADDRESS = $landmark->mall_e;
                $ADDRESS = str_replace(",,", ",", $ADDRESS);
            }

            if ($Data->landmark != null) {
                $landmark = Text::landmarkname($Data->landmark);
                if ($landmark->landmark_e != null) {
                    $ADDRESS = $ADDRESS . ',' . $landmark->landmark_e;
                    $ADDRESS = str_replace(",,", ",", $ADDRESS);
                }
            }


            if ($Data->mtr_station != null) {
                $ADDRESS = $ADDRESS . ',' . $Data->mtr_station;
                $ADDRESS = str_replace(",,", ",", $ADDRESS);
            }

            if ($Data->building != null) {
                $ADDRESS = $ADDRESS . ',' . $Data->building;
                $ADDRESS = str_replace(",,", ",", $ADDRESS);
            }



//            if ($Data->district != null) {
//                $districtname = Text::districtname($Data->district);
//                $ADDRESS = $ADDRESS . ',' . $districtname->name_e;
//                $ADDRESS = str_replace(",,", ",", $ADDRESS);
//            }
//
//            if ($Data->region != null) {
//                $regionname = Text::regionname($Data->region);
//
//                $ADDRESS = $ADDRESS . ',' . $regionname->name_e;
//                $ADDRESS = str_replace(",,", ",", $ADDRESS);
//            }
//            $ADDRESS = trim($ADDRESS, ",");
//            $ADDRESS = $ADDRESS . ',Hong Kong';

            $ADDRESS = trim($ADDRESS, ",");
            $ADDRESS = str_replace(",,", ",", $ADDRESS);

            echo $ADDRESS . '<br/>';



            $ADDRESS = str_replace(' ', '+', $ADDRESS);
            $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $ADDRESS . '&sensor=true');
            $output = json_decode($geocode, true);

            if ($output['status'] == 'OK') {

                $lat = $output['results'][0]['geometry']['location']['lat'];
                $lng = $output['results'][0]['geometry']['location']['lng'];
                $map_code = array('status' => 'ok', 'lat' => $lat, 'lng' => $lng);
               
                 $Shop = Shop::find($Data->id);
                 $Shop->latitude = $lat;
                 $Shop->longitude = $lng;
                 $Shop->save();
                print_r($map_code) . '<br/>';
            } else {
//                $map_code = array('status' => 'zero', 'lat' => '', 'lng' => '');
//                return $map_code;
            }




//            $param = array(
//                "address"=>$ADDRESS,
//                "components"=>"country:HK"
//            );
//        $response = \Geocoder::geocode('json', $param);
//         var_dump($response);
//            $param = array("latlng"=>"40.714224,-73.961452");
//            $response = \Geocoder::geocode('json', $param);
//            print_r($response);die;
//        $coordinate = Geotools::coordinate('48 49.4N, 2 18.43333E');
//         var_dump($coordinate);die;
//    $Address = urlencode($ADDRESS.',HK');
//             
//            $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=" . $Address . "&sensor=true&key=AIzaSyCUHXbXqF8Ja3COJCBrVIxSGQuNp0qEEiY";
//            $xml = simplexml_load_file($request_url) or die("url not loading");
//            print_r($xml).'<br/>';
//            $status = $xml->status;
//            if ($status == "OK") {
//                $Lat = $xml->result->geometry->location->lat;
//                $Lon = $xml->result->geometry->location->lng;
//                echo $LatLng = "$Lat,$Lon". '<br/>';
//                $Shop = Shop::find($Data->id);
//                $Shop->lat = $Lat;
//                $Shop->lng = $Lon;
//                $Shop->save();
//            }
        }
    }

    public function nearby() {

        $lat = "22.3203648";
        $lng = "114.1697730";
        $distance = "1000";


//          $results = Shop::select(DB::raw('SELECT id, ( 3959 * acos( cos( radians(' . $lat . ') ) '
//                  . '* cos( radians( latitude ) ) * cos( radians( longitude ) - radians(' . $lng . ') ) '
//                  . '+ sin( radians(' . $lat .') ) * sin( radians(latitude) ) ) ) '
//                  . 'AS distance FROM shops HAVING distance < ' . $distance . ' ORDER BY distance') );
        print_r($results);
        die;
    }

    public function getregion1($region) {

        $District = District::select('id', 'name_e', 'name_c')->where('region_id', trim($region))->orderBy('name_e')->get();
        return view('admin.ajax.districtf', compact('District'));
    }

    public function getshopType($id) {


        return view('admin.ajax.cetogarydivadmin', compact('id'));
    }

    public function createExcel() {
            ob_end_clean();
        ob_start();
        Excel::create('Laravel Excel', function($excel) {
            $excel->sheet('Productos', function($sheet) {

                $query = Shop::with('rigionsd');
             //  $query =$query->select('shopes.id','regions.name_e');
                $shop = $query->get();
                //echo $query->toSql();die;
                //echo $shop->rigionsd()->name_e;
//                echo "<pre>";print_r($shop);
//                die;

//                $shop =DB::table('shopes')
//            ->join('regions', 'shopes.region', '=', 'regions.id')
//         //   ->join('orders', 'users.id', '=', 'orders.user_id')
//            ->select('shopes.id', 'regions.name_e', 'regions.name_c')
//            ->get();
                // print_r($shop); die;  
                // Shop::select('mondayopen as monday', 'mondayclosed')->get();
//                foreach ($shop as $a) {
//
////                    echo $b['mondayopen'];
////                    $sheet->rows(array(
////                        array($b['mondayopen']),
////                    ));
////                    $sheet->setColumnFormat(array(
////                        'A' => 'General',
////                    ));
////                    die;
//                }
                $sheet->fromArray($shop);

                // $sheet->mergeCells('A1:B1');
                // 
            });
        })->export('xlsx');
    
    }

}
