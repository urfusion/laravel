@extends('app')
@section('title') Home :: @parent @stop
@section('content')


<div class="warper"> 
    <!--beauty-retail-shop-content-here-->
    <div class="page_content fashionshop_bg form_bg">
        <div class="container">
            <div class="bredcrumb_menu">
                 <ul>
                    <li><a href="{{ url('/home') }}"><span>{{{ trans('site/site.Home') }}}</span></a></li>
                    <li><a href="{{URL::to('Shops/'.base64_encode($Data->id).'/editShopCategory')}}"><span>{{{ trans('site/site.Edit_Shop_Information') }}}</span></a></li>

                    <li><a href="#">{{{ trans('site/site.Update_shop_information') }}}</a></li>
                </ul> 
                
            </div> 
            @include('errors.messagediv')

            <div class="inner_head_title">
                <h1>{{{ trans('site/site.Update_shop_information') }}}</h1>
            </div>   

            <div class="inner_page_content_bg">

                <!--################# shop form ##########################-->
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data"  autocomplete="off">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                     <h2>{{{ trans('site/site.Shop_Information') }}}</h2> 

                    <!--                    <div class="main_shop">
                                            <input type="checkbox" name="sameAsMainShop"/>
                                            <label>Same as main shop</label>
                                        </div>-->



                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Chain_Name') }}}<span>({{{ trans('site/site.English') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="chain"    value="{{{ Input::old('chain', isset($Data) ? $Data->chain : null) }}}"  />
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Chain_Name') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="chain_c"    value="{{{ Input::old('chain_c', isset($Data) ? $Data->chain_c : null) }}}" />
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">

                                <label>{{{ trans('site/site.Shop_Name') }}}<sup>*</sup><span>({{{ trans('site/site.English') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text"  name="shop_name"   value="{{{ Input::old('shop_name', isset($Data) ? $Data->shop_name : null) }}}"/>
                                  
                                </div>{!! $errors->first('shop_name', '')!!}
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Shop_Name') }}}<sup>*</sup><span>({{{ trans('site/site.Chinese') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text"  name="shop_name_c"  value="{{{ Input::old('shop_name_c', isset($Data) ? $Data->shop_name_c : null) }}}"/>
                                  
                             
                            </div>{!! $errors->first('shop_name_c', '')!!}
                        </div>

                    </div>
                    </div>

                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Shop_Email') }}}</label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="shop_email"    value="{{{ Input::old('shop_email', isset($Data) ? $Data->shop_email : null) }}}"/>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Telephone') }}} 1</label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="contact_phone_1"    value="{{{ Input::old('contact_phone_1', isset($Data) ? $Data->contact_phone_1 : null) }}}"/>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Telephone') }}} 2</label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="contact_phone_2"    value="{{{ Input::old('contact_phone_2', isset($Data) ? $Data->contact_phone_2 : null) }}}"/>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Fax') }}} </label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="shop_fax"    value="{{{ Input::old('shop_fax', isset($Data) ? $Data->shop_fax : null) }}}"/>
                                </div>
                            </div>
                        </div>

                    </div>
                     <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Shop_No') }}}<span>({{{ trans('site/site.English') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="shop_no"    value="{{{ Input::old('shop_no', isset($Data) ? $Data->shop_no : null) }}}"/>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                             <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Shop_No') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="shop_no_c"    value="{{{ Input::old('shop_no_c', isset($Data) ? $Data->shop_no_c : null) }}}"/>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Shop_Line') }}}2<span>({{{ trans('site/site.English') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="shop_line_2"    value="{{{ Input::old('shop_line_2', isset($Data) ? $Data->shop_line_2 : null) }}}"/>
                                </div>
                            </div>
                           
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Shop_Line') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="shop_line_2_c"    value="{{{ Input::old('shop_line_2_c', isset($Data) ? $Data->shop_line_2_c : null) }}}"/>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Floor') }}}<span>({{{ trans('site/site.English') }}})</span> </label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="floor"    value="{{{ Input::old('floor', isset($Data) ? $Data->floor : null) }}}"/>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Floor') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="floor_c"    value="{{{ Input::old('floor_c', isset($Data) ? $Data->floor_c : null) }}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Floor_Line') }}} 2<span>({{{ trans('site/site.English') }}})</span> </label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="floor_line_2"    value="{{{ Input::old('floor_line_2', isset($Data) ? $Data->floor_line_2 : null) }}}"/>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Floor_Line') }}} 2<span>({{{ trans('site/site.Chinese') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="floor_line_2_c"    value="{{{ Input::old('floor_line_2_c', isset($Data) ? $Data->floor_line_2_c : null) }}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Mall') }}} <span>({{{ trans('site/site.English') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="mall"    value="{{{ Input::old('mall', isset($Data) ? $Data->mall : null) }}}"/>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                          <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Mall') }}}<span>({{{ trans('site/site.Chinese') }}})</span> </label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="mall_c"    value="{{{ Input::old('mall_c', isset($Data) ? $Data->mall_c : null) }}}"/>
                                </div>
                            </div> 
                            
                        </div>
                    </div>
 

<div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Building') }}}<span>({{{ trans('site/site.English') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="building"    value="{{{ Input::old('building', isset($Data) ? $Data->building : null) }}}"/>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Building') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="building_c"    value="{{{ Input::old('building_c', isset($Data) ? $Data->building_c : null) }}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Landmark') }}}<span>({{{ trans('site/site.English') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="landmark"    value="{{{ Input::old('landmark', isset($Data) ? $Data->landmark : null) }}}"/>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Landmark') }}}<span>({{{ trans('site/site.Chinese') }}})</span> </label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="landmark_c"    value="{{{ Input::old('landmark_c', isset($Data) ? $Data->landmark_c : null) }}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Phase_Block') }}}<span>({{{ trans('site/site.English') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="phase_block" value="{{{ Input::old('phase_block', isset($Data) ? $Data->phase_block : null) }}}"/>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Phase_Block') }}}<span>({{{ trans('site/site.Chinese') }}})</span> </label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="phase_block_c"    value="{{{ Input::old('phase_block_c', isset($Data) ? $Data->phase_block_c : null) }}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
<div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Street') }}}<span>({{{ trans('site/site.English') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="street"    value="{{{ Input::old('street', isset($Data) ? $Data->street : null) }}}"/>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Street') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="street_c"    value="{{{ Input::old('street_c', isset($Data) ? $Data->street_c : null) }}}"/>
                                </div>
                            </div>
                        </div>
                    </div>

