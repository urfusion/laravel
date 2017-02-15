@extends('app')
@section('title') Home :: @parent @stop
@section('content')

<div class="warper">

    <!--shop-closure-content-here-->
    <div class="page_content shop_closure form_bg">
        <div class="container">
            <div class="bredcrumb_menu">
                <ul>
                    <li><span>Home</span></li>
                    <li><span>Edit Shop Information</span></li>
                    <li><a href="#">Shop Renovation </a></li>
                </ul>  
            </div> 
@include('errors.messagediv')
            <div class="inner_head_title">
                <h1>Shop Renovation</h1>
            </div>   

            <div class="inner_page_content_bg">
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data"  autocomplete="off">
                    <h2>Shop Information</h2> 
                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>Chain name <span>(English)</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="chain"   value="{{{ Input::old('chain', isset($Data) ? $Data->chain : null) }}}"  />
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>Chain name <span>(Chinese)</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="chain_c"   value="{{{ Input::old('chain_c', isset($Data) ? $Data->chain_c : null) }}}"  />
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>Shop name  <sup>*</sup><span>(English)</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text"  name="shop_name"    value="{{{ Input::old('shop_name', isset($Data) ? $Data->shop_name : null) }}}"/>
                                </div>{!! $errors->first('shop_name', '')!!}
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>Shop name  <sup>*</sup><span>(Chinese)</span></label>
                                <div class="fild input_fild_box">
                                    <input type="text"  name="shop_name_c"     value="{{{ Input::old('shop_name_c', isset($Data) ? $Data->shop_name_c : null) }}}"/>
                                </div>{!! $errors->first('shop_name_c', '')!!}
                            </div>
                        </div>

                    </div>

                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>Shop Email</label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="shop_email"    value="{{{ Input::old('shop_email', isset($Data) ? $Data->shop_email : null) }}}"/>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>Telephone </label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="contact_phone_1"    value="{{{ Input::old('contact_phone_1', isset($Data) ? $Data->contact_phone_1 : null) }}}"/>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>Telephone 2</label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="contact_phone_2"    value="{{{ Input::old('contact_phone_2', isset($Data) ? $Data->contact_phone_2 : null) }}}"/>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>Fax </label>
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
                                <label>Region <sup>*</sup></label>
                                <div class="fild select_fild_box">



                                    <?php $Region = Text::Region() ?>
                                    <select class="" name="regionf" id="regionf" >
                                        <option value="">{{{ trans("site/site.Region") }}}</option>
                                        @foreach($Region as $region)
                                        <option value="{{$region}}" {{ ($Data->region== $region) ? 'selected="selected"' : null }} >{{$region}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label>District  <sup>*</sup></label>
                                <div class="fild select_fild_box" id="districtlistf">
                                    @if(isset($Data->region))
                                    <?php $District2 = Text::Districts($Data->region); ?>
                                    <select class="" name="districtf" id="districtf"   >
                                        <option value="">{{{ trans("site/site.District") }}}</option>
                                        @foreach($District2 as $district)
                                        <option value="{{$district}}" {{ ($Data->district == $district) ? 'selected="selected"' : null }} >{{$district}}</option>
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
                                <label>Address <sup>*</sup><span>(English)</span></label>


                                <div class="fild textarea_fild_box">
                                    <textarea  name="address"   >{{{ Input::old('address', isset($Data) ? $Data->address : null) }}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="fild_box right_fild">
                            <div class="fild_box_inner">
                                <label><p>Or</p>Address   <sup>*</sup><span>(Chinese)</span></label>
                                <div class="fild textarea_fild_box">
                                    <textarea  name="address_c"  >{{{ Input::old('address_c', isset($Data) ? $Data->address_c : null) }}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>-->

                    <div class="opening_hours_box">
                        <div class="opening_hours_left">
                            <label>Opening Hours</label>
                        </div> 
                        <div class="opening_hours_right">
                            <div class="opening_hours_row">
                                <span>Monday</span>
                                <div class="hour_select_box">
                                    <input type="text" id="mondayopen"  name="mondayopen" value="">
                                </div>
                                <p>to</p>
                                <div class="hour_select_box">
                                    <input type="text"  name="mondayclosed" id="mondayclosed"  value="">
                                </div>

                                <div class="same_day_button">
                                    <a href="javascript:void(0)" onclick="sameTime()">Same for all days</a>
                                </div>
                            </div>

                            <div class="opening_hours_row">
                                <span>Tuesday</span>
                                <div class="hour_select_box">
                                    <input type="text" name="tuesdayopen" id="tuesdayopen" value="">
                                </div>
                                <p>to</p>
                                <div class="hour_select_box">
                                    <input type="text" name="tuesdayclosed" id="tuesdayclosed" value="">
                                </div>
                            </div>

                            <div class="opening_hours_row">
                                <span>Wednesday</span>
                                <div class="hour_select_box">
                                    <input type="text"  name="wednesdayopen" id="wednesdayopen"  value="">
                                </div>
                                <p>to</p>
                                <div class="hour_select_box">
                                    <input type="text"    name="wednesdayclosed" id="wednesdayclosed"  value="">
                                </div>
                            </div>

                            <div class="opening_hours_row">
                                <span>Thursday</span>
                                <div class="hour_select_box">
                                    <input type="text"  name="thursdayopen" id="thursdayopen"  value="">
                                </div>
                                <p>to</p>
                                <div class="hour_select_box">
                                    <input type="text" name="thursdayclosed" id="thursdayclosed"  value=""> 
                                </div>
                            </div>

                            <div class="opening_hours_row">
                                <span>Friday</span>
                                <div class="hour_select_box">
                                    <input type="text"   name="fridayopen" id="fridayopen"  value=""> 
                                </div>
                                <p>to</p>
                                <div class="hour_select_box">
                                    <input type="text"   name="fridayclosed" id="fridayclosed"   value=""> 
                                </div>
                            </div>

                            <div class="opening_hours_row">
                                <span>Saturday</span>
                                <div class="hour_select_box">
                                    <input type="text"  name="saturdayopen" id="saturdayopen"  value=""> 
                                </div>
                                <p>to</p>
                                <div class="hour_select_box">
                                    <input type="text"  name="saturdayclosed" id="saturdayclosed" value=""> 
                                </div>
                            </div>

                            <div class="opening_hours_row">
                                <span>Sunday</span>
                                <div class="hour_select_box">
                                    <input type="text"   name="sundayopen" id="sundayopen"  value=""> 
                                </div>
                                <p>to</p>
                                <div class="hour_select_box">
                                    <input type="text"  name="sundayclosed" id="sundayclosed"  value=""> 
                                </div>
                            </div>

                            <div class="opening_hours_row">
                                <span>Public Holiday </span>
                                <div class="hour_select_box">
                                    <input type="text" name="public_holidayopen" id="public_holidayopen"  value=""> 
                                </div>
                                <p>to</p>
                                <div class="hour_select_box">
                                    <input type="text" name="public_holidayclosed" id="public_holidayclosed"   value=""> 
                                </div>
                            </div>

                            <div class="opening_hours_row">
                                <span>Public Holidays’ Eve </span>
                                <div class="hour_select_box">
                                    <input type="text" name="public_holidayevopen" id="public_holidayevopen"  value=""> 
                                </div>
                                <p>to</p>
                                <div class="hour_select_box">
                                    <input type="text" name="public_holidayevclosed" id="public_holidayevclosed"   value=""> 
                                </div>
                            </div>

                        </div> 
                    </div>




                    <div class="submit_button_bg">
                        <input type="submit" value="Submit"/>
                    </div>

                </form>
            </div>

        </div>
    </div>
    <!--shop-closure-content-end-->
</div>


@endsection

@stop
