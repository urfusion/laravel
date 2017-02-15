@extends('app')

{{-- Web site Title --}}
@section('title') {{{ trans('site/user.register') }}} :: @parent @stop

{{-- Content --}}
@section('content')
 
 <link rel="stylesheet" href="{{ asset('/css/datepicker/jquery-ui.css') }} ">
 
<div class="warper">

    <!--login-page-content-here-->
    <div class="page_content login_signup_bg">
        <div class="container">
            <div class="bredcrumb_menu">
                <ul>
                    <li><span>Home</span></li>
                    <li><a href="#">Member registration</a></li>
                </ul>  
            </div> 

            <div class="login_inner_content registration_bg">
                <div class="login_sign_head">
                    <h1>Member Registration</h1>    
                    <div class="head_icon"><img src="{{ asset('images/lock_open_icon.png') }}"/></div>
                </div>
                @include('errors.list')
                <form  role="form" method="POST" action="{!! URL::to('/register') !!}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="login_signup_form_bg">
                        <div class="login_signup_left">
                          <div class="sign_facebook">Sign up using <span>Facebook</span></div>
                           <div class="login_signup_right_inner" style="border:0px;">
                                <div class="facebook_google">
                                    
									
									<a href="{{ url('/facebook/authorize') }}"><img src="{{ asset('images/facebook_new.png') }}"/></a>
                                   
                                </div>  

                            </div>
                            
                        </div>

                        <div class="login_signup_right">
						    <div class="sign_email_box">
							 <p>Sign up  <span>with your email</span></p>
                            </div>
						
                            <div class="input_box_row">
                                <label>First Name</label>
                                <input type="text"  placeholder="First Name" name="first_name" value="{{ old('first_name') }}">
                            </div>
                                     <div class="input_box_row">
                                <label>Last Name</label>
                                <input type="text"   placeholder="Last Name" name="last_name" value="{{ old('last_name') }}">
                            </div>
                            <div class="input_box_row">
                                <label>Email address</label>
                                <input type="email"  placeholder="Email" name="email" value="{{ old('email') }}">
                            </div>


 

                            <div class="input_box_row">
                                <label>Password</label>
                                <input type="password" placeholder="Password" name="password">

                            </div>	

                            <div class="input_box_row">
                                <label>Confirm Password</label>
                                 <input type="password" class="form-control" name="password_confirmation">                                 
                            </div>	

<!--                            <div class="input_box_row">
                                <label>Year of birth</label>
                                <input type="text" class="form-control" name="dob" id="dob">   
                                <select>
                                    <option></option>
                                </select>                                
                                
                            </div>	-->

                            <div class="submit_bg">
                                <input type="submit" value="Sign up"/>
                            </div>

                        </div>
                   
                    


				   </div>
                
				   <div class="login_singup_tag">
				    <div class="login_tag"><p>Already have an account? <a href="{{URL::to('auth/login')}}">Login.</a></p></div>
					<div class="signup_tag"><p>By pressing “Sign Up”, you agree to our Terms Of Use and Privacy Policy
</p></div>
				   </div>
				
				
				</form>



            </div> 

        </div>
    </div>
    <!--login-page-content-end-->

</div>  
 	<script>
		/*
		 * jQuery UI Datepicker: Internationalization and Localization
		 * http://salman-w.blogspot.com/2013/01/jquery-ui-datepicker-examples.html
		 */
		$(function() {
		 
			$("#dob").datepicker($.datepicker.regional["de"]).datepicker("option", {
				changeMonth: true,
				changeYear: true
			});
		});
                
	</script>
 
    <script type="text/javascript" src="{{ asset('/css/datepicker/jquery-ui.min.js') }} "></script>
@endsection