<div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.MTR_Station') }}}<span>({{{ trans('site/site.English') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="mtr_station"    value="{{{ Input::old('mtr_station', isset($Data) ? $Data->mtr_station : null) }}}"/>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.MTR_Station') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="mtr_station_c"    value="{{{ Input::old('mtr_station_c', isset($Data) ? $Data->mtr_station_c : null) }}}"/>
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
                                    <select class="" name="regionf" id="regionf"  >
                                        <option value="">{{{ trans("site/site.Region") }}}</option>
                                        @foreach($Region as $region)
                                        <option value="{{$region->id}}" {{ ($Data->region== $region->id) ? 'selected="selected"' : null }} >@if(App::getLocale()=='jp'){{$region->name_c}}   @else {{$region->name_e}}    @endif </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.District') }}}  <sup>*</sup></label>
                                <div class="fild select_fild_box" id="districtlistf">
                                    @if(isset($Data->region))
                                    <?php $District2 = Text::District($Data->region); ?>
                                    <select class="" name="districtf" id="districtf" >
                                        <option value="">{{{ trans("site/site.District") }}}</option>
                                        @foreach($District2 as $district)
                                        <option value="{{$district->id}}" {{ ($Data->district == $district->id) ? 'selected="selected"' : null }} >@if(App::getLocale()=='jp'){{$district->name_c}}   @else {{$district->name_e}}    @endif</option>
                                        @endforeach
                                    </select>
                                    @endif


                                </div>
                            </div>
                        </div>
                    </div>

