@extends('app')
@section('title' ) {{$title}} @endsection
@section('content')
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

<?php
  

$ADDRESS = null;

if ($Data->mall != null) {
    $landmark = Text::landmarkname($Data->mall);
    $ADDRESS = $landmark->mall_e;
    $ADDRESS = str_replace(",,", ",", $ADDRESS);
}
if ($Data->building != null) {

    $ADDRESS = $ADDRESS . ',' . $Data->building;
    $ADDRESS = str_replace(",,", ",", $ADDRESS);
}
if ($Data->landmark != null) {
    $landmark = Text::landmarkname($Data->landmark);

    if ($landmark->landmark_e != null) {
        $ADDRESS = $ADDRESS . ',' . $landmark->landmark_e;
        $ADDRESS = str_replace(",,", ",", $ADDRESS);
    }
}

if ($Data->district != null) {
    $districtname = Text::districtname($Data->district);

    $ADDRESS = $ADDRESS . ',' . $districtname->name_e;
    $ADDRESS = str_replace(",,", ",", $ADDRESS);
}
$ADDRESS = trim($ADDRESS, ",");
 

if ($Data->region != null) {
    $regionname = Text::regionname($Data->region);

    $ADDRESS = $ADDRESS . ',' . $regionname->name_e;
    $ADDRESS = str_replace(",,", ",", $ADDRESS);
}

$ADDRESS = trim($ADDRESS, ",");
$ADDRESS = str_replace(",,", ",", $ADDRESS);
?>
<script type="text/javascript">

            var geocoder;
            var map;
            var address = "<?php echo $ADDRESS; ?>";
            function initialize() {
            geocoder = new google.maps.Geocoder();
                    var latlng = new google.maps.LatLng( - 34.397, 150.644);
                    var myOptions = {
                    zoom: 18,
                            center: latlng,
                            mapTypeControl: true,
                            mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
                            navigationControl: true,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                    };
                    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                    if (geocoder) {
            geocoder.geocode({'address': address}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
            if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
            map.setCenter(results[0].geometry.location);
                    var infowindow = new google.maps.InfoWindow(
                    {content: '<b>' + address + '</b>',
                            size: new google.maps.Size(150, 150)
                    });
                    var marker = new google.maps.Marker({
                    position: results[0].geometry.location,
                            map: map,
                            title: '<?php echo $ADDRESS; ?>'
                    });
                    google.maps.event.addListener(marker, 'click', function () {
                    infowindow.open(map, marker);
                    });
            } else {
            alert("No results found");
            }
            } else {
            alert("Geocode was not successful for the following reason: " + status);
            }
            });
            }
            }

