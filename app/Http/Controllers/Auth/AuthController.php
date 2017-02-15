<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\User;
use App\Usersocial;
use Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Controllers\Auth\Request;
 
use App\Http\Requests\Auth\CRegistrarRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\ForgotRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
 


class AuthController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Registration & Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users, as well as the
      | authentication of existing users. By default, this controller uses
      | a simple trait to add these behaviors. Why don't you explore it?
      |
     */

use AuthenticatesAndRegistersUsers;

    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard  $auth
     * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
     * @return void
     */
    public function __construct(Guard $auth, Registrar $registrar) {
        $this->auth = $auth;
        $this->registrar = $registrar;

        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function postLogin(LoginRequest $request) {
        
       $email = $request->email;
       $password = $request->password;
        
          if (Auth::attempt(['email' => $email, 'password' => $password, 'confirmed' => 1]))
        {
            return redirect('/members/dashboard');
        }
 
        return redirect('auth/login')->withErrors([
            'email' => 'The credentials you entered did not match our records. Try again?',
        ]);
     
        
        
        
    }
    public function getLogin( ) {
          return view('auth.login');
     }

    public function getRegister() {
        return view('auth.register');
    }

    public function getForgotPassword() {
        return view('auth.forgotpassword');
    }

    public function postForgotPassword() {

         

// note, to use $subject within your closure below you have to pass it along in the "use (...)" clause.
        $subject = 'Welcome!';
//        Mail::send('hello', ['key' => 'value'], function($message) use ($subject) {
//            // note: if you don't set this, it will use the defaults from config/mail.php
//            $message->from('bar@example.com', 'Sender Name');
//            $message->to('manishsaini@mailinator.com', 'manish saini')
//                    ->subject($subject);
//        });
//        
        Mail::raw('Text to e-mail', function($message) {
            $message->from('testingbydev@gmail.com', 'Dev-Updates');
            $message->to( 'basant.beniwal0704@gmail.com', 'manish saini')->cc('bar@example.com');
        });

        return view('auth.forgotpassword');
    }

    public function postRegister(CRegistrarRequest $request) {
           
        $user = new User();
//        $user->first_name = $request->first_name;
//        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->name = $request->name;
         
        $user->password = bcrypt($request->password);
        $user->confirmation_code = str_random(32);
        $user->confirmed = '0';
        $user->role_id = '3';
        $user->save();
        $confirmation_code =$user->confirmation_code;
            $datac['confirmation_code'] = $confirmation_code ;
         Mail::send('emails.welcome', $datac, function($message) {
            $message->to(Input::get('email'), Input::get('username'))
                ->subject('Verify your email address');
        });
        return view('pages.ragistration_thankyou');
    }
      
    
    public function confirm($confirmation_code)
    {
         
        
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
    
    
//    public function facebook() {
//        return OAuth::authorize('facebook');
//        // return Socialite::driver('github')->redirect();
//    }
//
//    public function handleProviderCallbackGithub() {
//        $user = Socialite::driver('github')->user();
//    }
    
    public function redirectToProvider()
    {
        
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
   	
        $user = Socialite::with('facebook')->user();
        if(User::where('email', '=', $user->email)->first()){
    $checkUser = User::where('email', '=', $user->email)->first();
         
         Auth::login($checkUser);
 return redirect('http://192.168.1.200/fabmap20/public');
 
        }
        
         
     $usere = new User();
        $usere->provider_id = $user->id;
        $usere->name = $user->name;
        $usere->email = $user->email;
        $usere->image = $user->avatar;



        $usere->save();

        Auth::login($usere);
 
        return redirect('http://192.168.1.200/fabmap20/public');
          

          
     }
         
        
//        if(User::where('email', '=', $user->email)->first()){
//    $checkUser = User::where('email', '=', $user->email)->first();
//    
//    Auth::login($checkUser);
//    return redirect('home');
//     } 
// $user = new User();
//    $user->facebook_id = $user->id();
//    $user->name = $user->name();
//    $user->email = $user->email();
//     
//    $user->save();
//
//    Auth::login($user);
//    return redirect('home');
//    }

}
