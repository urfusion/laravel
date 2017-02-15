@extends('app')

@section('content')
    <div class="warper">

    <!--login-page-content-here-->
    <div class="page_content login_signup_bg">
        <div class="container">
            <div class="bredcrumb_menu">
                <ul>
                    <li><span>Home</span></li>
                    <li><a href="#">Reset password</a></li>
                </ul>  
            </div> 

            <div class="login_inner_content">
                <div class="login_sign_head">
                    <h1>Reset Password</h1>    
                    <div class="head_icon"><img src="{{ asset('images/lock_open_icon.png') }}"/></div>
                </div>
                        @include('errors.list')

                        <form class="form-horizontal" role="form" method="POST" action="{!! URL::to('/password/reset') !!}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="token" value="{{ $token }}">

                           <div class="login_signup_form_bg">
                        <div class="login_signup_left"> 
                            <div class="input_box_row">
                                 <label>Email address</label>

                                 
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                
                            </div>

                            <div class="input_box_row">
                                <label>Enter your new password</label>

                               
                                    <input type="password" class="form-control" name="password">
                                
                            </div>

                            <div class="input_box_row">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation">
                                
                            </div>

                            <div class="submit_bg">
                                <input type="submit" value="Reset password"/>
                            </div>
                            </div>
                            </div>
                        </form>
                     
                </div>
            </div>
        </div>
    </div>
@endsection
