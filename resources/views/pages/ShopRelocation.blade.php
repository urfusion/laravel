@extends('app')
@section('title') Home :: @parent @stop
@section('content')

<div class="warper">

    <!--shop-closure-content-here-->
    <div class="page_content shop_closure form_bg">
        <div class="container">
            <div class="bredcrumb_menu">
              <ul>
                     <li><a href="{{ url('/home') }}"><span>{{{ trans('site/site.Home') }}}</span></a></li>
                     
                      <li><a href="{{URL::to('Shops/'.base64_encode($Data->id).'/editShopCategory')}}"><span>{{{ trans('site/site.Edit_Shop_Information') }}}</span></a></li>
                  
                    <li><a href="#">{{{ trans('site/site.Shop_Relocation') }}} </a></li>
                </ul> 
            </div> 
@include('errors.messagediv')
            <div class="inner_head_title">
                <h1>{{{ trans('site/site.Shop_Relocation') }}}</h1>
            </div>   

            <div class="inner_page_content_bg">
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data"  autocomplete="off">
                    <h2>{{{ trans('site/site.Shop_Information') }}}</h2> 
                     <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Chain_Name') }}} <span>({{{ trans('site/site.English') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="chain"   value="{{{ Input::old('chain', isset($Data) ? $Data->chain : null) }}}" />
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Chain_Name') }}} <span>({{{ trans('site/site.Chinese') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="chain_c"   value="{{{ Input::old('chain_c', isset($Data) ? $Data->chain_c : null) }}}" />
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Shop_Name') }}} <sup>*</sup><span>({{{ trans('site/site.English') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text"  name="shop_name"   value="{{{ Input::old('shop_name', isset($Data) ? $Data->shop_name : null) }}}"/>
                                </div>{!! $errors->first('shop_name', '')!!}
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Shop_Name') }}} <sup>*</sup><span>({{{ trans('site/site.Chinese') }}})</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text"  name="shop_name_c"       value="{{{ Input::old('shop_name_c', isset($Data) ? $Data->shop_name_c : null) }}}"/>
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
                                <label>{{{ trans('site/site.Telephone') }}}1 </label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="contact_phone_1"    value="{{{ Input::old('contact_phone_1', isset($Data) ? $Data->contact_phone_1 : null) }}}"/>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Telephone') }}}2</label>
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
<!-- <div class="two_fild_row">

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
                                        <?php $landmarTable = Text::mallAndLandmarkName($Data->mall); 
  
                                        ?> 
                                    <input type="text" name="mall"    value="{{{ Input::old('mall', isset($landmarTable->mall_e) ? $landmarTable->mall_e : null) }}}"/>
                                
                                
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                          <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Mall') }}}<span>({{{ trans('site/site.Chinese') }}})</span> </label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="mall_c"    value="{{{ Input::old('mall_c', isset($landmarTable->mall_c) ? $landmarTable->mall_c : null) }}}"/>
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
                                    <input type="text" name="landmark"    value="{{{ Input::old('landmark', isset($landmarTable->landmark_e) ? $landmarTable->landmark_e : null) }}}"/>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Landmark') }}}<span>({{{ trans('site/site.Chinese') }}})</span> </label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="landmark_c"    value="{{{ Input::old('landmark_c', isset($landmarTable->landmark_c) ? $landmarTable->landmark_c : null) }}}"/>
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
                    </div>-->
                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Region') }}} <sup>*</sup></label>
                                <div class="fild select_fild_box">



                                    <?php $Region = Text::Region() ?>
                                    <select class="" name="regionf" id="regionf"   >
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
                                    @else
                                    <select class="" name="districtf" id="districtf" >
                                        <option value="">{{{ trans("site/site.District") }}}</option>                                       
                                    </select>
                                    @endif


                                </div>
                            </div>
                        </div>
                        
                    </div>
                   <div class="two_fild_row new_fild_two">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>Street</label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="street"    value="{{{ Input::old('street', isset($Data) ? $Data->street : null) }}}"/>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="street_c"    value="{{{ Input::old('street', isset($Data) ? $Data->street_c : null) }}}"/>
                                </div>
                                <label class="chain_label">街名</label>
                            </div>
                        </div>
                    </div>
                    <div class="two_fild_row new_fild_two">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>Retailer</label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="retailer"    value="{{{ Input::old('retailer', isset($Data) ? $Data->retailer : null) }}}"/>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="retailer_c"    value="{{{ Input::old('retailer_c', isset($Data) ? $Data->retailer_c : null) }}}"/>
                                </div>
                                <label class="chain_label">零售商</label>
                            </div>
                        </div>
                    </div>
                    <div class="two_fild_row new_fild_box">

                        <!--                      <div class="provideotherinfo">  
                        
                                                    <label>{{{ trans('site/site.If_you_want_provide_othe_information') }}}</label>
                                                            
                                                </div>
                        -->
                        <div class="fild_box left_fild">  
                            <div class="checkbox_fild_row" >

                                <div id="mallmtrstation">
                                <div class="checkbox_box">
                                    <input type="checkbox" name="mallmtrstation" value="1" class="mallmtrstation1"  @if(isset($Data->mall)) @if ($Data->mall!=0 ) checked @endif  @endif  /> 
                                           <label>Mall</label>
                                </div>

                                <div class="checkbox_box">
                                    <input type="checkbox" name="mallmtrstation" value="2"  class="mallmtrstation2" @if(isset($Data->landmark)) @if ($Data->landmark!=0 ) checked @endif  @endif/> 
                                           <label>Landmark</label>
                                </div>

                                <div class="checkbox_box">
                                    <input type="checkbox" name="mallmtrstation" value="3"   class="mallmtrstation3" @if(isset($Data->building)) @if ($Data->building!=0 ) checked @endif  @endif /> 
                                           <label>Building</label>
                                </div> 
                                <div class="checkbox_box">
                                    <input type="checkbox" name="mallmtrstation" value="4"   class="mallmtrstation4"  @if(isset($Data->mtr_station)) @if ($Data->mtr_station!=0 ) checked @endif  @endif/> 
                                           <label>MTR Station</label>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="fild_box right_fild">
