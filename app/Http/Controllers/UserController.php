<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopClosureRequest;
use App\Http\Requests\PersonalInfoRequest;
use App\Http\Requests\ShoPinChargeRequest;
use App\User;
use App\Newsletter;
use App\Shop;
use App\ShopTemp;
use App\ShopOwner;
use App\Country;
use App\Procuct;
use App\Shoptime;
use App\Shopimage;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;
use Datatables;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use App\Helpers\Text;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use App\Region;
use App\District;
use App\Landmark;
use App\Rating;
use Toin0u\Geocoder\Facade\Geocoder;
use Illuminate\Support\Facades\Auth;
use AdamWathan\EloquentOAuthL5\EloquentOAuthServiceProvider;

class UserController extends Controller {

    public function __construct() {
        //$this->middleware('auth');
        //parent::__construct(); 
        //$this->news = $news;
        //$this->user = $user;
    }

    public function getshop_catogary($id) {

        if ($id == 1) {
            return view('ajax.FashionCategory1');
        }
        if ($id == 2) {
            return view('ajax.BeautyRetailCategory1'); //Config::get('constants.BeautyRetailCategory');
        }
        if ($id == 3) {
            return view('ajax.BeautyServicingCategory1'); //Config::get('constants.BeautyServicingCategory');
        }
    }

