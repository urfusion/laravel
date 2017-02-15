@extends('admin.layouts.default') @section('content')

<form class="form-horizontal" method="post"
      action="" enctype="multipart/form-data" 
      autocomplete="off">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" /> 
      <input  type="hidden" name="shop_id" id="shop_id"   value="{{{ Input::old('shop_id', isset($Data) ?  $Data->shop_id : null) }}}"> 
    <div class="row"> </div>
    <div data-collapsed="0" class="  col-md-12">
        <div data-collapsed="0" class="panel panel-primary col-sm-6">

            <div class="panel-heading">
                <div class="panel-title">

                    Shop information
                </div> 
            </div>			
            <div class="panel-body">
                <!--#########################forn end #######################-->

                <!------------------chain name English ------------------------>
                <div class="form-group {{{ $errors->has('chain') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">Chain name<span>(English)</span></label>

                    <div class="col-sm-5">
                      <label class="control-label" for="field-1">{{{ Input::old('chain', isset($Data) ? $Data->chain : null) }}}
                    </label> </div>
                </div>

                <!------------------chain name Chinese ------------------------>
                <div class="form-group {{{ $errors->has('chain_c') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">Chain name<span>(Chinese)</span></label>

                    <div class="col-sm-5">
                        <label class="control-label" for="field-1">{{{ Input::old('chain_c', isset($Data) ? $Data->chain_c : null) }}}
                    </label>
                    </div>
                </div>

                <!------------------Shop name English------------------------>
                <div class="form-group {{{ $errors->has('shop_name') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">Shop Name(English)</label>

                    <div class="col-sm-5">
                        <label class="control-label" for="field-1">{{{ Input::old('shop_name', isset($Data) ? $Data->shop_name : null) }}}
                    </label>
                    </div>
                </div>

                <!------------------Shop name Chinese------------------------>
                <div class="form-group {{{ $errors->has('shop_name_c') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">Shop Name(Chinese)</label>

                    <div class="col-sm-5">
                       <label class="control-label" for="field-1">{{{ Input::old('shop_name_c', isset($Data) ? $Data->shop_name_c : null) }}}
                    </label>
                    </div>
                </div>
                <!------------------Shop Email------------------------>
                <div class="form-group {{{ $errors->has('shop_email') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">Shop Email</label>

                    <div class="col-sm-5">
                       <label class="control-label" for="field-1">{{{ Input::old('shop_email', isset($Data) ? $Data->shop_email : null) }}}
                    </label>
                    </div>
                </div>

                <!------------------Shop contact no------------------------>
                <div class="form-group {{{ $errors->has('contact_phone_1') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">Shop contact no</label>

                    <div class="col-sm-5">
                        <label class="control-label" for="field-1">{{{ Input::old('contact_phone_1', isset($Data) ? $Data->contact_phone_1  : null) }}}
                    </label>
                    </div>
                </div>

                <!------------------Shop contact no 2------------------------>
                <div class="form-group {{{ $errors->has('contact_phone_2') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">Shop contact no</label>

                    <div class="col-sm-5">
                        <label class="control-label" for="field-1">{{{ Input::old('contact_phone_2 ', isset($Data) ? $Data->contact_phone_2  : null) }}}
                    </label>
                    </div>
                </div>
                <!------------------Shop Fax------------------------>
                <div class="form-group {{{ $errors->has('shop_fax') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">Fax</label>

                    <div class="col-sm-5">
                        <label class="control-label" for="field-1">{{{ Input::old('shop_fax', isset($Data) ? $Data->shop_fax  : null) }}}
                    </label>
                    </div>
                </div>
