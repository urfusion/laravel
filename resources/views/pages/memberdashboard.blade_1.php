@extends('app')
@section('title') Home :: @parent @stop
@section('content')

 
<div class="warper">

    <!--product-detail-page-content-here-->
    <div class="page_content product_detail_content">
        <div class="container">
            <div class="flash-message12" style="display: none;">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
    @endif
  @endforeach
</div>
            <div class="bredcrumb_menu">
                <ul>
                    <li><a href="{{ url('/home') }}"><span>{{{ trans('site/site.Home') }}}</span></a></li>

                    <li><a href="#">Member profile</a></li>
<!--                    <li><a href="#">{{{ trans('site/site.member') }}}</a></li>-->
                </ul> 
            <ul>     
             <li class="sign" style="float:right;">Click here to <a href="{{ url('/auth/logout') }}">logout</a></li>    
            </ul>      
            </div> 
<div class="inner_head_title">
 <h1>Member dashboard  - Profile</h1>
</div>
<div class="product_detail_inner members_dashboard">

<div class="product_view_image_box">	  
<ul class="tabs"> 
	<li class="active" rel="tab1">Profile</li>
	<li rel="tab2">Favorite shop</li>
	<li rel="tab3">Wishlist</li>
	<li rel="tab4">Recent activity</li>
