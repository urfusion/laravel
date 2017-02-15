@extends('app')
@section('title') Home :: @parent @stop
@section('content')
<!--<script>

    function fbs_click()
    {
        u = location.href;
        t = document.title;
        window.open('http://www.facebook.com/sharer.php?u={{URL::current()}}', 'sharer', 'toolbar=0,status=0,width=626,height=436');
        return false;
    }
    function twi_click()
    {
        u = location.href;
        t = document.title;
        window.open('https://twitter.com/share?url={{URL::current()}}', 'sharer', 'toolbar=0,status=0,width=626,height=450');
        return false;
    }
    function link_click()
    {
        u = location.href;
        t = document.title;
        window.open('https://www.linkedin.com/cws/share?url={{URL::current()}}', 'sharer', 'toolbar=0,status=0,width=626,height=450');
        return false;
    }

    function google_click()
    {
        u = location.href;
        t = document.title;
        window.open('https://plus.google.com/share?url={{URL::current()}}', 'sharer', 'toolbar=0,status=0,width=626,height=450');
        return false;
    }
    
     function pinterest_click()
    {
        u = location.href;
        t = document.title;
        window.open('http://pinterest.com/pin/create/button/?url=http://fabmap.com.hk/', 'sharer', 'toolbar=0,status=0,width=626,height=450');
        return false;
    }
 
</script>-->
<!--<li><a rel="nofollow" href="#" onclick="return fbs_click()" target="_blank"><img src="images/facebook.png" border="0"/></a></li>
<li><a href="#" onclick="return google_click()" ><img src="images/google+.png" /></a></li>
<li><a href="#" onclick="return twi_click()" target="_blank"><img src="images/twiiter.png" border="0" /></a>
</li>
<li><a href="#" onclick="return link_click()" target="_blank"><img src="images/in.png"  border="0"/></a></li>
 <li><a href="#" onclick="return pinterest_click()" target="_blank"><img src="images/in.png"  border="0"/></a></li>
 -->
 <!--http://laravelcoding.com/blog/laravel-5-beauty-sending-mail-and-using-queues-->
<div class="warper">
    <a href=""
       <!--login-page-content-here-->
       <div class="page_content login_signup_bg">
            <div class="container">
                <div class="bredcrumb_menu">
                    <ul>
                        <li><span>Home</span></li>
                        <li><a href="#">Forgot Password</a></li>
                    </ul>  
                </div> 

                <div class="login_inner_content">
                    <div class="login_sign_head">
                        <h1>Forgot Password</h1>    
                        <div class="head_icon"><img src="{{ asset('images/lock_open_icon.png') }}"/></div>
                    </div>

               @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                      @include('errors.list')
                    <form   role="form" method="POST" action="{!! URL::to('/password/email') !!}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">  
                        <div class="login_signup_form_bg">
                            
                            <div class="forgot_box"> 
							 <h3>Are you a...?</h3>
							 
							 <div class="shop_member_box">
							  
							  <div class="float_left checkbox01">
							   <input type="checkbox" name="display_topp"/>
							   <span>Shop In-charge</span>
							  </div>
						      
							  <div class="float_right checkbox01">
							   <input type="checkbox" name="display_topp"/>
							   <span>Member</span>
							  </div>
							  
							 </div>
							 
							
							
                                <div class="input_box_row">
                                    <label>Email</label>

                                    <input type="email"    placeholder="Email  Address" name="email" data-validate="email"  id="email" placeholder="Email Id" autocomplete="off"  value="{{ old('email') }}">
                                </div>	 



                                <div class="submit_bg">
                                    <input type="submit" value="Submit "/>
                                </div>

                            </div>

                            
							<!--
							<div class="login_signup_right">
                                <div class="login_signup_right_inner">
                                    <span>Not a member? <a href="{{ url('/auth/register') }} ">Create an Account</a></span>	 
                                    <p>It's free, easy and only takes 20 seconds.</p>
                                </div>
                            </div>
                            -->							
							
							
                        </div>
                    </form>


                </div> 




            </div>
        </div>
        <!--login-page-content-end-->

</div>
 <script>
$(':checkbox').on('change',function(){
 var th = $(this), name = th.prop('display_topp'); 
 if(th.is(':checked')){
     $(':checkbox[name="display_topp"]').not($(this)).prop('checked',false);   
  }
});
</script>




@endsection

@stop