</script>
<?php // echo $Data->id;die; ?>
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

                    <li><a href="#">{{{ trans('site/site.Shop_Overview') }}}</a></li>
                </ul> 
                  <ul>     
                      <li class="favorite" style="float:right;"> Add to favorite <img src ="{{asset('images/right_tik.png')}}"/></li>    
            </ul>
            </div> 
            

            <div class="product_detail_inner">
                <div class="product_detail_top">
                    <div class="detail_top_left">

                        <h3>  @if(App::getLocale()=="en")  {{$Data->shop_name}} @else  {{$Data->shop_name_c}} @endif  @if($Data->status== '0') 
                       (closed)
                        @endif  </h3>
                        
                        
                      
                        
                          <div class="fav_share_box">
                            <div class="fav_box">
                                <div class="rate-ex2-cnt">
                                    <div id="1" class="rate-btn-1 rate-btn"></div>
                                    <div id="2" class="rate-btn-2 rate-btn"></div>
                                    <div id="3" class="rate-btn-3 rate-btn"></div>
                                    <div id="4" class="rate-btn-4 rate-btn"></div>
                                    <div id="5" class="rate-btn-5 rate-btn"></div>
                                </div>
                            </div>
 
    <meta property="og:type" content="product"/>
    <meta property="og:title" content="<?php echo $title; ?>"/>
    <meta property="og:description" content="<?php echo $Data->description; ?>"/>
    <meta property="og:image" content="<?php echo $Data->shop_image_1; ?>"/>     
    <link rel="image_src" 
      type="image/jpeg" 
      href="<?php echo $Data->shop_image_1; ?>" />
                                                       <div class="social_share">
                                                            <span>Share Shop</span>
                                                            <ul>
     <li><a href="http://www.facebook.com/sharer.php?u={{URL::to('Shops/'.base64_encode($Data->id).'/ShopDetail')}}" target="_blank"><img src="{{ asset('images/icon1.png') }}"></a></li>
    <li><a href="{{ $Data->instagram }}" target="_blank"><img src="{{ asset('images/icon2.png') }}"></a></li>
    <li><a href="http://pinterest.com/pin/create/button/?url={{URL::to('Shops/'.base64_encode($Data->id).'/ShopDetail')}}" target="_blank"><img src="{{ asset('images/icon3.png') }}"></a></li>
    <li><a href="https://twitter.com/intent/tweet?url={{URL::to('Shops/'.base64_encode($Data->id).'/ShopDetail')}}" target="_blank"><img src="{{ asset('images/icon4.png') }}"></a></li>
    <li><a href="tel:+{{ $Data->contact_phone_1 }}"><img src="{{ asset('images/icon5.png') }}"></a></li>
                                                            </ul>
                            
                                                        </div> 

                        </div> 
                    </div>

                    <div class="detail_top_right">
                     
                        <ul>
                            <!--                            <li><a href="#">Shop Owner</a></li>-->
                            <li><a href="{{URL::to('Shops/'.base64_encode($Data->id).'/editShopCategory')}}">{{{ trans('site/site.Update_Info') }}}</a></li>
                            <!--                            <li><a href="#">Write Review</a></li>-->

                        </ul>
                           <ul>
                            <!--                            <li><a href="#">Shop Owner</a></li>-->
                            <li><a href="{{URL::to('Shops/'.base64_encode($Data->id).'/shop_incharge_reg')}}">Shop Owner</a></li>
                            <!--                            <li><a href="#">Write Review</a></li>-->

                        </ul>
                    </div>

                </div>

                <div class="product_detail_two_coulm">

                    <div class="detail_left_coulm"  style=" margin-top:40px;">
                        <div class="product_view_image_box">	  
                                                   <ul class="tabs"> 
                                                                                        <li class="active" rel="tab1">Overview</li>
                                                                                        <li rel="tab2">Products</li>
                                                                                        <li rel="tab3">Review</li>
                                                                                    </ul> 

                            <div class="tab_container" > 

                                <div id="tab1" class="tab_content">
                                    <div class="product_view_image">

                                         
                                        <a href="#">
                                            <?php if ($Data->shop_image_1  ) { ?>
                                                <img src="{{$Data->shop_image_1}}" alt="" />
                                            <?php } elseif  ($Data->shop_image_2  ) { ?>
                                                 <img src="{{$Data->shop_image_2}}" alt="" />
                                               
                                            <?php } elseif  ($Data->shop_image_3 ) { ?>
                                                 <img src="{{$Data->shop_image_3}}" alt="" />
                                             
                                            <?php } elseif  ($Data->shop_image_4 ) { ?>
                                                 <img src="{{$Data->shop_image_4}}" alt="" />
                                            <?php }else{?>
                                                <img src="{{ asset('images/noimage.png') }}" alt="" />
                                            <?php } ?>
                                        </a>
                                        
                                    </div>

                                                                        <div class="thumb_slider_bg">
                                                                            <div class="cat_slider_box_row">
                                    
                                                                                <div class="slide_tilte_box pink_bg">
                                                                                    <h1>Featured Products</h1>
                                                                                    <a class="see_all" href="#">See all</a> 
                                                                                </div>
                                    
                                                                                <ul id="mycarousel6" class="jcarousel-skin-tango">
                                                                                    <li>
                                                                                        <div class="image_box_bg">
                                                                                            <div class="image_box"><img src="{{ asset('images/food.png') }}" alt="" /></div>
                                                                                            <div class="overlow_box">
                                                                                                <div class="overlow_box_content"> <span>Street Style:</span>
                                                                                                    <p>Dallas Fashion Scene</p>
                                                                                                    <a href="#">Kristi and Scot Redman</a> </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="product_des_box">
                                                                                            <div class="product_name">Dallas Food</div>
                                                                                            <div class="price_box">$40</div>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <div class="image_box_bg">
                                                                                            <div class="image_box"><img src="{{ asset('images/food.png') }}" alt="" /></div>
                                                                                            <div class="overlow_box">
                                                                                                <div class="overlow_box_content"> <span>Street Style:</span>
                                                                                                    <p>Dallas Fashion Scene</p>
                                                                                                    <a href="#">Kristi and Scot Redman</a> </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="product_des_box">
                                                                                            <div class="product_name">Dallas Food</div>
                                                                                            <div class="price_box">$40</div>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <div class="image_box_bg">
                                                                                            <div class="image_box"><img src="{{ asset('images/food.png') }}" alt="" /></div>
                                                                                            <div class="overlow_box">
                                                                                                <div class="overlow_box_content"> <span>Street Style:</span>
                                                                                                    <p>Dallas Fashion Scene</p>
                                                                                                    <a href="#">Kristi and Scot Redman</a> </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="product_des_box">
                                                                                            <div class="product_name">Dallas Food</div>
                                                                                            <div class="price_box">$40</div>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <div class="image_box_bg">
                                                                                            <div class="image_box"><img src="{{ asset('images/food.png') }}" alt="" /></div>
                                                                                            <div class="overlow_box">
                                                                                                <div class="overlow_box_content"> <span>Street Style:</span>
                                                                                                    <p>Dallas Fashion Scene</p>
                                                                                                    <a href="#">Kristi and Scot Redman</a> </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="product_des_box">
                                                                                            <div class="product_name">Dallas Food</div>
                                                                                            <div class="price_box">$40</div>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <div class="image_box_bg">
                                                                                            <div class="image_box"><img src="{{ asset('images/food.png') }}" alt="" /></div>
                                                                                            <div class="overlow_box">
                                                                                                <div class="overlow_box_content"> <span>Street Style:</span>
                                                                                                    <p>Dallas Fashion Scene</p>
                                                                                                    <a href="#">Kristi and Scot Redman</a> </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="product_des_box">
                                                                                            <div class="product_name">Dallas Food</div>
                                                                                            <div class="price_box">$40</div>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <div class="image_box_bg">
                                                                                            <div class="image_box"><img src="{{ asset('images/food.png') }}" alt="" /></div>
                                                                                            <div class="overlow_box">
                                                                                                <div class="overlow_box_content"> <span>Street Style:</span>
                                                                                                    <p>Dallas Fashion Scene</p>
                                                                                                    <a href="#">Kristi and Scot Redman</a> </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="product_des_box">
                                                                                            <div class="product_name">Dallas Food</div>
                                                                                            <div class="price_box">$40</div>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <div class="image_box_bg">
                                                                                            <div class="image_box"><img src="{{ asset('images/food.png') }}" alt="" /></div>
                                                                                            <div class="overlow_box">
                                                                                                <div class="overlow_box_content"> <span>Street Style:</span>
                                                                                                    <p>Dallas Fashion Scene</p>
                                                                                                    <a href="#">Kristi and Scot Redman</a> </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="product_des_box">
                                                                                            <div class="product_name">Dallas Food</div>
                                                                                            <div class="price_box">$40</div>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <div class="image_box_bg">
                                                                                            <div class="image_box"><img src="{{ asset('images/food.png') }}" alt="" /></div>
                                                                                            <div class="overlow_box">
                                                                                                <div class="overlow_box_content"> <span>Street Style:</span>
                                                                                                    <p>Dallas Fashion Scene</p>
                                                                                                    <a href="#">Kristi and Scot Redman</a> </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="product_des_box">
                                                                                            <div class="product_name">Dallas Food</div>
                                                                                            <div class="price_box">$40</div>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li>
                                                                                        <div class="image_box_bg">
                                                                                            <div class="image_box"><img src="{{ asset('images/food.png') }}" alt="" /></div>
                                                                                            <div class="overlow_box">
                                                                                                <div class="overlow_box_content"> <span>Street Style:</span>
                                                                                                    <p>Dallas Fashion Scene</p>
                                                                                                    <a href="#">Kristi and Scot Redman</a> </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="product_des_box">
                                                                                            <div class="product_name">Dallas Food</div>
                                                                                            <div class="price_box">$40</div>
                                                                                        </div>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>


                                    <?php $AdvertisementImage = Text::AdvertisementImage('3', '3', '1');
                                    ?>
                                    @foreach($AdvertisementImage as $AdvertisementImag)
                                    <div class="add_image_box">
                                        @if($AdvertisementImag->type==1)
                                        <a href="#"><img src="{{$AdvertisementImag->image_url}}"/></a>
                                        @else 
                                        <?php echo htmlspecialchars_decode($AdvertisementImag->googlescript); ?>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>

                                <div id="tab2" class="tab_content">2</div>

                                <div id="tab3" class="tab_content">3</div>

                            </div>

                        </div>
                    </div>

                    <div class="detail_right_coulm">
                        <div class="last_update_tag">  {{{ trans('site/site.Last_update') }}}:
                            {{ date('d F,  Y', strtotime($Data->updated_at)) }}
                        </div>
                        <div class="detail_right_coulm_inner">

                            <div class="detail_right_row">
                                <div class="branches_box">
                                    @if($Data->address!=null) 
                                    <div class="right_row_box_head">
                                        <i><a href="#mapCLik"><img src="{{ asset('images/d_icon1.png') }}"/></a></i>

                                        <?php
                                        $ADDRESS_E = $Data->address;

                                        if ($Data->district != null) {
                                            $districtname = Text::districtname($Data->district);
                                            $ADDRESS_E = $ADDRESS_E . ',' . $districtname->name_e;
                                        }
                                        if ($Data->region != null) {
                                            $regionname = Text::regionname($Data->region);
                                            $ADDRESS_E = $ADDRESS_E . ',' . $regionname->name_e;
                                        }

                                        $ADDRESS_E = trim($ADDRESS_E, ",");
                                        $ADDRESS_E = str_replace(",,", ",", $ADDRESS_E);

                                        $ADDRESS_CH = $Data->address_c;


                                        if ($Data->district_c != null) {

                                            $districtname = Text::districtname($Data->district);
                                            $ADDRESS_CH =$districtname->name_c.$ADDRESS_CH ;
                                        }
                                        if ($Data->region_c != null) {
                                            $regionname = Text::regionname($Data->region);
                                            $ADDRESS_CH =  $regionname->name_c.$ADDRESS_CH;
                                        }
                                        ?>


                                        <span> 

                                            @if(App::getLocale()=="en") 
                                            {{  $ADDRESS_E }} @else  {{$ADDRESS_CH}} @endif 
                                        </span>
                                    </div>
                                    @endif


                                    @if(count($DataOtherShop)>1)
                                    <div class="branches_bg">
                                        <div class="branches">
                                            <p>{{{ trans('site/site.Branches') }}} ({{count($DataOtherShop)-1}})</p>
                                        </div> 

                                        <div class="branches_inner_list">
                                            <?php $temp = 1; ?>
                                            @foreach($DataOtherShop as $DataOther)
                                            @if($DataOther->id!=$Data->id)
                                            @if($temp<4)
                                            <div class="branches_list">

                                                <a href="{{URL::to('Shops/'.base64_encode($DataOther->id).'/ShopDetail')}}">
                                                    <div class="branch_thumb">

                                                        <?php if (@getimagesize($DataOther->shop_image_1)) { ?>
                                                            <img src="{{$DataOther->shop_image_1}}" alt="" />
                                                        <?php } else { ?>
                                                            <img src="{{ asset('images/noimage.png') }}" alt="" />
                                                        <?php } ?>



                                                    </div>
                                                    <div class="branch_thumb_des">
                                                        <h2>
                                                            @if(App::getLocale()=="en")   {{$DataOther->shop_name }}@else    {{$DataOther->shop_name_c }} @endif 
                                                        </h2>
                                                        <p> 
                                                            
                                                            <?php $BRdistrictname = Text::districtname($DataOther->district); ?> 
                                                          @if($BRdistrictname!=null)
                                                            @if(App::getLocale()=="en")   {{$BRdistrictname->name_e }}@else     {{$BRdistrictname->name_c }} @endif   </p>
                                                           @endif
                                                    </div>
                                                </a>
                                            </div>
                                            @endif
                                            <?php $temp++; ?>
                                            @endif
                                            @endforeach 

                                            @if(count($DataOtherShop)>3)
                                            <div class="show_all_button">
                                                <a href="{{URL::to('Shops/'.base64_encode($Data->id).'/Branches')}}">{{{ trans('site/site.Show_All_Branches') }}}</a>
                                            </div>
                                            @endif

                                        </div>   
                                    </div> 
                                    @endif



                                </div>
                            </div>


                            @if(($Data->mondayopen !='00:00:00') || ($Data->tuesdayopen !='00:00:00') || ($Data->wednesdayopen !='00:00:00')|| ($Data->thursdayopen !='00:00:00')|| ($Data->fridayopen !='00:00:00')||($Data->saturdayopen !='00:00:00')|| ($Data->sundayopen !='00:00:00')|| ($Data->public_holidayopen !='00:00:00'))

                            <div class="detail_right_row">
                                <div class="day_box_bg">
                                    <div class="day_icon"><img src="{{ asset('images/d_icon2.png') }}"/></div>
                                    <div class="day_list">
                                        <ul>
                                            @if($Data->mondayopen)
                                            @if(date('i', strtotime($Data->mondayopen)) > 0 || date('G', strtotime($Data->mondayopen)) > 0 )
                                            <li>
                                                <span>{{{ trans('site/site.Monday') }}}</span>
                                                <p>
                                                    {{ date('G:i A', strtotime($Data->mondayopen)) }}-
                                                    {{ date('G:i A', strtotime($Data->mondayclosed)) }}
                                                </p>
                                            </li>
                                            @endif
                                            @endif
                                            @if($Data->tuesdayopen)
                                            @if(date('i', strtotime($Data->tuesdayopen)) > 0 || date('G', strtotime($Data->tuesdayopen)) > 0 )
                                            <li>
                                                <span>{{{ trans('site/site.Tuesday') }}}</span>
                                                <p>
                                                    {{ date('G:i A', strtotime($Data->tuesdayopen)) }}-
                                                    {{ date('G:i A', strtotime($Data->tuesdayclosed)) }}
                                                </p>
                                            </li>
                                            @endif
                                            @endif
                                            @if($Data->wednesdayopen)
                                            @if(date('i', strtotime($Data->wednesdayopen)) > 0 || date('G', strtotime($Data->wednesdayopen)) > 0 )
                                            <li>
                                                <span>{{{ trans('site/site.Wednesday') }}}</span>
                                                <p>
                                                    {{ date('G:i A', strtotime($Data->wednesdayopen)) }}-
                                                    {{ date('G:i A', strtotime($Data->wednesdayclosed)) }}
                                                </p>
                                            </li>
                                            @endif  
                                            @endif

                                            @if($Data->thursdayopen)
                                            @if(date('i', strtotime($Data->thursdayopen)) > 0 || date('G', strtotime($Data->thursdayopen)) > 0 )
                                            <li>
                                                <span>{{{ trans('site/site.Thursday') }}}</span>
                                                <p>
                                                    {{ date('G:i A', strtotime($Data->thursdayopen)) }}-
                                                    {{ date('G:i A', strtotime($Data->thursdayclosed)) }}
                                                </p>
                                            </li>
                                            @endif
                                            @endif
                                            @if($Data->fridayopen)
                                            @if(date('i', strtotime($Data->fridayopen)) > 0 || date('G', strtotime($Data->fridayopen)) > 0 )
                                            <li>
                                                <span>{{{ trans('site/site.Friday') }}}</span>
                                                <p>
                                                    {{ date('G:i A', strtotime($Data->fridayopen)) }}-
                                                    {{ date('G:i A', strtotime($Data->fridayclosed)) }}
                                                </p>
                                            </li>
                                            @endif
                                            @endif
                                            @if($Data->saturdayopen)
                                            @if(date('i', strtotime($Data->saturdayopen)) > 0 || date('G', strtotime($Data->saturdayopen)) > 0 )
                                            <li>
                                                <span>{{{ trans('site/site.Saturday') }}}</span>
                                                <p>
                                                    {{ date('G:i A', strtotime($Data->saturdayopen)) }}-
                                                    {{ date('G:i A', strtotime($Data->saturdayclosed)) }}
                                                </p>
                                            </li>
                                            @endif
                                            @endif
                                            @if($Data->sundayopen)
                                            @if(date('i', strtotime($Data->sundayopen)) > 0 || date('G', strtotime($Data->sundayopen)) > 0 )
                                            <li>
                                                <span>{{{ trans('site/site.Sunday') }}}</span>
                                                <p>
                                                    {{ date('G:i A', strtotime($Data->sundayopen)) }}-
                                                    {{ date('G:i A', strtotime($Data->sundayclosed)) }}
                                                </p>
                                            </li>
                                            @endif
                                            @endif

                                            @if($Data->public_holidayopen)
                                            @if(date('i', strtotime($Data->public_holidayopen)) > 0 || date('G', strtotime($Data->public_holidayopen)) > 0 )
                                            <li>
                                                <span>{{{ trans('site/site.Public_Holiday') }}}</span>
                                                <p>
                                                    {{ date('G:i A', strtotime($Data->public_holidayopen)) }}-
                                                    {{ date('G:i A', strtotime($Data->public_holidayclosed)) }}
                                                </p>
                                            </li>
                                            @endif
                                            @endif
                                        </ul>
                                    </div>

                                </div>

                            </div>

                            @endif

                            @if(isset($Data->contact_phone_1))
                            <div class="detail_right_row">
                                <div class="right_row_box_head">
                                    <i><img src="{{ asset('images/d_icon3.png') }}"></i>
                                    <span>{{$Data->contact_phone_1}} 
                                        @if(isset($Data->contact_phone_2))
                                        , {{$Data->contact_phone_2}}
                                        @endif
                                    </span>
                                </div>
                            </div>
                            @endif


                            @if(isset($Data->contact_email))
                            <div class="detail_right_row">
                                <div class="right_row_box_head">
                                    <i><img src="{{ asset('images/d_icon36.png') }}"></i>

                                    <a href="mailto:{{$Data->contact_email}}"> <span>{{$Data->contact_email}}</span></a>
                                </div>
                            </div>
                            @endif

                            @if(isset($Data->website_english))
                            <div class="detail_right_row">
                                <div class="right_row_box_head">
                                    <i><img src="{{ asset('images/d_icon37.png') }}"></i>

                                    <a href="{{$Data->website_english}}" target="_blank" > <span>{{$Data->website_english}}</span></a>
                                </div>
                            </div>
                            @endif

                            <?php $priceRangeConfig = Config::get('constants.pricerange'); ?>

                            @if(isset($Data->price_range))
                            @if($Data->price_range != null)

                            <?php $pricerange = explode(',', $Data->price_range) ?>                 


                            <div class="detail_right_row">
                                <div class="right_row_box_head">
                                    <i><img src="{{ asset('images/d_icon4.png') }}"></i>
                                    <ul>
                                        @foreach($pricerange as $peicevalue)
                                        <li>
                                            <span  >                                     
                                                {{$priceRangeConfig[$peicevalue]}}  
                                            </span>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                            @endif

                            @if($Data->payment_option != null)
                            <div class="detail_right_row">
                                <div class="card_list">
                                    <ul>@if(isset($Data->payment_option))
                                        @if($Data->payment_option != null)
                                        <?php $pyment = explode(',', $Data->payment_option) ?>                 

                                        @if (in_array('1', $pyment)) 
                                        <li><a href="#"><img src="{{ asset('images/c_icon2.png') }}"/></a></li>
                                        @endif 

                                        @if (in_array('2', $pyment)) 

                                        <li><a href="#"><img src="{{ asset('images/c_icon1.png') }}"/></a></li>
                                        @endif 


                                        @if (in_array('3', $pyment)) 

                                        <li><a href="#"><img src="{{ asset('images/c_icon3.png') }}"/></a></li>
                                        @endif 

                                        @if (in_array('4', $pyment)) 

                                        <li><a href="#"><img src="{{ asset('images/c_icon5.png') }}"/></a></li>
                                        @endif 


                                        @if (in_array('5', $pyment)) 


                                        @endif 
                                        @if (in_array('6', $pyment)) 

                                        <li><a href="#"><img src="{{ asset('images/c_icon6.png') }}"/></a></li>
                                        @endif 

                                        @if (in_array('7', $pyment)) 
                                        <li><a href="#"><img src="{{ asset('images/c_icon4.png') }}"/></a></li>

                                        @endif 
                                        @if (in_array('8', $pyment)) 
                                        <li><a href="#"><img src="{{ asset('images/c_icon7.png') }}"/></a></li>

                                        @endif 



                                        @endif
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            @endif

                            @if( $Data->facebook!=null || $Data->twitter!=null || $Data->pinterest !=null || $Data->instagram !=null || $Data->weibo !=null)
                            <div class="detail_right_row">
                                <div class="card_list">
                                    <ul>   
                                        @if((isset($Data->facebook)) && $Data->facebook!=null)
                                        <li><a href="{{$Data->facebook}}" target="_blank"><img src="{{ asset('images/s_icon1.png') }}"/></a></li>
                                        @endif

                                        @if((isset($Data->twitter)) && $Data->twitter!=null)
                                        <li><a href="{{$Data->twitter}}" target="_blank"><img src="{{ asset('images/s_icon2.png') }}"/></a></li>
                                        @endif
                                        @if((isset($Data->pinterest )) && $Data->pinterest !=null)
                                        <li><a href="{{$Data->pinterest }}" target="_blank"><img src="{{ asset('images/s_icon3.png') }}"/></a></li>
                                        @endif

                                        @if((isset($Data->instagram )) && $Data->instagram !=null)
                                        <li><a href="{{$Data->instagram }}" target="_blank"><img src="{{ asset('images/s_icon4.png') }}"/></a></li>
                                        @endif

                                        @if((isset($Data->weibo )) && $Data->weibo !=null)
                                        <li><a href="{{$Data->weibo }}" target="_blank"><img src="{{ asset('images/s_icon5.png') }}"/></a></li>
                                        @endif

                                    </ul>
                                </div>
                            </div>
                            @endif





                            <div class="detail_right_row">
                                <h1>{{{ trans('site/site.Tags') }}}</h1>
                                <div class="tag_box">
                                    <ul>
                                        <?php $priceRangeConfig = Config::get('constants.ShopType'); ?>


                                        @if(isset($Data->shop_type))
                                        <?php $shopTYPEBD = explode(',', $Data->shop_type); ?>
                                        @foreach($shopTYPEBD as $m=>$s)
                                        <li><a href="#">{{{ trans('site/site.'.$priceRangeConfig[$s]) }}}</a></li>
                                        @endforeach
                                        @endif


                                        @if(isset($Data->shop_type))
                                        <?php $SHOPTYPEMN = explode(',', $Data->shop_type); ?>

                                        @foreach($SHOPTYPEMN as $m=>$s) 
                                        @if($s==1)
                                        <?php $severces = Config::get('constants.FashionCategory'); ?>
                                        <?php $tage = explode(',', $Data->fashion_category); ?>
                                        @endif

                                        @if($s=='2')

                                        <?php $severces = Config::get('constants.BeautyRetailCategory'); ?>
                                        <?php $tage = explode(',', $Data->beauty_retail_category) ?>
                                        @endif

                                        @if($s==3)
                                        <?php $severces = Config::get('constants.BeautyServicingCategory'); ?>
                                        <?php $tage = explode(',', $Data->beauty_service_category) ?>
                                        @endif


                                        @foreach($tage as $tag)
                                        @if($tag<= count($severces))
                                        <li><a href="#">{{{ trans('site/site.'.$severces[$tag]) }}}</a></li>
                                        @endif
                                        @endforeach 

                                        @endforeach

                                        @endif

                                        @if(isset($Data->age_gender))
                                        <?php $gender = explode(',', $Data->age_gender) ?>    

                                        @if (in_array('1', $gender)) 
                                        <li><a href="#">{{{ trans('site/site.Men') }}}</a></li>
                                        @endif   

                                        @if (in_array('2', $gender)) 
                                        <li><a href="#">{{{ trans('site/site.Women') }}}</a></li>
                                        @endif  

                                        @if (in_array('3', $gender)) 
                                        <li><a href="#">{{{ trans('site/site.Infants_Kids') }}}</a></li>
                                        @endif  

                                        @endif


                                    </ul>
                                </div>

                            </div>


                            @if($Data->fitting!= null || $Data->refund!= null   || $Data->exchange != null || $Data->membership != null)
                            <div class="detail_right_row">
                                <h1>{{{ trans('site/site.Other_Information') }}}</h1>
                                <div class="information_list">
                                    <ul>
                                        @if((isset($Data->fitting)) && $Data->fitting !="")
                                        <li>
                                            <i><img src="{{ asset('images/right_tik.png') }}"/></i>
                                            <span class="showhideFitting" style="cursor: pointer;">{{{ trans('site/site.Fitting') }}}  </span>

                                            <span class="Fittingdiv" style="display:none;">
                                                {{$Data->fitting_detail}}  
                                            </span>

                                        </li>
                                        @endif
                                        @if((isset($Data->refund)) && $Data->refund !="")
                                        <li>
                                            <i><img src="{{ asset('images/right_tik.png') }} "/></i>


                                            <span class="showhideRefund" style="cursor: pointer;">{{{ trans('site/site.Refund') }}} </span>

                                            <span class="Refunddiv" style="display:none;">
                                                {{$Data->refund_detail}}  
                                            </span>
                                        </li>
                                        @endif
                                        @if((isset($Data->exchange)) && $Data->exchange !="")
                                        <li>
                                            <i><img src="{{ asset('images/right_tik.png') }}  "/></i>

                                            <span class="showhideExchange" style="cursor: pointer;">{{{ trans('site/site.Exchange') }}} </span>

                                            <span class="Exchangediv" style="display:none;">
                                                {{$Data->exchange_detail}}  
                                            </span>
                                        </li>
                                        @endif
                                        @if((isset($Data->membership)) && $Data->membership !="")
                                        <li>
                                            <i><img src="{{ asset('images/right_tik.png') }}  "/></i>

                                            <span class="showhideMembership" style="cursor: pointer;">{{{ trans('site/site.Membership') }}}</span>

                                            <span class="Membershipdiv" style="display:none;">
                                                {{$Data->membership_detail}}  
                                            </span>
                                        </li>
                                        @endif
                                    </ul>
                                </div>

                            </div>
                            @endif
                            @if((isset($Data->description)) && $Data->description != null )
                            <div class="detail_right_row">
                                <div class="description_box">
                                    <h1>{{{ trans('site/site.Description') }}}:</h1>
                                    <div id="substr1" >
                                        <p>   @if(App::getLocale()=="en") 
                                            <?php $description = $Data->description; ?>
                                            @else  
                                            <?php $description = $Data->description_c; ?>
                                            @endif 

                                            <?php
                                            if (strlen($description) > 300) {
                                                echo substr($description, 0, 300) . '...';
                                            } else {
                                                echo substr($description, 0, 300);
                                            }
                                            ?> 
                                            <?php if (strlen($description) > 300) { ?>  <a href="javascript:void(0)" style="float:none" onclick="morehideshow()"  >{{{ trans('site/site.View_more') }}} </a> <?php } ?>
                                        </p> 

                                    </div>
                                    <div id="substr2" style='display: none'>
                                        <p > 
                                            {{$description}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endif


                        </div>
                    </div>
                </div>

                <a id="mapCLik"></a>
                <div class="detail_map_box" id="map_canvas"  style="width:100%; height:400px">

                </div>

                <!--                <div class="reviews_box">
                                    <h1>Display all 3 Reviews About Shop</h1>
                                    <div class="reviews_list">
                                        <ul>
                                            <li>
                                                <div class="reviews_left">
                                                    <div class="user_pic_bg"><a href="#"><img src="{{ asset('images/user_pic.png') }} "/></a></div>
                                                    <div class="user_pic_des">
                                                        <h3>Stoyan Delev</h3>
                                                        <p>Wow, this is veeeeery helpful ;) thanks! </p>
                                                        <div class="fav_box_bg">
                                                            <a href="#"><img src="{{ asset('images/fav_pink.png') }} "/></a>
                                                            <a href="#"><img src="{{ asset('images/fav_pink.png') }} "/></a>
                                                            <a href="#"><img src="{{ asset('images/fav_pink.png') }} "/></a>
                                                            <a href="#"><img src="{{ asset('images/fav_pink.png') }} "/></a>
                                                            <a href="#"><img src="{{ asset('images/fav_pink.png') }} "/></a>
                                                        </div>
                                                    </div>
                                                </div>
                
                                                <div class="reviews_right">		
                                                    <p>May 7, 2015 1:05 pm </p> 
                                                </div> 
                                            </li>
                
                                            <li>
                                                <div class="reviews_left">
                                                    <div class="user_pic_bg"><a href="#"><img src="{{ asset('images/user_pic.png') }} "/></a></div>
                                                    <div class="user_pic_des">
                                                        <h3>Stoyan Delev</h3>
                                                        <p>Wow, this is veeeeery helpful ;) thanks! </p>
                                                        <div class="fav_box_bg">
                                                            <a href="#"><img src="{{ asset('images/fav_pink.png') }} "/></a>
                                                            <a href="#"><img src="{{ asset('images/fav_pink.png') }} "/></a>
                                                            <a href="#"><img src="{{ asset('images/fav_pink.png') }} "/></a>
                                                            <a href="#"><img src="{{ asset('images/fav_pink.png') }} "/></a>
                                                            <a href="#"><img src="{{ asset('images/fav_pink.png') }} "/></a>
                                                        </div>
                                                    </div>
                                                </div>
                
                                                <div class="reviews_right">		
                                                    <p>May 7, 2015 1:05 pm </p> 
                                                </div> 
                                            </li>
                
                                            <li>
                                                <div class="reviews_left">
                                                    <div class="user_pic_bg"><a href="#"><img src="{{ asset('images/user_pic.png') }} "/></a></div>
                                                    <div class="user_pic_des">
                                                        <h3>Stoyan Delev</h3>
                                                        <p>Wow, this is veeeeery helpful ;) thanks! </p>
                                                        <div class="fav_box_bg">
                                                            <a href="#"><img src="{{ asset('images/fav_pink.png') }} "/></a>
                                                            <a href="#"><img src="{{ asset('images/fav_pink.png') }} "/></a>
                                                            <a href="#"><img src="{{ asset('images/fav_pink.png') }} "/></a>
                                                            <a href="#"><img src="{{ asset('images/fav_pink.png') }} "/></a>
                                                            <a href="#"><img src="{{ asset('images/fav_pink.png') }} "/></a>
                                                        </div>
                                                    </div>
                                                </div>
                
                                                <div class="reviews_right">		
                                                    <p>May 7, 2015 1:05 pm </p> 
                                                </div> 
                                            </li>
                
                                        </ul>
                                    </div> 
                                </div>-->
            </div>

        </div>
    </div>
    <!--product-detail-page-content-end-->