<div class="form-group {{{ $errors->has('shop_no') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Shop_No') }}}<span>({{{ trans('site/site.English') }}})</span></label>

                    <div class="col-sm-5">
                        <label class="control-label" for="field-1">{{{ Input::old('shop_no', isset($Data) ? $Data->shop_no  : null) }}}
                        </label>
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('shop_no_c') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Shop_No') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>

                    <div class="col-sm-5">
                        <label class="control-label" for="field-1">{{{ Input::old('shop_no_c', isset($Data) ? $Data->shop_no_c  : null) }}}
                        </label>
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('shop_line_2') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Shop_Line') }}}2<span>({{{ trans('site/site.English') }}})</span></label>

                    <div class="col-sm-5">
                        <label class="control-label" for="field-1">{{{ Input::old('shop_line_2', isset($Data) ? $Data->shop_line_2  : null) }}}
                        </label>
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('shop_line_2_c') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Shop_Line') }}}2<span>({{{ trans('site/site.Chinese') }}})</span></label>

                    <div class="col-sm-5">
                        <label class="control-label" for="field-1">{{{ Input::old('shop_line_2_c', isset($Data) ? $Data->shop_line_2_c  : null) }}}
                        </label>
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('floor') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Floor') }}}<span>({{{ trans('site/site.English') }}})</span></label>

                    <div class="col-sm-5">
                        <label class="control-label" for="field-1">{{{ Input::old('floor', isset($Data) ? $Data->floor  : null) }}}
                        </label>
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('floor_c') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Floor') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>

                    <div class="col-sm-5">
                        <label class="control-label" for="field-1">{{{ Input::old('floor_c', isset($Data) ? $Data->floor_c  : null) }}}
                        </label>
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('floor_line_2') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Floor_Line') }}} 2<span>({{{ trans('site/site.English') }}})</span></label>

                    <div class="col-sm-5">
                        <label class="control-label" for="field-1">{{{ Input::old('floor_line_2', isset($Data) ? $Data->floor_line_2  : null) }}}
                        </label>
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('floor_line_2_c') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Floor_Line') }}} 2<span>({{{ trans('site/site.Chinese') }}})</span></label>

                    <div class="col-sm-5">
                        <label class="control-label" for="field-1">{{{ Input::old('floor_line_2_c', isset($Data) ? $Data->floor_line_2_c  : null) }}}
                        </label>
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('mall') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Mall') }}} <span>({{{ trans('site/site.English') }}})</span></label>

                    <div class="col-sm-5">
                        <?php $landmarTable = Text::mallAndLandmarkName($Data->mall); 
  
                                        ?> 
                        <label class="control-label" for="field-1">{{{ Input::old('mall', isset($landmarTable->mall_e) ? $landmarTable->mall_e: null) }}}
                        </label>
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('mall_c') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Mall') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>

                    <div class="col-sm-5">
                        <label class="control-label" for="field-1">{{{ Input::old('mall_c', isset($landmarTable->mall_c) ? $landmarTable->mall_c : null) }}}
                        </label>
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('building') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Building') }}}<span>({{{ trans('site/site.English') }}})</span></label>

                    <div class="col-sm-5">
                        <label class="control-label" for="field-1">{{{ Input::old('building', isset($Data) ? $Data->building  : null) }}}
                        </label>
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('building_c') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Building') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>

                    <div class="col-sm-5">
                        <label class="control-label" for="field-1">{{{ Input::old('building_c', isset($Data) ? $Data->building_c  : null) }}}
                        </label>
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('landmark') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Landmark') }}}<span>({{{ trans('site/site.English') }}})</span></label>

                    <div class="col-sm-5">
                                                <?php $landmarTable = Text::mallAndLandmarkName($Data->mall);  ?> 

                        <label class="control-label" for="field-1">{{{ Input::old('landmark',isset($landmarTable->landmark_e) ? $landmarTable->landmark_e :  null) }}}
                        </label>
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('landmark_c') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Landmark') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>

                    <div class="col-sm-5">
                                                <?php $landmarTable = Text::mallAndLandmarkName($Data->mall);  ?> 

                        <label class="control-label" for="field-1">{{{ Input::old('shop_fax', isset($landmarTable->landmark_c) ? $landmarTable->landmark_c: null) }}}
                        </label>
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('phase_block') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Phase_Block') }}}<span>({{{ trans('site/site.English') }}})</span></label>

                    <div class="col-sm-5">
                        <label class="control-label" for="field-1">{{{ Input::old('phase_block', isset($Data) ? $Data->phase_block  : null) }}}
                        </label>
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('phase_block_c') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Phase_Block') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>

                    <div class="col-sm-5">
                        <label class="control-label" for="field-1">{{{ Input::old('phase_block_c', isset($Data) ? $Data->phase_block_c  : null) }}}
                        </label>
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('street') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Street') }}}<span>({{{ trans('site/site.English') }}})</span></label>

                    <div class="col-sm-5">
                        <label class="control-label" for="field-1">{{{ Input::old('street', isset($Data) ? $Data->street  : null) }}}
                        </label>
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('street_c') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Street') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>

                    <div class="col-sm-5">
                        <label class="control-label" for="field-1">{{{ Input::old('street_c', isset($Data) ? $Data->street_c  : null) }}}
                        </label>
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('mtr_station') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.MTR_Station') }}}<span>({{{ trans('site/site.English') }}})</span></label>

                    <div class="col-sm-5">
                        <label class="control-label" for="field-1">{{{ Input::old('mtr_station', isset($Data) ? $Data->mtr_station  : null) }}}
                        </label>
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('mtr_station_c') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.MTR_Station') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>

                    <div class="col-sm-5">
                        <label class="control-label" for="field-1">{{{ Input::old('mtr_station_c', isset($Data) ? $Data->mtr_station_c  : null) }}}
                        </label>
                    </div>
                </div>
                <!------------------Shop Region------------------------>
                <div class="form-group {{{ $errors->has('region') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">Region</label>

                    <div class="col-sm-5">
                     <label class="control-label" for="field-1">
                          <?php  
                $regID= $Data->region;
                $Shoregions = Text::Shopesregions($regID); ?>
                        @foreach($Shoregions as $Shoregion)
                          {{{ $Shoregion->name_e }}}
                          @endforeach