<!--                            <div class="fild_box_inner">
                                <label> </label>
                                <div class="fild input_fild_box">
                                  <?php $landmarTable = Text::mallAndLandmarkName($Data->mall);  ?>   
                                    <div class="mall_landmark1" style="display: none">  
                                    <input type="text" name="mall_landmark_station"   value="{{{ Input::old('mall', isset($landmarTable->mall_e) ? $landmarTable->mall_e : null) }}}" id="malldiefy"/>
                                    </div>
                                    <div class="mall_landmark2" style="display: none">  
                                    <input type="text" name="mall_landmark_station"    value="{{{ Input::old('landmark', isset($landmarTable->landmark_e) ? $landmarTable->landmark_e : null) }}}" id="landmarkdiefy"/>
                                    </div>
                                    <div class="mall_landmark3" style="display: none">  
                                    <input type="text" name="mall_landmark_station"    value="{{$Data->building}}"/>
                                    </div>
                                    <div class="mall_landmark4" style="display: none">  
                                    <input type="text" name="mall_landmark_station"    value="{{$Data->mtr_station}}"/>
                                    </div>
                            </div>
                        </div>-->
<div id="mallmarkmtrstation1"  style=" padding:5px">    
                            <div class="fild_box_inner">
                                <label> </label>
                                <div class="fild input_fild_box">
                                    <input placeholder="mall" type="text" name="mall"    value="{{{ Input::old('mall', isset($landmarTable->mall_e) ? $landmarTable->mall_e : null) }}}" id="malldiefy"/>
                                </div>
                            </div>
                            </div>
                                    <div id="mallmarkmtrstation2"  style="display: none; padding:5px">    
                            <div class="fild_box_inner">
                                <label> </label>
                                <div class="fild input_fild_box">
                                    <input placeholder="landmark" type="text" name="landmark"    value="{{{ Input::old('landmark', isset($landmarTable->landmark_e) ? $landmarTable->landmark_e : null) }}}" id="landmarkdiefy"/>
                                </div>
                            </div>
                            </div>
                                    <div id="mallmarkmtrstation3" style="display: none; padding:5px">    
                            <div class="fild_box_inner">
                                <label> </label>
                                <div class="fild input_fild_box">
                                    <input placeholder="building" type="text" name="building"    value="{{$Data->building}}"/>
                                </div>
                            </div>
                            </div>
                                    <div id="mallmarkmtrstation4"  style="display: none; padding:5px" >    
                            <div class="fild_box_inner">
                                <label> </label>
                                <div class="fild input_fild_box">
                                    <input  placeholder="mtr_station"type="text" name="mtr_station"   value="{{$Data->mtr_station}}"/>
                                </div>
                            </div>
                            </div>
                    </div>
                    </div>

                    <div class="two_fild_row new_fild_box">

                        <!--                      <div class="provideotherinfo">  
                        
                                                    <label>{{{ trans('site/site.If_you_want_provide_othe_information') }}}</label>
                                                            
                                                </div>
                        -->
                        <div class="fild_box left_fild">  
                            <div class="checkbox_fild_row" >


                                <div class="checkbox_box">
                                    <input type="checkbox" name="mallmtrstation_c" value="1" class="mallmtrstation5" @if(isset($Data->mall_c)) @if ($Data->mall_c!=0 ) checked @endif  @endif   /> 
                                           <label>商場</label>
                                </div>

                                <div class="checkbox_box">
                                    <input type="checkbox" name="mallmtrstation_c" value="2"  class="mallmtrstation6"@if(isset($Data->landmark_c)) @if ($Data->landmark_c!=0 ) checked @endif  @endif /> 
                                           <label>地標</label>
                                </div>

                                <div class="checkbox_box">
                                    <input type="checkbox" name="mallmtrstation_c" value="3"   class="mallmtrstation7" @if(isset($Data->building_c)) @if ($Data->building_c!=0 ) checked @endif  @endif /> 
                                           <label>大廈</label>
                                </div> 
                                <div class="checkbox_box">
                                    <input type="checkbox" name="mallmtrstation_c" value="4"   class="mallmtrstation8" @if(isset($Data->mtr_station_c)) @if ($Data->mtr_station_c!=0 ) checked @endif  @endif /> 
                                           <label>地鐵站</label>
                                </div>





                            </div>
                        </div>
