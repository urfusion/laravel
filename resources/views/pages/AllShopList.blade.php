@extends('app')
@section('title') Home :: @parent @stop
@section('content')

<div class="warper">

    <!--refine-search-listing-page-content-here-->
    <div class="page_content refine_search_listing">
        <div class="container">
            <div class="bredcrumb_menu">
                <ul>
                    <li><a href="{{ url('/home') }}"><span>{{{ trans('site/site.Home') }}}</span></a></li>
                    <li><a href="#">{{{ trans('site/site.Shops_Listing') }}}</a></li>
                </ul>  
            </div> 

            <div class="filter_box">

                <div class="filter_right">
                    <ul>

                        @if(Input::get('shop_name'))
                        <li><a href="#" data-value="{{ Input::get('shop_name')  }}" data-key="shopname" class="closeFilter" >{{ Input::get('shop_name')  }}</a></li>
                        @endif

                        @if(Input::get('Servicing'))
                        <?php $Servicing = Input::get('Servicing') ?>

                        @if(Input::get('shop_type')==1)
                        <?php $value = Config::get('constants.FashionCategory'); ?>                                

                        @foreach($Servicing as $ServicingI=>$ServicingV)
                        <li><a href="#" data-value="{{ $ServicingV  }}" data-key="Servicing" class="closeFilter" >{{trans('site/site.'.$value[$ServicingV]) }}</a></li>
                        @endforeach


                        @elseif(Input::get('shop_type')==2)
                        <?php $value = Config::get('constants.BeautyRetailCategory'); ?> 

                        @foreach($Servicing as $ServicingI=>$ServicingV)
                        <li><a href="#" data-value="{{ $ServicingV  }}" data-key="Servicing" class="closeFilter" >{{trans('site/site.'.$value[$ServicingV]) }}</a></li>
                        @endforeach

                        @elseif(Input::get('shop_type')==3)
                        <?php $value = Config::get('constants.BeautyServicingCategory'); ?> 
                        @foreach($Servicing as $ServicingI=>$ServicingV)
                        <li><a href="#" data-value="{{ $ServicingV  }}" data-key="Servicing" class="closeFilter" >{{trans('site/site.'.$value[$ServicingV]) }}</a></li>
                        @endforeach                               

                        @endif

                        @else

                        @if(Input::get('shop_type')) 
                        <?php
                        $SHOPTYPEBOXtag = Config::get('constants.ShopType');
                        $typeSEarch = Input::get('shop_type');
                        ?>  

                        <li><a href="#" data-value="{{ $typeSEarch  }}" data-key="ShopType" class="closeFilter" >{{trans('site/site.'.$SHOPTYPEBOXtag[$typeSEarch]) }}</a></li>

                        @endif
@if( Input::get('age_gender'))
@if(in_array('1', Input::get('age_gender'))) 
 
