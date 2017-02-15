<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ShopUpdateRequest;
use App\Http\Controllers\AdminController;
use App\ShopTemp;
use App\Landmark;
use App\Shop;
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

class ForshopController extends AdminController {
    /*
     * Display a listing of the resource.
     *
     * @return Response
     */
    /* Shop Owner users */

    public function update_index() {

        $query = ShopTemp::where('update_type', 1);

        if (Request::isMethod('post')) {

            $query = $query->where(function($q) {
                $q->orWhere('shop_name', 'LIKE', '%' . Request::input('searchbox') . '%')
                        ->orWhere('shop_name_c', 'LIKE', '%' . Request::input('searchbox') . '%');
            });
        }


        $query = $query->orderBy('id', 'desc');
        $Data = $query->paginate(10);
        return view('admin.forshopupdate.update_index', compact('Data'));
    }

    public function delete($id) {
        $id = base64_decode($id);
        $Data = ShopTemp::find($id);
        $Data->delete();
        return Redirect::back();
        // return Redirect::to('admin/forshopupdate/update_index');
    }

    public function newshopdelete($id) {
        $id = base64_decode($id);
        $Data = ShopTemp::find($id);
        $Data->delete();
        return Redirect::back();
    }

    public function relocdelete($id) {
        $id = base64_decode($id);
        $Data = ShopTemp::find($id);
        $Data->delete();
        return Redirect::back();
    }

    public function renovdelete($id) {
       
        $id = base64_decode($id);
        $Data = ShopTemp::find($id);
        $Data->delete();
        return Redirect::back();
    }

    public function branchdelete($id) {
        $id = base64_decode($id);
        $Data = ShopTemp::find($id);
        $Data->delete();
        return Redirect::back();
    }

    public function closuredelete($id) {
        $id = base64_decode($id);
        $Data = ShopTemp::find($id);
        $Data->delete();
        return Redirect::back();
    }

    public function getupdate($id) {

        $id = base64_decode($id);
        $Data = ShopTemp::find($id);

        return view('admin.forshopupdate.update', compact('Data'));
    }

    public function postupdate(ShopUpdateRequest $request, $id) {



        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }
        $id = base64_decode($id);
        $shopTemp = ShopTemp::find($id);
        $shopTemp->read_status = 1;
        $shopTemp->save();

