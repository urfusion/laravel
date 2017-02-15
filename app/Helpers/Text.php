<?php

namespace App\Helpers;

use App\User;
use App\Shop;
use App\Country;
use App\Procuct;
use App\Shoptime;
use App\Shopimage;
use App\Gallery;
use App\Advertisement;
use App\Staticpage;
use App\Region;
use App\District;
use App\Rating;
use App\Landmark;
use Illuminate\Support\Facades\DB;
use App\ShopTemp;
class Text {

    public static function shorten($string, $limit = 100, $suffix = '…') {
        if (strlen($string) < $limit) {
            return $string;
        }

        return substr($string, 0, $limit) . $suffix;
    }

    //27 aug
    public static function Region() {

        $region = Region::select('id', 'name_e', 'name_c')->orderBy('name_e')->get();
        return $region;
    }

    public static function District($region = null) {
        if ($region != null) {
            $district = District::select('id', 'name_e', 'name_c')->where('region_id', trim($region))->orderBy('name_e')->get();
            //  $district = District::select('id', 'name_e', 'name_c')->orderBy('name_e')->get();
        } else {
            $district = District::select('id', 'name_e', 'name_c')->orderBy('name_e')->get();
        }
        return $district;
    }

    public static function Landmark($district = NULL) {
        if ($district != null) {
            $landmark = Landmark::select('id', 'mall_e', 'mall_c', 'landmark_e', 'landmark_c')->where('district_id', $district)->groupBy('mall_e')->get();
        } else {

            $landmark = Landmark::select('id', 'mall_e', 'mall_c', 'landmark_e', 'landmark_c')->groupBy('mall_e')->get();
        }
        return $landmark;
    }

    public static function landmarkname($id = NULL) {

//     = Landmark::select('id', 'mall_e', 'mall_c', 'landmark_e', 'landmark_c')->find($name);
        $landmark = Landmark::find($id);


        return $landmark;
    }
     public static function districtname($id = NULL) { 
        $District = District::find($id);
        return $District;
    }
     public static function districtname2($Did = NULL) { 
        $Districtn = District::select('name_e')->where('id','=',$Did)->get();
        return $Districtn;
    }
     public static function shopratingid($Uaid) { 
        $shopratings = Rating::select('shop_id')->where('user_id','=', $Uaid)->get();
        return $shopratings;
    }
      public static function regionname($id = NULL) { 
        $Region = Region::find($id);
        return $Region;
    }

    /////


    public static function District_C() {

        $district = Shop::orderBy('district_c')->Where('district_c', '!=', '')->groupBy('district_c')->lists('district_c');
        return $district;
    }

    public static function Districts($name = null) {

        $region = Shop::orderBy('district')->Where('region', '=', $name)->groupBy('district')->lists('district');

        return $region;
    }
//    public static function District2($id = null) {
//
//        $disticnew = District::select('id', 'name_e','name_c')->orderBy('id')->Where('region_id', '!=', '')->groupBy('id')->get();
//
//        return $disticnew;
//    }

    public static function Region_C() {

        $region = Shop::orderBy('region_c')->Where('region_c', '!=', '')->groupBy('region_c')->lists('region_c');
        return $region;
    }

    public static function Landmark_C($district = NULL) {

        if ($district != null) {
            $landmark = Shop::select('id', 'mall_c', 'landmark_c')->where('district_c', 'LIKE', '%' . $district . '%')->Where('mall_c', '!=', '')->groupBy('mall_c')->get();
        } else {
            $landmark = Shop::select('id', 'mall_c', 'landmark_c')->orderBy('mall_c')->Where('mall_c', '!=', '')->groupBy('mall_c')->get();
        }


        return $landmark;
    }

    public static function getShop($type = NULL) {

    //   $query = Shop::Where('shop_type', '=', $type)->Where('status','ready')->groupBy('shop_name');
     $query = Shop::Where('shop_type', '=', $type)->Where('display_top','1')->groupBy('shop_name');
        $data = $query->paginate(10);

//        $query = Shop::Where('shop_type', '=',$type)-get(); 
//         // $Shop = Shop::all(['district']);
////        $Shop = DB::table('shopes')  
////                ->select('district')
////                ->groupBy('district')  
////                ->orderBy('district')
////                 ->get() ;

        return $data;
    }

    public static function GalleryImage($type = NULL) {

        $query = Gallery::Where('Status', '=', '1');
        $data = $query->paginate();

//        $query = Shop::Where('shop_type', '=',$type)-get(); 
//         // $Shop = Shop::all(['district']);
////        $Shop = DB::table('shopes')  
////                ->select('district')
////                ->groupBy('district')  
////                ->orderBy('district')
////                 ->get() ;

        return $data;
    }

    public static function AdvertisementImage($page = null, $position = null, $limit = null) {
        $query = Advertisement::Where('Status', '=', '1');
        $query->Where('page', '=', $page);
        $query->Where('position', '=', $position);
        $Data = $query->paginate($limit);
        return $Data;
    }

    public static function Staticepages() {

        $Staticpage = Staticpage::select('id', 'title','title_c')->orderBy('title')->Where('title', '!=', '')->groupBy('title')->get();

        return $Staticpage;
    }
    public static function Shopesregions($regID=NULL)   {
        
        $Shoregion = Region::Where('id', '=', $regID)->get();
        
        return $Shoregion;
     
    }
    public static function Shopesdistrics($distID=NULL)   {
        
        $Shodistric = District::Where('id', '=', $distID)->get();
        
        return $Shodistric;
     
    }

    public static function Collection($id = null) {

        $Collection = Shop::whereRaw('find_in_set('.$id .',age_gender)')->count();

        return $Collection;
    }
    
    
     public static function newupadteshop($type = null) {
        $newshopinfo = ShopTemp::where('update_type', $type)->where('read_status', 0)->count();   
        return $newshopinfo;
    }
    
       public static function mallAndLandmarkName($id = NULL) {
        if ($id) {
            $landmark = Landmark::select('id', 'mall_e', 'mall_c', 'landmark_e', 'landmark_c')->find($id);
        }  else{
            $landmark= "";
        }
        return $landmark;
    }
     public static function totalshop() {       
        return Shop::count();  
    }
     public static function usersshop() {       
       $usersshop = Shop::where('role_id','4')->count();

        return $usersshop;
     }
     public static function totleShop($Type = null) {
        $totleShop = Shop::whereRaw('find_in_set('.$Type .',shop_type)')->count();

        return $totleShop;
    }
     public static function shopownershops($Sid = NULL) { 
        $Shopownershops = Shop::select('shop_name')->where('id','=',$Sid)->get();
        return $Shopownershops;
    }
   
    

}