<li><a href="#" data-value="1" data-key="AgeGender" class="closeFilter" >{{{ trans('site/site.Men') }}}</a></li>
@endif
@if(in_array('2', Input::get('age_gender'))) 
<li><a href="#" data-value="2" data-key="AgeGender" class="closeFilter" >{{{ trans('site/site.Women') }}}</a></li>
@endif
@if(in_array('3', Input::get('age_gender'))) 
<li><a href="#" data-value="3" data-key="AgeGender" class="closeFilter" >{{{ trans('site/site.Infants_Kids') }}}</a></li>
@endif
@endif
                        @endif




                        @if(Input::get('landmark'))

                        <li><a href="#" data-value="{{ Input::get('landmark')  }}" data-key="landmark" class="closeFilter" >
                                <?php $landmark = Text::landmarkname(Input::get('landmark')); ?>
                                @if(App::getLocale()=='jp') 
                                <?php $landmartag = $landmark->mall_c; ?>  @if($landmark->landmark_c!=null) <?php $landmartag = $landmartag . '/' . $landmark->landmark_c; ?>@endif  
                                <?php echo trim($landmartag, "/"); ?>
                                @else <?php $landmartag = $landmark->mall_e; ?> 
                                @if($landmark->landmark_e!=null)<?php $landmartag = $landmartag . '/' . $landmark->landmark_e; ?>@endif 
                                <?php echo trim($landmartag, "/"); ?>
                                @endif
                            </a>
                        </li>

                        @else
                        @if(Input::get('district'))
                        <?php $districtname = Text::districtname(Input::get('district')); ?>
                        <li><a href="#" data-value="{{ Input::get('district')  }}" data-key="district" class="closeFilter" >
                                @if(App::getLocale()=='jp'){{$districtname->name_c}}   @else {{$districtname->name_e}}    @endif

                            </a></li>

                        @else
                        @if(Input::get('region'))
                        <?php $regionname = Text::regionname(Input::get('region')); ?>
                        <li><a href="#" data-value="{{ Input::get('region')  }}" data-key="region" class="closeFilter" >
                                @if(App::getLocale()=='jp'){{$regionname->name_c}}   @else {{$regionname->name_e}}    @endif 

                            </a></li>
                        @endif
                        @endif 
                        @endif

                    </ul>
                </div>

            </div> 

            <div class="refine_search">
                <form action="@if(App::getLocale()=='jp'){{ URL::to('/searchpage_c') }}@else{{ URL::to('/searchpage') }}@endif " method="get" >

                    <input type="hidden"  name="_token" value="{{{ csrf_token() }}}" >
                    <input type="hidden" name="shop_name" value="{{ Input::get('shop_name')  }}" >
                    <input type="hidden" name="district" value="{{ Input::get('district')  }}" >
                    <input type="hidden" name="region" value="{{ Input::get('region')  }}" >
                    <input type="hidden" name="landmark" value="{{ Input::get('landmark')  }}" >
                    <input type="hidden" name="shop_type" value="{{ Input::get('shop_type')  }}" >
                    @if(Input::get('Servicing'))


                    @foreach($Servicing as $SER=>$SERV)
                    <input type="hidden" name="Servicing[]" value="{{ $SERV }}" >
                    @endforeach

                    @endif



                    <div class="refine_left">
                        <h1>{{{ trans('site/site.Refine_by') }}}</h1>
                        <div class="cat_box">
                            <h3 id="nearbytogale" style="cursor: pointer" class="mknear_by">Near by</h3>
                            <input type="hidden" name="letcurrent" id="letcurrent" value="{{ Input::get('letcurrent')  }}" >
                              <input type="hidden" name="lngcurrent" id="lngcurrent" value="{{ Input::get('letcurrent')  }}" >