<!--                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label> </label>
                                <div class="fild input_fild_box">
                                    
                                     <?php $landmarTable = Text::mallAndLandmarkName($Data->mall);  ?>   
                                    <div class="mall_landmark1_c" style="display: none">  
                                    <input type="text" name="mall_landmark_station_c"   value="{{{ Input::old('mall_c', isset($landmarTable->mall_c) ? $landmarTable->mall_c : null) }}}" id="malldiefy"/>
                                    </div>
                                    <div class="mall_landmark2_c" style="display: none">  
                                    <input type="text" name="mall_landmark_station_c"    value="{{{ Input::old('landmark_c', isset($landmarTable->landmark_c) ? $landmarTable->landmark_c: null) }}}" id="landmarkdiefy"/>
                                    </div>
                                    <div class="mall_landmark3_c" style="display: none">  
                                    <input type="text" name="mall_landmark_station_c"    value="{{$Data->building_c}}"/>
                                    </div>
                                    <div class="mall_landmark4_c" style="display: none">  
                                    <input type="text" name="mall_landmark_station_c"    value="{{$Data->mtr_station_c}}"/>
                                    </div>
                                </div>
                            </div>
                        </div>-->
<div class="fild_box right_fild">
                             
                                <div class="fild input_fild_box">
                                   <div id="mallmarkmtrstation5" style=" padding:5px" >    
                            <div class="fild_box_inner">
                                <label> </label>
                                <div class="fild input_fild_box">
                                    <input placeholder="mall_c" type="text" name="mall_c"     value="{{{ Input::old('mall_c', isset($landmarTable->mall_c) ? $landmarTable->mall_c : null) }}}" id="malldiefy_c"/>
                                </div>
                            </div>
                            </div>
                                    <div id="mallmarkmtrstation6"  style="display: none; padding:5px" >    
                            <div class="fild_box_inner">
                                <label> </label>
                                <div class="fild input_fild_box">
                                    <input placeholder="landmark_c" type="text" name="landmark_c"   value="{{{ Input::old('landmark_c', isset($landmarTable->landmark_c) ? $landmarTable->landmark_c: null) }}}" id="landmarkdiefy_c"/>
                                </div>
                            </div>
                            </div>
                                    <div id="mallmarkmtrstation7"  style="display: none; padding:5px" >    
                            <div class="fild_box_inner">
                                <label> </label>
                                <div class="fild input_fild_box">
                                    <input placeholder="building_c" type="text" name="building_c"   value="{{$Data->building_c}}"/>
                                </div>
                            </div>
                            </div>
                                    <div id="mallmarkmtrstation8"  style="display: none; padding:5px">    
                            <div class="fild_box_inner">
                                <label> </label>
                                <div class="fild input_fild_box">
                                    <input  placeholder="mtr_station_c"type="text" name="mtr_station_c"     value="{{$Data->mtr_station_c}}"/>
                                </div>
                            </div>
                            </div>
                                </div>
                            </div>
                    </div>
