@extends('app')
@section('title') Home :: @parent @stop
@section('content')

<div class="warper"> 
    <!--beauty-retail-shop-content-here-->
    <div class="page_content fashionshop_bg form_bg">
        <div class="container">
            <div class="bredcrumb_menu">
                <ul>
                    <li><a href="{{ url('/home') }}"><span>{{{ trans('site/site.Home') }}}</span></a></span></li>

                    <li><a href="#">Shop in-charge registration</a></li>
                </ul>  
            </div> 
            @include('errors.list')
                <div class="login_sign_head">
                    <h1>Shop in-charge registration</h1>    
                    <div class="head_icon"><img src="{{ asset('images/lock_open_icon.png') }}"/></div>
                </div>

           <div class="inner_page_content_bg shop_incharge_registration">

                <!--################# shop form ##########################-->
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data"  autocomplete="off">
                    <h2>Sign up using email<sup>*</sup></h2> 

                  <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                               <label>Email address</label>
                                <div class="fild input_fild_box">
                                    <input type="text"   name="email" value="{{ old('email') }}">
                                </div>
                            </div>
                        </div>

                         

                    </div>

                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                              <label>Password</label>
                                <div class="fild input_fild_box">
                                    <input type="password" placeholder="Password" name="password">
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>Confirm Password</label>
                                <div class="fild input_fild_box">
                                   <input type="password" class="form-control" name="password_confirmation">  
                                </div>
                            </div>
                        </div>

                    </div>
                    <h2>Shop in-charge 1 Contact Information<sup>*</sup></h2> 

                  <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>First Name</label>
                                <div class="fild input_fild_box">
                                    <input type="text"   name="first_name" value="{{ old('first_name') }}">
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                               <label>Last Name</label>
                                <div class="fild input_fild_box">
                                    <input type="text"   name="last_name" value="{{ old('last_name') }}">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                              <label>Contact Number</label>
                                <div class="fild input_fild_box">
                                     <input type="text"   name="phone_1" value="{{ old('phone_1') }}">
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>Email</label>
                                <div class="fild input_fild_box">
                                    <input type="text"   name="email_1" value="{{ old('email_1') }}">
                                </div>
                            </div>
                        </div>

                    </div>
                    <h2>Shop in-charge 2 Contact Information</h2> 

                  <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>First Name</label>
                                <div class="fild input_fild_box">
                                    <input type="text"   name="first_name_2" value="{{ old('first_name_2') }}">
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                               <label>Last Name</label>
                                <div class="fild input_fild_box">
                                    <input type="text"   name="last_name_2" value="{{ old('last_name_2') }}">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                              <label>Contact Number</label>
                                <div class="fild input_fild_box">
                                    <input type="text"   name="phone_2" value="{{ old('phone_2') }}">
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>Email</label>
                                <div class="fild input_fild_box">
                                  <input type="text"   name="email_2" value="{{ old('email_2') }}">
                                </div>
                            </div>
                        </div>

                    </div>

                    
                    
  

                    


                    <!--website-social-media-end-->

                    <!--shop-images-here-->
                    <div class="shop_images_box business_registration">
                        <div class="two_fild_row">
                            <div class="fild_box left_fild">
                                <div class="fild_box_inner">
                                    <label>Business Registration</label>
                                    <div class="browse_bg">
                                        <div class="fild input_fild_box">
                                            <input type="text" value="" readonly  id="shop_image_10" name="shop_image_10">
                                        </div>
                                        <div class="browse_button">
                                            <input type="file"  id="shop_image_1" name="shop_image_1"/>
                                        </div>    	
                                    </div>
                                </div>
                            </div>
                            <div class="fild_box right_fild"></div>
                        </div>

                        

                         

                         
                    </div>
                    <!--shop-images-end-->

                  

                
                
 <h2 class="claim_tag_liane">Claim your shops</h2> 
   
  
    <meta name="csrf-token" content="{{ csrf_token() }}" />
  @foreach($data as $Datas)
   <div class="claim_shop_list">
     <div class="claim_left">
	  <input type="checkbox" name="checkboxval[]" value="{{$Datas->id}}"  class="case"> 
	 </div>
     <div class="claim_right">    
     <div class="product_listing_shopincharge">
                <ul>

                    <li>

                           <div class="product_inner_des">
                            <div class="product_image_box"><a href="{{URL::to('Shops/'.base64_encode($Datas->id).'/UpdateInfo')}}">

                                    <?php if  ($Datas->shop_image_1)  { ?>
                                        <img src="{{$Datas->shop_image_1}}" alt=""  height="135" />
                                    <?php } else { ?>
                                        <img src="{{ asset('images/noimage.png') }}" alt="" />
                                    <?php } ?>

                                </a></div>
                            <div class="product_image_des">
                   <a href="{{URL::to('Shops/'.base64_encode($Datas->id).'/UpdateInfo')}}">             
		 <h2>   @if(App::getLocale()=="en")  {{$Datas->shop_name}} @else  {{$Datas->shop_name_c}} @endif </h2></a> 
                                <div class="des_row"><i><img src="{{ asset('images/home_icon.png') }} "/></i><span> 
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
                                        <div class="des_row"><i><img src="{{ asset('images/phone_icon.png') }}"/></i><span style="line-height: 15px;" >{{ $Datas->contact_phone_1}}</span></div>
                                        @endif
                                <div class="des_row"><i><img src="{{ asset('images/edit_icon.png') }} "/></i><span>

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
                                        if (strlen($TAG) > 55) {

                                            $TAG = substr($TAG, 0, 55);
                                            $TAG = trim($TAG);
                                            $TAG = trim($TAG, "/");
                                            $TAG = htmlentities(trim($TAG, "/"));
                                            echo trim($TAG, "/") . '...';
                                        } else {
                                            $TAG = trim($TAG);
                                            $TAG = htmlentities(trim($TAG, "/"));
                                            echo $TAG = trim($TAG, "/");
                                        }
                                        ?>


                                    </span></div>
                            </div>
                        </div>
                    </li> 
                  

                </ul>
            </div>
    </div>
    
	</div>
           @endforeach
  
 
 <div class="submit_bg">
                                <input type="button" value="Select all" class="selectall"/>
                             