<!--                                 <h1  style="cursor: pointer" id="nearbytogale" class="near_by">Near by</h1>-->

                            <div id="nearbytogaleh" style="display: none;"> 
                                <ul> 
                                                                                                                                                
                                    <li>
                                        <div class="checkbox">
                                            <input type="checkbox" value=".5"  name="nearby" @if(null !==Input::get('nearby'))  @if (Input::get('nearby')==.5 ) checked  @endif @endif></div>
                                        <label>300M</label>
                                    </li> 
 
                                </ul>
                                <div class="Refine_clear"> 
                                    <input type="submit" name="refine" value="Refine" class="refine_filter">
                                    <a href="javascript:void(0)" onclick="clearFun('nearby');" class="clear_filter">Clear</a>
                                </div>
                            </div>

                        </div>
                        <!--                        <h1 class="near_by">Near by</h1>-->
                        @if(Input::get('shop_type')!=3)
                        <div class="cat_box">
                            <h2 id="shoptypetogal" style="cursor: pointer">{{{ trans('site/site.Shop_Type') }}}</h2>

                            <div  id="shoptypetogalsh"style="display: none;"> 
                                <ul>
                                    @if(Input::get('shop_type')==1)

                                    <?php $ShopTypeo = Config::get('constants.ShopTypeo1') ?>  
                                    @foreach($ShopTypeo as $index => $value)
                                    @if($index!=null)

                                    <li>
                                        <div class="checkbox">
                                            <input name="ShopType[]" value="{{$index}}"  type="checkbox" @if(null !==Input::get('ShopType'))  @if (in_array($index, Input::get('ShopType'))) checked  @endif @endif/></div>
                                        <label>{{{ trans('site/site.'.$value) }}}</label>
                                    </li> 

                                    @endif
                                    @endforeach
                                    @elseif(Input::get('shop_type')==2)
                                    <?php $ShopTypeo = Config::get('constants.ShopTypeo2') ?>  
                                    @foreach($ShopTypeo as $index => $value)
                                    @if($index!=null)
                                    <li>
                                        <div class="checkbox">
                                            <input name="ShopType[]" value="{{$index}}"  type="checkbox"   @if(null !==Input::get('ShopType'))  @if (in_array($index, Input::get('ShopType'))) checked  @endif @endif/></div>
                                        <label>{{{ trans('site/site.'.$value) }}}</label>
                                    </li> 
                                    @endif
                                    @endforeach
                                    @elseif(Input::get('shop_type')==3)
                                    <?php $ShopTypeo = Config::get('constants.ShopTypeo3') ?>  
                                    @foreach($ShopTypeo as $index => $value)
                                    @if($index!=null)
                                    <li>
                                        <div class="checkbox">
                                            <input name="ShopType[]" value="{{$index}}"  type="checkbox" @if(null !==Input::get('ShopType'))  @if (in_array($index, Input::get('ShopType'))) checked  @endif @endif/></div>
                                        <label>{{{ trans('site/site.'.$value) }}}</label>
                                    </li> 
                                    @endif
                                    @endforeach
                                    @else
                                    <?php $ShopTypeo = Config::get('constants.ShopTypeo1') ?>  
                                    @foreach($ShopTypeo as $index => $value)
                                    @if($index!=null)
                                    <li>
                                        <div class="checkbox">
                                            <input name="ShopType[]" value="{{$index}}"  type="checkbox" @if(null !==Input::get('ShopType'))  @if (in_array($index, Input::get('ShopType'))) checked  @endif @endif/></div>
                                        <label>{{{ trans('site/site.'.$value) }}}</label>
                                    </li> 
                                    @endif
                                    @endforeach
                                    @endif 



                                </ul>
                                <div class="Refine_clear"> 
                                    <input class="refine_filter" type="submit" value="{{{ trans('site/site.Refine') }}}" name="refine">
                                    <a class="clear_filter" onclick="clearFun('ShopType');" href="javascript:void(0)">{{{ trans('site/site.Clear') }}}</a>
                                </div>
                            </div>

                        </div>	

                        <div class="cat_box">
                            <h2  id="agegentogal" style="cursor: pointer">{{{ trans('site/site.Age_and_Gender') }}} </h2>
                            <div id="agegentogalsh"style="display: none;">
                                <ul>
                                    <li>
                                        <div class="checkbox"><input name="age_gender[]" value="1"  type="checkbox" @if(null !==Input::get('age_gender'))  @if (in_array('1', Input::get('age_gender'))) checked  @endif @endif/></div>
                                        <label>{{{ trans('site/site.Men') }}} </label>
                                    </li> 

                                    <li>
                                        <div class="checkbox"><input name="age_gender[]" value="2" type="checkbox" @if(null !==Input::get('age_gender'))  @if (in_array('2', Input::get('age_gender'))) checked  @endif @endif/></div>
                                        <label>{{{ trans('site/site.Women') }}}</label>
                                    </li> 

                                    <li>
                                        <div class="checkbox"><input name="age_gender[]" value="3"  type="checkbox" @if(null !==Input::get('age_gender'))  @if (in_array('3', Input::get('age_gender'))) checked  @endif @endif/></div>
                                        <label>{{{ trans('site/site.Infants_Kids') }}}</label>
                                    </li> 
                                </ul>
                                <div class="Refine_clear"> 
                                    <input class="refine_filter" type="submit" value="{{{ trans('site/site.Refine') }}}" name="refine">
                                    <a class="clear_filter" onclick="clearFun('age_gender');" href="javascript:void(0)">{{{ trans('site/site.Clear') }}}</a>
                                </div>
                            </div>
                        </div>	
                        @endif 
                        <div class="cat_box">
                            <h2 id="Pricetogal" style="cursor: pointer" >{{{ trans('site/site.Price_Range') }}}</h2>
                            <div id="Pricetogalsh"style="display: none;">   <ul>
                                    <?php $pricerange = Config::get('constants.pricerange') ?>  

                                    @foreach($pricerange as $pindex => $pvalue)
                                    <li> 
                                        <div class="checkbox"><input name="price_range[]" type="checkbox" value="{{$pindex}}" @if(null !==Input::get('price_range'))  @if (in_array($pindex, Input::get('price_range'))) checked  @endif @endif/></div>
                                        <label>{{$pvalue}}</label>
                                    </li> 
                                    @endforeach

                                </ul>
                                <div class="Refine_clear"> 
                                    <input class="refine_filter" type="submit" value="{{{ trans('site/site.Refine') }}}" name="refine">
                                    <a class="clear_filter" onclick="clearFun('price_range');" href="javascript:void(0)">{{{ trans('site/site.Clear') }}}</a>
                                </div>
                            </div>
                        </div>	 

<!--                        <div class="add_banner">
                            <a href="#"><img src="{{ asset('images/banner02.png') }}"/></a>
                        </div>-->