</ul> 

 <div class="tab_container"> 

 <div id="tab1" class="tab_content">
    
     <form  role="form" method="POST" action="{!! URL::to('members/dashboard') !!}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="login_signup_form_bg">
                        <div class="login_signup_left">
                            <div class="input_box_row">
                                <label> First name <sup>*</sup></label>
                                <input type="text"  placeholder="First name" name="first_name" value="{{{ Input::old('first_name', isset($Data) ? $Data->first_name : null) }}}">
                                {!! $errors->first('first_name', '<label class="control-label"
                                                                   for="chain">:message</label>')!!}
                            </div>


                            <div class="input_box_row">
                                <label> Last name <sup>*</sup></label>
                                <input type="text"  placeholder="Last name" name="last_name" value="{{{ Input::old('last_name', isset($Data) ? $Data->last_name : null) }}}">
                                {!! $errors->first('last_name', '<label class="control-label"
                                                                   for="chain">:message</label>')!!}
                            </div>

                            <div class="input_box_row photo_box">
                                <label>Photo<sup>*</sup></label>
                               
                                <div class="image_box">
   <img src="{{ ($Data->image!=null) ? asset('uploads/users/'.$Data->image ): asset('images/photo02.png')  }}" width="77" height="69"  alt="" />                                    
                                    
                                
                                       
                     
                                
                                
                                </div>
                            </div>


                            <div class="input_box_row">
                                <label>Age<sup>*</sup></label>
                                <input type="text"  placeholder="age" name="age" value="{{{ Input::old('age', isset($Data) ? $Data->age : null) }}}">
                                {!! $errors->first('name', '<label class="control-label"
                                                                   for="chain">:message</label>')!!}
                            </div>

                            <div class="input_box_row">
                                <label>Gender <sup>*</sup></label>
<!--                                <input type="text"  placeholder="Name" name="gender" value="{{{ Input::old('name', isset($Data) ? $Data->gender : null) }}}">
                                {!! $errors->first('name', '<label class="control-label"
                                                                   for="chain">:message</label>')!!}-->
                           
                             <div class="checkbox_box">
                                    <input type="radio" name="gender" class="ghender" value="1"@if(isset($Data->gender)) @if ($Data->gender==1 ) checked @endif  @endif  /> 
                                           <label>Male</label>
                                </div>                           
                        <div class="checkbox_box">
                                    <input type="radio" name="gender" class="ghender" value="2"@if(isset($Data->gender)) @if ($Data->gender==2 ) checked @endif  @endif  /> 
                                           <label>Female</label>
                                </div>                       
                                                                   
                                                                   
                            </div>


                            <div class="input_box_row">
                                <label>Occupation<sup>*</sup></label>
                                <input type="text"  placeholder="Occupation" name="occupation" value="{{{ Input::old('name', isset($Data) ? $Data->occupation : null) }}}">
                                {!! $errors->first('occupation', '<label class="control-label"
                                                                   for="chain">:message</label>')!!}
                            </div>

                            <div class="input_box_row">
                                <label>About the member<sup>*</sup></label>
                                <textarea name="about_member">{{$Data->about_member}}</textarea>      
                            </div>	   










                            <!--   
<div class="input_box_row">
    <label>Email</label>
    <input type="email"  placeholder="Email" name="email" value="{{{ Input::old('name', isset($Data) ? $Data->email : null) }}}">
{!! $errors->first('email', '<label class="control-label"
                                for="chain">:message</label>')!!}
</div>

<div class="input_box_row">
    <label>Contact</label>
    <input type="text"  placeholder="Contact number" name="phone" value="{{{ Input::old('name', isset($Data) ? $Data->phone : null) }}}">
{!! $errors->first('phone', '<label class="control-label"
                                for="chain">:message</label>')!!}
</div>
<div class="input_box_row">
    <label>Address</label>
    <input type="text"  placeholder="Address" name="address" value="{{{ Input::old('name', isset($Data) ? $Data->address : null) }}}">
{!! $errors->first('address', '<label class="control-label"
                                for="chain">:message</label>')!!}
</div>




                            <!--                            <div class="input_box_row">
                                                            <label>Password</label>
                                                            <input type="password" placeholder="Password" name="password">
                            
                                                        </div>	
                            
                                                        <div class="input_box_row">
                                                            <label>Confirm Password</label>
                                                             <input type="password" class="form-control" name="password_confirmation">                                 
                                                        </div>	-->

                            <!--                            <div class="input_box_row">
                                                            <label>Year of birth</label>
                                                            <input type="text" class="form-control" name="dob" id="dob">   
                                                            <select>
                                                                <option></option>
                                                            </select>                                
                                                            
                                                        </div>	-->



                            <!--
                                                 <div class="submit_button_bg">
                                                 <input type="submit" value="{{{ trans('site/site.Submit') }}}"/>
                                                 </div>
                            -->

                            <div class="edit_change_password">
                                <ul>
                                    <li> <input type="submit" value="Edit profile"</li>
                                 <li><a href="{{ url('/members/'.base64_encode($Data->id).'/changePassword') }}">Change Password</a></li>
                                </ul>
                            </div>	








                        </div>
                    </div>
 </form></div>

<div id="tab2" class="tab_content">  
<div class="favorite_shop_bg">
<div class="product_listing">
  <ul>
      
                            @foreach($Shop as $Datas)
                            <li>
                                <h2>  <a href="{{URL::to('Shops/'.base64_encode($Datas->id).'/ShopDetail')}}"> 
                                        @if(App::getLocale()=="en")  {{$Datas->shop_name}} @else  {{$Datas->shop_name_c}} @endif 
                                    </a></h2> 
                                <div class="product_inner_des">
                                    <div class="product_image_box"><a href="{{URL::to('Shops/'.base64_encode($Datas->id).'/ShopDetail')}}">

                                            <?php if ( $Datas->shop_image_1) { ?>
                                                <img src="{{$Datas->shop_image_1}}" alt="" />
                                            <?php } elseif  ( $Datas->shop_image_2) { ?>
                                                 <img src="{{$Datas->shop_image_2}}" alt="" />
                                               
                                            <?php } elseif  ( $Datas->shop_image_3) { ?>
                                                 <img src="{{$Datas->shop_image_3}}" alt="" />
                                      
                                            <?php } elseif  ( $Datas->shop_image_4) { ?>
                                                 <img src="{{$Datas->shop_image_4}}" alt="" />
                                            <?php }else{?>
                                                  <img src="{{ asset('images/noimage.png') }}" alt="" />
                                            <?php }?>
                                        </a></div>
                                    <div class="product_image_des">
                                        <div class="des_row"><i><img src="{{ asset('images/home_icon.png') }}"/></i><span>
                                                @if(App::getLocale()=="en")    
                                                {{$Datas->address}}
           
                                                @if($Datas->district)
                                                <?php $districtname = Text::districtname($Datas->district); ?>
                                                ,{{$districtname->name_e}}   

                                                @endif
                                                @if($Datas->region)
                                                <?php $regionname = Text::regionname($Datas->region); ?>

                                                ,{{$regionname->name_e}}   

                                                @endif

                                                @else 
                                            <?php     $addressString=""; ?>
                                                @if($Datas->region)
                                                <?php $regionname = Text::regionname($Datas->region);
                                                
                                               
                                                $addressString =trim($regionname->name_c);
                                                
                                                ?>
                                                @endif
                                                @if($Datas->district)
                                                <?php $districtname = Text::districtname($Datas->district);
                                                      $addressString=trim($addressString.trim($districtname->name_c)); ?>
                                                
                                            @endif
    <?php 
     
    $addressString=trim($addressString.$Datas->address_c); 
// $addressString= preg_replace("/[[:blank:]]+/","",$addressString);
// 
// $addressString = preg_replace('/\s+/', '',$addressString);
 
//     $addressString=str_replace(' ', '',trim($addressString));
 echo preg_replace('/[\s]+/mu', '', $addressString);
      ?>
                                                @endif 

                                            </span></div>
                                        @if($Datas->contact_phone_1!=null)
                                        <div class="des_row"><i><img src="{{ asset('images/phone_icon.png') }}"/></i><span style="line-height: 15px;">{{ $Datas->contact_phone_1}}</span></div>
                                        @endif
                                        <div class="des_row"><i><img src="{{ asset('images/edit_icon.png') }}"/></i><span>
                                                <?php $FashionCategory = Config::get('constants.FashionCategory'); ?>
                                                <!--                                                in_array($indexing, $selected)-->
                                                <?php
                                                $ShopTYPE = explode(',', $Datas->shop_type);
                                                $TAG = NULL;
                                                ?>
                                                @if(in_array('1', $ShopTYPE))

                                                @if($Datas->fashion_category!=null)
                                                <?php $fashion_category = explode(',', $Datas->fashion_category) ?>

                                                @foreach($FashionCategory as $a => $b)


                                                <?php
                                                if (in_array($a, $fashion_category)) {
                                                    $TAG = $TAG . trans('site/site.' . $b) . '/ ';
                                                }
                                                ?>
                                                @endforeach 
                                                @endif 
                                                @endif 


                                                @if(in_array('2', $ShopTYPE))
                                                <?php $FashionCategory = Config::get('constants.BeautyRetailCategory'); ?>
                                                @if($Datas->beauty_retail_category!=null)
                                                <?php $fashion_category = explode(',', $Datas->beauty_retail_category) ?>

                                                @foreach($FashionCategory as $a => $b)


                                                <?php
                                                if (in_array($a, $fashion_category)) {
                                                    $TAG = $TAG . trans('site/site.' . $b) . '/ ';
                                                }
                                                ?>
                                                @endforeach 
                                                @endif 
                                                @endif 

                                                @if(in_array('3', $ShopTYPE))
                                                <?php $FashionCategory = Config::get('constants.BeautyServicingCategory'); ?>
                                                @if($Datas->beauty_service_category!=null)
                                                <?php $fashion_category = explode(',', $Datas->beauty_service_category) ?>

                                                @foreach($FashionCategory as $a => $b)


                                                <?php
                                                if (in_array($a, $fashion_category)) {
                                                    $TAG = $TAG . trans('site/site.' . $b) . '/ ';
                                                }
                                                ?>
                                                @endforeach 
                                                @endif 
                                                @endif 

                                                <?php
//                                                echo $TAG ;
                                                if (strlen($TAG) > 55) {
                                                    $TAG = trim($TAG, "/");
                                                    $TAG = substr($TAG, 0, 55);
                                                    $TAG = trim($TAG);
                                                    $TAG = trim($TAG, "/");

                                                    $TAG = trim($TAG, "/") . '...';
                                                    echo htmlentities($TAG, ENT_QUOTES | ENT_IGNORE, "UTF-8");
                                                } else {
                                                    $TAG = trim($TAG);
                                                    $TAG = trim($TAG, "/");
                                                    $TAG = trim($TAG, "/");
                                                    echo htmlentities($TAG, ENT_QUOTES | ENT_IGNORE, "UTF-8");
                                                }
                                                ?>

                                            </span></div>
                                        <!--                                        <a href="#" class="sponsor_text">Sponsor</a>-->
                                    </div>
                                </div>
                            </li>  
                            @endforeach
                        </ul>
                         

 
                    </div>
</div>
</div>
                                
<div id="tab3" class="tab_content">
 <div class="wishlist_content">
  <ul>
    <li>
	 <div class="product_image02">
	  <a href="#"><img src="{{ asset('images/wpr01.png') }}"/></a>
	 </div>
	 <div class="w_product_des">
	  <h2>Product Name</h2>
	  <div class="price_delete_box">
	   <div class="wishlist_price">$20.00</div>
       <div class="del_button">
	   <a href="#"><img src="{{ asset('images/del_icon.png') }}"/></a>
	   </div>
	   </div>
	 </div>
	</li>
    
	    <li>
	 <div class="product_image02">
	  <a href="#"><img src="{{ asset('images/wpr01.png') }}"/></a>
	 </div>
	 <div class="w_product_des">
	  <h2>Product Name</h2>
	  <div class="price_delete_box">
	   <div class="wishlist_price">$20.00</div>
       <div class="del_button">
	   <a href="#"><img src="{{ asset('images/del_icon.png') }}"/></a>
	   </div>
	   </div>
	 </div>
	</li> 
	
	
	
	    <li>
	 <div class="product_image02">
	  <a href="#"><img src="{{ asset('images/wpr01.png') }}"/></a>
	 </div>
	 <div class="w_product_des">
	  <h2>Product Name</h2>
	  <div class="price_delete_box">
	   <div class="wishlist_price">$20.00</div>
       <div class="del_button">
	   <a href="#"><img src="{{ asset('images/del_icon.png') }}"/></a>
	   </div>
	   </div>
	 </div>
	</li> 
	
	
	
	    <li>
	 <div class="product_image02">
	  <a href="#"><img src="{{ asset('images/wpr01.png') }}"/></a>
	 </div>
	 <div class="w_product_des">
	  <h2>Product Name</h2>
	  <div class="price_delete_box">
	   <div class="wishlist_price">$20.00</div>
       <div class="del_button">
	   <a href="#"><img src="{{ asset('images/del_icon.png') }}"/></a>
	   </div>
	   </div>
	 </div>
	</li> 
	
	
	
	    <li>
	 <div class="product_image02">
	  <a href="#"><img src="{{ asset('images/wpr01.png') }}"/></a>
	 </div>
	 <div class="w_product_des">
	  <h2>Product Name</h2>
	  <div class="price_delete_box">
	   <div class="wishlist_price">$20.00</div>
       <div class="del_button">
	   <a href="#"><img src="{{ asset('images/del_icon.png') }}"/></a>
	   </div>
	   </div>
	 </div>
	</li> 
	
	
	    <li>
	 <div class="product_image02">
	  <a href="#"><img src="{{ asset('images/wpr01.png') }}"/></a>
	 </div>
	 <div class="w_product_des">
	  <h2>Product Name</h2>
	  <div class="price_delete_box">
	   <div class="wishlist_price">$20.00</div>
       <div class="del_button">
	   <a href="#"><img src="{{ asset('images/del_icon.png') }}"/></a>
	   </div>
	   </div>
	 </div>
	</li> 
	
	
	
	    <li>
	 <div class="product_image02">
	  <a href="#"><img src="{{ asset('images/wpr01.png') }}"/></a>
	 </div>
	 <div class="w_product_des">
	  <h2>Product Name</h2>
	  <div class="price_delete_box">
	   <div class="wishlist_price">$20.00</div>
       <div class="del_button">
	   <a href="#"><img src="{{ asset('images/del_icon.png') }}"/></a>
	   </div>
	   </div>
	 </div>
	</li> 
	
	
	    <li>
	 <div class="product_image02">
	  <a href="#"><img src="{{ asset('images/wpr01.png') }}"/></a>
	 </div>
	 <div class="w_product_des">
	  <h2>Product Name</h2>
	  <div class="price_delete_box">
	   <div class="wishlist_price">$20.00</div>
       <div class="del_button">
	   <a href="#"><img src="{{ asset('images/del_icon.png') }}"/></a>
	   </div>
	   </div>
	 </div>
	</li> 
	
	
	    <li>
	 <div class="product_image02">
	  <a href="#"><img src="{{ asset('images/wpr01.png') }}"/></a>
	 </div>
	 <div class="w_product_des">
	  <h2>Product Name</h2>
	  <div class="price_delete_box">
	   <div class="wishlist_price">$20.00</div>
       <div class="del_button">
	   <a href="#"><img src="{{ asset('images/del_icon.png') }}"/></a>
	   </div>
	   </div>
	 </div>
	</li> 
	
	
	    <li>
	 <div class="product_image02">
	  <a href="#"><img src="{{ asset('images/wpr01.png') }}"/></a>
	 </div>
	 <div class="w_product_des">
	  <h2>Product Name</h2>
	  <div class="price_delete_box">
	   <div class="wishlist_price">$20.00</div>
       <div class="del_button">
	   <a href="#"><img src="{{ asset('images/del_icon.png') }}"/></a>
	   </div>
	   </div>
	 </div>
	</li> 
	
	
	    <li>
	 <div class="product_image02">
	  <a href="#"><img src="{{ asset('images/wpr01.png') }}"/></a>
	 </div>
	 <div class="w_product_des">
	  <h2>Product Name</h2>
	  <div class="price_delete_box">
	   <div class="wishlist_price">$20.00</div>
       <div class="del_button">
	   <a href="#"><img src="{{ asset('images/del_icon.png') }}"/></a>
	   </div>
	   </div>
	 </div>
	</li> 
	
	
	    <li>
	 <div class="product_image02">
	  <a href="#"><img src="{{ asset('images/wpr01.png') }}"/></a>
	 </div>
	 <div class="w_product_des">
	  <h2>Product Name</h2>
	  <div class="price_delete_box">
	   <div class="wishlist_price">$20.00</div>
       <div class="del_button">
	   <a href="#"><img src="{{ asset('images/del_icon.png') }}"/></a>
	   </div>
	   </div>
	 </div>
	</li> 
	
	
	    <li>
	 <div class="product_image02">
	  <a href="#"><img src="{{ asset('images/wpr01.png') }}"/></a>
	 </div>
	 <div class="w_product_des">
	  <h2>Product Name</h2>
	  <div class="price_delete_box">
	   <div class="wishlist_price">$20.00</div>
       <div class="del_button">
	   <a href="#"><img src="{{ asset('images/del_icon.png') }}"/></a>
	   </div>
	   </div>
	 </div>
	</li> 
	
	    <li>
	 <div class="product_image02">
	  <a href="#"><img src="{{ asset('images/wpr01.png') }}"/></a>
	 </div>
	 <div class="w_product_des">
	  <h2>Product Name</h2>
	  <div class="price_delete_box">
	   <div class="wishlist_price">$20.00</div>
       <div class="del_button">
	   <a href="#"><img src="{{ asset('images/del_icon.png') }}"/></a>
	   </div>
	   </div>
	 </div>
	</li> 
		    <li>
	 <div class="product_image02">
	  <a href="#"><img src="{{ asset('images/wpr01.png') }}"/></a>
	 </div>
	 <div class="w_product_des">
	  <h2>Product Name</h2>
	  <div class="price_delete_box">
	   <div class="wishlist_price">$20.00</div>
       <div class="del_button">
	   <a href="#"><img src="{{ asset('images/del_icon.png') }}"/></a>
	   </div>
	   </div>
	 </div>
	</li> 
	
		    <li>
	 <div class="product_image02">
	  <a href="#"><img src="{{ asset('images/wpr01.png') }}"/></a>
	 </div>
	 <div class="w_product_des">
	  <h2>Product Name</h2>
	  <div class="price_delete_box">
	   <div class="wishlist_price">$20.00</div>
       <div class="del_button">
	   <a href="#"><img src="{{ asset('images/del_icon.png') }}"/></a>
	   </div>
	   </div>
	 </div>
	</li> 

	
  
  </ul> 
 </div>
</div>

<div id="tab4" class="tab_content">4</div>

</div>
</div>
                  

                    
                 

                 
 
            </div>

        </div>
    </div>
    <!--product-detail-page-content-end-->

</div>
 
 


@endsection

@stop