<div class="two_fild_row new_fild_box3  ">
<div class="fild_box left_fild">
<div class="checkbox_fild_row">
<div class="checkbox_box">
	<input type="radio" name="phase_block_type" class="phase_block" value="0" /> 
	<label>Phase</label>
</div>

<div class="checkbox_box">
	<input type="radio" name="phase_block_type" class="phase_block" value="1" /> 
	<label>Block</label>
	
</div>
</div>

<div class="shoproomflateinput">
<div class="fild input_fild_box">
 <input type="text" name="phase_block" value=""/>
</div>
</div> 

</div> 
            

<div class="fild_box right_fild">
<div class="shoproomflateinput">
	 
	<div class="fild input_fild_box">
		<input type="text" name="phase_block_c"    value=""  />
	</div>

</div> 
<div class="checkbox_box4">
<div class="checkbox_box">
	<input type="radio" name="phase_block_type_c" class="phase_block" value="0" /> 
	<label>期</label>
</div>

<div class="checkbox_box">
	<input type="radio" name="phase_block_type_c" class="phase_block" value="1" /> 
	<label>座</label>
	 
</div>
</div>







</div>
					
					
</div>

                    <div class="two_fild_row new_fild_box3">
                        <div class="fild_box left_fild">

                            <div class="checkbox_fild_row">
                                <div class="checkbox_box">
                                    <input type="radio" name="shoproomflatetype" class="shoproomflate" value="0" @if(isset($Data->shop_room_flate_unit_type)) @if ($Data->shop_room_flate_unit_type==0 ) checked @endif  @endif /> 
                                           <label>Shop</label>
                                </div>
                                <div class="checkbox_box">
                                    <input type="radio" name="shoproomflatetype" class="shoproomflate" value="1"@if(isset($Data->shop_room_flate_unit_type)) @if ($Data->shop_room_flate_unit_type==1 ) checked @endif  @endif  /> 
                                           <label>Room</label>
                                </div>
                                <div class="checkbox_box">
                                    <input type="radio" name="shoproomflatetype" class="shoproomflate" value="2"@if(isset($Data->shop_room_flate_unit_type)) @if ($Data->shop_room_flate_unit_type==2 ) checked @endif  @endif  /> 
                                           <label>Flate</label>
                                </div>
                                <div class="checkbox_box">
                                    <input type="radio" name="shoproomflatetype" class="shoproomflate" value="3" @if(isset($Data->shop_room_flate_unit_type)) @if ($Data->shop_room_flate_unit_type==3 ) checked @endif  @endif /> 
                                           <label>Unit</label>
                                </div>
                            </div>


                            <div class="shoproomflateinput">
                                <div class="fild input_fild_box">
                                    <input type="text" name="shoproomflateinput"    value="{{{ Input::old('floor_line_2', isset($Data) ? $Data->floor_line_2 : null) }}}"  />
                                </div>
                            </div> 


                        </div> 

                        <div class="fild_box right_fild">
                            <div class="shoproomflateinput">
                                <div class="fild input_fild_box">
                                    <input type="text" name="shoproomflateinput_c"    value="{{{ Input::old('floor_line_2_c', isset($Data) ? $Data->floor_line_2_c : null) }}}"  />
                                </div>
                            </div> 

                            <div class="checkbox_box4">
                                <div class="checkbox_box">
                                    <input type="radio" name="shoproomflatetype_c" class="shoproomflate" value="0"@if(isset($Data->shop_room_flate_unit_type_c)) @if ($Data->shop_room_flate_unit_type_c==0 ) checked @endif  @endif/> 
                                           <label>號舖</label>
                                </div>
                                <div class="checkbox_box">
                                    <input type="radio" name="shoproomflatetype_c" class="shoproomflate" value="1"@if(isset($Data->shop_room_flate_unit_type_c)) @if ($Data->shop_room_flate_unit_type_c==1 ) checked @endif  @endif/> 
                                           <label>室</label>
                                </div>
                            </div>

                        </div>

                    </div>

                  <div class="two_fild_row new_fild_box3">
    <div class="fild_box left_fild">
     <div class="checkbox_fild_row">
            <div class="checkbox_box">
             <label> </label>
            </div>
            <div class="checkbox_box">
                <label> </label>
            </div>
            <div class="checkbox_box">
               <label> </label>
            </div>
            <div class="checkbox_box">
                <label> </label>
             </div>
        </div>
    

        <div class="shoproomflateinput">
         <div class="fild input_fild_box">
           <input type="text" name="floor" value=""/>
         </div>
         </div> 
         <div class="checkbox_box4">
	<div class="checkbox_box">
 	 
	 <label>/F</label>
	</div>
	</div>
   
    </div> 
    
	<div class="fild_box right_fild">
	 <div class="shoproomflateinput">
	  <div class="fild input_fild_box">
	   <input type="text" name="floor_c"    value=""  />
	  </div>
	 </div> 
	
    <div class="checkbox_box4">
	<div class="checkbox_box">
 	 <input type="radio" name="floor_c" class="shoproomflate2" value="0"/> 
	 <label>樓</label>
	</div>
	<div class="checkbox_box">
	 <input type="radio" name="floor_c" class="shoproomflate2" value="1"/> 
	 <label>層</label>
	</div>
    </div>
                                   
    </div>
   
  </div>   
                   <div class="two_fild_row new_fild_box3">