        $shopid = Request::input('shop_id');
        $shop = Shop::find($shopid);
        $shop->chain = Request::input('chain');
        $shop->chain_c = Request::input('chain_c');
        $shop->shop_name = Request::input('shop_name');
        $shop->shop_name_c = Request::input('shop_name_c');
        $shop->shop_email = Request::input('shop_email');
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
        if (Request::input('mall')!= null || Request::input('landmark')!= null) {

                        if (Request::input('mall')!= null && Request::input('landmark') != null) {

                            $mallLandmarkCount = Landmark::Where('mall_e', '=', Request::input('mall'))->Where('landmark_e', '=', Request::input('landmark'))->count();

                            if ($mallLandmarkCount == 0) {
                                $MallLandmark = new Landmark();
                                $MallLandmark->district_id =  $shop->district;
                                $MallLandmark->mall_e = Request::input('mall');
                                $MallLandmark->mall_c =Request::input('mall_c');
                                $MallLandmark->landmark_e = Request::input('landmark');
                                $MallLandmark->landmark_c =Request::input('landmark_c');
                                $MallLandmark->save();

                                $shop->mall = $MallLandmark->id;
                                $shop->landmark = $MallLandmark->id;
                            } else {
                                $MallLandmark = Landmark::Where('mall_e', '=',  Request::input('mall'))->Where('landmark_e', '=', Request::input('landmark'))->first();
                                $shop->mall = $MallLandmark->id;
                                $shop->landmark = $MallLandmark->id;
                            }
                        } else {
                            if (Request::input('mall')!= null) {
                                $mallLandmarkCount = Landmark::Where('mall_e', '=', Request::input('mall'))->count();

                                if ($mallLandmarkCount == 0) {
                                    $MallLandmark = new Landmark();
                                    $MallLandmark->district_id =  $shop->district;
                                    $MallLandmark->mall_e = Request::input('mall');
                                    $MallLandmark->mall_c = Request::input('mall_c');
                                    $MallLandmark->save();
                                    $shop->mall = $MallLandmark->id;
                                    $shop->landmark = $MallLandmark->id;
                                } else {
                                    $MallLandmark = Landmark::Where('mall_e', '=',  Request::input('mall'))->first();
                                    $shop->mall = $MallLandmark->id;
                                    $shop->landmark = $MallLandmark->id;
                                }
                            } 
                            else {
                                $mallLandmarkCount = Landmark::Where('landmark_e', '=',Request::input('landmark'))->count();
                                if ($mallLandmarkCount == 0) {
                                    $MallLandmark = new Landmark();
                                    $MallLandmark->district_id =  $shop->district;
                                    $MallLandmark->landmark_e =Request::input('landmark');
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
    //    $shop->shop_type = Request::input('shop_type');
   if (Request::input('shop_type') != null) {
            $shop->shop_type = Request::input('shop_type');
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
        $shop->shop_image_2 = Request::input('shop_image_2');
        $shop->shop_image_3 = Request::input('shop_image_3');
        $shop->shop_image_4 = Request::input('shop_image_4');
        $shop->shop_image_5 = Request::input('shop_image_5');
    //  print_r($shop); die;
        $shop->save();
        Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'Shop Detail successfully updated.');
        Session::flash('flash_type', 'alert-success');
        return Redirect::to('admin/forshopupdate/update_index');
    }

    public function getdetail($id) {

        $id = base64_decode($id);
        $Data = ShopTemp::find($id);
//        print_r($Data);
//        die;
        return view('admin.forshopupdate.detail', compact('Data'));
    }

    public function newshopdetail($id) {

        $id = base64_decode($id);
        $Data = ShopTemp::find($id);
//        print_r($Data);
//        die;
        return view('admin.forshopupdate.newshop_detail', compact('Data'));
    }

    public function renovationdetail($id) {

        $id = base64_decode($id);
        $Data = ShopTemp::find($id);
//        print_r($Data);
//        die;
        return view('admin.forshopupdate.renovation_detail', compact('Data'));
    }

    public function closuredetail($id) {
  
        $id = base64_decode($id);
        $Data = ShopTemp::find($id);
        
        return view('admin.forshopupdate.closure_detail', compact('Data'));
    }

    public function relocationdetail($id) {

        $id = base64_decode($id);
        $Data = ShopTemp::find($id);
//        print_r($Data);
//        die;
        return view('admin.forshopupdate.relocationdetail', compact('Data'));
    }

    public function branchdetail($id) {

        $id = base64_decode($id);
        $Data = ShopTemp::find($id);
//        print_r($Data);
//        die;
        return view('admin.forshopupdate.branchdetail', compact('Data'));
    }

/// ####################### new shop 
    public function newShop_index() {

        $query = ShopTemp::where('update_type', 2);
        if (Request::isMethod('post')) {

            $query = $query->where(function($q) {
                $q->orWhere('shop_name', 'LIKE', '%' . Request::input('searchbox') . '%')
                        ->orWhere('shop_name_c', 'LIKE', '%' . Request::input('searchbox') . '%');
            });
        }
        $query = $query->orderBy('id', 'desc');
        $Data = $query->paginate(10);
        return view('admin.forshopupdate.newShop_index', compact('Data'));
    }

    public function createNewShop($id) {

        $id = base64_decode($id);
        $Data = ShopTemp::find($id);
        return view('admin.forshopupdate.createNewShop', compact('Data'));
    }

    public function postcreateNewShop(ShopUpdateRequest $request, $id) {
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }
        $id = base64_decode($id);
        $shopTemp = ShopTemp::find($id);
        $shopTemp->read_status = 1;
        $shopTemp->save();

        $shop = new Shop();
        $shop->chain = Request::input('chain');
        $shop->chain_c = Request::input('chain_c');
        $shop->shop_name = Request::input('shop_name');
        $shop->shop_name_c = Request::input('shop_name_c');
        $shop->shop_email = Request::input('shop_email');
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
        if (Request::input('mall')!= null || Request::input('landmark')!= null) {

                        if (Request::input('mall')!= null && Request::input('landmark') != null) {

                            $mallLandmarkCount = Landmark::Where('mall_e', '=', Request::input('mall'))->Where('landmark_e', '=', Request::input('landmark'))->count();

                            if ($mallLandmarkCount == 0) {
                                $MallLandmark = new Landmark();
                                $MallLandmark->district_id =  $shop->district;
                                $MallLandmark->mall_e = Request::input('mall');
                                $MallLandmark->mall_c =Request::input('mall_c');
                                $MallLandmark->landmark_e = Request::input('landmark');
                                $MallLandmark->landmark_c =Request::input('landmark_c');
                                $MallLandmark->save();

                                $shop->mall = $MallLandmark->id;
                                $shop->landmark = $MallLandmark->id;
                            } else {
                                $MallLandmark = Landmark::Where('mall_e', '=',  Request::input('mall'))->Where('landmark_e', '=', Request::input('landmark'))->first();
                                $shop->mall = $MallLandmark->id;
                                $shop->landmark = $MallLandmark->id;
                            }
                        } else {
                            if (Request::input('mall')!= null) {
                                $mallLandmarkCount = Landmark::Where('mall_e', '=', Request::input('mall'))->count();

                                if ($mallLandmarkCount == 0) {
                                    $MallLandmark = new Landmark();
                                    $MallLandmark->district_id =  $shop->district;
                                    $MallLandmark->mall_e = Request::input('mall');
                                    $MallLandmark->mall_c = Request::input('mall_c');
                                    $MallLandmark->save();
                                    $shop->mall = $MallLandmark->id;
                                    $shop->landmark = $MallLandmark->id;
                                } else {
                                    $MallLandmark = Landmark::Where('mall_e', '=',  Request::input('mall'))->first();
                                    $shop->mall = $MallLandmark->id;
                                    $shop->landmark = $MallLandmark->id;
                                }
                            } 
                            else {
                                $mallLandmarkCount = Landmark::Where('landmark_e', '=',Request::input('landmark'))->count();
                                if ($mallLandmarkCount == 0) {
                                    $MallLandmark = new Landmark();
                                    $MallLandmark->district_id =  $shop->district;
                                    $MallLandmark->landmark_e =Request::input('landmark');
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
        $shop->shop_image_2 = Request::input('shop_image_2');
        $shop->shop_image_3 = Request::input('shop_image_3');
        $shop->shop_image_4 = Request::input('shop_image_4');
        $shop->shop_image_5 = Request::input('shop_image_5');
      
        $shop->save();
        $id = base64_decode($id);
        $Data = ShopTemp::find($id);

        Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'New shop successfully Create.');
        Session::flash('flash_type', 'alert-success');
        return Redirect::to('admin/forshopupdate/newShop_index');
        // return view('admin.forshopupdate.createNewShop', compact('Data'));
    }

    ############################  closure Shop

    public function closure_index() {

        $query = ShopTemp::where('update_type', 3);
        if (Request::isMethod('post')) {

            $query = $query->where(function($q) {
                $q->orWhere('shop_name', 'LIKE', '%' . Request::input('searchbox') . '%')
                        ->orWhere('shop_name_c', 'LIKE', '%' . Request::input('searchbox') . '%');
            });
        }
        $query = $query->orderBy('id', 'desc');
        $Data = $query->paginate(10);
        return view('admin.forshopupdate.closure_index', compact('Data'));
    }

    public function getClosureUpdate($id) {

        $id = base64_decode($id);
        $Data = ShopTemp::find($id);
        return view('admin.forshopupdate.ClosureUpdate', compact('Data'));
    }

    public function postClosureUpdate(ShopUpdateRequest $request, $id) {

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }
        
        $id = base64_decode($id);
        $shopTemp = ShopTemp::find($id);
        $shopTemp->read_status = 1;
        $shopTemp->save();

        $shopid = Request::input('shop_id');
        $shop = Shop::find($shopid);
        $shop->shop_name = Request::input('shop_name');
        $shop->shop_name_c = Request::input('shop_name_c');
        $shop->shop_email = Request::input('shop_email');
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
        if (Request::input('mall')!= null || Request::input('landmark')!= null) {

                        if (Request::input('mall')!= null && Request::input('landmark') != null) {

                            $mallLandmarkCount = Landmark::Where('mall_e', '=', Request::input('mall'))->Where('landmark_e', '=', Request::input('landmark'))->count();

                            if ($mallLandmarkCount == 0) {
                                $MallLandmark = new Landmark();
                                $MallLandmark->district_id =  $shop->district;
                                $MallLandmark->mall_e = Request::input('mall');
                                $MallLandmark->mall_c =Request::input('mall_c');
                                $MallLandmark->landmark_e = Request::input('landmark');
                                $MallLandmark->landmark_c =Request::input('landmark_c');
                                $MallLandmark->save();

                                $shop->mall = $MallLandmark->id;
                                $shop->landmark = $MallLandmark->id;
                            } else {
                                $MallLandmark = Landmark::Where('mall_e', '=',  Request::input('mall'))->Where('landmark_e', '=', Request::input('landmark'))->first();
                                $shop->mall = $MallLandmark->id;
                                $shop->landmark = $MallLandmark->id;
                            }
                        } else {
                            if (Request::input('mall')!= null) {
                                $mallLandmarkCount = Landmark::Where('mall_e', '=', Request::input('mall'))->count();

                                if ($mallLandmarkCount == 0) {
                                    $MallLandmark = new Landmark();
                                    $MallLandmark->district_id =  $shop->district;
                                    $MallLandmark->mall_e = Request::input('mall');
                                    $MallLandmark->mall_c = Request::input('mall_c');
                                    $MallLandmark->save();
                                    $shop->mall = $MallLandmark->id;
                                    $shop->landmark = $MallLandmark->id;
                                } else {
                                    $MallLandmark = Landmark::Where('mall_e', '=',  Request::input('mall'))->first();
                                    $shop->mall = $MallLandmark->id;
                                    $shop->landmark = $MallLandmark->id;
                                }
                            } 
                            else {
                                $mallLandmarkCount = Landmark::Where('landmark_e', '=',Request::input('landmark'))->count();
                                if ($mallLandmarkCount == 0) {
                                    $MallLandmark = new Landmark();
                                    $MallLandmark->district_id =  $shop->district;
                                    $MallLandmark->landmark_e =Request::input('landmark');
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
           
        $shop->status  = '0';
        $shop->display_top  = '0';
        $shop->save();

        $id = base64_decode($id);
        $Data = ShopTemp::find($id);

        Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'New Closure successfully update.');
        Session::flash('flash_type', 'alert-success');
        return Redirect::to('admin/forshopupdate/closure_index');
        // return view('admin.forshopupdate.ClosureUpdate', compact('Data'));
    }

    ############################  relocation Shop

    public function relocation_index() {

        $query = ShopTemp::where('update_type', 4);
        if (Request::isMethod('post')) {

            $query = $query->where(function($q) {
                $q->orWhere('shop_name', 'LIKE', '%' . Request::input('searchbox') . '%')
                        ->orWhere('shop_name_c', 'LIKE', '%' . Request::input('searchbox') . '%');
            });
        }
        $query = $query->orderBy('id', 'desc');
        $Data = $query->paginate(10);
        return view('admin.forshopupdate.relocation_index', compact('Data'));
    }

    public function getrelocationUpdate($id) {

        $id = base64_decode($id);
        $Data = ShopTemp::find($id);
        return view('admin.forshopupdate.relocationUpdate', compact('Data'));
    }

    public function postrelocationUpdate(ShopUpdateRequest $request, $id) {

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }
            $id = base64_decode($id);
        $shopTemp = ShopTemp::find($id);
        $shopTemp->read_status = 1;
        $shopTemp->save();
        
        $shop = new Shop();
        $shopid = Request::input('shop_id');
        $shop = Shop::find($shopid);
        $shop->shop_name = Request::input('shop_name');
        $shop->shop_name_c = Request::input('shop_name_c');
        $shop->shop_email = Request::input('shop_email');
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
        if (Request::input('mall')!= null || Request::input('landmark')!= null) {

                        if (Request::input('mall')!= null && Request::input('landmark') != null) {

                            $mallLandmarkCount = Landmark::Where('mall_e', '=', Request::input('mall'))->Where('landmark_e', '=', Request::input('landmark'))->count();

                            if ($mallLandmarkCount == 0) {
                                $MallLandmark = new Landmark();
                                $MallLandmark->district_id =  $shop->district;
                                $MallLandmark->mall_e = Request::input('mall');
                                $MallLandmark->mall_c =Request::input('mall_c');
                                $MallLandmark->landmark_e = Request::input('landmark');
                                $MallLandmark->landmark_c =Request::input('landmark_c');
                                $MallLandmark->save();

                                $shop->mall = $MallLandmark->id;
                                $shop->landmark = $MallLandmark->id;
                            } else {
                                $MallLandmark = Landmark::Where('mall_e', '=',  Request::input('mall'))->Where('landmark_e', '=', Request::input('landmark'))->first();
                                $shop->mall = $MallLandmark->id;
                                $shop->landmark = $MallLandmark->id;
                            }
                        } else {
                            if (Request::input('mall')!= null) {
                                $mallLandmarkCount = Landmark::Where('mall_e', '=', Request::input('mall'))->count();

                                if ($mallLandmarkCount == 0) {
                                    $MallLandmark = new Landmark();
                                    $MallLandmark->district_id =  $shop->district;
                                    $MallLandmark->mall_e = Request::input('mall');
                                    $MallLandmark->mall_c = Request::input('mall_c');
                                    $MallLandmark->save();
                                    $shop->mall = $MallLandmark->id;
                                    $shop->landmark = $MallLandmark->id;
                                } else {
                                    $MallLandmark = Landmark::Where('mall_e', '=',  Request::input('mall'))->first();
                                    $shop->mall = $MallLandmark->id;
                                    $shop->landmark = $MallLandmark->id;
                                }
                            } 
                            else {
                                $mallLandmarkCount = Landmark::Where('landmark_e', '=',Request::input('landmark'))->count();
                                if ($mallLandmarkCount == 0) {
                                    $MallLandmark = new Landmark();
                                    $MallLandmark->district_id =  $shop->district;
                                    $MallLandmark->landmark_e =Request::input('landmark');
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

        $shop->save();
        $id = base64_decode($id);
        $Data = ShopTemp::find($id);

        Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'Shop relocation successfully update.');
        Session::flash('flash_type', 'alert-success');
        return Redirect::to('admin/forshopupdate/relocation_index');
        // return view('admin.forshopupdate.relocationUpdate', compact('Data'));
    }

    public function renovation_index() {

        $query = ShopTemp::where('update_type', 5);
        if (Request::isMethod('post')) {

            $query = $query->where(function($q) {
                $q->orWhere('shop_name', 'LIKE', '%' . Request::input('searchbox') . '%')
                        ->orWhere('shop_name_c', 'LIKE', '%' . Request::input('searchbox') . '%');
            });
        }
        $query = $query->orderBy('id', 'desc');
        $Data = $query->paginate(10);
        return view('admin.forshopupdate.renovation_index', compact('Data'));
    }

    public function getrenovationUpdate($id) {

        $id = base64_decode($id);
        $Data = ShopTemp::find($id);
        return view('admin.forshopupdate.renovationUpdate', compact('Data'));
    }

    public function postrenovationUpdate(ShopUpdateRequest $request, $id) {
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }

            $id = base64_decode($id);
        $shopTemp = ShopTemp::find($id);
        $shopTemp->read_status = 1;
        $shopTemp->save();
        
        $shop = new Shop();
        $shopid = Request::input('shop_id');
        $shop = Shop::find($shopid);
        $shop->shop_name = Request::input('shop_name');
        $shop->shop_name_c = Request::input('shop_name_c');
        $shop->shop_email = Request::input('shop_email');
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
        if (Request::input('mall')!= null || Request::input('landmark')!= null) {

                        if (Request::input('mall')!= null && Request::input('landmark') != null) {

                            $mallLandmarkCount = Landmark::Where('mall_e', '=', Request::input('mall'))->Where('landmark_e', '=', Request::input('landmark'))->count();

                            if ($mallLandmarkCount == 0) {
                                $MallLandmark = new Landmark();
                                $MallLandmark->district_id =  $shop->district;
                                $MallLandmark->mall_e = Request::input('mall');
                                $MallLandmark->mall_c =Request::input('mall_c');
                                $MallLandmark->landmark_e = Request::input('landmark');
                                $MallLandmark->landmark_c =Request::input('landmark_c');
                                $MallLandmark->save();

                                $shop->mall = $MallLandmark->id;
                                $shop->landmark = $MallLandmark->id;
                            } else {
                                $MallLandmark = Landmark::Where('mall_e', '=',  Request::input('mall'))->Where('landmark_e', '=', Request::input('landmark'))->first();
                                $shop->mall = $MallLandmark->id;
                                $shop->landmark = $MallLandmark->id;
                            }
                        } else {
                            if (Request::input('mall')!= null) {
                                $mallLandmarkCount = Landmark::Where('mall_e', '=', Request::input('mall'))->count();

                                if ($mallLandmarkCount == 0) {
                                    $MallLandmark = new Landmark();
                                    $MallLandmark->district_id =  $shop->district;
                                    $MallLandmark->mall_e = Request::input('mall');
                                    $MallLandmark->mall_c = Request::input('mall_c');
                                    $MallLandmark->save();
                                    $shop->mall = $MallLandmark->id;
                                    $shop->landmark = $MallLandmark->id;
                                } else {
                                    $MallLandmark = Landmark::Where('mall_e', '=',  Request::input('mall'))->first();
                                    $shop->mall = $MallLandmark->id;
                                    $shop->landmark = $MallLandmark->id;
                                }
                            } 
                            else {
                                $mallLandmarkCount = Landmark::Where('landmark_e', '=',Request::input('landmark'))->count();
                                if ($mallLandmarkCount == 0) {
                                    $MallLandmark = new Landmark();
                                    $MallLandmark->district_id =  $shop->district;
                                    $MallLandmark->landmark_e =Request::input('landmark');
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

        $shop->save();
        Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'Shop renovation  successfully updated.');
        Session::flash('flash_type', 'alert-success');
        $id = base64_decode($id);
        $Data = ShopTemp::find($id);
        //   return view('admin.forshopupdate.renovationUpdate', compact('Data'));
        return Redirect::to('admin/forshopupdate/renovation_index');
    }

    /// ####################### new shop 
    public function Branch_index() {

        $query = ShopTemp::where('update_type', 6);
        if (Request::isMethod('post')) {

            $query = $query->where(function($q) {
                $q->orWhere('shop_name', 'LIKE', '%' . Request::input('searchbox') . '%')
                        ->orWhere('shop_name_c', 'LIKE', '%' . Request::input('searchbox') . '%');
            });
        }
        $Data = $query->paginate(10);
        return view('admin.forshopupdate.Branch_index', compact('Data'));
    }

    public function getBranchUpdate($id) {

        $id = base64_decode($id);
        $Data = ShopTemp::find($id);
        return view('admin.forshopupdate.BranchUpdate', compact('Data'));
    }

    public function postBranchUpdate(ShopUpdateRequest $request, $id) {

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }
            $id = base64_decode($id);
        $shopTemp = ShopTemp::find($id);
        $shopTemp->read_status = 1;
        $shopTemp->save();        
        $shop = new Shop();
        $shop->chain = Request::input('chain');
        $shop->chain_c = Request::input('chain_c');
        $shop->shop_name = Request::input('shop_name');
        $shop->shop_name_c = Request::input('shop_name_c');
        $shop->shop_email = Request::input('shop_email');
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
        if (Request::input('mall')!= null || Request::input('landmark')!= null) {

                        if (Request::input('mall')!= null && Request::input('landmark') != null) {

                            $mallLandmarkCount = Landmark::Where('mall_e', '=', Request::input('mall'))->Where('landmark_e', '=', Request::input('landmark'))->count();

                            if ($mallLandmarkCount == 0) {
                                $MallLandmark = new Landmark();
                                $MallLandmark->district_id =  $shop->district;
                                $MallLandmark->mall_e = Request::input('mall');
                                $MallLandmark->mall_c =Request::input('mall_c');
                                $MallLandmark->landmark_e = Request::input('landmark');
                                $MallLandmark->landmark_c =Request::input('landmark_c');
                                $MallLandmark->save();

                                $shop->mall = $MallLandmark->id;
                                $shop->landmark = $MallLandmark->id;
                            } else {
                                $MallLandmark = Landmark::Where('mall_e', '=',  Request::input('mall'))->Where('landmark_e', '=', Request::input('landmark'))->first();
                                $shop->mall = $MallLandmark->id;
                                $shop->landmark = $MallLandmark->id;
                            }
                        } else {
                            if (Request::input('mall')!= null) {
                                $mallLandmarkCount = Landmark::Where('mall_e', '=', Request::input('mall'))->count();

                                if ($mallLandmarkCount == 0) {
                                    $MallLandmark = new Landmark();
                                    $MallLandmark->district_id =  $shop->district;
                                    $MallLandmark->mall_e = Request::input('mall');
                                    $MallLandmark->mall_c = Request::input('mall_c');
                                    $MallLandmark->save();
                                    $shop->mall = $MallLandmark->id;
                                    $shop->landmark = $MallLandmark->id;
                                } else {
                                    $MallLandmark = Landmark::Where('mall_e', '=',  Request::input('mall'))->first();
                                    $shop->mall = $MallLandmark->id;
                                    $shop->landmark = $MallLandmark->id;
                                }
                            } 
                            else {
                                $mallLandmarkCount = Landmark::Where('landmark_e', '=',Request::input('landmark'))->count();
                                if ($mallLandmarkCount == 0) {
                                    $MallLandmark = new Landmark();
                                    $MallLandmark->district_id =  $shop->district;
                                    $MallLandmark->landmark_e =Request::input('landmark');
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
    //    $shop->shop_type = Request::input('shop_type');
   if (Request::input('shop_type') != null) {
            $shop->shop_type = Request::input('shop_type');
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
        $shop->shop_image_2 = Request::input('shop_image_2');
        $shop->shop_image_3 = Request::input('shop_image_3');
        $shop->shop_image_4 = Request::input('shop_image_4');
        $shop->shop_image_5 = Request::input('shop_image_5');

        $shop->save();
        Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'Branch successfully updated.');
        Session::flash('flash_type', 'alert-success');
        $id = base64_decode($id);
        $Data = ShopTemp::find($id);
        //  return view('admin.forshopupdate.BranchUpdate', compact('Data'));
        return Redirect::to('admin/forshopupdate/Branch_index');
    }

    public function ShopRelocation($id) {
        $id = base64_decode($id);
        $Data = ShopTemp::find($id);
        return view('admin.forshopupdate.index', compact('Data'));
    }

    public function ShopRenovation($id) {
        $id = base64_decode($id);
        $Data = ShopTemp::find($id);
        return view('admin.forshopupdate.index', compact('Data'));
    }

    public function AddNewBranch($id) {


        $id = base64_decode($id);
        $Data = ShopTemp::find($id);
        return view('admin.forshopupdate.index', compact('Data'));
    }

//    comman function
    public function getregion($Name) {


        $region = Shop::orderBy('district')->where('region', 'LIKE', '%' . $Name . '%')->Where('district', '!=', '')->groupBy('district')->lists('district');

        return view('admin.ajax.district', compact('region'));
    }
public function updateshopdeleteall() {

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }

        if (Request::ajax()) {

            $checkboxvalue = Request::get('checkboxvalue');
            $checkboxvalue = (explode(",", $checkboxvalue));
            $Data = DB::table('shop_temps')
                    ->whereIn('id', $checkboxvalue)
                    ->delete();
            return ['success' => true, 'data' => $Data];
        }
    }
public function renovationshopdeleteall() {

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }

        if (Request::ajax()) {

            $checkboxvalue = Request::get('checkboxvalue');
            $checkboxvalue = (explode(",", $checkboxvalue));
            $Data = DB::table('shop_temps')
                    ->whereIn('id', $checkboxvalue)
                    ->delete();
            return ['success' => true, 'data' => $Data];
        }
    }
public function relocationshopdeleteall() {

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }

        if (Request::ajax()) {

            $checkboxvalue = Request::get('checkboxvalue');
            $checkboxvalue = (explode(",", $checkboxvalue));
            $Data = DB::table('shop_temps')
                    ->whereIn('id', $checkboxvalue)
                    ->delete();
            return ['success' => true, 'data' => $Data];
        }
    }
public function newshopsdeleteall() {

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }

        if (Request::ajax()) {

            $checkboxvalue = Request::get('checkboxvalue');
            $checkboxvalue = (explode(",", $checkboxvalue));
            $Data = DB::table('shop_temps')
                    ->whereIn('id', $checkboxvalue)
                    ->delete();
            return ['success' => true, 'data' => $Data];
        }
    }
  public function closureshopdeleteall() {

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }

        if (Request::ajax()) {

            $checkboxvalue = Request::get('checkboxvalue');
            $checkboxvalue = (explode(",", $checkboxvalue));
            $Data = DB::table('shop_temps')
                    ->whereIn('id', $checkboxvalue)
                    ->delete();
            return ['success' => true, 'data' => $Data];
        }
    }
public function branchshopsdeleteall() {

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }

        if (Request::ajax()) {

            $checkboxvalue = Request::get('checkboxvalue');
            $checkboxvalue = (explode(",", $checkboxvalue));
            $Data = DB::table('shop_temps')
                    ->whereIn('id', $checkboxvalue)
                    ->delete();
            return ['success' => true, 'data' => $Data];
        }
    }
}