    public function postShopsSearch() {

        //print_r(Request::input('Servicing')); die; 

        $query = Shop::Where('status', 'LIKE', '%Ready%');
//       echo Request::input('nearby'); 
        //  print_r($Servicing); die;
        if (null != (Request::input('shop_name'))) {
            $query->Where('shop_name', 'LIKE', '%' . Request::input('shop_name') . '%');
        }
        if (null != (Request::input('shop_type'))) {

            //$query->Where('shop_type', 'LIKE', '%' . Request::input('shop_type') . '%');

            $query->whereRaw('find_in_set(' . Request::input('shop_type') . ', shop_type)');

            if (Request::input('shop_type') == 1) {
                if (null != (Request::input('Servicing'))) {

                    $Servicing = Request::input('Servicing');

                    foreach ($Servicing as $v => $s) {
                        if ($s != null) {
                            $query->whereRaw('find_in_set(' . $s . ', fashion_category)');
                        }
                    }
                }
            }
            if (Request::input('shop_type') == 2) {
                if (null != (Request::input('Servicing'))) {


                    $Servicing = Request::input('Servicing');
                    foreach ($Servicing as $v => $s) {
                        if ($s != null) {


                            $query->whereRaw('find_in_set(' . $s . ', beauty_retail_category)');
                        }
                    }
                }
            }
            if (Request::input('shop_type') == 3) {
                if (null != (Request::input('Servicing'))) {
//                    $query->WhereAnd('beauty_service_category', '=', Request::input('Servicing'));

                    $Servicing = Request::input('Servicing');

                    foreach ($Servicing as $v => $s) {
                        if ($s != null) {

//                                $query->Where('beauty_service_category', 'LIKE', '%' . $s. '%');
                            $query->whereRaw('find_in_set(' . $s . ', beauty_service_category)');
                        }
                    }
                }
            }
        }



        if (null != (Request::input('ShopType'))) {
            foreach (Request::input('ShopType') as $ShopType) {

                $query->Where('refined_shop_type', 'LIKE', '%' . $ShopType . '%');
            }
        }

        if (null != (Request::input('age_gender'))) {
            foreach (Request::input('age_gender') as $age_gender) {
                $query->whereRaw('find_in_set(' . $age_gender . ',age_gender)');
            }
        }





        if (null != (Request::input('price_range'))) {
            foreach (Request::input('price_range') as $price) {

                $query->Where('price_range', 'LIKE', '%' . $price . '%');
            }
        }


        if (null != (Request::input('district'))) {
            $query->Where('district', '=', Request::input('district'));
        }
        if (null != (Request::input('region'))) {
            $query->Where('region', '=', Request::input('region'));
        }
        if (null != (Request::input('landmark'))) {
            $query->Where('mall', '=', Request::input('landmark'));
        }


        if (null != Request::input('nearby')) {
            $lat = Request::input('letcurrent');
            $lng = Request::input('lngcurrent');
            $distence = Request::input('nearby');
            $haversine = '(SELECT id AS shop_id,
       latitude, longitude, distance
  FROM (
 SELECT s.id,
        s.shop_name,
        s.latitude, s.longitude,
        p.radius,
        p.distance_unit
                 * DEGREES(ACOS(COS(RADIANS(p.latpoint))
                 * COS(RADIANS(s.latitude))
                 * COS(RADIANS(p.longpoint - s.longitude))
                 + SIN(RADIANS(p.latpoint))
                 * SIN(RADIANS(s.latitude)))) AS distance
  FROM shopes AS s
  JOIN (  
        SELECT  ' . $lat . '  AS latpoint,  ' . $lng . ' AS longpoint,
                2000 AS radius, 111045 AS distance_unit
    ) AS p ON 1=1
  WHERE s.latitude
     BETWEEN p.latpoint  - (p.radius / p.distance_unit)
         AND p.latpoint  + (p.radius / p.distance_unit)
    AND s.longitude
     BETWEEN p.longpoint - (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
         AND p.longpoint + (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
 ) AS d
 WHERE distance <= radius
 ORDER BY distance ) AS d';



            $query->join(DB::raw($haversine), 'd.shop_id', '=', 'shopes.id');
//             $data = $query->paginate(15);
//             print_r($data);die;
//             echo $data = $query->toSql();
//            die;
//      $query1 = 
//                         Shop::raw("*,-
//                              ( 6371 
//                              * acos( cos( radians($let) )
//                              * cos( radians( lat ) )
//                              * cos( radians( lng ) - radians($long) ) + sin( radians($let) ) 
//                              *  sin( radians( lat ) ) )
//                              ) < 10")->get();
//                ->setBindings(['22.3964280', '114.1094970', '22','5000'])
//            print_r($query1);
//            echo $data = $query->toSql();
//            die;
        }



        $data = $query->orderBy('shop_name', 'ASC')->paginate(15);

        return view('pages.shoplist', [
            'data' => $data->appends(Input::except('page'))
        ]);
        
    }
    public function postShopsSubmit() {
 
        //print_r(Request::input('Servicing')); die; 

        $query = Shop::Where('status', 'LIKE', '%Ready%');
//       echo Request::input('nearby'); 
        //  print_r($Servicing); die;
        if (null != (Request::input('shop_name'))) {
            $query->Where('shop_name', 'LIKE', '%' . Request::input('shop_name') . '%');
        }
         



        $data = $query->orderBy('shop_name', 'ASC')->paginate(15);

        return view('pages.listing', [
            'data' => $data->appends(Input::except('page'))
        ]);
        //  $data->setBaseUrl('custom/url');
        // return view('pages.shoplist', compact('data'));
    }

    public function postShopsSearch_c() {

        //print_r(Request::input('Servicing')); die; 
        $query = Shop::Where('status', 'LIKE', '%ready%');


        if (null != (Request::input('shop_name'))) {
            //   echo Request::input('shop_name'); 
            // $query->Where('shop_name_c','=', trim(Request::input('shop_name')));
            $query->Where('shop_name_c', 'LIKE', '%' . trim(Request::input('shop_name')) . '%');
//        echo     $query->toSql();
//        die;
        }


        if (null != (Request::input('shop_type'))) {

            //$query->Where('shop_type', 'LIKE', '%' . Request::input('shop_type') . '%');

            $query->whereRaw('find_in_set(' . Request::input('shop_type') . ', shop_type)');

            if (Request::input('shop_type') == 1) {
                if (null != (Request::input('Servicing'))) {

                    $Servicing = Request::input('Servicing');

                    foreach ($Servicing as $v => $s) {
                        if ($s != null) {
                            $query->whereRaw('find_in_set(' . $s . ', fashion_category)');
                        }
                    }
                }
            }
            if (Request::input('shop_type') == 2) {
                if (null != (Request::input('Servicing'))) {


                    $Servicing = Request::input('Servicing');
                    foreach ($Servicing as $v => $s) {
                        if ($s != null) {


                            $query->whereRaw('find_in_set(' . $s . ', beauty_retail_category)');
                        }
                    }
                }
            }
            if (Request::input('shop_type') == 3) {
                if (null != (Request::input('Servicing'))) {
//                    $query->WhereAnd('beauty_service_category', '=', Request::input('Servicing'));

                    $Servicing = Request::input('Servicing');

                    foreach ($Servicing as $v => $s) {
                        if ($s != null) {

//                                $query->Where('beauty_service_category', 'LIKE', '%' . $s. '%');
                            $query->whereRaw('find_in_set(' . $s . ', beauty_service_category)');
                        }
                    }
                }
            }
        }


        if (null != (Request::input('ShopType'))) {
            foreach (Request::input('ShopType') as $ShopType) {

                $query->Where('refined_shop_type', 'LIKE', '%' . $ShopType . '%');
            }
        }

        if (null != (Request::input('age_gender'))) {
            foreach (Request::input('age_gender') as $age_gender) {

                $query->whereRaw('find_in_set(' . $age_gender . ',age_gender)');
            }
        }





        if (null != (Request::input('price_range'))) {
            foreach (Request::input('price_range') as $price) {

                $query->Where('price_range', 'LIKE', '%' . $price . '%');
            }
        }


        if (null != (Request::input('district'))) {
            $query->Where('district', '=', Request::input('district'));
        }
        if (null != (Request::input('region'))) {
            $query->Where('region', '=', Request::input('region'));
        }
        if (null != (Request::input('landmark'))) {
            $query->Where('mall', '=', Request::input('landmark'));
        }

        $data = $query->orderBy('shop_name', 'ASC')->paginate(15);

        return view('pages.shoplist', [
            'data' => $data->appends(Input::except('page'))
        ]);
        //  $data->setBaseUrl('custom/url');
        //   return view('pages.shoplist', compact('data'));
    }

    public function SearchAllSHopList() {

        $query = Shop::Where('status', 'LIKE', '%Ready%');


        //  print_r($Servicing); die;
        if (null != (Request::input('shop_name'))) {
            $query->Where('shop_name', 'LIKE', '%' . Request::input('shop_name') . '%');
        }

        if (null != (Request::input('shop_type'))) {

            //$query->Where('shop_type', 'LIKE', '%' . Request::input('shop_type') . '%');
            $query->whereRaw('find_in_set(' . Request::input('shop_type') . ', shop_type)');
            if (Request::input('shop_type') == 1) {
                if (null != (Request::input('Servicing'))) {

                    $Servicing = Request::input('Servicing');

                    foreach ($Servicing as $v => $s) {
                        if ($s != null) {
                            $query->whereRaw('find_in_set(' . $s . ', fashion_category)');
                        }
                    }
                }
            }
            if (Request::input('shop_type') == 2) {
                if (null != (Request::input('Servicing'))) {


                    $Servicing = Request::input('Servicing');
                    foreach ($Servicing as $v => $s) {
                        if ($s != null) {


                            $query->whereRaw('find_in_set(' . $s . ', beauty_retail_category)');
                        }
                    }
                }
            }
            if (Request::input('shop_type') == 3) {
                if (null != (Request::input('Servicing'))) {
//                    $query->WhereAnd('beauty_service_category', '=', Request::input('Servicing'));

                    $Servicing = Request::input('Servicing');

                    foreach ($Servicing as $v => $s) {
                        if ($s != null) {

//                                $query->Where('beauty_service_category', 'LIKE', '%' . $s. '%');
                            $query->whereRaw('find_in_set(' . $s . ', beauty_service_category)');
                        }
                    }
                }
            }
        }



        if (null != (Request::input('ShopType'))) {
            foreach (Request::input('ShopType') as $ShopType) {

                $query->Where('refined_shop_type', 'LIKE', '%' . $ShopType . '%');
            }
        }

        if (null != (Request::input('age_gender'))) {
            foreach (Request::input('age_gender') as $age_gender) {

                $query->Where('age_gender', 'LIKE', '%' . $age_gender . '%');
            }
        }





        if (null != (Request::input('price_range'))) {
            foreach (Request::input('price_range') as $price) {

                $query->Where('price_range', 'LIKE', '%' . $price . '%');
            }
        }


        if (null != (Request::input('district'))) {
            $query->Where('district', '=', Request::input('district'));
        }
        if (null != (Request::input('region'))) {
            $query->Where('region', '=', Request::input('region'));
        }
        if (null != (Request::input('landmark'))) {
            $query->Where('mall', '=', Request::input('landmark'));
        }

        $data = $query->orderBy('shop_name', 'ASC')->paginate(48);
        // return view('pages.AllShopList', compact('data'));

        if (Request::ajax()) {

            return view('ajax.moreshop', ['data' => $data->appends(Input::except('page'))]);
        } else {
            return view('pages.AllShopList', [
                'data' => $data->appends(Input::except('page'))
            ]);
        }
    }

    public function SeeAll($id) {
//        $query = Shop::Where('shop_type', '=', $id);

        $query = Shop::Where('status', 'LIKE', '%ready%');
        $query->whereRaw('find_in_set(' . $id . ', shop_type)');
        $data = $query->orderBy('shop_name', 'ASC')->paginate(15);
        return view('pages.seeall', compact('data', 'id'));
    }

    public function ShopDetail($id) {
        
        $id = base64_decode($id);
        $Data = Shop::find($id);
       $title=$Data->shop_name;
     $shopRevID=$Data->id;
         
         $districtname = Text::districtname($Data->district);
         $FBDist = $districtname->name_e;
        $DataOtherShop = Shop::select('id', 'district', 'district_c', 'region', 'region_c', 'shop_name', 'shop_name_c', 'shop_image_1')->Where('chain', '=', $Data->chain)->Where('chain', '!=', "")->get();
    //     $ShopReview =   DB::table('ratings')->where('ratings.shop_id','=', $shopRevID)->get();
   $ShopReviews =  Rating::with(['user','shop'])->where('ratings.shop_id','=', $shopRevID)->get();
    $ShopReviewstotal = Rating::whereRaw('find_in_set('.$shopRevID .',shop_id)')->count();     
// echo"<pre>";
// print_r($ShopReviews);
// die;
//       
       return view('pages.ShopDetail', compact('Data', 'DataOtherShop', 'title','FBDist','ShopReviews','ShopReviewstotal'));
    }

    public function AllShopList($id) {


        $query = Shop::Where('shop_type', '=', $id);
        $data = $query->get();
        return view('pages.AllShopList', compact('data'));
    }

    public function Branches($id) {


        $id = base64_decode($id);
        $Data = Shop::find($id);


        $query = Shop::Where('chain', '=', $Data->chain);
        $data = $query->paginate(50);

        return view('pages.Branches', compact('data'));
    }

    public function autocomplete() {
        $term = Input::get('term');
//
//echo $term ; die;

        $DataOtherShop = Shop::select('shop_name')->where('shop_name', 'LIKE', '%' . $term . '%')->groupBy('shop_name')->get();
//              print_r($DataOtherShop)   ; die;
//        foreach ($DataOtherShop as $query) {
//            $results[] = [ 'id' => $query->id, 'value' => $query->shop_name];
//        }


        $data = array();

        foreach ($DataOtherShop as $result) {

            //if(strpos($result,$term) !== false) {
            $data[] = ['value' => $result->shop_name];
            //}
        }


        return Response::json($data);
    }

    public function autocomplete_c() {
        $term = Input::get('term');
//
//echo $term ; die;

        $DataOtherShop = Shop::select('shop_name_c')->where('shop_name_c', 'LIKE', '%' . trim($term) . '%')->groupBy('shop_name_c')->get();
//              print_r($DataOtherShop)   ; die;
//        foreach ($DataOtherShop as $query) {
//            $results[] = [ 'id' => $query->id, 'value' => $query->shop_name];
//        }


        $data = array();

        foreach ($DataOtherShop as $result) {

            //if(strpos($result,$term) !== false) {
            $data[] = ['value' => $result->shop_name_c];
            //}
        }


        return Response::json($data);
    }
    public function shopautosug() {
        $term = Input::get('term');
//
//echo $term ; die;

        $DataOtherShop = Landmark::select('mall_e')->where('mall_e', 'LIKE', '%' . $term . '%')->groupBy('mall_e')->get();
//              print_r($DataOtherShop)   ; die;
//        foreach ($DataOtherShop as $query) {
//            $results[] = [ 'id' => $query->id, 'value' => $query->shop_name];
//        }


        $data = array();

        foreach ($DataOtherShop as $result) {

            //if(strpos($result,$term) !== false) {
            $data[] = ['value' => $result->mall_e];
            //}
        }


        return Response::json($data);
    }

    public function shopautosug_c() {
        $term = Input::get('term');
//
//echo $term ; die;

        $DataOtherShop = Landmark::select('mall_c')->where('mall_c', 'LIKE', '%' . trim($term) . '%')->groupBy('mall_c')->get();
//              print_r($DataOtherShop)   ; die;
//        foreach ($DataOtherShop as $query) {
//            $results[] = [ 'id' => $query->id, 'value' => $query->shop_name];
//        }


        $data = array();

        foreach ($DataOtherShop as $result) {

            //if(strpos($result,$term) !== false) {
            $data[] = ['value' => $result->mall_c];
            //}
        }


        return Response::json($data);
    }
    public function shopautolandmark() {
        $term = Input::get('term');
//
//echo $term ; die;

        $DataOtherShop = Landmark::select('landmark_e')->where('landmark_e', 'LIKE', '%' . $term . '%')->groupBy('landmark_e')->get();
//              print_r($DataOtherShop)   ; die;
//        foreach ($DataOtherShop as $query) {
//            $results[] = [ 'id' => $query->id, 'value' => $query->shop_name];
//        }


        $data = array();

        foreach ($DataOtherShop as $result) {

            //if(strpos($result,$term) !== false) {
            $data[] = ['value' => $result->landmark_e];
            //}
        }


        return Response::json($data);
    }

    public function shopautolandmark_c() {
        $term = Input::get('term');
//
//echo $term ; die;

        $DataOtherShop = Landmark::select('landmark_c')->where('landmark_c', 'LIKE', '%' . trim($term) . '%')->groupBy('landmark_c')->get();
//              print_r($DataOtherShop)   ; die;
//        foreach ($DataOtherShop as $query) {
//            $results[] = [ 'id' => $query->id, 'value' => $query->shop_name];
//        }


        $data = array();

        foreach ($DataOtherShop as $result) {

            //if(strpos($result,$term) !== false) {
            $data[] = ['value' => $result->landmark_c];
            //}
        }


        return Response::json($data);
    }

    public function getregion($region) {

        $District = District::select('id', 'name_e', 'name_c')->where('region_id', trim($region))->orderBy('name_e')->get();
        return view('ajax.district', compact('District'));
    }

    public function getregion_c($Name) {


        $region = Shop::orderBy('district_c')->where('region_c', 'LIKE', '%' . $Name . '%')->Where('district_c', '!=', '')->groupBy('district_c')->lists('district_c');


        return view('ajax.district', compact('region'));
    }

    public function getregionf($region) {


        $District = District::select('id', 'name_e', 'name_c')->where('region_id', trim($region))->orderBy('name_e')->get();


        return view('ajax.districtf', compact('District'));
    }

    public function editShopCategory($id) {

        return view('pages.editShopCategory', compact('id'));
    }

    public function ShopUpdateInfo($id) {

        $id = base64_decode($id);
        $Data = Shop::find($id);
        return view('pages.ShopUpdateInfo', compact('Data'));
    }

    public function postShopUpdateInfo(ShopClosureRequest $request, $id) {

        if (Auth::check()) {
            $userLoginId = Auth::id();
        }



        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }
         $shop = new ShopTemp();
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
        $shop->shop_line_2 = Request::input('shoproomflate');
        $shop->shop_line_2_c = Request::input('shoproomflate_c');
        $shop->floor = Request::input('floor');
        $shop->floor_c = Request::input('floor_c');
        $shop->shop_room_flate_unit_type= Request::input('shoproomflatetype');
        $shop->shop_room_flate_unit_type_c= Request::input('shoproomflatetype_c');
        $shop->floor_line_2 = Request::input('shoproomflateinput');
        $shop->floor_line_2_c = Request::input('shoproomflateinput_c');
        $shop->phase_block = Request::input('phase_block');
        $shop->phase_block_c = Request::input('phase_block_c');
         $shop->phase_block_type = Request::input('phase_block_type');
         $shop->phase_block_type_c = Request::input('phase_block_type_c');
        $shop->retailer = Request::input('retailer');
        $shop->retailer_c = Request::input('retailer_c');
        $shop->street = Request::input('street');
        $shop->street_c = Request::input('street_c');
         $shop->region = Request::input('regionf');
        $shop->district = Request::input('districtf');
//        $shop->address = Request::input('address');
//        $shop->address_c = Request::input('address_c');
        // $shop->shop_type = Request::input('shop_type');
         if (Request::input('mallmtrstation') == 1) {
           $shop->mall = Request::input('mall_landmark_station');
        }
        if (Request::input('mallmtrstation') == 2) {
          $shop->landmark = Request::input('mall_landmark_station');
        }
        
        if (Request::input('mallmtrstation') == 3) {
         $shop->building = Request::input('mall_landmark_station');
        }
        
        if (Request::input('mallmtrstation') == 4) {
          $shop->mtr_station = Request::input('mall_landmark_station');
        }
         if (Request::input('mallmtrstation_c') == 1) {
           $shop->mall_c = Request::input('mall_landmark_station_c');
        }
        if (Request::input('mallmtrstation_c') == 2) {
          $shop->landmark_c = Request::input('mall_landmark_station_c');
        }
        
        if (Request::input('mallmtrstation_c') == 3) {
          $shop->building_c = Request::input('mall_landmark_station_c');
        }
        
        if (Request::input('mallmtrstation_c') == 4) {
          $shop->mtr_station_c = Request::input('mall_landmark_station_c');
        }
        
        
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
                            } else {
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

        $shop->shop_id = base64_decode($id);
        $shop->update_type = '1';
     
        $shop->save();
        $shopId = $shop->id;

        $id = base64_decode($id);

        $Data = Shop::find($id);




        if (Auth::check()) {
            Session::flash('error_type', 'Well done!');
            Session::flash('flash_message', 'Update request successfully send!');
            Session::flash('flash_type', 'alert-success');
            return view('pages.thankyou', compact('Data'));
        } else {
            return view('pages.Personaldetail', compact('shopId', 'Data'));
        }
    }