<div class="fild_box left_fild" >
<div class="checkbox_fild_row">
<div class="checkbox_box " >
    <div id="add_shopclick">
        <label><span>+</span>Floor & Shop number  新增樓層及舖號</label>
</div>
</div>

 
</div>

  

</div> 
            

<div class="fild_box right_fild">


 

 



</div>
					
					
</div>
                      <div id="add_shopfloor" style="display: none;">
 <div class="two_fild_row new_fild_box3">
    <div class="fild_box left_fild">
        
		<div class="checkbox_fild_row">
            <div class="checkbox_box">
                <input type="radio" name="shoproomflatetype2" class="shoproomflate" value="0" /> 
                <label>Shop</label>
            </div>
            <div class="checkbox_box">
                <input type="radio" name="shoproomflatetype2" class="shoproomflate" value="1" /> 
                <label>Room</label>
            </div>
            <div class="checkbox_box">
                <input type="radio" name="shoproomflatetype2" class="shoproomflate" value="2" /> 
                <label>Flate</label>
            </div>
            <div class="checkbox_box">
                <input type="radio" name="shoproomflatetype2" class="shoproomflate" value="3" /> 
                <label>Unit</label>
             </div>
        </div>
    

        <div class="shoproomflateinput">
         <div class="fild input_fild_box">
           <input type="text" name="shop_line_2" value=""/>
         </div>
         </div> 
            
   
    </div> 
    
	<div class="fild_box right_fild">
	 <div class="shoproomflateinput">
	  <div class="fild input_fild_box">
	   <input type="text" name="shop_line_2_c"    value=""  />
	  </div>
	 </div> 
	
    <div class="checkbox_box4">
	<div class="checkbox_box">
 	 <input type="radio" name="shoproomflatetype2_c" class="shoproomflate" value="0"/> 
	 <label>號舖</label>
	</div>
	<div class="checkbox_box">
	 <input type="radio" name="shoproomflatetype2_c" class="shoproomflate" value="1"/> 
	 <label>室</label>
	</div>
    </div>
                                   
    </div>
   
  </div>
                  
