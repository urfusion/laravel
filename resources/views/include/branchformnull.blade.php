<div class="two_fild_row">

    <div class="fild_box left_fild">
        <div class="fild_box_inner">
            <label>{{{ trans('site/site.Chain_Name') }}} <span>({{{ trans('site/site.English') }}})</span></label>
            <div class="fild input_fild_box">
                <input type="text" name="chain" required="required" readonly="" pattern=".*\S+.*[a-zA-z0-9]+"   value="{{{ Input::old('chain', isset($Data) ? $Data->chain : null) }}}"/>
            </div>
        </div>
    </div>

    <div class="fild_box right_fild">
        <div class="fild_box_inner">
            <label>{{{ trans('site/site.Chain_Name') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>
            <div class="fild input_fild_box">
                <input type="text" name="chain_c" required="required" readonly=""  value="{{{ Input::old('chain_c', isset($Data) ? $Data->chain_c : null) }}}"/>
            </div>
        </div>
    </div>

</div>

<div class="two_fild_row">

    <div class="fild_box left_fild">
        <div class="fild_box_inner">
            <label>{{{ trans('site/site.Shop_Name') }}}<sup>*</sup><span>({{{ trans('site/site.English') }}})</span></label>
            <div class="fild input_fild_box">
                <input type="text"  name="shop_name"    value=""  />
            </div>{!! $errors->first('shop_name', '')!!}
        </div>
    </div>

    <div class="fild_box right_fild">
        <div class="fild_box_inner">
            <label>{{{ trans('site/site.Shop_Name') }}}  <sup>*</sup><span>({{{ trans('site/site.Chinese') }}})</span></label>
            <div class="fild input_fild_box">
                <input type="text"  name="shop_name_c"    value=""   />
            </div>{!! $errors->first('shop_name_c', '')!!}
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
            <label>{{{ trans('site/site.Region') }}} <sup>*</sup></label>
            <div class="fild select_fild_box">



                <?php $Region = Text::Region() ?>
                <select class="" name="regionf" id="regionf"  >
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


                <select class="" name="districtf" id="districtf"   >
                    <option value="">{{{ trans("site/site.District") }}}</option>                                        
                </select>
 


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
<div id="mallmarkmtrstation1" style="  padding:5px" >    
                            <div class="fild_box_inner">
                                <label> </label>
                                <div class="fild input_fild_box">
                                    <input placeholder="mall" type="text" name="mall"    value="{{{ Input::old('mall', isset($landmarTable->mall_e) ? $landmarTable->mall_e : null) }}}" id="malldiefy"/>
                                </div>
                            </div>
                            </div>
                                    <div id="mallmarkmtrstation2" style="display: none; padding:5px" >    
                            <div class="fild_box_inner">
                                <label> </label>
                                <div class="fild input_fild_box">
                                    <input placeholder="landmark" type="text" name="landmark"    value="{{{ Input::old('landmark', isset($landmarTable->landmark_e) ? $landmarTable->landmark_e : null) }}}" id="landmarkdiefy"/>
                                </div>
                            </div>
                            </div>
                                    <div id="mallmarkmtrstation3" style="display: none; padding:5px" >    
                            <div class="fild_box_inner">
                                <label> </label>
                                <div class="fild input_fild_box">
                                    <input placeholder="building" type="text" name="building"    value="{{$Data->building}}"/>
                                </div>
                            </div>
                            </div>
                                    <div id="mallmarkmtrstation4" style="display: none; padding:5px">    
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
                                    <div id="mallmarkmtrstation6" style="display: none; padding:5px">    
                            <div class="fild_box_inner">
                                <label> </label>
                                <div class="fild input_fild_box">
                                    <input placeholder="landmark_c" type="text" name="landmark_c"   value="{{{ Input::old('landmark_c', isset($landmarTable->landmark_c) ? $landmarTable->landmark_c: null) }}}" id="landmarkdiefy_c"/>
                                </div>
                            </div>
                            </div>
                                    <div id="mallmarkmtrstation7"  style="display: none; padding:5px">    
                            <div class="fild_box_inner">
                                <label> </label>
                                <div class="fild input_fild_box">
                                    <input placeholder="building_c" type="text" name="building_c"   value="{{$Data->building_c}}"/>
                                </div>
                            </div>
                            </div>
                                    <div id="mallmarkmtrstation8"  style="display: none; padding:5px" >    
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
<h2>{{{ trans('site/site.Shop_Type') }}}<sup>*</sup></h2>

<div class="checkbox_fild_row">

    <div class="checkbox_box">
        <input type="checkbox" value="1" class="shop_type" name="shop_type[]" >

        <label>{{{ trans('site/site.Fashion_Shop') }}}</label>
    </div>

    <div class="checkbox_box">
        <input type="checkbox" value="2" class="shop_type" name="shop_type[]"    >

        <label>{{{ trans('site/site.Beauty_Retail_Shop') }}}</label>
    </div>

    <div class="checkbox_box">
        <input type="checkbox"   value="3" class="shop_type"  name="shop_type[]"   /> 
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

            <label>{{{ trans('site/site.'.$valuing) }}} </label>  

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

<h2>{{{ trans('site/site.Price_Range') }}} </h2>

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
                <label>{{{ trans('site/site.Shop_Image') }}} 1  </label>
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
                <label>{{{ trans('site/site.Shop_Image') }}} 5</label>
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
    <input type="submit" value="{{{ trans('site/site.Submit') }}}"/>
</div>

 @include('include.shopautosug')
 @include('include.shopautoladmark')
 @include('include.shopautomallc')
 @include('include.shopautolandchin')

<script type="text/javascript">

    $(document).ready(function () {

    $("#sameAsMainShop").change(function () {
    if ($(this).prop("checked") == true) {

    window.location.href = '{{{ URL::to('') }}}/Shops/{{base64_encode($Data->id)}}/AddNewBranch/1';
    }
    else if ($(this).prop("checked") == false) {

    window.location.href = '{{{ URL::to('') }}}/Shops/{{base64_encode($Data->id)}}/AddNewBranch/2';
    }
    });
    });
</script>
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