    public function getshopType($id) {


        return view('ajax.cetogarydiv', compact('id'));
    }

    public function newShop($id) {

        return view('pages.newShop', compact('id', 'Data'));
    }

    public function postNewShop(ShopClosureRequest $request, $id) {
        if (Auth::check()) {
            $userLoginId = Auth::id();
        }


        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }
        $shop = new ShopTemp();
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
        $shop->mall = Request::input('mall');
        $shop->mall_c = Request::input('mall_c');
        $shop->landmark  = Request::input('landmark');
        $shop->landmark_c = Request::input('landmark_c');
        $shop->building = Request::input('building');
        $shop->building_c = Request::input('building_c');
        $shop->mtr_station = Request::input('mtr_station');
        $shop->mtr_station_c = Request::input('mtr_station_c');
        $shop->shop_room_flate_unit_type= Request::input('shoproomflatetype');
        $shop->shop_room_flate_unit_type_c= Request::input('shoproomflatetype1_c');
        $shop->shop_room_flate_unit_type2= Request::input('shoproomflatetype2');
        $shop->shop_room_flate_unit_type2_c= Request::input('shoproomflatetype2_c');
        $shop->floor_line_2 = Request::input('floor_line_2');
        $shop->floor_line_2_c = Request::input('floor_line_2_c');
        $shop->phase_block = Request::input('phase_block');
        $shop->phase_block_c = Request::input('phase_block_c');
         $shop->phase_block_type = Request::input('phase_block_type');
         $shop->phase_block_type_c = Request::input('phase_block_type_c');
        $shop->retailer = Request::input('retailer');
        $shop->retailer_c = Request::input('retailer_c');
        $shop->street = Request::input('street');
        $shop->street_c = Request::input('street_c');
         $shop->region = Request::input('regionf');
        $shop->district = Request::input('districtf');
//        $shop->address = Request::input('address');
//        $shop->address_c = Request::input('address_c');
        // $shop->shop_type = Request::input('shop_type');
//         if (Request::input('mallmtrstation') == 1) {
//           $shop->mall = Request::input('mall_landmark_station');
//        }
//        if (Request::input('mallmtrstation') == 2) {
//          $shop->landmark = Request::input('mall_landmark_station');
//        }
//        
//        if (Request::input('mallmtrstation') == 3) {
//         $shop->building = Request::input('mall_landmark_station');
//        }
//        
//        if (Request::input('mallmtrstation') == 4) {
//          $shop->mtr_station = Request::input('mall_landmark_station');
//        }
//         if (Request::input('mallmtrstation_c') == 1) {
//           $shop->mall_c = Request::input('mall_landmark_station_c');
//        }
//        if (Request::input('mallmtrstation_c') == 2) {
//          $shop->landmark_c = Request::input('mall_landmark_station_c');
//        }
//        
//        if (Request::input('mallmtrstation_c') == 3) {
//          $shop->building_c = Request::input('mall_landmark_station_c');
//        }
//        
//        if (Request::input('mallmtrstation_c') == 4) {
//          $shop->mtr_station_c = Request::input('mall_landmark_station_c');
//        }
        
        
        
        
        
        
        
        
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
                            } else {
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

        $shop->update_type = '2';
     //  print_r($shop); die;
        $shop->save();
     
        $shopId = $shop->id;

        $id = base64_decode($id);

        $Data = Shop::find($id);



        if (Auth::check()) {
            Session::flash('error_type', 'Well done!');
            Session::flash('flash_message', 'New branch request successfully send.');
            Session::flash('flash_type', 'alert-success');

            return view('pages.thankyou', compact('Data', 'type'));
        } else {
            return view('pages.Personaldetail', compact('shopId', 'Data'));
        }
    }

    public function newShops() {

        return view('pages.newShop', compact('Data'));
    }
    public function newShopEdit() {

        return view('pages.ShopEdit', compact('Data'));
    }
    public function ShopUpdation() {

        return view('pages.ShopUpdation', compact('Data'));
    }

    public function postNewShops(ShopClosureRequest $request) {
        if (Auth::check()) {
            $userLoginId = Auth::id();
        }


        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }
       $shop = new ShopTemp();
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
        $shop->mall = Request::input('mall');
        $shop->mall_c = Request::input('mall_c');
        $shop->landmark  = Request::input('landmark');
        $shop->landmark_c = Request::input('landmark_c');
        $shop->building = Request::input('building');
        $shop->building_c = Request::input('building_c');
        $shop->mtr_station = Request::input('mtr_station');
        $shop->mtr_station_c = Request::input('mtr_station_c');
        $shop->shop_room_flate_unit_type= Request::input('shoproomflatetype');
        $shop->shop_room_flate_unit_type_c= Request::input('shoproomflatetype1_c');
        $shop->shop_room_flate_unit_type2= Request::input('shoproomflatetype2');
        $shop->shop_room_flate_unit_type2_c= Request::input('shoproomflatetype2_c');
        $shop->floor_line_2 = Request::input('floor_line_2');
        $shop->floor_line_2_c = Request::input('floor_line_2_c');
        $shop->phase_block = Request::input('phase_block');
        $shop->phase_block_c = Request::input('phase_block_c');
         $shop->phase_block_type = Request::input('phase_block_type');
         $shop->phase_block_type_c = Request::input('phase_block_type_c');
        $shop->retailer = Request::input('retailer');
        $shop->retailer_c = Request::input('retailer_c');
        $shop->street = Request::input('street');
        $shop->street_c = Request::input('street_c');
         $shop->region = Request::input('regionf');
        $shop->district = Request::input('districtf');