<div>
<!--                            <a href="#"><img src="{{ asset('images/banner02.png') }}"/></a>-->
                            <?php $AdvertisementImage = Text::AdvertisementImage('2', '3', '1') ?>
                    @foreach($AdvertisementImage as $AdvertisementImag)
                    <div class="add_banner">
                        @if($AdvertisementImag->type==1)
                        <a href="#"><img src="{{$AdvertisementImag->image_url}}"/></a>
                        @else 
                        <?php echo htmlspecialchars_decode($AdvertisementImag->googlescript); ?>

                        @endif

                        </div>
 
                    @endforeach </div>
                    </div>
                </form>
                <div class="refine_right">
                    <div class="product_listing">
                        <ul id="moreshopApend">

                            @foreach($data as $Datas)

                            <li>
                                <h2>  <a href="{{URL::to('Shops/'.base64_encode($Datas->id).'/ShopDetail')}}"> 
                                        @if(App::getLocale()=="en")  {{$Datas->shop_name}} @else  {{$Datas->shop_name_c}} @endif 
                                    </a></h2> 
                                <div class="product_inner_des">
                                    <div class="product_image_box"><a href="{{URL::to('Shops/'.base64_encode($Datas->id).'/ShopDetail')}}">

                                            <?php if (  $Datas->shop_image_1  ) { ?>
                                                <img src="{{$Datas->shop_image_1}}" alt="" />
                                            <?php } elseif  ( $Datas->shop_image_2  ) { ?>
                                                 <img src="{{$Datas->shop_image_2}}" alt="" />
                                               
                                            <?php } elseif  ( $Datas->shop_image_3  ) { ?>
                                                 <img src="{{$Datas->shop_image_3}}" alt="" />
                                             
                                            <?php } elseif  ( $Datas->shop_image_4  ) { ?>
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
                                                $addressString = trim($addressString . $Datas->address_c);
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
                                                if (strlen($TAG) > 55) {

                                                    $TAG = substr($TAG, 0, 55);
                                                    $TAG = trim($TAG);
                                                    $TAG = trim($TAG, "/");
                                                    $TAG = htmlentities($TAG, ENT_QUOTES | ENT_IGNORE, "UTF-8");
                                                     
                                                    echo trim($TAG, "/") . '...';
                                                } else {
                                                    $TAG = trim($TAG);
                                                    $TAG = htmlentities(trim($TAG, "/"));
                                                    echo $TAG = trim($TAG, "/");
                                                }
                                                ?>

                                            </span></div>
                                        <!--                                        <a href="#" class="sponsor_text">Sponsor</a>-->
                                    </div>
                                </div>
                            </li>  
                            @endforeach

                            <?php // $data->appends(array('date-from' => Input::get('date-from'), 'date-to' => Input::get('date-to'),)); ?>
                           
                            <!--                            <li>
                                                            <h2>Gianni's Trattoria Italiana</h2> 
                                                            <div class="product_inner_des">
                                                                <div class="product_image_box"><a href="#"><img src="images/pr01.png"/></a></div>
                                                                <div class="product_image_des">
                                                                    <div class="des_row"><i><img src="images/home_icon.png"/></i><span>2/F, Shining building, 477-48 Jaffe Road Sydney Australia </span></div>
                                                                    <div class="des_row"><i><img src="images/phone_icon.png"/></i><span>90xxxxxxxxx</span></div>
                                                                    <div class="des_row"><i><img src="images/edit_icon.png"/></i><span>Fashion / Beauty Retail / Beauty Servicing)</span></div>
                                                                    <a href="#" class="sponsor_text">Sponsor</a>
                                                                </div>
                                                            </div>
                                                        </li>  -->


                            <!--                            <li>
                                                            <h2>Gianni's Trattoria Italiana</h2> 
                                                            <div class="product_inner_des">
                                                                <div class="product_image_box"><a href="#"><img src="images/pr01.png"/></a></div>
                                                                <div class="product_image_des">
                                                                    <div class="des_row"><i><img src="images/home_icon.png"/></i><span>2/F, Shining building, 477-48 Jaffe Road Sydney Australia </span></div>
                                                                    <div class="des_row"><i><img src="images/phone_icon.png"/></i><span>90xxxxxxxxx</span></div>
                                                                    <div class="des_row"><i><img src="images/edit_icon.png"/></i><span>Fashion / Beauty Retail / Beauty Servicing)</span></div>
                                                                    <a href="#" class="sponsor_text">Sponsor</a>
                                                                </div>
                                                            </div>
                                                        </li>  -->

                            <!--                            <li>
                                                            <h2>Gianni's Trattoria Italiana</h2> 
                                                            <div class="product_inner_des">
                                                                <div class="product_image_box"><a href="#"><img src="images/pr01.png"/></a></div>
                                                                <div class="product_image_des">
                                                                    <div class="des_row"><i><img src="images/home_icon.png"/></i><span>2/F, Shining building, 477-48 Jaffe Road Sydney Australia </span></div>
                                                                    <div class="des_row"><i><img src="images/phone_icon.png"/></i><span>90xxxxxxxxx</span></div>
                                                                    <div class="des_row"><i><img src="images/edit_icon.png"/></i><span>Fashion / Beauty Retail / Beauty Servicing)</span></div>
                                                                </div>
                                                            </div>
                                                        </li> -->

                            <!--                            <li>
                                                            <h2>Gianni's Trattoria Italiana</h2> 
                                                            <div class="product_inner_des">
                                                                <div class="product_image_box"><a href="#"><img src="images/pr01.png"/></a></div>
                                                                <div class="product_image_des">
                                                                    <div class="des_row"><i><img src="images/home_icon.png"/></i><span>2/F, Shining building, 477-48 Jaffe Road Sydney Australia </span></div>
                                                                    <div class="des_row"><i><img src="images/phone_icon.png"/></i><span>90xxxxxxxxx</span></div>
                                                                    <div class="des_row"><i><img src="images/edit_icon.png"/></i><span>Fashion / Beauty Retail / Beauty Servicing)</span></div>
                                                                </div>
                                                            </div>
                                                        </li>  	  -->

                            <!--                            <li>
                                                            <h2>Gianni's Trattoria Italiana</h2> 
                                                            <div class="product_inner_des">
                                                                <div class="product_image_box"><a href="#"><img src="images/pr01.png"/></a></div>
                                                                <div class="product_image_des">
                                                                    <div class="des_row"><i><img src="images/home_icon.png"/></i><span>2/F, Shining building, 477-48 Jaffe Road Sydney Australia </span></div>
                                                                    <div class="des_row"><i><img src="images/phone_icon.png"/></i><span>90xxxxxxxxx</span></div>
                                                                    <div class="des_row"><i><img src="images/edit_icon.png"/></i><span>Fashion / Beauty Retail / Beauty Servicing)</span></div>
                                                                </div>
                                                            </div>
                                                        </li> -->

                            <!--                            <li>
                                                            <h2>Gianni's Trattoria Italiana</h2> 
                                                            <div class="product_inner_des">
                                                                <div class="product_image_box"><a href="#"><img src="images/pr01.png"/></a></div>
                                                                <div class="product_image_des">
                                                                    <div class="des_row"><i><img src="images/home_icon.png"/></i><span>2/F, Shining building, 477-48 Jaffe Road Sydney Australia </span></div>
                                                                    <div class="des_row"><i><img src="images/phone_icon.png"/></i><span>90xxxxxxxxx</span></div>
                                                                    <div class="des_row"><i><img src="images/edit_icon.png"/></i><span>Fashion / Beauty Retail / Beauty Servicing)</span></div>
                                                                </div>
                                                            </div>
                                                        </li> -->

                            <!--                            <li>
                                                            <h2>Gianni's Trattoria Italiana</h2> 
                                                            <div class="product_inner_des">
                                                                <div class="product_image_box"><a href="#"><img src="images/pr01.png"/></a></div>
                                                                <div class="product_image_des">
                                                                    <div class="des_row"><i><img src="images/home_icon.png"/></i><span>2/F, Shining building, 477-48 Jaffe Road Sydney Australia </span></div>
                                                                    <div class="des_row"><i><img src="images/phone_icon.png"/></i><span>90xxxxxxxxx</span></div>
                                                                    <div class="des_row"><i><img src="images/edit_icon.png"/></i><span>Fashion / Beauty Retail / Beauty Servicing)</span></div>
                                                                </div>
                                                            </div>
                                                        </li>  	  -->

                            <!--                            <li>
                                                            <h2>Gianni's Trattoria Italiana</h2> 
                                                            <div class="product_inner_des">
                                                                <div class="product_image_box"><a href="#"><img src="images/pr01.png"/></a></div>
                                                                <div class="product_image_des">
                                                                    <div class="des_row"><i><img src="images/home_icon.png"/></i><span>2/F, Shining building, 477-48 Jaffe Road Sydney Australia </span></div>
                                                                    <div class="des_row"><i><img src="images/phone_icon.png"/></i><span>90xxxxxxxxx</span></div>
                                                                    <div class="des_row"><i><img src="images/edit_icon.png"/></i><span>Fashion / Beauty Retail / Beauty Servicing)</span></div>
                                                                </div>
                                                            </div>
                                                        </li> -->

                            <!--                            <li>
                                                            <h2>Gianni's Trattoria Italiana</h2> 
                                                            <div class="product_inner_des">
                                                                <div class="product_image_box"><a href="#"><img src="images/pr01.png"/></a></div>
                                                                <div class="product_image_des">
                                                                    <div class="des_row"><i><img src="images/home_icon.png"/></i><span>2/F, Shining building, 477-48 Jaffe Road Sydney Australia </span></div>
                                                                    <div class="des_row"><i><img src="images/phone_icon.png"/></i><span>90xxxxxxxxx</span></div>
                                                                    <div class="des_row"><i><img src="images/edit_icon.png"/></i><span>Fashion / Beauty Retail / Beauty Servicing)</span></div>
                                                                </div>
                                                            </div>
                                                        </li> -->

                            <!--                            <li>
                                                            <h2>Gianni's Trattoria Italiana</h2> 
                                                            <div class="product_inner_des">
                                                                <div class="product_image_box"><a href="#"><img src="images/pr01.png"/></a></div>
                                                                <div class="product_image_des">
                                                                    <div class="des_row"><i><img src="images/home_icon.png"/></i><span>2/F, Shining building, 477-48 Jaffe Road Sydney Australia </span></div>
                                                                    <div class="des_row"><i><img src="images/phone_icon.png"/></i><span>90xxxxxxxxx</span></div>
                                                                    <div class="des_row"><i><img src="images/edit_icon.png"/></i><span>Fashion / Beauty Retail / Beauty Servicing)</span></div>
                                                                </div>
                                                            </div>
                                                        </li>  	  -->

                            <!--                            <li>
                                                            <h2>Gianni's Trattoria Italiana</h2> 
                                                            <div class="product_inner_des">
                                                                <div class="product_image_box"><a href="#"><img src="images/pr01.png"/></a></div>
                                                                <div class="product_image_des">
                                                                    <div class="des_row"><i><img src="images/home_icon.png"/></i><span>2/F, Shining building, 477-48 Jaffe Road Sydney Australia </span></div>
                                                                    <div class="des_row"><i><img src="images/phone_icon.png"/></i><span>90xxxxxxxxx</span></div>
                                                                    <div class="des_row"><i><img src="images/edit_icon.png"/></i><span>Fashion / Beauty Retail / Beauty Servicing)</span></div>
                                                                </div>
                                                            </div>
                                                        </li> -->


                            <!--                            <li>
                                                            <h2>Gianni's Trattoria Italiana</h2> 
                                                            <div class="product_inner_des">
                                                                <div class="product_image_box"><a href="#"><img src="images/pr01.png"/></a></div>
                                                                <div class="product_image_des">
                                                                    <div class="des_row"><i><img src="images/home_icon.png"/></i><span>2/F, Shining building, 477-48 Jaffe Road Sydney Australia </span></div>
                                                                    <div class="des_row"><i><img src="images/phone_icon.png"/></i><span>90xxxxxxxxx</span></div>
                                                                    <div class="des_row"><i><img src="images/edit_icon.png"/></i><span>Fashion / Beauty Retail / Beauty Servicing)</span></div>
                                                                </div>
                                                            </div>
                                                        </li> -->

                            <!--                            <li>
                                                            <h2>Gianni's Trattoria Italiana</h2> 
                                                            <div class="product_inner_des">
                                                                <div class="product_image_box"><a href="#"><img src="images/pr01.png"/></a></div>
                                                                <div class="product_image_des">
                                                                    <div class="des_row"><i><img src="images/home_icon.png"/></i><span>2/F, Shining building, 477-48 Jaffe Road Sydney Australia </span></div>
                                                                    <div class="des_row"><i><img src="images/phone_icon.png"/></i><span>90xxxxxxxxx</span></div>
                                                                    <div class="des_row"><i><img src="images/edit_icon.png"/></i><span>Fashion / Beauty Retail / Beauty Servicing)</span></div>
                                                                </div>
                                                            </div>
                                                        </li>  	  -->

                            <!--                            <li>
                                                            <h2>Gianni's Trattoria Italiana</h2> 
                                                            <div class="product_inner_des">
                                                                <div class="product_image_box"><a href="#"><img src="images/pr01.png"/></a></div>
                                                                <div class="product_image_des">
                                                                    <div class="des_row"><i><img src="images/home_icon.png"/></i><span>2/F, Shining building, 477-48 Jaffe Road Sydney Australia </span></div>
                                                                    <div class="des_row"><i><img src="images/phone_icon.png"/></i><span>90xxxxxxxxx</span></div>
                                                                    <div class="des_row"><i><img src="images/edit_icon.png"/></i><span>Fashion / Beauty Retail / Beauty Servicing)</span></div>
                                                                </div>
                                                            </div>
                                                        </li> -->



                            <!--                            <li>
                                                            <h2>Gianni's Trattoria Italiana</h2> 
                                                            <div class="product_inner_des">
                                                                <div class="product_image_box"><a href="#"><img src="images/pr01.png"/></a></div>
                                                                <div class="product_image_des">
                                                                    <div class="des_row"><i><img src="images/home_icon.png"/></i><span>2/F, Shining building, 477-48 Jaffe Road Sydney Australia </span></div>
                                                                    <div class="des_row"><i><img src="images/phone_icon.png"/></i><span>90xxxxxxxxx</span></div>
                                                                    <div class="des_row"><i><img src="images/edit_icon.png"/></i><span>Fashion / Beauty Retail / Beauty Servicing)</span></div>
                                                                </div>
                                                            </div>
                                                        </li> -->

                            <!--                            <li>
                                                            <h2>Gianni's Trattoria Italiana</h2> 
                                                            <div class="product_inner_des">
                                                                <div class="product_image_box"><a href="#"><img src="images/pr01.png"/></a></div>
                                                                <div class="product_image_des">
                                                                    <div class="des_row"><i><img src="images/home_icon.png"/></i><span>2/F, Shining building, 477-48 Jaffe Road Sydney Australia </span></div>
                                                                    <div class="des_row"><i><img src="images/phone_icon.png"/></i><span>90xxxxxxxxx</span></div>
                                                                    <div class="des_row"><i><img src="images/edit_icon.png"/></i><span>Fashion / Beauty Retail / Beauty Servicing)</span></div>
                                                                </div>
                                                            </div>
                                                        </li>  	  -->

                            <!--                            <li>
                                                            <h2>Gianni's Trattoria Italiana</h2> 
                                                            <div class="product_inner_des">
                                                                <div class="product_image_box"><a href="#"><img src="images/pr01.png"/></a></div>
                                                                <div class="product_image_des">
                                                                    <div class="des_row"><i><img src="images/home_icon.png"/></i><span>2/F, Shining building, 477-48 Jaffe Road Sydney Australia </span></div>
                                                                    <div class="des_row"><i><img src="images/phone_icon.png"/></i><span>90xxxxxxxxx</span></div>
                                                                    <div class="des_row"><i><img src="images/edit_icon.png"/></i><span>Fashion / Beauty Retail / Beauty Servicing)</span></div>
                                                                </div>
                                                            </div>
                                                        </li> -->
                        </ul>
                         <input type="hidden" name="nexturl" id="nexturl" value="{{$data->nextPageUrl()}}" >
                         
                            
                              <?php  if($data->lastPage()!= $data->currentPage()){ ?>
                        
                         <div class="show_all_button">   <a href="#" id="moreViewShop">{{{ trans('site/site.View_more') }}}</a> </div>
                               <?php    }  ?>
                  
                    </div>
                </div> 
            </div>

