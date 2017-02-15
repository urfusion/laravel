@extends('app')
@section('title') Home :: @parent @stop
@section('content')
    
<?php if (Session::has('letcurrent')!='' && Session::has('lngcurrent')!='') { ?>
 
     <script>
          window.onload = function () {
        $('#letcurrent').val('<?php echo Session::get('letcurrent');  ?>');
        $('#lngcurrent').val('<?php echo Session::get('lngcurrent');  ?>');
    }
    </script>
<?php } else { ?>
   <script>
    window.onload = function () {
        var startPos;
        var geoSuccess = function (position) {
            startPos = position;
            $('#letcurrent').val(startPos.coords.latitude);
            $('#lngcurrent').val(startPos.coords.longitude);

            $.get('{{{ URL::to('') }}}/setsession?letcurrent=' + startPos.coords.latitude + '&lngcurrent=' + startPos.coords.longitude, function (data)
                    {

                    }
            )
        };
        navigator.geolocation.getCurrentPosition(geoSuccess);
    };
</script>
<?php } ?>

<div class="warper">

    <!--refine-search-listing-page-content-here-->
    <div class="page_content refine_search_listing">
        <div class="container">
            <div class="bredcrumb_menu">
                <ul>
                    <li><a href="{{ url('/home') }}"><span>{{{ trans('site/site.Home') }}}</span></a></li>
                     <li><a href="{{ url('/members/dashboard') }}"><span>{{{ trans('site/site.member_dashboard') }}}</span></a></li>
                    <li><a href="#">Favorite Shops</a></li>
                </ul>  
            </div> 
  </div> 

            <div class="refine_search">
                <div class="refine_right">
                    <div class="product_listing">
                      <ul>
               @foreach($data as $Datas)
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

 


            

        </div>


        
    </div>
 
 @endsection

@stop