//        $shop->address = Request::input('address');
//        $shop->address_c = Request::input('address_c');
        // $shop->shop_type = Request::input('shop_type');
//         if (Request::input('mallmtrstation') == 1) {
//           $shop->mall = Request::input('mall_landmark_station');
//        }
//        if (Request::input('mallmtrstation') == 2) {
//          $shop->landmark = Request::input('mall_landmark_station');
//        }
//        
//        if (Request::input('mallmtrstation') == 3) {
//         $shop->building = Request::input('mall_landmark_station');
//        }
//        
//        if (Request::input('mallmtrstation') == 4) {
//          $shop->mtr_station = Request::input('mall_landmark_station');
//        }
//         if (Request::input('mallmtrstation_c') == 1) {
//           $shop->mall_c = Request::input('mall_landmark_station_c');
//        }
//        if (Request::input('mallmtrstation_c') == 2) {
//          $shop->landmark_c = Request::input('mall_landmark_station_c');
//        }
//        
//        if (Request::input('mallmtrstation_c') == 3) {
//          $shop->building_c = Request::input('mall_landmark_station_c');
//        }
//        
//        if (Request::input('mallmtrstation_c') == 4) {
//          $shop->mtr_station_c = Request::input('mall_landmark_station_c');
//        }
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
                            } else {
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

        $shop->update_type = '2';
        $shop->save();
        
        $shopId = $shop->id;





        if (Auth::check()) {
            Session::flash('error_type', 'Well done!');
            Session::flash('flash_message', 'New branch request successfully send.');
            Session::flash('flash_type', 'alert-success');

            return view('pages.thank_you', compact('Data', 'type'));
        } else {
            return view('pages.guestdetail', compact('shopId', 'Data'));
        }
    }

    public function ShopClosure($id) {

        $id = base64_decode($id);
        $Data = Shop::find($id);
        return view('pages.ShopClosure', compact('Data'));
    }

    public function postShopClosure(ShopClosureRequest $request, $id) {

        if (Auth::check()) {
            $userLoginId = Auth::id();
        }

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }
        $shop = new ShopTemp();
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
        $shop->mall = Request::input('mall');
        $shop->mall_c = Request::input('mall_c');
        $shop->landmark  = Request::input('landmark');
        $shop->landmark_c = Request::input('landmark_c');
        $shop->building = Request::input('building');
        $shop->building_c = Request::input('building_c');
        $shop->mtr_station = Request::input('mtr_station');
        $shop->mtr_station_c = Request::input('mtr_station_c');
        $shop->shop_room_flate_unit_type= Request::input('shoproomflatetype');
        $shop->shop_room_flate_unit_type_c= Request::input('shoproomflatetype1_c');
        $shop->shop_room_flate_unit_type2= Request::input('shoproomflatetype2');
        $shop->shop_room_flate_unit_type2_c= Request::input('shoproomflatetype2_c');
        $shop->floor_line_2 = Request::input('floor_line_2');
        $shop->floor_line_2_c = Request::input('floor_line_2_c');
        $shop->phase_block = Request::input('phase_block');
        $shop->phase_block_c = Request::input('phase_block_c');
         $shop->phase_block_type = Request::input('phase_block_type');
         $shop->phase_block_type_c = Request::input('phase_block_type_c');
        $shop->retailer = Request::input('retailer');
        $shop->retailer_c = Request::input('retailer_c');
        $shop->street = Request::input('street');
        $shop->street_c = Request::input('street_c');
         $shop->region = Request::input('regionf');
        $shop->district = Request::input('districtf');
