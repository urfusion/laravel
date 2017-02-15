@extends('app')

@section('content')
    <div class="warper">

    <!--login-page-content-here-->
    <div class="page_content login_signup_bg">
        <div class="container">
            <div class="bredcrumb_menu">
                <ul>
                    <li><a href="{{ url('/home') }}"><span>{{{ trans('site/site.Home') }}}</span></a></li>
                    <li><a href="#">{{{ trans('site/site.change_password') }}}</a></li>
                </ul>  
            </div> 

            <div class="login_inner_content">
                <div class="login_sign_head">
                    <h1>{{{ trans('site/site.change_password') }}}</h1>    
                    <div class="head_icon"><img src="{{ asset('images/lock_open_icon.png') }}"/></div>
                </div>
                        @include('errors.list')

                        <form class="form-horizontal" method="post"
	action="@if (isset($user)){{ URL::to('members/' . base64_encode($user->id) . '/changePassword') }}@endif"
	autocomplete="off">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                           <div class="login_signup_form_bg">
                        <div class="login_signup_left"> 
                             

                            <div class="input_box_row">
                                <label>{{{ trans('site/site.Enter_your_new_password') }}}</label>

                               
                                    <input type="password" class="form-control" name="password">
                                
                            </div>

                            <div class="input_box_row">
                                <label>{{{ trans('site/site.Confirm_Password') }}}</label>
                                <input type="password" class="form-control" name="password_confirmation">
                                
                            </div>

                             <div class="edit_change_password">
                                <ul>
                                    <li> <input type="submit" value="{{{ trans('site/site.update') }}}"</li>
                                 <li><a href="{{ url('/members/dashboard') }}">{{{ trans('site/site.cancel') }}}</a></li>
                                </ul>
                            </div>
                            </div>
                            </div>
                        </form>
                     
                </div>
            </div>
        </div>
    </div>
@endsection
