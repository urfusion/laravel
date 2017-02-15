@extends('app')
@section('title') About :: @parent @stop
@section('content')

<?php
header("Refresh: 5;url=ShopDetail"); 
// if (Auth::check()) {
//
//header("Refresh: 5;url=editShopCategory"); 
// }
// else {
//    
//           header("Refresh: 5;url=home");
//        }

?>


<div class="warper">

<!--thank-you-page-content-here-->
<div class="page_content thank_you">
 <div class="container">
  <div class="bredcrumb_menu">
                 <ul>
                    <li><a href="{{ url('/home') }}"><span>{{{ trans('site/site.Home') }}}</span></a></li>
                    <li><a href="#">{{{ trans('site/site.thank_you') }}}</a></li>

                  
                </ul> 
                
            </div> 
  
  <div class="inner_head_title">
	<h1>{{{ trans('site/site.thank_you') }}} </h1>
  </div>   
  <div class="inner_page_content_bg">
   <div class="thanku_inner_content">
    <div class="thank_logo"><a href="#"> <img src="{{ asset('images/thank_logo.png') }}" alt="" /></a></div> 
	 <h1>{{{ trans('site/site.fabmap_thank_you_message') }}} </h1>
<!--	 <p>We will update the information immediately upon verification. </p>-->
   </div>
   </div>
 </div>
</div>
<!--thank-you-page-content-end-->

</div>


   
@endsection