//        $shop->address = Request::input('address');
//        $shop->address_c = Request::input('address_c');
        // $shop->shop_type = Request::input('shop_type');
//         if (Request::input('mallmtrstation') == 1) {
//           $shop->mall = Request::input('mall_landmark_station');
//        }
//        if (Request::input('mallmtrstation') == 2) {
//          $shop->landmark = Request::input('mall_landmark_station');
//        }
//        
//        if (Request::input('mallmtrstation') == 3) {
//         $shop->building = Request::input('mall_landmark_station');
//        }
//        
//        if (Request::input('mallmtrstation') == 4) {
//          $shop->mtr_station = Request::input('mall_landmark_station');
//        }
//         if (Request::input('mallmtrstation_c') == 1) {
//           $shop->mall_c = Request::input('mall_landmark_station_c');
//        }
//        if (Request::input('mallmtrstation_c') == 2) {
//          $shop->landmark_c = Request::input('mall_landmark_station_c');
//        }
//        
//        if (Request::input('mallmtrstation_c') == 3) {
//          $shop->building_c = Request::input('mall_landmark_station_c');
//        }
//        
//        if (Request::input('mallmtrstation_c') == 4) {
//          $shop->mtr_station_c = Request::input('mall_landmark_station_c');
//        }
 
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
               
                    
        $shop->shop_id = base64_decode($id);
        $shop->update_type = '3';
    
        $shop->save();

        $shopId = $shop->id;
        $id = base64_decode($id);
        $Data = Shop::find($id);
        if (Auth::check()) {
            Session::flash('error_type', 'Well done!');
            Session::flash('flash_message', 'Shop Closure request successfully send.');
            Session::flash('flash_type', 'alert-success');

            return view('pages.thankyou', compact('Data', 'type'));
        } else {
            return view('pages.Personaldetail', compact('shopId', 'Data'));
        }
    }

    public function ShopRelocation($id) {
        $id = base64_decode($id);
        $Data = Shop::find($id);
        return view('pages.ShopRelocation', compact('Data'));
    }

    public function postShopRelocation(ShopClosureRequest $request, $id) {
        if (Auth::check()) {
            $userLoginId = Auth::id();
        }

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }
       $shop = new ShopTemp();
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
        $shop->mall = Request::input('mall');
        $shop->mall_c = Request::input('mall_c');
        $shop->landmark  = Request::input('landmark');
        $shop->landmark_c = Request::input('landmark_c');
        $shop->building = Request::input('building');
        $shop->building_c = Request::input('building_c');
        $shop->mtr_station = Request::input('mtr_station');
        $shop->mtr_station_c = Request::input('mtr_station_c');
        $shop->shop_room_flate_unit_type= Request::input('shoproomflatetype');
        $shop->shop_room_flate_unit_type_c= Request::input('shoproomflatetype1_c');
        $shop->shop_room_flate_unit_type2= Request::input('shoproomflatetype2');
        $shop->shop_room_flate_unit_type2_c= Request::input('shoproomflatetype2_c');
        $shop->floor_line_2 = Request::input('floor_line_2');
        $shop->floor_line_2_c = Request::input('floor_line_2_c');
        $shop->phase_block = Request::input('phase_block');
        $shop->phase_block_c = Request::input('phase_block_c');
         $shop->phase_block_type = Request::input('phase_block_type');
         $shop->phase_block_type_c = Request::input('phase_block_type_c');
        $shop->retailer = Request::input('retailer');
        $shop->retailer_c = Request::input('retailer_c');
        $shop->street = Request::input('street');
        $shop->street_c = Request::input('street_c');
         $shop->region = Request::input('regionf');
        $shop->district = Request::input('districtf');
