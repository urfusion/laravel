@extends('app')
@section('title') Home :: @parent @stop
@section('content')

<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-65638982-1', 'auto');
    ga('send', 'pageview');

</script>
<div class="warper">

    <!--login-page-content-here-->
    <div class="page_content login_signup_bg">
        <div class="container">
            <div class="bredcrumb_menu">
                <ul>
                    <li><span>Home</span></li>
                    <li><a href="#">Sign in</a></li>
                </ul>  
            </div> 

            <div class="login_inner_content">
                <div class="login_sign_head">
                    <h1>Sign In</h1>    
                    <div class="head_icon"><img src="{{ asset('images/lock_open_icon.png') }}"/></div>
                </div>


                <form   role="form" method="POST" action="{!! URL::to('/auth/login') !!}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">  
                    <div class="login_signup_form_bg">
                        <div class="login_signup_left"> 
                            <div class="input_box_row">
                                <label>Email address</label>
                              
                                <input type="email"    placeholder="Email  Address" name="email" data-validate="email"  id="email" placeholder="Email Id" autocomplete="off"  value="{{ old('email') }}">
                            </div>	 
 
                            <div class="input_box_row">
                                <label>Password</label>
                                
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
                            </div>	 

                            <div class="remember_forgot">
                            
                                <div class="remember"> <input type="checkbox" name="remember"><label>Remember me ?</label></div>
                                <div class="forgot"><a href="{{ url('/password/email') }} ">Forgot your password?</a></div>
                            </div>

                            <div class="submit_bg">
                                <input type="submit" value="Sign in "/>
                            </div>

                        </div>

                        <div class="login_signup_right">
                            <div class="login_signup_right_inner">
                                <span>Not a member? <a href="{{ url('/auth/register') }} ">Create an Account</a></span>	 
                                <p>It's free, easy and only takes 20 seconds.</p>
                            </div>
                        </div>
                    </div>
                </form>


            </div> 




        </div>
    </div>
    <!--login-page-content-end-->

</div>





@endsection

@stop
