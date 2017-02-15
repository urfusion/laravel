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

                    <li><a href="#">{{{ trans('site/site.New_Shop_Information') }}}</a></li>
                </ul>  
            </div> 
            @include('errors.messagediv')
            <div class="inner_head_title">
                <h1>{{{ trans('site/site.New_Shop_Information') }}}</h1>
            </div>   

            <div class="inner_page_content_bg">

                <!--################# shop form ##########################-->
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data"  autocomplete="off">
                    <h2>{{{ trans('site/site.Shop_Information') }}}</h2> 

                    <!--                    <div class="main_shop">
                                            <input type="checkbox" name="sameAsMainShop"/>
                                            <label>Same as main shop</label>
                                        </div>-->



                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Chain_Name') }}} <span>({{{ trans('site/site.English') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="chain"    value=""   />
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Chain_Name') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="chain_c"    value="" />
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Shop_Name') }}}<sup>*</sup><span>({{{ trans('site/site.English') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text"  name="shop_name"    value="" required="required" pattern=".*\S+.*[a-zA-z0-9]+"/>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Shop_Name') }}}<sup>*</sup><span>({{{ trans('site/site.Chinese') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text"  name="shop_name_c"    value="" required="required" />
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Shop_Email') }}}</label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="shop_email"    value="" />
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Telephone') }}} 1</label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="contact_phone_1"    value="" />
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Telephone') }}} 2</label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="contact_phone_2"    value=""/>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Fax') }}} </label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="shop_fax"    value=""/>
                                </div>
                            </div>
                        </div>
                        </div>
                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Shop_No') }}}<span>({{{ trans('site/site.English') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="shop_no"    value=""/>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                             <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Shop_No') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="shop_no_c"    value=""/>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Shop_Line') }}}2<span>({{{ trans('site/site.English') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="shop_line_2"    value=""/>
                                </div>
                            </div>
                           
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Shop_Line') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="shop_line_2_c"    value=""/>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Floor') }}}<span>({{{ trans('site/site.English') }}})</span> </label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="floor"    value=""/>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Floor') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="floor_c"    value=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Floor_Line') }}} 2<span>({{{ trans('site/site.English') }}})</span> </label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="floor_line_2"    value=""/>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Floor_Line') }}} 2<span>({{{ trans('site/site.Chinese') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="floor_line_2_c"    value=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Mall') }}} <span>({{{ trans('site/site.English') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="mall"    value=""/>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                          <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Mall') }}}<span>({{{ trans('site/site.Chinese') }}})</span> </label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="mall_c"    value=""/>
                                </div>
                            </div> 
                            
                        </div>
                    </div>
 

<div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Building') }}}<span>({{{ trans('site/site.English') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="building"    value=""/>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Building') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="building_c"    value=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Landmark') }}}<span>({{{ trans('site/site.English') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="landmark"    value=""/>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Landmark') }}}<span>({{{ trans('site/site.Chinese') }}})</span> </label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="landmark_c"    value=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Phase_Block') }}}<span>({{{ trans('site/site.English') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="phase_block"    value=""/>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Phase_Block') }}}<span>({{{ trans('site/site.Chinese') }}})</span> </label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="phase_block_c"    value=""/>
                                </div>
                            </div>
                        </div>
                    </div>
<div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Street') }}}<span>({{{ trans('site/site.English') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="street"    value=""/>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Street') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="street_c"    value=""/>
                                </div>
                            </div>
                        </div>
                    </div>

<div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.MTR_Station') }}}<span>({{{ trans('site/site.English') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="mtr_station"    value=""/>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.MTR_Station') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="mtr_station_c"    value=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Region') }}} <sup>*</sup></label>
                                <div class="fild select_fild_box">



                                    <?php $Region = Text::Region() ?>
                                    <select class="" name="regionf" id="regionf" required="" >
                                        <option value="">{{{ trans("site/site.Region") }}}</option>
                                        @foreach($Region as $region)
                                        <option value="{{$region->id}}"  >@if(App::getLocale()=='jp'){{$region->name_c}}   @else {{$region->name_e}}    @endif </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.District') }}}  <sup>*</sup></label>
                                <div class="fild select_fild_box" id="districtlistf"> 
                                    <select class="" name="districtf" id="districtf" required="" >
                                        <option value="">{{{ trans("site/site.District") }}}</option>                                        
                                    </select>



                                </div>
                            </div>
                        </div>
                    </div>