//        $shop->address = Request::input('address');
//        $shop->address_c = Request::input('address_c');
        // $shop->shop_type = Request::input('shop_type');
//         if (Request::input('mallmtrstation') == 1) {
//           $shop->mall = Request::input('mall_landmark_station');
//        }
//        if (Request::input('mallmtrstation') == 2) {
//          $shop->landmark = Request::input('mall_landmark_station');
//        }
//        
//        if (Request::input('mallmtrstation') == 3) {
//         $shop->building = Request::input('mall_landmark_station');
//        }
//        
//        if (Request::input('mallmtrstation') == 4) {
//          $shop->mtr_station = Request::input('mall_landmark_station');
//        }
//         if (Request::input('mallmtrstation_c') == 1) {
//           $shop->mall_c = Request::input('mall_landmark_station_c');
//        }
//        if (Request::input('mallmtrstation_c') == 2) {
//          $shop->landmark_c = Request::input('mall_landmark_station_c');
//        }
//        
//        if (Request::input('mallmtrstation_c') == 3) {
//          $shop->building_c = Request::input('mall_landmark_station_c');
//        }
//        
//        if (Request::input('mallmtrstation_c') == 4) {
//          $shop->mtr_station_c = Request::input('mall_landmark_station_c');
//        }
        
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
                            } else {
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
        $shop->shop_id = base64_decode($id);

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
        $shop->shop_id = base64_decode($id);
        $shop->update_type = '4';
        $shop->save();
        $shopId = $shop->id;
        $id = base64_decode($id);
        $Data = Shop::find($id);

        if (Auth::check()) {
            Session::flash('error_type', 'Well done!');
            Session::flash('flash_message', 'New branch request successfully send.');
            Session::flash('flash_type', 'alert-success');

            return view('pages.thankyou', compact('Data', 'type'));
        } else {
            return view('pages.Personaldetail', compact('shopId', 'Data'));
        }
    }

    public function ShopRenovation($id) {
        $id = base64_decode($id);
        $Data = Shop::find($id);
        return view('pages.thankyou', compact('Data'));
    }

    public function postShopRenovation(ShopClosureRequest $request, $id) {

        if (Auth::check()) {
            $userLoginId = Auth::id();
        }

        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }
        $shop = new ShopTemp();
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
        $shop->mall = Request::input('mall');
        $shop->mall_c = Request::input('mall_c');
        $shop->landmark  = Request::input('landmark');
        $shop->landmark_c = Request::input('landmark_c');
        $shop->building = Request::input('building');
        $shop->building_c = Request::input('building_c');
        $shop->mtr_station = Request::input('mtr_station');
        $shop->mtr_station_c = Request::input('mtr_station_c');
        $shop->shop_room_flate_unit_type= Request::input('shoproomflatetype');
        $shop->shop_room_flate_unit_type_c= Request::input('shoproomflatetype1_c');
        $shop->shop_room_flate_unit_type2= Request::input('shoproomflatetype2');
        $shop->shop_room_flate_unit_type2_c= Request::input('shoproomflatetype2_c');
        $shop->floor_line_2 = Request::input('floor_line_2');
        $shop->floor_line_2_c = Request::input('floor_line_2_c');
        $shop->phase_block = Request::input('phase_block');
        $shop->phase_block_c = Request::input('phase_block_c');
         $shop->phase_block_type = Request::input('phase_block_type');
         $shop->phase_block_type_c = Request::input('phase_block_type_c');
        $shop->retailer = Request::input('retailer');
        $shop->retailer_c = Request::input('retailer_c');
        $shop->street = Request::input('street');
        $shop->street_c = Request::input('street_c');
         $shop->region = Request::input('regionf');
        $shop->district = Request::input('districtf');
