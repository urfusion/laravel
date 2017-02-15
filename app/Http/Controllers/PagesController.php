<?php namespace App\Http\Controllers;
use App\Http\Requests\ProfileEditRequest;
use App\Http\Requests\UserPasswordtRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Staticpage;
use App\Shop;
use App\User;
use App\Rating;
use App\Favorite;
use Auth; 
use App\Helpers\Text;
use App\Contact;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Toin0u\Geocoder\Facade\Geocoder;
use App\Http\Requests\Auth\CRegistrarRequest;
class PagesController extends Controller {

	public function welcome()
	{
		return view('pages.welcome');
	}

	public function about()
	{   
           
       
        return view('pages.about', compact('Data'));
		 
	}
	

	public function contact()
	{
//            
//     
//            
//    $geocode = Geocoder::geocode('10 rue Gambetta, Paris, France');
//    // The GoogleMapsProvider will return a result
//    var_dump($geocode);
//
//
//            
//            
                
		return view('pages.contact');
	}
        
        
	public function staticfooter($id){
                
                $Data = Staticpage::find($id);
        
             return view('pages.staticview', compact('Data'));
             
	}
        
        public function postcontact()
 {
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }
        $Contact = new Contact();
        $Contact->name = Request::input('sendName');
        $Contact->email = Request::input('sendMessage');
        $Contact->message = Request::input('sendEmail');
        $Contact->save();
        Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'Your message send successfully....');
        Session::flash('flash_type', 'alert-success');
        return view('pages.contact');
    }
    
    public function memberdashboard(){
      $Aid = Auth::id();
      $Data = User::find($Aid);
      $Shop1 = DB::table('shop_favourites')
               ->join('shopes', function($join){
                   $Aid = Auth::id();
                 $join->on('shop_favourites.fav_shop_id','=','shopes.id')
                 ->where('shop_favourites.user_id','=',  $Aid )
                 ->where('shop_favourites.shop_type','=',  '1' );
                 })
                ->paginate(3);
      $Shop2 = DB::table('shop_favourites')
               ->join('shopes', function($join){
                   $Aid = Auth::id();
                $join->on('shop_favourites.fav_shop_id','=','shopes.id')
                 ->where('shop_favourites.user_id','=',  $Aid )
                 ->where('shop_favourites.shop_type','=',  '2' );
                })
                ->paginate(3);
      $Shop3 = DB::table('shop_favourites')
               ->join('shopes', function($join){
                   $Aid = Auth::id();
                $join->on('shop_favourites.fav_shop_id','=','shopes.id')
                 ->where('shop_favourites.user_id','=',  $Aid )
                 ->where('shop_favourites.shop_type','=',  '3' );
                 })
                ->paginate(3);
  
//    $Recent = DB::table('ratings')
//               ->join('shopes', function($join){
//                   $Aid = Auth::id();
//                $join->on('ratings.shop_id','=','shopes.id')
//                 ->where('ratings.user_id','=',  $Aid );
//               })
//                ->get(); 
    $Recent = DB::table('shopes')
               ->join('ratings', function($join){
                   $Aid = Auth::id();
                $join->on('shopes.id','=','ratings.shop_id')
                 ->where('ratings.user_id','=',  $Aid );
               })
                ->orderBy('ratings.updated_at', 'DESC')->get();
               
//               
//    echo "<pre>";
//    print_r($Recent);
//    die;
    $Recenttotal = Rating::whereRaw('find_in_set('.$Aid .',user_id)')->count(); 
              
      return view('pages.memberdashboard', compact('Data','Shop1','Shop2','Shop3','Recent','Recenttotal' ));
         
        
    }
    
    public function postMemberprofile(ProfileEditRequest $request) {
         
        
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
//Session::reflash();	
        }

       $id = Auth::id();
        $user = User::find($id);
        
//        $user->name = $request->name;
        
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->age = $request->age;
        $user->gender = $request->gender;
        $user->occupation = $request->occupation;
        $user->about_member = $request->about_member;
             
//       $file1 = Input::file('image');
//        if ($file1 != null) {
//            $image_name = time() . "-shop_image_1" . $file1->getClientOriginalName();
//            $file1->move('uploads/users', $image_name);
//            
//            $user->image = url() . '/uploads/users/' . $image_name;
//           
//        }
//    
        $user->save();
        Session::flash('error_type', 'Well done!');
        Session::flash('flash_message', 'Profile successfully Updated.');
        Session::flash('flash_type', 'alert-success');
        return Redirect::to('members/dashboard');
    }
    
  public function favorite() {
        if (Session::has('flash_message')) {
            Session::forget('flash_message');
        }
             
   
     $user_id = Input::get('user_id');
    $shop_id = Input::get('fav_shop_id');
    $shop_type = Input::get('shop_type');
      
            
      if($user_id!=NULL){
      $regionCount = Favorite::Where('user_id', '=', $user_id)->Where('fav_shop_id', '=', $shop_id)->count();
     
      if ($regionCount == 0) {
            $Rating = new Favorite();
            $Rating->user_id = $user_id;
            $Rating->fav_shop_id = $shop_id;
            $Rating->shop_type = $shop_type;
             
            Session::flash('alert-success', 'Thank you for add the shop!');
            $Rating->save(); 
 
        } else {
 
             $Rating = Favorite::Where('user_id', '=', $user_id)->Where('fav_shop_id', '=', $shop_id)->first();
             Session::flash('alert-success', 'You have already add this shop! ');
             $Rating->save();        
        }
        
    }else{
      Session::flash('alert-warning', 'You have to login to add the shop !');  
    }
    }
    
      public function getChangePasswor($id) {

        $id = base64_decode($id);
        if (Session::has('flash_message')) {
//echo "manish";die;
            Session::forget('flash_message');
//Session::reflash();	
        }
        $user = User::find($id);
        return view('pages.reset', compact('user'));
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


        return view('pages.reset', compact('user'));
    }
   public function favoriteshops() {
       
        $Aid = Auth::id();
      $Data = User::find($Aid);
       
       
        if (Request::input('shop_type') == 1) {
          $data = DB::table('shop_favourites')
               ->join('shopes', function($join){
                   $Aid = Auth::id();
                $join->on('shop_favourites.fav_shop_id','=','shopes.id')
                 ->where('shop_favourites.user_id','=',  $Aid )
                 ->where('shop_favourites.shop_type','=',  '1' );
                  
                           
               })
                ->get();
    } 
        if (Request::input('shop_type') == 2) {
 $data = DB::table('shop_favourites')
               ->join('shopes', function($join){
                   $Aid = Auth::id();
                $join->on('shop_favourites.fav_shop_id','=','shopes.id')
                 ->where('shop_favourites.user_id','=',  $Aid )
                 ->where('shop_favourites.shop_type','=',  '2' );
                  
                           
               })
                ->get();
    } 
        if (Request::input('shop_type') == 3) {
$data = DB::table('shop_favourites')
               ->join('shopes', function($join){
                   $Aid = Auth::id();
                $join->on('shop_favourites.fav_shop_id','=','shopes.id')
                 ->where('shop_favourites.user_id','=',  $Aid )
                 ->where('shop_favourites.shop_type','=',  '3' );
                  
                           
               })
               ->get();
    }
    
    
      return view('pages.favoriteshoplist', compact('data' ));
         
    } 
   
    
    

}