</div>

<script type="text/javascript">
            $(function () {
            $('.showhideFitting').click(function () {
            $(".Fittingdiv").slideToggle();
            });
                    $('.showhideRefund').click(function () {
            $(".Refunddiv").slideToggle();
            });
                    $('.showhideExchange').click(function () {
            $(".Exchangediv").slideToggle();
            });
                    $('.showhideMembership').click(function () {
            $(".Membershipdiv").slideToggle();
            });
            });
            function morehideshow() {
            $("#substr1").hide();
                    $("#substr2").show();
            }




</script>
<?php 
 if (Auth::check()) {
            $userLoginId = Auth::user()->id;
        }else{
         $userLoginId = "";   
        }
 $uSerid = $userLoginId;


?>
<script>
    // rating script
    $(function(){
    $('.rate-btn').mouseover(function(){
    $('.rate-btn').removeClass('rate-btn-hover');
            var therate = $(this).attr('id');
            
            for (var i = therate; i >= 0; i--) {
    $('.rate-btn-' + i).addClass('rate-btn-hover');
    };
    });
            $('.rate-btn').mouseout(function(){
    $('.rate-btn').removeClass('rate-btn-hover');
    });
            $('.rate-btn').click(function(){
    var therate = $(this).attr('id');
            var dataRate = 'user_id={{$uSerid}}&shop_id={{$Data->id}}&p='+therate; //
            $('.rate-btn').removeClass('rate-btn-active');
            for (var i = therate; i >= 0; i--) {
    $('.rate-btn-' + i).addClass('rate-btn-active');
    };
            $.ajax({
            type : "Get",
                    url: "{{ URL::to('/rating') }}",
                    data: dataRate,
                    success:function(){
                    $(".flash-message12").show('slow');
                    setTimeout(function() { 
                    $('.flash-message12').hide('slow'); 
   },5000);
                    
    
                    }
            });
    });
    });
</script>
<!--<script>
    // rating script
    $(function(){
     $('.favorite').click(function(){
     var therate = $(this).attr('id');
            var datafave = 'user_id={{$uSerid}}&fav_shop_id={{$Data->id}}'; //
            
          
            $.ajax({
            type : "Get",
                    url: "{{ URL::to('/favorite') }}",
                    data: datafave,
                    success:function(){
                    $(".flash-message12").show('slow');
                    setTimeout(function() { 
                    $('.flash-message12').hide('slow'); 
   },5000);
                    
    
                    }
            });
    });
    });
</script>-->


@endsection

@stop