//        $shop->address = Request::input('address');
//        $shop->address_c = Request::input('address_c');
        // $shop->shop_type = Request::input('shop_type');
//         if (Request::input('mallmtrstation') == 1) {
//           $shop->mall = Request::input('mall_landmark_station');
//        }
//        if (Request::input('mallmtrstation') == 2) {
//          $shop->landmark = Request::input('mall_landmark_station');
//        }
//        
//        if (Request::input('mallmtrstation') == 3) {
//         $shop->building = Request::input('mall_landmark_station');
//        }
//        
//        if (Request::input('mallmtrstation') == 4) {
//          $shop->mtr_station = Request::input('mall_landmark_station');
//        }
//         if (Request::input('mallmtrstation_c') == 1) {
//           $shop->mall_c = Request::input('mall_landmark_station_c');
//        }
//        if (Request::input('mallmtrstation_c') == 2) {
//          $shop->landmark_c = Request::input('mall_landmark_station_c');
//        }
//        
//        if (Request::input('mallmtrstation_c') == 3) {
//          $shop->building_c = Request::input('mall_landmark_station_c');
//        }
//        
//        if (Request::input('mallmtrstation_c') == 4) {
//          $shop->mtr_station_c = Request::input('mall_landmark_station_c');
//        }
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
                            } else {
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
        $shop->shop_id = base64_decode($id);

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
        $shop->shop_id = base64_decode($id);
        $shop->update_type = '5';
        $shop->save();
        $shopId = $shop->id;
        $id = base64_decode($id);
        $Data = Shop::find($id);
        if (Auth::check()) {
            Session::flash('error_type', 'Well done!');
            Session::flash('flash_message', 'New branch request successfully send.');
            Session::flash('flash_type', 'alert-success');

            return view('pages.thankyou', compact('Data', 'type'));
        } else {
            return view('pages.Personaldetail', compact('shopId', 'Data'));
        }
    }

    public function AddNewBranch($id, $type) {


        $id = base64_decode($id);
        $Data = Shop::find($id);
        return view('pages.AddNewBranch', compact('Data', 'type'));
    }

    public function postAddNewBranch(ShopClosureRequest $request, $id, $type) {
        if (Auth::check()) {
            $userLoginId = Auth::id();
        }



        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }
        $shop = new ShopTemp();
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
        $shop->mall = Request::input('mall');
        $shop->mall_c = Request::input('mall_c');
        $shop->landmark  = Request::input('landmark');
        $shop->landmark_c = Request::input('landmark_c');
        $shop->building = Request::input('building');
        $shop->building_c = Request::input('building_c');
        $shop->mtr_station = Request::input('mtr_station');
        $shop->mtr_station_c = Request::input('mtr_station_c');
        $shop->shop_room_flate_unit_type= Request::input('shoproomflatetype');
        $shop->shop_room_flate_unit_type_c= Request::input('shoproomflatetype1_c');
        $shop->shop_room_flate_unit_type2= Request::input('shoproomflatetype2');
        $shop->shop_room_flate_unit_type2_c= Request::input('shoproomflatetype2_c');
        $shop->floor_line_2 = Request::input('floor_line_2');
        $shop->floor_line_2_c = Request::input('floor_line_2_c');
        $shop->phase_block = Request::input('phase_block');
        $shop->phase_block_c = Request::input('phase_block_c');
         $shop->phase_block_type = Request::input('phase_block_type');
         $shop->phase_block_type_c = Request::input('phase_block_type_c');
        $shop->retailer = Request::input('retailer');
        $shop->retailer_c = Request::input('retailer_c');
        $shop->street = Request::input('street');
        $shop->street_c = Request::input('street_c');
         $shop->region = Request::input('regionf');
        $shop->district = Request::input('districtf');
//        $shop->address = Request::input('address');
//        $shop->address_c = Request::input('address_c');
        // $shop->shop_type = Request::input('shop_type');