<div class="two_fild_row new_fild_box3">
    <div class="fild_box left_fild">
     <div class="checkbox_fild_row">
            <div class="checkbox_box">
             <label> </label>
            </div>
            <div class="checkbox_box">
                <label> </label>
            </div>
            <div class="checkbox_box">
               <label> </label>
            </div>
            <div class="checkbox_box">
                <label> </label>
             </div>
        </div>
    

        <div class="shoproomflateinput">
         <div class="fild input_fild_box">
           <input type="text" name="floor_line_2" value=""/>
         </div>
         </div> 
         <div class="checkbox_box4">
	<div class="checkbox_box">
 	 
	 <label>/F</label>
	</div>
	</div>
   
    </div> 
    
	<div class="fild_box right_fild">
	 <div class="shoproomflateinput">
	  <div class="fild input_fild_box">
	   <input type="text" name="floor_line_2_c"    value=""  />
	  </div>
	 </div> 
	
    <div class="checkbox_box4">
	<div class="checkbox_box">
 	 <input type="radio" name="shoproomflatetype22_c" class="shoproomflate2" value="0"/> 
	 <label>樓</label>
	</div>
	<div class="checkbox_box">
	 <input type="radio" name="shoproomflatetype22_c" class="shoproomflate2" value="1"/> 
	 <label>層</label>
	</div>
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
                            <span>{{{ trans('site/site.ChinPublic_Holidays_Eve') }}}</span>
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
                    
                    
                    

                    <div class="submit_button_bg">
                        <input type="submit" value="{{{ trans('site/site.Submit') }}}"/>
                    </div>

                </form>
            </div>

        </div>
    </div>
    <!--shop-closure-content-end-->
</div>
 @include('include.shopautosug')
 @include('include.shopautoladmark')
 @include('include.shopautomallc')
 @include('include.shopautolandchin')
 <script>
     $(document).ready(function() 
     {
         var val = $('input[class="mallmtrstation1"]:checked').val();
          if (val == "1"  ) {
           $('.mall_landmark1').show( );
          }
          else if(val == "2" )
              {
                  $('.mall_landmark2').show( );
              }
             else if(val == "3" )
              {
                  $('.mall_landmark3').show( );
              }
              else 
              {
                  $('.mall_landmark4').show( );
              }
     });
  
  
</script>
 <script>
     $(document).ready(function() 
     {
         var val = $('input[class="mallmtrstation1_c"]:checked').val();
          if (val == "1"  ) {
           $('.mall_landmark1_c').show( );
          }
          else if(val == "2" )
              {
                  $('.mall_landmark2_c').show( );
              }
             else if(val == "3" )
              {
                  $('.mall_landmark3_c').show( );
              }
              else 
              {
                  $('.mall_landmark4_c').show( );
              }
     });
  
  
</script>
<script>
$(function () {
        $(".mallmtrstation1").click(function () {
            if ($(this).is(":checked")) {
                $("#mallmarkmtrstation1").show('slow');
            } else {
                $("#mallmarkmtrstation1").hide('slow');
            }
        });
        $(".mallmtrstation2").click(function () {
            if ($(this).is(":checked")) {
                $("#mallmarkmtrstation2").show('slow');
            } else {
                $("#mallmarkmtrstation2").hide('slow');
            }
        });
        $(".mallmtrstation3").click(function () {
            if ($(this).is(":checked")) {
                $("#mallmarkmtrstation3").show('slow');
            } else {
                $("#mallmarkmtrstation3").hide('slow');
            }
        });
        $(".mallmtrstation4").click(function () {
            if ($(this).is(":checked")) {
                $("#mallmarkmtrstation4").show('slow');
            } else {
                $("#mallmarkmtrstation4").hide('slow');
            }
        });
        $(".mallmtrstation5").click(function () {
            if ($(this).is(":checked")) {
                $("#mallmarkmtrstation5").show('slow');
            } else {
                $("#mallmarkmtrstation5").hide('slow');
            }
        });
        $(".mallmtrstation6").click(function () {
            if ($(this).is(":checked")) {
                $("#mallmarkmtrstation6").show('slow');
            } else {
                $("#mallmarkmtrstation6").hide('slow');
            }
        });
        $(".mallmtrstation7").click(function () {
            if ($(this).is(":checked")) {
                $("#mallmarkmtrstation7").show('slow');
            } else {
                $("#mallmarkmtrstation7").hide('slow');
            }
        });
        $(".mallmtrstation8").click(function () {
            if ($(this).is(":checked")) {
                $("#mallmarkmtrstation8").show('slow');
            } else {
                $("#mallmarkmtrstation8").hide('slow');
            }
        });
        $(".mallmtrstation9").click(function () {
            if ($(this).is(":checked")) {
                $("#mallmarkmtrstation9").show('slow');
            } else {
                $("#mallmarkmtrstation9").hide('slow');
            }
        });
    });
</script>
<script>
jQuery(document).ready(function(){
    jQuery('#add_shopclick').live('click', function(event) {        
         jQuery('#add_shopfloor').toggle('show');
    });
});
</script> 
@endsection

@stop