<!--                         {{{ Input::old('region', isset($Data) ? $Data->region  : null) }}}-->
                    </label> 
                    </div>
                </div>


                <!------------------Shop District------------------------>
                <div class="form-group {{{ $errors->has('region') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">District</label>

                    <div class="col-sm-5">
                       <label class="control-label" for="field-1">
                            <?php  
                $distID= $Data->district;
                $Shodistrics = Text::Shopesdistrics($distID); ?>
                        @foreach($Shodistrics as $Shodistric)
                          {{{ $Shodistric->name_e }}}
                          @endforeach
<!--                           {{{ Input::old('district', isset($Data) ? $Data->district  : null) }}}-->
                    </label>
                    </div>
                </div>

                <!------------------Shop Address English------------------------>
<!--                <div class="form-group {{{ $errors->has('address') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">Address<span>(English)</span></label>

                    <div class="col-sm-5">
                       <label class="control-label" for="field-1">{{{ Input::old('address', isset($Data) ? $Data->address   : null) }}}
                    </label>
                    </div>
                </div>

                ----------------Shop Address Chinese----------------------
                <div class="form-group {{{ $errors->has('address_c') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">Address<span>(Chinese)</span></label>

                    <div class="col-sm-5">
                        <label class="control-label" for="field-1">{{{ Input::old('address_c', isset($Data) ? $Data->address_c   : null) }}}
                    </label>
                    </div>
                </div>-->


                <div class="form-group {{{ $errors->has('shop_name') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">Shop Type</label>

                    <div class="col-sm-5">
                     
                        <?php $priceRangeConfig = Config::get('constants.ShopType'); ?>                                                   
                        <label class="control-label" for="field-1">
                            @if(isset($Data->shop_type))
                            <?php
                            $priceRangeConfig = Config::get('constants.ShopType');
                            ?>
                            @endif
                           @if(isset($Data->shop_type)) @if(strpos($Data->shop_type, '1') !== false)  <?php  echo "Fashion Shops" . '<br/>' ?> @endif  @endif
                            @if(isset($Data->shop_type)) @if(strpos($Data->shop_type, '2') !== false)  <?php echo "Beauty Retail Shops" . '<br/>' ?> @endif  @endif
                            @if(isset($Data->shop_type)) @if(strpos($Data->shop_type, '3') !== false)  <?php echo "Beauty Servicing Shops" . '<br/>' ?>@endif  @endif

                        </label>
                    </div>
                </div>

                <div class="form-group" id="shopTypeCategory">

                    @if(isset($Data->shop_type))

                    @if(strpos($Data->shop_type, '1') !== false)
                    @if(isset($Data->fashion_category))
                    <div class="form-group" >
                        <label class="col-sm-4 control-label" for="field-1">Fashion Category</label>
                        <div class="col-sm-5" > 
                            <?php
                          
                            $selected = explode(',', $Data->fashion_category);
                            
                            $beautyreatail = Config::get('constants.FashionCategory');
                           
                            foreach ($selected as $s => $v) {
                        
                                if ($v<=sizeof($beautyreatail)) {
                                 
                                    echo $beautyreatail[$v] . '<br/>';
                                }
                            }
                            ?>



                        </div>
                    </div> 
                    @endif

                    @if(isset($Data->refined_shop_type))
                    <div class="form-group" >
                        <label class="col-sm-4 control-label" for="field-1">Shop Type</label>

                        <div class="col-sm-5" >


                            <?php
                            $selected = explode(',', $Data->refined_shop_type);
                            $refine1 = Config::get('constants.ShopTypeo1');
                            foreach ($selected as $s => $v) {
                              
                                   if ($v<=sizeof($refine1)) {
                                 
                                    echo $refine1[$v] . '<br/>';
                                }
                                
                            }
                            ?>

                        </div>
                    </div> 
                    @endif


                    @elseif(strpos($Data->shop_type, '2') !== false)

                    @if(isset($Data->beauty_retail_category))

                    <div class="form-group" >
                        <label class="col-sm-4 control-label" for="field-1">Beauty Retail Category</label>
                        <div class="col-sm-5" >
                            <?php
                            $selected = explode(',', $Data->beauty_retail_category);
                            $beautyreatail = Config::get('constants.BeautyRetailCategory');
                            foreach ($selected as $s => $v) {
                               
                                      if ($v<=sizeof($beautyreatail)) {
                                    echo $beautyreatail[$v] . '<br/>';
                                }
                            }
                            ?>
                        </div>
                    </div> 
                    @endif

                    @if(isset($Data->refined_shop_type))
                    <div class="form-group" >
                        <label class="col-sm-4 control-label" for="field-1">Shop Type</label>
                        <div class="col-sm-5" >

                            <?php
                            $selected = explode(',', $Data->refined_shop_type);
                            $refine = Config::get('constants.ShopTypeo2');
                            foreach ($selected as $s => $v) {
                             
                                         if ($v<=sizeof($refine)) {
                                    echo $refine[$v] . '<br/>';
                                }
                            }
                            ?>
                        </div>
                    </div>                    
                    @endif


                    @elseif(strpos($Data->shop_type, '3') !== false)


                    @if(isset($Data->beauty_service_category))

                    <div class="form-group" >
                        <label class="col-sm-4 control-label" for="field-1">Beauty Servicing Category</label>


                        <div class="col-sm-5" >


                            <?php
                            $selected = explode(',', $Data->beauty_service_category);
                            $refine1 = Config::get('constants.BeautyServicingCategory');
                            foreach ($selected as $s => $v) {
                                  if ($v<=sizeof($refine1)) {
                                
                                    echo $refine1[$v] . '<br/>';
                                }
                            }
                            ?>
                        </div>

                        @endif


                        @if(isset($Data->refined_shop_type))
                        <div class="form-group" >
                            <label class="col-sm-4 control-label" for="field-1">Shop Type</label>

                            <div class="col-sm-5" >


                                <?php
                                $selected = explode(',', $Data->refined_shop_type);
                                $refine1 = Config::get('constants.ShopTypeo3');
                                foreach ($selected as $s => $v) {
                                 if ($v<=sizeof($refine1)) {
                                        echo $refine1[$v] . '<br/>';
                                    }
                                }
                                ?>
                            </div>
                        </div> 
                        @endif 
                        @endif
                        @else

                        <label class="col-sm-4 control-label" for="field-1">Shop Type Category</label>
                        <div class="col-sm-5" >
                            <select class="form-control" >
                                <option>Select Shop Type Category</option>
                            </select>
                        </div>
                    </div>
                    @endif
                

                <!-----------------------age @ gender---------------------->
                <div class="form-group {{{ $errors->has('age_gender') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">Age & Gender</label>

                    @if(isset($Data->age_gender))
                    <?php $gender = explode(',', $Data->age_gender) ?>                 
                    @endif


                    <div class="col-sm-8">
                        <div class="col-sm-12">
                           <label class="col-sm-10  " for="field-1">  @if(isset($Data->age_gender)) @if (in_array('1', $gender)) <?php echo "Men"?> @endif  @endif</label>
                        </div>
                        <div class="col-sm-12">
                             <label class="col-sm-10  " for="field-1">  @if(isset($Data->age_gender)) @if (in_array('2', $gender)) <?php echo "Women"?> @endif  @endif</label>
                        </div>
                        <div class="col-sm-12">
                             <label class="col-sm-10  " for="field-1">  @if(isset($Data->age_gender)) @if (in_array('3', $gender)) <?php echo "Infants & Kids"?> @endif  @endif</label> 
                        </div>

                    </div> 
                </div>


                <!-----------------------Price Range---------------------->
                <div class="form-group {{{ $errors->has('price_range') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">Price Range</label>

                    @if(isset($Data->price_range))
                    <?php $pricerange = explode(',', $Data->price_range) ?>                 
                    @endif
                    <div class="col-sm-8">

                        <div class="col-sm-12">
                           @if(isset($Data->price_range)) @if (in_array('1', $pricerange)) <label class="col-sm-10  " for="field-1"><$300</label>@endif  @endif
                        </div>
                       <div class="col-sm-12">
                           @if(isset($Data->price_range)) @if (in_array('2', $pricerange)) <label class="col-sm-10  " for="field-1">$300-$799</label>@endif  @endif
                        </div>
                         <div class="col-sm-12">
                           @if(isset($Data->price_range)) @if (in_array('3', $pricerange)) <label class="col-sm-10  " for="field-1">$800-$1499</label>@endif  @endif
                        </div>
                        <div class="col-sm-12">
                           @if(isset($Data->price_range)) @if (in_array('4', $pricerange)) <label class="col-sm-10  " for="field-1">$$1500-$2999</label>@endif  @endif
                        </div>

                        <div class="col-sm-12">
                           @if(isset($Data->price_range)) @if (in_array('5', $pricerange)) <label class="col-sm-10  " for="field-1">$3000-$4999</label>@endif  @endif
                        </div>

                        <div class="col-sm-12">
                             @if(isset($Data->price_range)) @if (in_array('6', $pricerange)) <label class="col-sm-10  " for="field-1">>$5000</label>@endif  @endif
                        </div>

                    </div> 
                </div>

                <!-----------------------Payment options---------------------->

                @if(isset($Data->payment_option))
                <?php $pyment = explode(',', $Data->payment_option) ?>                 
                @endif


                <div class="form-group {{{ $errors->has('payment_option') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">Payment option  </label>

                    <div class="col-sm-8">
                        <div class="col-sm-12">
                            @if(isset($Data->payment_option)) @if (in_array('1', $pyment))     <?php echo "Mastercard" ?> @endif  @endif
                        </div>


                        <div class="col-sm-12">
                            @if(isset($Data->payment_option)) @if (in_array('2', $pyment))  <?php echo "Visa" ?> @endif  @endif
                        </div>


                        <div class="col-sm-12">
                          @if(isset($Data->payment_option)) @if (in_array('3', $pyment)) <?php echo "American Express" ?> @endif  @endif
                        </div>

                        <div class="col-sm-12">
                            
                       @if(isset($Data->payment_option)) @if (in_array('4', $pyment))    <?php echo "Union Pay" ?> @endif  @endif
                        </div>

                        <div class="col-sm-12">
                             @if(isset($Data->payment_option)) @if (in_array('5', $pyment))  <?php echo "EPS" ?> @endif  @endif
                        </div>

                        <div class="col-sm-12">
                           @if(isset($Data->payment_option)) @if (in_array('6', $pyment))  <?php echo "Cash" ?>@endif  @endif
                        </div>

                        <div class="col-sm-12">
                             @if(isset($Data->payment_option)) @if (in_array('7', $pyment))   <?php echo "Bank transfer" ?> @endif  @endif
                        </div>

                        <div class="col-sm-12">
                            @if(isset($Data->payment_option)) @if (in_array('8', $pyment))  <?php echo "Paypal" ?> @endif  @endif
                        </div>


                    </div>


                </div>  



                <!-----------------------Shop Image ---------------------->
                <input  type="hidden" name="shop_image_1" id="shop_image_1"   value="{{{ Input::old('shop_image_1', isset($Data) ?  $Data->shop_image_1 : null) }}}"> 
                <input  type="hidden" name="shop_image_2" id="shop_image_2"   value="{{{ Input::old('shop_image_2', isset($Data) ?  $Data->shop_image_2 : null) }}}"> 
                <input  type="hidden" name="shop_image_3" id="shop_image_3"   value="{{{ Input::old('shop_image_3', isset($Data) ?  $Data->shop_image_3 : null) }}}"> 
                <input  type="hidden" name="shop_image_4" id="shop_image_4"   value="{{{ Input::old('shop_image_4', isset($Data) ?  $Data->shop_image_4 : null) }}}"> 
                <input  type="hidden" name="shop_image_5" id="shop_image_5"   value="{{{ Input::old('shop_image_5', isset($Data) ?  $Data->shop_image_5 : null) }}}"> 



                <div class="form-group">
                    <label class="col-sm-3 control-label" for="field-1">Shop Image 1</label>

                    <div class="col-sm-8">
                        <div class="col-sm-12">
                            @if($Data->shop_image_1!=null)
                            <img src="{{{ Input::old('shop_image_1', isset($Data) ?  $Data->shop_image_1 : null) }}}" height="50" width="50"/>
                            @else 
                            No Image
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="field-1">Shop Image 2</label>

                    <div class="col-sm-8">
                        <div class="col-sm-12">
                            @if($Data->shop_image_2!=null)
                            <img src="{{{ Input::old('shop_image_2', isset($Data) ?  $Data->shop_image_2 : null) }}}"height="50" width="50" />
                            @else 
                            No Image
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="field-1">Shop Image 3</label>

                    <div class="col-sm-8">
                        <div class="col-sm-12">
                            @if($Data->shop_image_3!=null)
                            <img src="{{{ Input::old('shop_image_3', isset($Data) ?  $Data->shop_image_3 : null) }}}" height="50" width="50"/>
                            @else 
                            No Image
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="field-1">Shop Image 4</label>

                    <div class="col-sm-8">
                        <div class="col-sm-12">
                            @if($Data->shop_image_4!=null)
                            <img src="{{{ Input::old('shop_image_4', isset($Data) ?  $Data->shop_image_4 : null) }}}"height="50" width="50" />
                            @else 
                            No Image
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="field-1">Shop Image 5</label>

                    <div class="col-sm-8">
                        <div class="col-sm-12">
                            @if($Data->shop_image_5!=null)
                            <img src="{{{ Input::old('shop_image_5', isset($Data) ?  $Data->shop_image_5 : null) }}}" height="50" width="50"/>
                            @else 
                            No Image
                            @endif
                        </div>
                    </div>
                </div>














            </div>
            </div>
                <div class="panel-heading">
                <div class="panel-title">

                   Contact information
                </div> 
            </div>			
            <div class="panel-body">
                 <div class="form-group {{{ $errors->has('chain') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">Contact Name</label>

                    <div class="col-sm-5">
                      <label class="control-label" for="field-1">{{{ Input::old('chain', isset($Data) ? $Data->guest_name : null) }}}
                    </label> </div>
                </div>
                 <div class="form-group {{{ $errors->has('chain') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">Contact Email</label>

                    <div class="col-sm-5">
                      <label class="control-label" for="field-1">{{{ Input::old('chain', isset($Data) ? $Data->guest_email : null) }}}
                    </label> </div>
                </div>
                 <div class="form-group {{{ $errors->has('chain') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">Contact Phone</label>

                    <div class="col-sm-5">
                      <label class="control-label" for="field-1">{{{ Input::old('chain', isset($Data) ? $Data->guest_phone : null) }}}
                    </label> </div>
                </div>
            </div>

        </div>




    </div>
    <!--Second step ###################@@@@@@@@@@@@@@-->
    <div data-collapsed="0" class="panel panel-primary col-sm-6">


        <div class="panel-body">
            <!--#########################forn end #######################-->



            <!-----------------------Shop hours---------------------->
            <div class="panel-heading">
                    <div class="panel-title">
                        Shop hours
                    </div> 
                </div>

                <div class="form-group  ">

                    <label class="col-sm-3 control-label" for="field-1">Monday</label>

                    <div class="col-sm-9">
				 <label class="control-label" for="field-1">{{{ Input::old('mondayopen', isset($Data) ? $Data->mondayopen : null) }}}--To--</label>

                    
				 <label class="control-label" for="field-1">{{{ Input::old('mondayclosed', isset($Data) ? $Data->mondayclosed : null) }}}</label>

                    </div>
                </div>

                <div class="form-group  ">

                    <label class="col-sm-3 control-label" for="field-1">Tuesday</label>

                   <div class="col-sm-9">
				 <label class="control-label" for="field-1">{{{ Input::old('tuesdayopen', isset($Data) ? $Data->tuesdayopen : null) }}} --To--</label>
 
                    <label class="control-label" for="field-1">{{{ Input::old('tuesdayclosed', isset($Data) ? $Data->tuesdayclosed : null) }}}</label>

                    </div>
                </div>
                <div class="form-group  ">

                    <label class="col-sm-3 control-label" for="field-1">Wednesday</label>

                    <div class="col-sm-9">
                        <label class="control-label" for="field-1">{{{ Input::old('wednesdayopen', isset($Data) ? $Data->wednesdayopen : null) }}}--To--</label>

                    <label class="control-label" for="field-1">{{{ Input::old('wednesdayclosed', isset($Data) ? $Data->wednesdayclosed : null) }}}</label>

                    </div>
                </div>
                <div class="form-group  ">

                    <label class="col-sm-3 control-label" for="field-1">Thursday</label>

                    <div class="col-sm-9">
                        <label class="control-label" for="field-1">{{{ Input::old('thursdayopen', isset($Data) ? $Data->thursdayopen : null) }}}--To--</label>

                     <label class="control-label" for="field-1">{{{ Input::old('thursdayclosed', isset($Data) ? $Data->thursdayclosed : null) }}}</label>

                    </div>
                </div>
                <div class="form-group  "> 
                    <label class="col-sm-3 control-label" for="field-1">Friday</label> 
             <div class="col-sm-9">
                     <label class="control-label" for="field-1">{{{ Input::old('fridayopen', isset($Data) ? $Data->fridayopen : null) }}}--To--</label>

                    <label class="control-label" for="field-1">{{{ Input::old('fridayclosed', isset($Data) ? $Data->fridayclosed : null) }}}</label>

                    </div>
                </div>
                <div class="form-group  "> 
                    <label class="col-sm-3 control-label" for="field-1">Saturday</label> 

                    <div class="col-sm-9">
                        <label class="control-label" for="field-1">{{{ Input::old('saturdayopen', isset($Data) ? $Data->saturdayopen : null) }}}--To--</label>

                    <label class="control-label" for="field-1">{{{ Input::old('saturdayclosed', isset($Data) ? $Data->saturdayclosed : null) }}}</label>

                    </div>
                </div>
                <div class="form-group  "> 
                    <label class="col-sm-3 control-label" for="field-1">Sunday</label> 

                    <div class="col-sm-9">
                         <label class="control-label" for="field-1">{{{ Input::old('sundayopen', isset($Data) ? $Data->sundayopen : null) }}}--To--</label>

                    <label class="control-label" for="field-1">{{{ Input::old('sundayclosed', isset($Data) ? $Data->sundayclosed : null) }}}</label>

                    </div>
                </div>
                <div class="form-group  "> 
                    <label class="col-sm-3 control-label" for="field-1">Public Holiday</label> 

                    <div class="col-sm-9">
                        <label class="control-label" for="field-1">{{{ Input::old('public_holidayopen', isset($Data) ? $Data->public_holidayopen : null) }}}--To--</label>

                     <label class="control-label" for="field-1">{{{ Input::old('public_holidayclosed', isset($Data) ? $Data->public_holidayclosed : null) }}}</label>

                    </div>
                </div>

          
            <!-----------------------Other Information---------------------->
            <div class="panel-heading">
                <div class="panel-title">
                    Other Information
                </div> 
            </div>

            <div class="form-group {{{ $errors->has('website_english') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Fitting</label>

                <div class="col-sm-8">
                    <div class="col-sm-3">
                       <label class="control-label" for="field-1"> @if(isset($Data->fitting)) @if ($Data->fitting==1 )<?php echo "Yes" ?> @endif  @endif
                               </label>
                    </div>
                    <div class="col-sm-6">
                        <label class="control-label" for="field-1">@if(isset($Data->fitting)) @if ($Data->fitting!=1 )<?php echo "No" ?> @endif  @endif  
                               </label>
                    </div>
                </div>
            </div>


            <div class="form-group {{{ $errors->has('fitting_detail') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Fitting Details </label>

                <div class="col-sm-5">
                     <label class="control-label" for="field-1"> {{{ Input::old('fitting_detail', isset($Data) ? $Data->fitting_detail : null) }}}</label>
                </div>
            </div>

            <!-----------------------Other Information---------------------->


            <div class="form-group {{{ $errors->has('refund') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Refund</label>

                <div class="col-sm-8">
                    <div class="col-sm-3">
                       <label class="control-label" for="field-1"> @if(isset($Data->refund)) @if ($Data->refund==1 ) <?php echo "Yes" ?> @endif  @endif
                              </label>
                    </div>
                    <div class="col-sm-6">
                         <label class="control-label" for="field-1"> @if(isset($Data->refund)) @if ($Data->refund!=1 ) <?php echo "No" ?> @endif  @endif  
                               </label>
                    </div>
                </div>
            </div>


            <div class="form-group {{{ $errors->has('refund_detail') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Refund Details </label>

                <div class="col-sm-5">
                     <label class="control-label" for="field-1">{{{ Input::old('refund_detail', isset($Data) ? $Data->refund_detail : null) }}}</label>
                </div>
            </div>


            <!-----------------------Other Information---------------------->


            <div class="form-group {{{ $errors->has('exchange') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Exchange</label>

                <div class="col-sm-8">
                    <div class="col-sm-3">
                         <label class="control-label" for="field-1">@if(isset($Data->exchange)) @if ($Data->exchange==1 ) <?php echo "Yes"?> @endif  @endif 
                               </label>
                    </div>
                    <div class="col-sm-6">
                        <label class="control-label" for="field-1"> @if(isset($Data->exchange)) @if ($Data->exchange!=1 ) <?php echo "No"?> @endif  @endif  
                               </label>
                    </div>
                </div>
            </div>


            <div class="form-group {{{ $errors->has('exchange_detail') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Exchange Details </label>

                <div class="col-sm-5">
                    <label class="control-label" for="field-1">{{{ Input::old('exchange_detail', isset($Data) ? $Data->exchange_detail : null) }}}</label>
                </div>
            </div>

            <!-----------------------Other Information---------------------->


            <div class="form-group {{{ $errors->has('membership') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Membership</label>

                <div class="col-sm-8">
                    <div class="col-sm-3">
                        <label class="control-label" for="field-1"> @if(isset($Data->membership)) @if ($Data->membership==1 ) <?php echo "Yes"?> @endif  @endif
                              </label>
                    </div>
                    <div class="col-sm-6">
                         <label class="control-label" for="field-1"> @if(isset($Data->membership)) @if ($Data->membership!=1 ) <?php echo "No"?>  @endif  @endif   
                              </label>
                    </div>
                </div>
            </div>


            <div class="form-group {{{ $errors->has('membership_detail') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Membership Details </label>

                <div class="col-sm-5">
                   <label class="control-label" for="field-1">{{{ Input::old('membership_detail', isset($Data) ? $Data->membership_detail : null) }}}</label>
                </div>
            </div>

            <!-----------------------Description English ---------------------->
            <div class="form-group {{{ $errors->has('description') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Description English</label>

                <div class="col-sm-5">
                     <label class="control-label" for="field-1">{{{ Input::old('description', isset($Data) ? $Data->description : null) }}}</label>
                </div>
            </div>

            <!-----------------------Description Chinese ---------------------->
            <div class="form-group {{{ $errors->has('description_c') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Description Chinese </label>

                <div class="col-sm-5">
                    <label class="control-label" for="field-1">{{{ Input::old('description_c', isset($Data) ? $Data->description_c : null) }}}</label>
                </div>
            </div>

            <!-----------------------Website English ---------------------->
            <div class="form-group {{{ $errors->has('website_english') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Website English </label>

                <div class="col-sm-5">

                   <label class="control-label" for="field-1">{{{ Input::old('website_english', isset($Data) ?  $Data->website_english : null) }}}</label>                </div>
            </div>

            <!-----------------------Website Chinese ---------------------->
            <div class="form-group {{{ $errors->has('website_chinese') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Website Chinese </label>

                <div class="col-sm-5">

                  <label class="control-label" for="field-1">  {{{ Input::old('website_chinese', isset($Data) ?  $Data->website_chinese : null) }}}</label>
                </div>
            </div>

            <!-----------------------Facebook ---------------------->
            <div class="form-group {{{ $errors->has('facebook') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Facebook</label>
                   <label class="control-label" for="field-1">{{{ Input::old('facebook', isset($Data) ?  $Data->facebook : null) }}}
                   </label>
                </div>
            

            <!-----------------------Instagram ---------------------->
            <div class="form-group {{{ $errors->has('instagram') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Instagram</label>

                <div class="col-sm-5">
                     <label class="control-label" for="field-1">{{{ Input::old('instagram', isset($Data) ?  $Data->instagram : null) }}}</label>
                </div>
            </div>

            <!-----------------------Twitter ---------------------->
            <div class="form-group {{{ $errors->has('twitter') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Twitter</label>

                <div class="col-sm-5">
                     <label class="control-label" for="field-1">{{{ Input::old('twitter', isset($Data) ?  $Data->twitter : null) }}}
                     </label>
                </div>
            </div>

            <!-----------------------Weibo ---------------------->
            <div class="form-group {{{ $errors->has('weibo') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Weibo</label>

                <div class="col-sm-5">
                    <label class="control-label" for="field-1">{{{ Input::old('weibo', isset($Data) ?  $Data->weibo : null) }}}</label>
                </div>
            </div>

            <!-----------------------Weibo ---------------------->
           




        </div>
        </div>

    
    <!--############# secong stop-->


    <div class="row">


    </div>
    <div class="clearfix"> 
        <label class="col-sm-3 control-label" for="field-1"> </label>					
        <div class="col-md-5">
            <a  href="{{URL::to('admin/forshopupdate/newShop_index')}}" class="btn btn-sm btn-warning close_popup">
                <span class="glyphicon glyphicon-ban-circle"></span> {{
				trans("site/site.cancel") }}
            </a> 
            <!--<button type="reset" class="btn btn-sm btn-default">
                <span class="glyphicon glyphicon-remove-circle"></span> {{
                                trans("admin/modal.reset") }}
            </button>-->
<!--            <button type="submit" class="btn btn-sm btn-success">
                <span class="glyphicon glyphicon-ok-circle"></span> 
                 Update Shop
            </button> -->

        </div>

    </div>
    </div>
    </form>


<script type="text/javascript">
    $('#regionf').change(function ()
    {
        $.get('{{{ URL::to('') }}}/admin/users/region/' + this.value, function (data)
        {
            $('#districtlistf').html(data);

        }
        );
    });
</script>

<script>

    $(function () {


        $('.time1').timepicki();

    });
</script>

@stop  
@section('scripts')


@stop