<!--              <input type="button" value="+ Add branches" class="add_branches"/>-->
              
                        
                        <input type="submit" value="Sign up" class="selectall_2" />
                     
            </div>
              
            
    </form>
            
        </div>
    </div>
    <!--beauty-retail-shop-content-end-->
</div>

@include('include.divtoggal')
 @include('include.shopautosug')
 @include('include.shopautoladmark')
 @include('include.shopautomallc')
 @include('include.shopautolandchin')

<script>
    $(function () {
        $('.shop_type').click(function () {


            var SHOPTYPEVAL = [];
            $('#loader').show();
            $("input:checkbox[class=shop_type]:checked").each(function () {
                SHOPTYPEVAL.push($(this).val());
            });
            SHOPTYPEVAL = SHOPTYPEVAL.join(",");

            $.get('{{{ URL::to('') }}}/Shops/shopType/' + SHOPTYPEVAL, function (data)
            {
                $('#changeShopType').html(data);
            }
            );

        });
    });
</script>
<script>
jQuery(document).ready(function(){
    jQuery('.add_shopclick').live('click', function(event) {        
         jQuery('#add_shopfloor').toggle('show');
    });
});
</script>  
 <script language="javascript">
    $(document).ready(function () {
       $('.selectall').on('click', function () {
        $('.case').prop('checked',true);
        
    });
    });
</script>
<script type="text/javascript">

    $(document).ready(function () {
//          $('.selectall_2').click(function () {
//            if ($(".case:checked").length > 0) {
//                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
//                var checkboxvalue = [];
//                $(".case:checked").each(function () {
//                    checkboxvalue.push($(this).val());
//                });
//                checkboxvalue = checkboxvalue.join(",");
//                //alert(checkboxvalue)
//              $.ajax({
//                    url: '{{url()}}/Shops/shop_incharge_reg/selecttall',
//                    type: "post",
//                    data: {_token: CSRF_TOKEN, checkboxvalue: checkboxvalue},
//                    success: function (data) {
//                        alert(data);
//                        $('.form-horizontal').submit();
//                       // window.location = self.location;
//                    }
//                });
//            } else {
//                alert("plese select atlist on value!")
//            }    
                 


//        });
   
    });
</script>
@endsection

@stop