<!--                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Address') }}}  <sup>*</sup><span>({{{ trans('site/site.English') }}})</span></label>


                                <div class="fild textarea_fild_box">
                                    <textarea  name="address" required="" ></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label><p>{{{ trans('site/site.Or') }}}</p>{{{ trans('site/site.Address') }}}<sup>*</sup><span>({{{ trans('site/site.Chinese') }}})</span></label>
                                <div class="fild textarea_fild_box">
                                    <textarea  name="address_c" required="" ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>-->

                    <h2>{{{ trans('site/site.Shop_Type') }}}<sup>*</sup></h2>

                    <div class="checkbox_fild_row">

                        <div class="checkbox_box">
                            <input type="checkbox" value="1" class="shop_type" name="shop_type[]" @if(isset($Data->shop_type)) @if(strpos($Data->shop_type, '1') !== false) checked @endif  @endif >

                                   <label>{{{ trans('site/site.Fashion_Shop') }}}</label>
                        </div>

                        <div class="checkbox_box">
                            <input type="checkbox" value="2" class="shop_type" name="shop_type[]"  @if(isset($Data->shop_type)) @if(strpos($Data->shop_type, '2') !== false) checked @endif  @endif  >

                                   <label>{{{ trans('site/site.Beauty_Retail_Shop') }}}</label>
                        </div>

                        <div class="checkbox_box">
                            <input type="checkbox"   value="3" class="shop_type"  name="shop_type[]"  @if(isset($Data->shop_type)) @if(strpos($Data->shop_type, '3') !== false) checked @endif  @endif /> 
                                   <label>{{{ trans('site/site.Beauty_Servicing_Shop') }}}</label>
                        </div>

                    </div>
                    <div id="changeShopType">
                        <h2>{{{ trans('site/site.Fashion_Shop_Category') }}}</h2>
                        <?php $fashionCategoryH = Config::get('constants.FashionCategory'); ?>

                        <div class="checkbox_fild_row mar_bott">
                            @foreach($fashionCategoryH as $indexing => $valuing)
                            <div class="checkbox_box">                               
                                <input type="checkbox"  name="FashionCategory[]"   value="{{ $indexing }}"/> 
                                <label required="">{{{ trans('site/site.'.$valuing) }}}</label>                                

                            </div>  
                            @endforeach
                        </div>

                        <h2>{{{ trans('site/site.Refined_Shop_Type') }}}</h2>

                        <div class="checkbox_fild_row">
                            <?php $RefinedShopType = Config::get('constants.ShopTypeo1'); ?>
                            @foreach($RefinedShopType as $indexingr => $valuingr)
                            @if($indexingr!=null)
                            <div class="checkbox_box">
                                <input type="checkbox"  name="ShopTypeo[]"  value="{{ $indexingr }}"/> 
                                <label>{{{ trans('site/site.'.$valuingr) }}} </label>
                            </div> 
                            @endif
                            @endforeach

                        </div>

                    </div> 


                    <h2>{{{ trans('site/site.Age_Gender') }}} </h2>

                    <div class="checkbox_fild_row">


                        <div class="checkbox_box">
                            <input type="checkbox" name="age_gender[]" value="1"   /> 
                            <label>{{{ trans('site/site.Men') }}}</label>
                        </div>

                        <div class="checkbox_box">
                            <input type="checkbox" name="age_gender[]" value="2" /> 
                            <label>{{{ trans('site/site.Women') }}}</label>
                        </div>

                        <div class="checkbox_box">
                            <input type="checkbox" name="age_gender[]" value="3"   /> 
                            <label>{{{ trans('site/site.Infants_Kids') }}}</label>
                        </div> 
                    </div>

                    <h2>{{{ trans('site/site.Price_Range') }}}</h2>

                    <div class="checkbox_fild_row">
                        <div class="checkbox_box">
                            <input type="checkbox" name="price_range[]" value="1" /> 
                            <label>$300 </label>
                        </div>

                        <div class="checkbox_box">
                            <input type="checkbox"  name="price_range[]" value="2"  /> 
                            <label>$300-$799</label>
                        </div>

                        <div class="checkbox_box">
                            <input type="checkbox"  name="price_range[]" value="3"/> 
                            <label>$800-$1499</label>
                        </div>

                        <div class="checkbox_box">
                            <input type="checkbox"  name="price_range[]" value="4" /> 
                            <label>$1500-$2999</label>
                        </div>

                        <div class="checkbox_box">
                            <input type="checkbox"  name="price_range[]" value="5" /> 
                            <label>$3000-$4999</label>
                        </div>

                        <div class="checkbox_box">
                            <input type="checkbox"  name="price_range[]" value="6"/> 
                            <label>$5000</label>
                        </div>

                    </div>

                    <h2>{{{ trans('site/site.Payment_Options') }}}</h2>


                    <div class="checkbox_fild_row">
                        <div class="checkbox_box">
                            <input type="checkbox" name="payment_option[]" value="1"  /> 
                            <label>{{{ trans('site/site.Mastercard') }}} </label>
                        </div>

                        <div class="checkbox_box">
                            <input type="checkbox" name="payment_option[]" value="2"  /> 
                            <label>{{{ trans('site/site.Visa_Card') }}} </label>
                        </div>

                        <div class="checkbox_box">
                            <input type="checkbox" name="payment_option[]" value="3"   /> 
                            <label>{{{ trans('site/site.American_Express') }}}</label>
                        </div>

                        <div class="checkbox_box">
                            <input type="checkbox" name="payment_option[]" value="4"   /> 
                            <label>{{{ trans('site/site.Union_Pay') }}}</label>
                        </div>

                        <div class="checkbox_box">
                            <input type="checkbox" name="payment_option[]" value="5"   /> 
                            <label>{{{ trans('site/site.EPS') }}} </label>
                        </div>

                        <div class="checkbox_box">
                            <input type="checkbox" name="payment_option[]" value="6"   /> 
                            <label>{{{ trans('site/site.Cash') }}} </label>
                        </div>

                        <div class="checkbox_box">
                            <input type="checkbox" name="payment_option[]" value="7"   /> 
                            <label>{{{ trans('site/site.Bank_Transfer') }}} </label>
                        </div>

                        <div class="checkbox_box">
                            <input type="checkbox" name="payment_option[]" value="8"   /> 
                            <label>{{{ trans('site/site.Paypal') }}}</label>
                        </div>
                    </div>

                    <!--other-information-here-->




                    <div class="other_information">
                        <h2>{{{ trans('site/site.Other_Information') }}}</h2>

                        <div class="two_fild_row">



                            <div class="fild_box left_fild">
                                <div class="checkbox_fild_row">
                                    <h4>{{{ trans('site/site.Fitting') }}}</h4>
                                    <div class="checkbox_box">
                                        <input type="radio" name="fitting" class="fitting" value="1" /> 
                                        <label>{{{ trans('site/site.Yes') }}}</label>
                                    </div>

                                    <div class="checkbox_box">
                                        <input type="radio" name="fitting" class="fitting" value="0" /> 
                                        <label>{{{ trans('site/site.No') }}}</label>
                                    </div>
                                </div> 
                            </div>

                            <div class="fild_box right_fild">
                                <div class="checkbox_fild_row">
                                    <h4>{{{ trans('site/site.Refund') }}}</h4>
                                    <div class="checkbox_box">
                                        <input type="radio" name="refund" class="refund" value="1" /> 
                                        <label>{{{ trans('site/site.Yes') }}}</label>
                                    </div>

                                    <div class="checkbox_box">
                                        <input type="radio" name="refund" class="refund" value="0"/> 
                                        <label>{{{ trans('site/site.No') }}}</label>
                                    </div>
                                </div> 
                            </div>

                        </div>

                        <div class="two_fild_row">

                            <div class="fild_box left_fild">
                                <div class="fild_box_inner">
                                    <label>{{{ trans('site/site.Details') }}}</label>
                                    <div class="fild textarea_fild_box">
                                        <textarea name="fitting_detail" id="fitting_detail"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="fild_box right_fild">
                                <div class="fild_box_inner">
                                    <label>{{{ trans('site/site.Details') }}}</label>
                                    <div class="fild textarea_fild_box">
                                        <textarea name="refund_detail" id="refund_detail"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="other_information">


                        <div class="two_fild_row">



                            <div class="fild_box left_fild">
                                <div class="checkbox_fild_row">
                                    <h4>{{{ trans('site/site.Exchange') }}}</h4>
                                    <div class="checkbox_box">
                                        <input type="radio" name="exchange" value="1" class="exchange"/> 
                                        <label>{{{ trans('site/site.Yes') }}}</label>
                                    </div>

                                    <div class="checkbox_box">
                                        <input type="radio" name="exchange"  value="0" class="exchange"/>
                                        <label>{{{ trans('site/site.No') }}}</label>
                                    </div>
                                </div> 
                            </div>

                            <div class="fild_box right_fild">
                                <div class="checkbox_fild_row">
                                    <h4>{{{ trans('site/site.Membership') }}}</h4>
                                    <div class="checkbox_box">
                                        <input type="radio" name="membership" class="membership" value="1"/>
                                        <label>{{{ trans('site/site.Yes') }}}</label> 
                                    </div>

                                    <div class="checkbox_box">
                                        <input type="radio" name="membership" class="membership" value="0" />
                                        <label>{{{ trans('site/site.No') }}}</label>
                                    </div>
                                </div> 
                            </div>

                        </div>

                        <div class="two_fild_row">

                            <div class="fild_box left_fild">
                                <div class="fild_box_inner">
                                    <label>{{{ trans('site/site.Details') }}}</label>
                                    <div class="fild textarea_fild_box">
                                        <textarea name="exchange_detail" id="exchange_detail"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="fild_box right_fild">
                                <div class="fild_box_inner">
                                    <label>{{{ trans('site/site.Details') }}}</label>
                                    <div class="fild textarea_fild_box">
                                        <textarea name="membership_detail" id="membership_detail"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--other-information-end-->

                    <h2> {{{ trans('site/site.Shop_Description') }}}</h2>

                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.English') }}}</label>
                                <div class="fild textarea_fild_box">
                                    <textarea name="description"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Chinese') }}}</label>
                                <div class="fild textarea_fild_box">
                                    <textarea name="description_c"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--website-social-media-here-->
                    <div class="website_social_media">
                        <h2>{{{ trans('site/site.Website_Social_media') }}}</h2> 

                        <div class="two_fild_row">

                            <div class="fild_box left_fild">
                                <div class="fild_box_inner">
                                    <label>{{{ trans('site/site.Website') }}} <span>({{{ trans('site/site.English') }}})</span></label>
                                    <div class="fild input_fild_box">
                                        <input type="text" name="website_english" value=""/>
                                    </div>
                                </div>
                            </div>

                            <div class="fild_box right_fild">
                                <div class="fild_box_inner">
                                    <label>{{{ trans('site/site.Website') }}}  <span>({{{ trans('site/site.Chinese')}}} )</span></label>
                                    <div class="fild input_fild_box">
                                        <input type="text" name="website_chinese" value=""/>
                                    </div>
                                </div>
                            </div>



                        </div>

                        <div class="two_fild_row">


                            <div class="fild_box left_fild">
                                <div class="fild_box_inner">
                                    <label>{{{ trans('site/site.Facebook') }}}</label>
                                    <div class="fild input_fild_box">
                                        <input type="text" name="facebook" value=""/>
                                    </div>
                                </div>
                            </div>

                            <div class="fild_box right_fild">
                                <div class="fild_box_inner">
                                    <label>{{{ trans('site/site.Instagram') }}}</label>
                                    <div class="fild input_fild_box">
                                        <input type="text" name="instagram" value=""/>
                                    </div>
                                </div>
                            </div>



                        </div>

                        <div class="two_fild_row">
                            <div class="fild_box left_fild">
                                <div class="fild_box_inner">
                                    <label>{{{ trans('site/site.Twitter') }}}</label>
                                    <div class="fild input_fild_box">
                                        <input type="text" name="twitter" value=""/>
                                    </div>
                                </div>
                            </div>
                            <div class="fild_box right_fild">
                                <div class="fild_box_inner">
                                    <label>{{{ trans('site/site.Weibo') }}}</label>
                                    <div class="fild input_fild_box">
                                        <input type="text" name="weibo" value=""/>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="opening_hours_box">
                            <div class="opening_hours_left">
                                <label>{{{ trans('site/site.Opening_Hours') }}}</label>
                            </div> 
                            <div class="opening_hours_right">
                                <div class="opening_hours_row">
                                    <span>{{{ trans('site/site.Monday') }}}</span>
                                    <div class="hour_select_box">
                                        <input type="text" id="mondayopen"  name="mondayopen" value="">
                                    </div>
                                    <p>{{{ trans('site/site.to') }}}</p>
                                    <div class="hour_select_box">
                                        <input type="text"  name="mondayclosed" id="mondayclosed"  value="">
                                    </div>

                                    <div class="same_day_button">
                                        <a href="javascript:void(0)" onclick="sameTime()">{{{ trans('site/site.Same_for_all_days') }}}</a>
                                    </div>
                                </div>

                                <div class="opening_hours_row">
                                    <span>{{{ trans('site/site.Tuesday') }}}</span>
                                    <div class="hour_select_box">
                                        <input type="text" name="tuesdayopen" id="tuesdayopen" value="">
                                    </div>
                                    <p>{{{ trans('site/site.to') }}}</p>
                                    <div class="hour_select_box">
                                        <input type="text" name="tuesdayclosed" id="tuesdayclosed" value="">
                                    </div>
                                </div>

                                <div class="opening_hours_row">
                                    <span>{{{ trans('site/site.Wednesday') }}}</span>
                                    <div class="hour_select_box">
                                        <input type="text"  name="wednesdayopen" id="wednesdayopen"  value="">
                                    </div>
                                    <p>{{{ trans('site/site.to') }}}</p>
                                    <div class="hour_select_box">
                                        <input type="text"    name="wednesdayclosed" id="wednesdayclosed"  value="">
                                    </div>
                                </div>

                                <div class="opening_hours_row">
                                    <span>{{{ trans('site/site.Thursday') }}}</span>
                                    <div class="hour_select_box">
                                        <input type="text"  name="thursdayopen" id="thursdayopen"  value="">
                                    </div>
                                    <p>{{{ trans('site/site.to') }}}</p>
                                    <div class="hour_select_box">
                                        <input type="text" name="thursdayclosed" id="thursdayclosed"  value=""> 
                                    </div>
                                </div>

                                <div class="opening_hours_row">
                                    <span>{{{ trans('site/site.Friday') }}}</span>
                                    <div class="hour_select_box">
                                        <input type="text"   name="fridayopen" id="fridayopen"  value=""> 
                                    </div>
                                    <p>{{{ trans('site/site.to') }}}</p>
                                    <div class="hour_select_box">
                                        <input type="text"   name="fridayclosed" id="fridayclosed"   value=""> 
                                    </div>
                                </div>

                                <div class="opening_hours_row">
                                    <span>{{{ trans('site/site.Saturday') }}}</span>
                                    <div class="hour_select_box">
                                        <input type="text"  name="saturdayopen" id="saturdayopen"  value=""> 
                                    </div>
                                    <p>{{{ trans('site/site.to') }}}</p>
                                    <div class="hour_select_box">
                                        <input type="text"  name="saturdayclosed" id="saturdayclosed" value=""> 
                                    </div>
                                </div>

                                <div class="opening_hours_row">
                                    <span>{{{ trans('site/site.Sunday') }}}</span>
                                    <div class="hour_select_box">
                                        <input type="text"   name="sundayopen" id="sundayopen"  value=""> 
                                    </div>
                                    <p>{{{ trans('site/site.to') }}}</p>
                                    <div class="hour_select_box">
                                        <input type="text"  name="sundayclosed" id="sundayclosed"  value=""> 
                                    </div>
                                </div>

                                <div class="opening_hours_row">
                                    <span>{{{ trans('site/site.Public_Holiday') }}}</span>
                                    <div class="hour_select_box">
                                        <input type="text" name="public_holidayopen" id="public_holidayopen"  value=""> 
                                    </div>
                                    <p>{{{ trans('site/site.to') }}}</p>
                                    <div class="hour_select_box">
                                        <input type="text" name="public_holidayclosed" id="public_holidayclosed"   value=""> 
                                    </div>
                                </div>

                                <div class="opening_hours_row">
                                    <span>{{{ trans('site/site.ChinPublic_Holidays_Eve') }}} </span>
                                    <div class="hour_select_box">
                                        <input type="text" name="public_holidayevopen" id="public_holidayevopen"  value=""> 
                                    </div>
                                    <p>{{{ trans('site/site.to') }}}</p>
                                    <div class="hour_select_box">
                                        <input type="text" name="public_holidayevclosed" id="public_holidayevclosed"   value=""> 
                                    </div>
                                </div>

                            </div> 
                        </div>

                        <div class="two_fild_row">
                            <div class="fild_box left_fild">
                                <div class="fild_box_inner">
                                    <label> {{{ trans('site/site.Shop_Image') }}} 1</label>
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
                    <!--website-social-media-end-->

                    <!--shop-images-here-->
                    <div class="shop_images_box">
                        <div class="two_fild_row">
                            <div class="fild_box left_fild">
                                <div class="fild_box_inner">
                                    <label>{{{ trans('site/site.Shop_Image') }}} 2 </label>
                                    <div class="browse_bg">
                                        <div class="fild input_fild_box">
                                            <input type="text" readonly name="shop_image_20"  value="" id="shop_image_20">
                                        </div>
                                        <div class="browse_button">
                                            <input type="file" id="shop_image_2" name="shop_image_2" />
                                        </div>    	
                                    </div>
                                </div>
                            </div>
                            <div class="fild_box right_fild"></div>
                        </div>

                        <div class="two_fild_row">
                            <div class="fild_box left_fild">
                                <div class="fild_box_inner">
                                    <label>{{{ trans('site/site.Shop_Image') }}} 3 </label>
                                    <div class="browse_bg">
                                        <div class="fild input_fild_box">
                                            <input type="text" value="" readonly name="shop_image_30"  id="shop_image_30">
                                        </div>
                                        <div class="browse_button">
                                            <input type="file" id="shop_image_3" name="shop_image_3" />
                                        </div>    	
                                    </div>
                                </div>
                            </div>
                            <div class="fild_box right_fild"></div>
                        </div>

                        <div class="two_fild_row">
                            <div class="fild_box left_fild">
                                <div class="fild_box_inner">
                                    <label>{{{ trans('site/site.Shop_Image') }}} 4 </label>
                                    <div class="browse_bg">
                                        <div class="fild input_fild_box">
                                            <input type="text" value="" readonly name="shop_image_40"  id="shop_image_40">
                                        </div>
                                        <div class="browse_button">
                                            <input type="file" id="shop_image_4" name="shop_image_4"/>
                                        </div>    	
                                    </div>
                                </div>
                            </div>
                            <div class="fild_box right_fild"></div>
                        </div>

                        <div class="two_fild_row">
                            <div class="fild_box left_fild">
                                <div class="fild_box_inner">
                                    <label>{{{ trans('site/site.Shop_Image') }}} 5 </label>
                                    <div class="browse_bg">
                                        <div class="fild input_fild_box">
                                            <input type="text" id="shop_image_50" readonly name="shop_image_50" >
                                        </div>
                                        <div class="browse_button">
                                            <input type="file" id="shop_image_5"  name="shop_image_5"/>
                                        </div>    	
                                    </div>
                                </div>
                            </div>
                            <div class="fild_box right_fild"></div>
                        </div>
                    </div>
                    <!--shop-images-end-->

                    <div class="submit_button_bg">
                        <input type="submit" value="{{{ trans('site/site.Add_Shop') }}}"/>
<!--                        <input type="submit" value="Next"/>-->
                    </div>

                </form>
            </div>

        </div>
    </div>
    <!--beauty-retail-shop-content-end-->
</div>

@include('include.divtoggal')


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
@endsection

@stop