<!--            <div class="free_add_box">
                <a href="#"><img src="{{ asset('images/free_add.png') }}"></a>
            </div>-->
<div>
<!--                <a href="#"><img src="{{ asset('images/free_add.png') }}"></a>-->
                  <?php $AdvertisementImage = Text::AdvertisementImage('2', '2', '1') ?>
                    @foreach($AdvertisementImage as $AdvertisementImag)
                    <div class="free_add_box">
                        @if($AdvertisementImag->type==1)
                        <a href="#"><img src="{{$AdvertisementImag->image_url}}"/></a>
                        @else 
                        <?php echo htmlspecialchars_decode($AdvertisementImag->googlescript); ?>

                        @endif
                    </div>@endforeach
            </div>
            <div class="pagination_shop_bg">


                <div class="tell_us"><span>{{{ trans('site/site.Cannot_find_particular_shop') }}}</span><a href="{{URL::to('Shops')}}"> &nbsp;{{{ trans('site/site.Tell_us') }}}</a></div>

            </div>

        </div>


        <!--            <div class="may_like_box">
                        <h1>You may also like</h1>
        
                        <div class="product_listing">
                            <ul>
                                <li>
                                    <h2>Gianni's Trattoria Italiana</h2> 
                                    <div class="product_inner_des">
                                        <div class="product_image_box"><a href="#"><img src="{{ asset('images/pr01.png') }}"></a></div>
                                        <div class="product_image_des">
                                            <div class="des_row"><i><img src="{{ asset('images/home_icon.png') }}"></i><span>2/F, Shining building, 477-48 Jaffe Road Sydney Australia </span></div>
                                            <div class="des_row"><i><img src="{{ asset('images/phone_icon.png') }}"></i><span>90xxxxxxxxx</span></div>
                                            <div class="des_row"><i><img src="{{ asset('images/edit_icon.png') }}"></i><span>Fashion / Beauty Retail / Beauty Servicing)</span></div>
                                        </div>
                                    </div>
                                </li>  
        
                                <li>
                                    <h2>Gianni's Trattoria Italiana</h2> 
                                    <div class="product_inner_des">
                                        <div class="product_image_box"><a href="#"><img src="{{ asset('images/pr01.png') }}"></a></div>
                                        <div class="product_image_des">
                                            <div class="des_row"><i><img src="{{ asset('images/home_icon.png') }}"></i><span>2/F, Shining building, 477-48 Jaffe Road Sydney Australia </span></div>
                                            <div class="des_row"><i><img src="{{ asset('images/phone_icon.png') }}"></i><span>90xxxxxxxxx</span></div>
                                            <div class="des_row"><i><img src="{{ asset('images/edit_icon.png') }}"></i><span>Fashion / Beauty Retail / Beauty Servicing)</span></div>
                                        </div>
                                    </div>
                                </li>  
        
        
                                <li>
                                    <h2>Gianni's Trattoria Italiana</h2> 
                                    <div class="product_inner_des">
                                        <div class="product_image_box"><a href="#"><img src="{{ asset('images/pr01.png') }}"></a></div>
                                        <div class="product_image_des">
                                            <div class="des_row"><i><img src="{{ asset('images/home_icon.png') }}"></i><span>2/F, Shining building, 477-48 Jaffe Road Sydney Australia </span></div>
                                            <div class="des_row"><i><img src="{{ asset('images/phone_icon.png') }}"></i><span>90xxxxxxxxx</span></div>
                                            <div class="des_row"><i><img src="{{ asset('images/edit_icon.png') }}"></i><span>Fashion / Beauty Retail / Beauty Servicing)</span></div>
                                        </div>
                                    </div>
                                </li>  
                                <li>
                                    <h2>Gianni's Trattoria Italiana</h2> 
                                    <div class="product_inner_des">
                                        <div class="product_image_box"><a href="#"><img src="{{ asset('images/pr01.png') }}"></a></div>
                                        <div class="product_image_des">
                                            <div class="des_row"><i><img src="{{ asset('images/home_icon.png') }}"></i><span>2/F, Shining building, 477-48 Jaffe Road Sydney Australia </span></div>
                                            <div class="des_row"><i><img src="{{ asset('images/phone_icon.png') }}"></i><span>90xxxxxxxxx</span></div>
                                            <div class="des_row"><i><img src="{{ asset('images/edit_icon.png') }}"></i><span>Fashion / Beauty Retail / Beauty Servicing)</span></div>
                                        </div>
                                    </div>
                                </li>  
                            </ul>
                        </div>
                    </div>-->

    </div>
</div>
<!--refine-search-listing-page-content-end-->

</div>

<script>
     $("#nearbytogale").click(function () {
        $('#nearbytogaleh').slideToggle();
//        $(".cat_box h2#nearbytogale").toggleClass("togalclass");
    });
    $("#shoptypetogal").click(function () {
        $('#shoptypetogalsh').slideToggle();
        $(".cat_box h2#shoptypetogal").toggleClass("togalclass");
    });
    $("#agegentogal").click(function () {
        $('#agegentogalsh').slideToggle();
        $(".cat_box h2#agegentogal").toggleClass("togalclass1");
    });

    $("#Pricetogal").click(function () {
        $('#Pricetogalsh').slideToggle();
        $(".cat_box h2#Pricetogal").toggleClass("togalclass2");
    });
    $("#moreViewShop").click(function () {

        var url=$("#nexturl").val();


        $.ajax({
            type: "get",
            url: url,         
            cache: false,
            success: function (data) {
                console.log(data);
                if (data.status == "failed") {
                    alert("error");
                } else {
                   
                  $("#moreshopApend").append(data)  
                }
            }
        })

        return false;
    });

</script>
@endsection

@stop