<!--                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Address') }}}  <sup>*</sup><span>({{{ trans('site/site.English') }}})</span></label>


                                <div class="fild textarea_fild_box">
                                    <textarea  name="address"  >{{{ Input::old('address', isset($Data) ? $Data->address : null) }}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label><p>{{{ trans('site/site.Or') }}}</p>{{{ trans('site/site.Address') }}}<sup>*</sup><span>({{{ trans('site/site.Chinese') }}})</span></label>
                                <div class="fild textarea_fild_box">
                                    <textarea  name="address_c"  >{{{ Input::old('address_c', isset($Data) ? $Data->address_c : null) }}}</textarea>
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

                    <!--#################       filer according to shop type   #########################-->
                    <div id="changeShopType">
                        @if(isset($Data->shop_type))                            <!--  IF CONDTION 1 -->

                        @if(strpos($Data->shop_type, '1') !== false)            <!-- condition for type 1 -->

                        <h2>{{{ trans('site/site.Fashion_Shop_Category') }}}</h2>
                        <?php $fashionCategoryH = Config::get('constants.FashionCategory'); ?> 
                        @if(isset($Data->fashion_category))                    <!-- condition for  fashion category -->

                        <?php $selected = explode(',', $Data->fashion_category); ?>
                        <div class="checkbox_fild_row mar_bott">
                            @foreach($fashionCategoryH as $indexing => $valuing)
                            <div class="checkbox_box">                               
                                <input type="checkbox" name="FashionCategory[]"  value="{{ $indexing }}"  @if (in_array($indexing, $selected)) checked @endif/> 
                                       <label>{{{ trans('site/site.'.$valuing) }}}</label>  
                            </div>  
                            @endforeach
                        </div>
                        @else                                                 <!-- else condition for  fashion category -->
                        <div class="checkbox_fild_row mar_bott">
                            @foreach($fashionCategoryH as $indexing => $valuing)
                            <div class="checkbox_box">                               
                                <input type="checkbox" name="FashionCategory[]"   value="{{ $indexing }}"/> 
                                <label >{{{ trans('site/site.'.$valuing) }}}</label>                                

                            </div>  
                            @endforeach
                        </div>

                        @endif                                               <!-- end condition for  fashion category -->                      


                        @endif       <!-- end condition for type 1 -->

                        
                        
                        @if(strpos($Data->shop_type, '2') !== false)  <!--  condition for type 2 -->


                        <h2>{{{ trans('site/site.Beauty_Retail_Shop_Category') }}}</h2>
                        <?php $fashionCategoryH = Config::get('constants.BeautyRetailCategory'); ?>
                        @if(isset($Data->beauty_retail_category))   <!--   condition for  beauty retail  category -->  
                        <?php $selected = explode(',', $Data->beauty_retail_category); ?>
                        <div class="checkbox_fild_row mar_bott">
                            @foreach($fashionCategoryH as $indexing => $valuing)
                            <div class="checkbox_box">                               
                                <input type="checkbox" name="BeautyRetailCategory[]" value="{{ $indexing }}"  @if (in_array($indexing, $selected)) checked @endif /> 
                                      <label>{{{ trans('site/site.'.$valuing) }}}</label>                             

                            </div>  
                            @endforeach
                        </div>
                        @else                                   <!--  else  condition for  beauty retail  category --> 
                        <div class="checkbox_fild_row mar_bott">
                            @foreach($fashionCategoryH as $indexing => $valuing)
                            <div class="checkbox_box">                               
                                <input type="checkbox" name="BeautyRetailCategory[]" value="{{ $indexing }}"/> 
                                <label>{{{ trans('site/site.'.$valuing) }}}</label>                                

                            </div>  
                            @endforeach
                        </div>
                        @endif                                        <!--  end  condition for  beauty retail  category --> 

                        @endif                                        <!-- end condition for type 2 -->
                        
                         
                          @if(strpos($Data->shop_type, '3') !== false)  <!--  condition for type 3 -->

                        <h2>{{{ trans('site/site.Beauty_Servicing_Shop_Category') }}}</h2>
                        <?php $fashionCategoryH = Config::get('constants.BeautyServicingCategory'); ?>


                        @if(isset($Data->beauty_service_category))
                        <?php $selected = explode(',', $Data->beauty_service_category); ?>

                        <div class="checkbox_fild_row mar_bott">
                            @foreach($fashionCategoryH as $indexing => $valuing)
                            <div class="checkbox_box">                               
                                <input type="checkbox" name="BeautyServicingCategory[]" value="{{ $indexing }}"  @if (in_array($indexing, $selected)) checked @endif/> 
                                       <label>{{{ trans('site/site.'.$valuing) }}}</label>                                

                            </div>  
                            @endforeach
                        </div>
                        @else
                        <div class="checkbox_fild_row mar_bott">
                            @foreach($fashionCategoryH as $indexing => $valuing)
                            <div class="checkbox_box">                               
                                <input type="checkbox"  name="BeautyServicingCategory[]" value="{{ $indexing }}"/> 
                                <label>{{{ trans('site/site.'.$valuing) }}}</label>                                

                            </div>  
                            @endforeach
                        </div>
                        @endif

                        @endif 
                      

                        <!-- end condition for type 3 -->
                        @else  <!--  ELSE  CONDTION 1 -->
                        <h2>{{{ trans('site/site.Fashion_Shop_Category') }}} <sup>*</sup></h2>
                        <?php $fashionCategoryH = Config::get('constants.FashionCategory'); ?>

                        <div class="checkbox_fild_row mar_bott">
                            @foreach($fashionCategoryH as $indexing => $valuing)
                            <div class="checkbox_box">                               
                                <input type="checkbox"  name="FashionCategory[]"  value="{{ $indexing }}"/> 
                                <label>{{{ trans('site/site.'.$valuing) }}}</label>                               

                            </div>  
                            @endforeach
                        </div>

                        @endif <!--  end  CONDTION 1 -->


                        <!--######### ########## Refined Shop Type ######## #############-->

                        @if(isset($Data->shop_type)) <!--  IF CONDTION 1 -->


                        @if(strpos($Data->shop_type, '1') !== false)  <!-- condition for type 1 -->

                        <h2>{{{ trans('site/site.Refined_Shop_Type') }}}</h2>
                        <?php $RefinedShopType = Config::get('constants.ShopTypeo1'); ?>
                        @if(isset($Data->refined_shop_type))
                        <?php $selected1 = explode(',', $Data->refined_shop_type); ?>
                        <div class="checkbox_fild_row">

                            @foreach($RefinedShopType as $indexingr => $valuingr)
                            @if($indexingr!=null)
                            <div class="checkbox_box">
                                <input type="checkbox"  name="ShopTypeo[]"  value="{{ $indexingr }}"  @if (in_array($indexingr, $selected1)) checked @endif/> 
                                       <label>{{{ trans('site/site.'.$valuingr) }}}</label>
                            </div> 
                            @endif
                            @endforeach

                        </div>

                        @else                                          <!-- ELSE  condition for type 1 -->
                        <div class="checkbox_fild_row">

                            @foreach($RefinedShopType as $indexingr => $valuingr)
                            @if($indexingr!=null)
                            <div class="checkbox_box">
                                <input type="checkbox" name="ShopTypeo[]"   value="{{ $indexingr }}" /> 
                                <label>{{{ trans('site/site.'.$valuingr) }}}</label>
                            </div> 
                            @endif
                            @endforeach

                        </div>

                        @endif                                   <!-- END  condition for type 1 -->




                        @elseif(strpos($Data->shop_type, '2') !== false)




                        <h2>{{{ trans('site/site.Refined_Shop_Type') }}}</h2>
                        <?php $RefinedShopType = Config::get('constants.ShopTypeo2'); ?>
                        @if(isset($Data->refined_shop_type))    <!--    condition for type 2 -->
                        <?php $selected1 = explode(',', $Data->refined_shop_type); ?>
                        <div class="checkbox_fild_row">

                            @foreach($RefinedShopType as $indexingr => $valuingr)
                            @if($indexingr!=null)
                            <div class="checkbox_box">
                                <input type="checkbox" name="ShopTypeo[]"  value="{{ $indexingr }}"  @if (in_array($indexingr, $selected1)) checked @endif/> 
                                       <label>{{{ trans('site/site.'.$valuingr) }}}</label>
                            </div> 
                            @endif
                            @endforeach

                        </div>
                        @else                             <!--   else condition for type 2 -->
                        <div class="checkbox_fild_row">

                            @foreach($RefinedShopType as $indexingr => $valuingr)
                            @if($indexingr!=null)
                            <div class="checkbox_box">
                                <input type="checkbox"  name="ShopTypeo[]"  value="{{ $indexingr }}"/> 
                                <label>{{{ trans('site/site.'.$valuingr) }}}</label>
                            </div> 
                            @endif
                            @endforeach

                        </div>
                        @endif                           <!--   end condition for type 2 -->



                        @elseif(strpos($Data->shop_type, '3') !== false)

                        <?php $selected1 = explode(',', $Data->refined_shop_type); ?>
                        <h2>{{{ trans('site/site.Refined_Shop_Type') }}}</h2>

                        <div class="checkbox_fild_row">
                            <?php $RefinedShopType = Config::get('constants.ShopTypeo3'); ?>

                            @if(isset($Data->refined_shop_type))            <!-- condition for type 3 -->

                            @foreach($RefinedShopType as $indexingr => $valuingr)
                            @if($indexingr!=null)
                            <div class="checkbox_box">
                                <input type="checkbox"  name="ShopTypeo[]"  value="{{ $indexingr }}" @if (in_array($indexingr, $selected1)) checked @endif/> 
                                       <label>{{{ trans('site/site.'.$valuingr) }}}</label>
                            </div> 
                            @endif
                            @endforeach

                            @else                                      <!-- else condition for type 3 -->

                            @foreach($RefinedShopType as $indexingr => $valuingr)
                            @if($indexingr!=null)
                            <div class="checkbox_box">
                                <input type="checkbox" name="ShopTypeo[]"   value="{{ $indexingr }}"/> 
                                <label>{{{ trans('site/site.'.$valuingr) }}}</label>
                            </div> 
                            @endif
                            @endforeach


                            @endif <!-- end condition for type 3 -->



                        </div>


                        @endif



                        @else  <!--  ELSE  CONDTION 1 -->

                        <h2>{{{ trans('site/site.Refined_Shop_Type') }}}</h2>
                        <div class="checkbox_fild_row">
                            <?php $RefinedShopType = Config::get('constants.ShopTypeo1'); ?>
                            @foreach($RefinedShopType as $indexingr => $valuingr)
                            <div class="checkbox_box">
                                <input type="checkbox"  name="ShopTypeo[]"  value="{{ $indexingr }}"/> 
                                <label>{{{ trans('site/site.'.$valuingr) }}}</label>
                            </div> 
                            @endforeach

                        </div>

                        @endif <!--  end  CONDTION 1 -->



                    </div> 
                    <!--#################    //   filer according to shop type   #########################-->

                   <h2>{{{ trans('site/site.Age_Gender') }}} </h2>

                    <div class="checkbox_fild_row">

                        @if(isset($Data->age_gender))
                        <?php $gender = explode(',', $Data->age_gender) ?>   
                        @endif
                        <div class="checkbox_box">
                            <input type="checkbox" name="age_gender[]" value="1"  @if(isset($Data->age_gender)) @if (in_array('1', $gender)) checked @endif  @endif/> 
                                  <label>{{{ trans('site/site.Men') }}}</label>
                        </div>

                        <div class="checkbox_box">
                            <input type="checkbox" name="age_gender[]" value="2"  @if(isset($Data->age_gender)) @if (in_array('2', $gender)) checked @endif  @endif/> 
                                   <label>{{{ trans('site/site.Women') }}}</label>
                        </div>

                        <div class="checkbox_box">
                            <input type="checkbox" name="age_gender[]" value="3"  @if(isset($Data->age_gender)) @if (in_array('3', $gender)) checked @endif  @endif/> 
                                   <label>{{{ trans('site/site.Infants_Kids') }}}</label>
                        </div>



                    </div>

                    <h2>{{{ trans('site/site.Price_Range') }}}</h2>

                    @if(isset($Data->price_range))
                    <?php $pricerange = explode(',', $Data->price_range) ?>                 
                    @endif
                    <div class="checkbox_fild_row">
                        <div class="checkbox_box">
                            <input type="checkbox" name="price_range[]" value="1" @if(isset($Data->price_range)) @if (in_array('1', $pricerange)) checked @endif  @endif/> 
                                   <label>$300 </label>
                        </div>

                        <div class="checkbox_box">
                            <input type="checkbox"  name="price_range[]" value="2" @if(isset($Data->price_range)) @if (in_array('2', $pricerange)) checked @endif  @endif/> 
                                   <label>$300-$799</label>
                        </div>

                        <div class="checkbox_box">
                            <input type="checkbox"  name="price_range[]" value="3" @if(isset($Data->price_range)) @if (in_array('3', $pricerange)) checked @endif  @endif/> 
                                   <label>$800-$1499</label>
                        </div>

                        <div class="checkbox_box">
                            <input type="checkbox"  name="price_range[]" value="4" @if(isset($Data->price_range)) @if (in_array('4', $pricerange)) checked @endif  @endif/> 
                                   <label>$1500-$2999</label>
                        </div>

                        <div class="checkbox_box">
                            <input type="checkbox"  name="price_range[]" value="5" @if(isset($Data->price_range)) @if (in_array('5', $pricerange)) checked @endif  @endif/> 
                                   <label>$3000-$4999</label>
                        </div>

                        <div class="checkbox_box">
                            <input type="checkbox"  name="price_range[]" value="6" @if(isset($Data->price_range)) @if (in_array('6', $pricerange)) checked @endif  @endif/> 
                                   <label>$5000</label>
                        </div>

                    </div>

                    <h2>{{{ trans('site/site.Payment_Options') }}}</h2>


                    @if(isset($Data->payment_option))
                    <?php $pyment = explode(',', $Data->payment_option) ?>                 
                    @endif
                    <div class="checkbox_fild_row">
                        <div class="checkbox_box">
                            <input type="checkbox" name="payment_option[]" value="1"   @if(isset($Data->payment_option)) @if (in_array('1', $pyment)) checked @endif  @endif/> 
                                   <label>{{{ trans('site/site.Mastercard') }}} </label>
                        </div>

                        <div class="checkbox_box">
                            <input type="checkbox" name="payment_option[]" value="2"   @if(isset($Data->payment_option)) @if (in_array('2', $pyment)) checked @endif  @endif/> 
                                   <label>{{{ trans('site/site.Visa_Card') }}} </label>
                        </div>

                        <div class="checkbox_box">
                            <input type="checkbox" name="payment_option[]" value="3"   @if(isset($Data->payment_option)) @if (in_array('3', $pyment)) checked @endif  @endif/> 
                                   <label>{{{ trans('site/site.American_Express') }}}</label>
                        </div>

                        <div class="checkbox_box">
                            <input type="checkbox" name="payment_option[]" value="4"   @if(isset($Data->payment_option)) @if (in_array('4', $pyment)) checked @endif  @endif/> 
                                  <label>{{{ trans('site/site.Union_Pay') }}}</label>
                        </div>

                        <div class="checkbox_box">
                            <input type="checkbox" name="payment_option[]" value="5"   @if(isset($Data->payment_option)) @if (in_array('5', $pyment)) checked @endif  @endif/> 
                                  <label>{{{ trans('site/site.EPS') }}} </label>
                        </div>

                        <div class="checkbox_box">
                            <input type="checkbox" name="payment_option[]" value="6"   @if(isset($Data->payment_option)) @if (in_array('6', $pyment)) checked @endif  @endif/> 
                                   <label>{{{ trans('site/site.Cash') }}} </label>
                        </div>

                        <div class="checkbox_box">
                            <input type="checkbox" name="payment_option[]" value="7"   @if(isset($Data->payment_option)) @if (in_array('7', $pyment)) checked @endif  @endif/> 
                                  <label>{{{ trans('site/site.Bank_Transfer') }}} </label>
                        </div>

                        <div class="checkbox_box">
                            <input type="checkbox" name="payment_option[]" value="8"   @if(isset($Data->payment_option)) @if (in_array('8', $pyment)) checked @endif  @endif/> 
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
                                        <input type="radio" name="fitting" class="fitting" value="1" @if(isset($Data->fitting)) @if ($Data->fitting==1 ) checked @endif  @endif> 
                                               <label>{{{ trans('site/site.Yes') }}}</label>
                                    </div>

                                    <div class="checkbox_box">
                                        <input type="radio" name="fitting" class="fitting" value="0"  @if(isset($Data->fitting)) @if ($Data->fitting!=1 ) checked @endif  @endif  > 
                                                <label>{{{ trans('site/site.No') }}}</label>
                                    </div>
                                </div> 
                            </div>

                            <div class="fild_box right_fild">
                                <div class="checkbox_fild_row">
                                    <h4>{{{ trans('site/site.Refund') }}}</h4>
                                    <div class="checkbox_box">
                                        <input type="radio" name="refund" class="refund" value="1" @if(isset($Data->refund)) @if ($Data->refund==1 ) checked @endif  @endif> 
                                               <label>{{{ trans('site/site.Yes') }}}</label>
                                    </div>

                                    <div class="checkbox_box">
                                        <input type="radio" name="refund" class="refund" value="0" @if(isset($Data->refund)) @if ($Data->refund!=1 ) checked @endif  @endif> 
                                               <label>{{{ trans('site/site.No') }}}</label>
                                    </div>
                                </div> 
                            </div>

                        </div>

                        <div class="two_fild_row">

                            <div class="fild_box left_fild">
                                <div class="fild_box_inner" >

                                    <label>{{{ trans('site/site.Details') }}}</label>
                                    <div class="fild textarea_fild_box">
                                        <textarea name="fitting_detail" id="fitting_detail"> @if(isset($Data->fitting_detail)) {{$Data->fitting_detail}}   @endif   </textarea>
                                    </div>

                                </div>
                            </div>

                            <div class="fild_box right_fild">
                                <div class="fild_box_inner">
                                    <label>{{{ trans('site/site.Details') }}}</label>
                                    <div class="fild textarea_fild_box">
                                        <textarea name="refund_detail" id="refund_detail">@if(isset($Data->refund_detail)) {{$Data->refund_detail}}   @endif </textarea>
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
                                        <input type="radio" name="exchange" class="exchange" value="1" @if(isset($Data->exchange)) @if ($Data->exchange==1 ) checked @endif  @endif> 
                                                <label>{{{ trans('site/site.Yes') }}}</label>
                                    </div>

                                    <div class="checkbox_box">
                                        <input type="radio" name="exchange" class="exchange"  value="0" @if(isset($Data->exchange)) @if ($Data->exchange!=1 ) checked @endif  @endif  > 
                                                <label>{{{ trans('site/site.No') }}}</label>
                                    </div>
                                </div> 
                            </div>

                            <div class="fild_box right_fild">
                                <div class="checkbox_fild_row">
                                  <h4>{{{ trans('site/site.Membership') }}}</h4>
                                    <div class="checkbox_box">
                                        <input type="radio" name="membership"   class="membership" value="1" @if(isset($Data->membership)) @if ($Data->membership==1 ) checked @endif  @endif> 
                                               <h4>{{{ trans('site/site.Yes') }}}</h4>
                                    </div>

                                    <div class="checkbox_box">
                                        <input type="radio" name="membership" class="membership"  value="0" @if(isset($Data->membership)) @if ($Data->membership!=1 ) checked @endif  @endif> 
                                               <h4>{{{ trans('site/site.No') }}}</h4>
                                    </div>
                                </div> 
                            </div>

                        </div>

                        <div class="two_fild_row">

                            <div class="fild_box left_fild">
                                <div class="fild_box_inner">
                                   <label>{{{ trans('site/site.Details') }}}</label>
                                    <div class="fild textarea_fild_box">
                                        <textarea name="exchange_detail" id="exchange_detail"> @if(isset($Data->exchange_detail)) {{$Data->exchange_detail}}   @endif   </textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="fild_box right_fild">
                                <div class="fild_box_inner">
                                    <label>{{{ trans('site/site.Details') }}}</label>
                                    <div class="fild textarea_fild_box">
                                        <textarea name="membership_detail" id="membership_detail">@if(isset($Data->refund_detail)) {{$Data->membership_detail}}   @endif </textarea>
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
                                    <textarea name="description"> @if(isset($Data->description)) {{$Data->description}} @endif </textarea>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                 <label>{{{ trans('site/site.Chinese') }}}</label>
                                <div class="fild textarea_fild_box">
                                    <textarea name="description_c"> @if(isset($Data->description)) {{$Data->description_c}} @endif </textarea>
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
                                        <input type="text" name="website_english" value="{{{ Input::old('website_english', isset($Data) ? $Data->website_english : null) }}}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="fild_box right_fild">
                                <div class="fild_box_inner">
                                     <label>{{{ trans('site/site.Website') }}}  <span>({{{ trans('site/site.Chinese')}}} )</span></label>
                                    <div class="fild input_fild_box">
                                        <input type="text" name="website_chinese" value="{{{ Input::old('website_chinese', isset($Data) ? $Data->website_english : null) }}}"/>
                                    </div>
                                </div>
                            </div>



                        </div>

                        <div class="two_fild_row">


                            <div class="fild_box left_fild">
                                <div class="fild_box_inner">
                                     <label>{{{ trans('site/site.Facebook') }}}</label>
                                    <div class="fild input_fild_box">
                                        <input type="text" name="facebook" value="{{{ Input::old('facebook', isset($Data) ? $Data->facebook : null) }}}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="fild_box right_fild">
                                <div class="fild_box_inner">
                                    <label>{{{ trans('site/site.Instagram') }}}</label>
                                    <div class="fild input_fild_box">
                                        <input type="text" name="instagram" value="{{{ Input::old('instagram', isset($Data) ? $Data->instagram : null) }}}"/>
                                    </div>
                                </div>
                            </div>



                        </div>

                        <div class="two_fild_row">
                            <div class="fild_box left_fild">
                                <div class="fild_box_inner">
                                    <label>{{{ trans('site/site.Twitter') }}}</label>
                                    <div class="fild input_fild_box">
                                        <input type="text" name="twitter" value="{{{ Input::old('twitter', isset($Data) ? $Data->twitter : null) }}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="fild_box right_fild">
                                <div class="fild_box_inner">
                                    <label>{{{ trans('site/site.Weibo') }}}</label>
                                    <div class="fild input_fild_box">
                                        <input type="text" name="weibo" value="{{{ Input::old('weibo', isset($Data) ? $Data->weibo : null) }}}"/>
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
                                        <input type="text" id="mondayopen"  name="mondayopen" value="{{{ Input::old('mondayopen', isset($Data) ? date('h:i A', strtotime($Data->mondayopen)) : null) }}}">
                                    </div>
                                    <p>{{{ trans('site/site.to') }}}</p>
                                    <div class="hour_select_box">
                                        <input type="text"  name="mondayclosed" id="mondayclosed"  value="{{{ Input::old('mondayclosed', isset($Data) ? date('h:i A', strtotime($Data->mondayclosed))  : null) }}}">
                                    </div>

                                    <div class="same_day_button">
                                        <a href="javascript:void(0)" onclick="sameTime()">{{{ trans('site/site.Same_for_all_days') }}}</a>
                                    </div>
                                </div>

                                <div class="opening_hours_row">
                                    <span>{{{ trans('site/site.Tuesday') }}}</span>
                                    <div class="hour_select_box">
                                        <input type="text" name="tuesdayopen" id="tuesdayopen" value="{{{ Input::old('tuesdayopen', isset($Data) ? date('h:i A', strtotime($Data->tuesdayopen))  : null) }}}">
                                    </div>
                                    <p>{{{ trans('site/site.to') }}}</p>
                                    <div class="hour_select_box">
                                        <input type="text" name="tuesdayclosed" id="tuesdayclosed" value="{{{ Input::old('tuesdayclosed', isset($Data) ? date('h:i A', strtotime($Data->tuesdayclosed )): null) }}}">
                                    </div>
                                </div>

                                <div class="opening_hours_row">
                                    <span>{{{ trans('site/site.Wednesday') }}}</span>
                                    <div class="hour_select_box">
                                        <input type="text"  name="wednesdayopen" id="wednesdayopen"  value="{{{ Input::old('wednesdayopen', isset($Data) ?date('h:i A', strtotime($Data->wednesdayopen)) : null) }}}">
                                    </div>
                                   <p>{{{ trans('site/site.to') }}}</p>
                                    <div class="hour_select_box">
                                        <input type="text"    name="wednesdayclosed" id="wednesdayclosed"  value="{{{ Input::old('wednesdayclosed', isset($Data) ?date('h:i A', strtotime($Data->wednesdayclosed)) : null) }}}">
                                    </div>
                                </div>

                                <div class="opening_hours_row">
                                     <span>{{{ trans('site/site.Thursday') }}}</span>
                                    <div class="hour_select_box">
                                        <input type="text"  name="thursdayopen" id="thursdayopen"  value="{{{ Input::old('thursdayopen', isset($Data) ?date('h:i A', strtotime($Data->thursdayopen)) : null) }}}">
                                    </div>
                                    <p>{{{ trans('site/site.to') }}}</p>
                                    <div class="hour_select_box">
                                        <input type="text" name="thursdayclosed" id="thursdayclosed"  value="{{{ Input::old('thursdayclosed', isset($Data) ? date('h:i A', strtotime($Data->thursdayclosed)) : null) }}}"> 
                                    </div>
                                </div>

                                <div class="opening_hours_row">
                                    <span>{{{ trans('site/site.Friday') }}}</span>
                                    <div class="hour_select_box">
                                        <input type="text"   name="fridayopen" id="fridayopen"  value="{{{ Input::old('fridayopen', isset($Data) ?date('h:i A', strtotime($Data->fridayopen))  : null) }}}"> 
                                    </div>
                                   <p>{{{ trans('site/site.to') }}}</p>
                                    <div class="hour_select_box">
                                        <input type="text"   name="fridayclosed" id="fridayclosed"   value="{{{ Input::old('fridayclosed', isset($Data) ? date('h:i A', strtotime($Data->fridayclosed))  : null) }}}"> 
                                    </div>
                                </div>

                                <div class="opening_hours_row">
                                    <span>{{{ trans('site/site.Saturday') }}}</span>
                                    <div class="hour_select_box">
                                        <input type="text"  name="saturdayopen" id="saturdayopen"  value="{{{ Input::old('saturdayopen', isset($Data) ?date('h:i A', strtotime($Data->saturdayopen))  : null) }}}"> 
                                    </div>
                                    <p>{{{ trans('site/site.to') }}}</p>
                                    <div class="hour_select_box">
                                        <input type="text"  name="saturdayclosed" id="saturdayclosed" value="{{{ Input::old('saturdayclosed', isset($Data) ?date('h:i A', strtotime($Data->saturdayclosed )) : null) }}}"> 
                                    </div>
                                </div>

                                <div class="opening_hours_row">
                                   <span>{{{ trans('site/site.Sunday') }}}</span>
                                    <div class="hour_select_box">
                                        <input type="text"   name="sundayopen" id="sundayopen"  value="{{{ Input::old('sundayopen', isset($Data) ? date('h:i A', strtotime($Data->sundayopen)) : null) }}}"> 
                                    </div>
                                    <p>{{{ trans('site/site.to') }}}</p>
                                    <div class="hour_select_box">
                                        <input type="text"  name="sundayclosed" id="sundayclosed"  value="{{{ Input::old('sundayclosed', isset($Data) ? date('h:i A', strtotime($Data->sundayclosed)) : null) }}}"> 
                                    </div>
                                </div>

                                <div class="opening_hours_row">
                                   <span>{{{ trans('site/site.Public_Holiday') }}}</span>
                                    <div class="hour_select_box">
                                        <input type="text" name="public_holidayopen" id="public_holidayopen"  value="{{{ Input::old('public_holidayopen', isset($Data) ?  date('h:i A', strtotime($Data->public_holidayopen)) : null) }}}"> 
                                    </div>
                                    <p>{{{ trans('site/site.to') }}}</p>
                                    <div class="hour_select_box">
                                        <input type="text" name="public_holidayclosed" id="public_holidayclosed"   value="{{{ Input::old('public_holidayclosed', isset($Data) ? date('h:i A', strtotime($Data->public_holidayclosed)) : null) }}}"> 
                                    </div>
                                </div>

                                <div class="opening_hours_row">
                                     <span>{{{ trans('site/site.ChinPublic_Holidays_Eve') }}} </span>
                                    <div class="hour_select_box">
                                        <input type="text" name="public_holidayevopen" id="public_holidayevopen"  value="{{{ Input::old('public_holidayevopen', isset($Data) ?date('h:i A', strtotime($Data->public_holidayevopen)) : null) }}}"> 
                                    </div>
                                    <p>{{{ trans('site/site.to') }}}</p>
                                    <div class="hour_select_box">
                                        <input type="text" name="public_holidayevclosed" id="public_holidayevclosed"   value="{{{ Input::old('public_holidayevclosed', isset($Data) ? date('h:i A', strtotime($Data->public_holidayevclosed)) : null) }}}"> 
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
                                    <label> {{{ trans('site/site.Shop_Image') }}} 2</label>
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
                                    <label> {{{ trans('site/site.Shop_Image') }}} 3</label>
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
                                    <label> {{{ trans('site/site.Shop_Image') }}} 4</label>
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
                                    <label> {{{ trans('site/site.Shop_Image') }}} 4</label>
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
                        <input type="submit" value="{{{ trans('site/site.next') }}} "  />
<!--                        <input type="submit" value="{{{ trans('site/site.Update_Shop') }}}"/>-->
<!--                  <a href="{{ url('/personalinfo') }}"><input type="submit" value="{{{ trans('site/site.next') }}} "  /></a>-->
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