//         if (Request::input('mallmtrstation') == 1) {
//           $shop->mall = Request::input('mall_landmark_station');
//        }
//        if (Request::input('mallmtrstation') == 2) {
//          $shop->landmark = Request::input('mall_landmark_station');
//        }
//        
//        if (Request::input('mallmtrstation') == 3) {
//         $shop->building = Request::input('mall_landmark_station');
//        }
//        
//        if (Request::input('mallmtrstation') == 4) {
//          $shop->mtr_station = Request::input('mall_landmark_station');
//        }
//         if (Request::input('mallmtrstation_c') == 1) {
//           $shop->mall_c = Request::input('mall_landmark_station_c');
//        }
//        if (Request::input('mallmtrstation_c') == 2) {
//          $shop->landmark_c = Request::input('mall_landmark_station_c');
//        }
//        
//        if (Request::input('mallmtrstation_c') == 3) {
//          $shop->building_c = Request::input('mall_landmark_station_c');
//        }
//        
//        if (Request::input('mallmtrstation_c') == 4) {
//          $shop->mtr_station_c = Request::input('mall_landmark_station_c');
//        }
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
                            } else {
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
        //   $shop->shop_type = Request::input('shop_type');


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

        $shop->update_type = '6';
        $shop->save();
        $shopId = $shop->id;
        $id = base64_decode($id);
        $Data = Shop::find($id);
        if (Auth::check()) {
            Session::flash('error_type', 'Well done!');
            Session::flash('flash_message', 'New branch request successfully send.');
            Session::flash('flash_type', 'alert-success');

            return view('pages.thankyou', compact('Data', 'type'));
        } else {
            return view('pages.Personaldetail', compact('shopId', 'Data'));
        }
    }

    public function getlandmark($district) {

        $Landmark = Landmark::select('id', 'mall_e', 'mall_c', 'landmark_e', 'landmark_c')->where('district_id', $district)->groupBy('mall_e')->get();

        return view('ajax.landmark', compact('Landmark'));
    }

    public function getlandmark_c($Name) {


        $landmark = Shop::select('id', 'mall_c', 'landmark_c')->where('district_c', 'LIKE', '%' . $Name . '%')->Where('mall_c', '!=', '')->groupBy('mall_c')->get();


        return view('ajax.landmark_c', compact('landmark'));
    }

    public function postnewsletter() {
            if (Session::has('flash_message')) {
                 
            Session::forget('flash_message');
        }
        $Newsletter = new Newsletter();
        $Newsletter->email = Request::input('email');
        $Newsletter->save();
        
        return;
        
    }

    public function postpersonalinfo( ) {

        $guestuser = ShopTemp::find(Request::input('shop_temp_id'));
        $guestuser->guest_name = Request::input('guest_name');
        $guestuser->guest_email = Request::input('guest_email');

        $guestuser->guest_phone = Request::input('guest_phone');
        $guestuser->guest_address = Request::input('guest_address');
        $guestuser->guest_region = Request::input('guest_region');
        $guestuser->user_type = Request::input('user_type');

        $guestuser->save();


        $shopId = $guestuser->id;
        $id = $guestuser->shop_id;
        $Data = Shop::find($id);
        Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'Update request successfully send!');
        Session::flash('flash_type', 'alert-success');
        return view('pages.thankyou', compact('Data'));
    }

    public function getpersonalinfo() {

        return view('pages.personaldetail', compact('Data'));
    }

    public function postguestinfo( ) {

        $guestuser = ShopTemp::find(Request::input('shop_temp_id'));
        $guestuser->guest_name = Request::input('guest_name');
        $guestuser->guest_email = Request::input('guest_email');

        $guestuser->guest_phone = Request::input('guest_phone');
        $guestuser->guest_address = Request::input('guest_address');
        $guestuser->guest_region = Request::input('guest_region');
        $guestuser->user_type = Request::input('user_type');

        $guestuser->save();


        $shopId = $guestuser->id;
        $id = $guestuser->shop_id;
        $Data = Shop::find($id);
        Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'Update request successfully send!');
        Session::flash('flash_type', 'alert-success');
        return view('pages.thank_you', compact('Data'));
    }

    public function getguestinfo() {

        return view('pages.guestdetail');
    }

    public function nearby() {

//        $lat = '22.3964280';
//        $lng = '114.1094970';
//        $haversine = '(SELECT id AS shop_id,
//       latitude, longitude, distance
//  FROM (
// SELECT s.id,
//        s.shop_name_en,
//        s.latitude, s.longitude,
//        p.radius,
//        p.distance_unit
//                 * DEGREES(ACOS(COS(RADIANS(p.latpoint))
//                 * COS(RADIANS(s.latitude))
//                 * COS(RADIANS(p.longpoint - s.longitude))
//                 + SIN(RADIANS(p.latpoint))
//                 * SIN(RADIANS(s.latitude)))) AS distance
//  FROM shops AS s
//  JOIN (   /* these are the query parameters */
//        SELECT  ' . $lat . '  AS latpoint,  ' . $lng . ' AS longpoint,
//                2000 AS radius,      111045 AS distance_unit
//    ) AS p ON 1=1
//  WHERE s.latitude
//     BETWEEN p.latpoint  - (p.radius / p.distance_unit)
//         AND p.latpoint  + (p.radius / p.distance_unit)
//    AND s.longitude
//     BETWEEN p.longpoint - (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
//         AND p.longpoint + (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
// ) AS d
// WHERE distance <= radius
// ORDER BY distance ) AS d';
//
//        echo $haversine;
//        die;
//        $query->join(DB::raw($haversine), 'd.shop_id', '=', 'shops.id');
//         step1 
        $shop = Shop::select(
                        DB::raw("*,
                              ( 6371 * acos( cos( radians(22.3964280) ) *
                                cos( radians( lat ) )
                                * cos( radians( lng ) - radians(114.1094970)
                                ) + sin( radians(22.3964280) ) *
                                sin( radians( lat ) ) )
                              ) AS distance"))
                ->having("distance", "<", 50)
                ->orderBy("distance")
//                ->setBindings(['22.3964280', '114.1094970', '22','5000'])
                ->get();
//          echo $shop ;
//         print_r($shop) ;
        foreach ($shop as $value) {
            echo $value->id . ' name=' . $value->shop_name . 'lat=' . $value->lat . ' lng=' . $value->lng;

            echo '<br/>';
        }
        die;
    }

    public function rating() {
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }
             
   
        $user_id = Input::get('user_id');
        $shop_id = Input::get('shop_id');
        $rate = Input::get('p'); 
     if($user_id!=NULL){
        $regionCount = Rating::Where('user_id', '=', $user_id)->Where('shop_id', '=', $shop_id)->count();
        if ($regionCount == 0) {
            $Rating = new Rating();
            $Rating->user_id = $user_id;
            $Rating->shop_id = $shop_id;
            $Rating->rating = $rate;
            
            
 Session::flash('alert-success', 'Thank you for rate the shop!');
 
       $Rating->save();       
        } else {

            $Rating = Rating::Where('user_id', '=', $user_id)->Where('shop_id', '=', $shop_id)->first();
            $Rating->rating = $rate;
          
             
 
Session::flash('alert-success', 'Thank you for update! ');
 
     $Rating->save();        
        }
        
    }else{
      Session::flash('alert-warning', 'You have to login to rate the shop !');  
    }
    }
    
      public function setsession() {
         
        Session::set('letcurrent', Input::get('letcurrent'));
        Session::set('lngcurrent', Input::get('lngcurrent'));
           return 'set';
      }
      public function getDownload($id){
         $id = base64_decode($id);
        $Data = Shop::find($id);
        $file= $Data->shop_image_1;
        
      
//            print_r($file);
//           die;
        return Response::download($file);
  
        
      }  
      
     public function shop_incharge_reg($id){
         $id = base64_decode($id);
         $Data = Shop::find($id);
         $query = Shop::Where('chain', '=', $Data->chain);
        $data = $query->paginate(50);
   return view('pages.shop_in_charge_reg', compact('data'));
          
         
     }
     public function postshop_incharge_reg(ShoPinChargeRequest $request ,$id){
         
         if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }
    
       
        $user = new ShopOwner();
        
        $user->email =  $request->email;
        $user->password = bcrypt($request->password);
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
        $user->shops_id =  implode(',',$request->checkboxval);
        $user->role_id = '4';
       
         
         
         $file = Input::file('shop_image_1');
        if ($file != null) {
            $image_name = time() . "business_registration" . $file->getClientOriginalName();
            $file->move('uploads/businessregistrations', $image_name);
            $user->business_registration = url() . '/uploads/businessregistrations/' . $image_name;
        }
        $user->save(); 
          return view('pages.thankyou', compact('Data'));
     }
     
        

}
