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
   
                 

                <!------------------Shop name English------------------------>
                <div class="form-group {{{ $errors->has('shop_name') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">Shop Name(English)</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Shop name in english" type="text"
                               name="shop_name" id="shop_name"
                               value="{{{ Input::old('shop_name', isset($Data) ? $Data->shop_name : null) }}}">
                        {!! $errors->first('shop_name', '<label class="control-label"
                                                                for="shop_name">:message</label>')!!}
                    </div>
                </div>

                <!------------------Shop name Chinese------------------------>
                <div class="form-group {{{ $errors->has('shop_name_c') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">Shop Name(Chinese)</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Shop name in chines" type="text"
                               name="shop_name_c" id="shop_name_c"
                               value="{{{ Input::old('shop_name_c', isset($Data) ? $Data->shop_name_c : null) }}}">
                        {!! $errors->first('shop_name_c', '<label class="control-label"
                                                                  for="shop_name_c">:message</label>')!!}
                    </div>
                </div>
                <!------------------Shop Email------------------------>
                <div class="form-group {{{ $errors->has('shop_email') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">Shop Email</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Shop email" type="email"
                               name="shop_email" id="shop_email"
                               value="{{{ Input::old('shop_email', isset($Data) ? $Data->shop_email : null) }}}">
                        {!! $errors->first('shop_email', '<label class="control-label"
                                                                 for="shop_email">:message</label>')!!}
                    </div>
                </div>

                <!------------------Shop contact no------------------------>
                <div class="form-group {{{ $errors->has('contact_phone_1') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">Shop contact no</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Shop contact no" type="text"
                               name="contact_phone_1" id="contact_phone_1"
                               value="{{{ Input::old('contact_phone_1', isset($Data) ? $Data->contact_phone_1 : null) }}}">
                        {!! $errors->first('contact_phone_1', '<label class="control-label"
                                                                      for="contact_phone_1">:message</label>')!!}
                    </div>
                </div>

                <!------------------Shop contact no 2------------------------>
                <div class="form-group {{{ $errors->has('contact_phone_2') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">Shop contact no</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Shop contact no" type="text"
                               name="contact_phone_2" id="contact_phone_2"
                               value="{{{ Input::old('contact_phone_2', isset($Data) ? $Data->contact_phone_2 : null) }}}">
                        {!! $errors->first('contact_phone_2', '<label class="control-label"
                                                                      for="contact_phone_2">:message</label>')!!}
                    </div>
                </div>
                <!------------------Shop Fax------------------------>
                <div class="form-group {{{ $errors->has('shop_fax') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">Fax</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Shop Fax" type="text"
                               name="shop_fax" id="shop_fax"
                               value="{{{ Input::old('shop_fax', isset($Data) ? $Data->shop_fax : null) }}}">
                        {!! $errors->first('shop_fax', '<label class="control-label"
                                                               for="shop_fax">:message</label>')!!}
                    </div>
                </div>
<div class="form-group {{{ $errors->has('shop_no') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Shop_No') }}}<span>({{{ trans('site/site.English') }}})</span></label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Shop No" type="text"
                               name="shop_no" id="shop_fax"
                               value="{{{ Input::old('shop_fax', isset($Data) ? $Data->shop_no : null) }}}">
                        {!! $errors->first('shop_no', '<label class="control-label"
                                                               for="shop_no_c">:message</label>')!!}
                    </div>
                </div>
                 <div class="form-group {{{ $errors->has('shop_no_c') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Shop_No') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Shop Fax" type="text"
                               name="Shop_No_c" id="shop_fax"
                               value="{{{ Input::old('Shop_No_c', isset($Data) ? $Data->shop_no_c : null) }}}">
                        {!! $errors->first('shop_no_c', '<label class="control-label"
                                                               for="Shop_No_c">:message</label>')!!}
                    </div>
                </div>
                 <div class="form-group {{{ $errors->has('shop_line_2') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Shop_Line') }}}2<span>({{{ trans('site/site.English') }}})</span></label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Shop Line 2" type="text"
                               name="shop_line_2" id="shop_fax"
                               value="{{{ Input::old('shop_line_2', isset($Data) ? $Data->shop_line_2 : null) }}}">
                        {!! $errors->first('shop_line_2', '<label class="control-label"
                                                               for="shop_line_2">:message</label>')!!}
                    </div>
                </div>
                 <div class="form-group {{{ $errors->has('shop_line_2_c') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Shop_Line') }}}2<span>({{{ trans('site/site.Chinese') }}})</span></label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Shop Line 2" type="text"
                               name="shop_line_2_c" id="shop_fax"
                               value="{{{ Input::old('shop_fax', isset($Data) ? $Data->shop_line_2_c : null) }}}">
                        {!! $errors->first('shop_line_2_c', '<label class="control-label"
                                                               for="shop_line_2_c">:message</label>')!!}
                    </div>
                </div>
                 <div class="form-group {{{ $errors->has('floor') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Floor') }}}<span>({{{ trans('site/site.English') }}})</span> </label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Shop Floor" type="text"
                               name="floor" id="shop_fax"
                               value="{{{ Input::old('floor', isset($Data) ? $Data->floor : null) }}}">
                        {!! $errors->first('floor', '<label class="control-label"
                                                               for="floor">:message</label>')!!}
                    </div>
                </div>
                 <div class="form-group {{{ $errors->has('floor_c') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Floor') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Shop Floor" type="text"
                               name="floor_c" id="shop_fax"
                               value="{{{ Input::old('floor_c', isset($Data) ? $Data->floor_c : null) }}}">
                        {!! $errors->first('floor_c', '<label class="control-label"
                                                               for="floor_c">:message</label>')!!}
                    </div>
                </div>
                 <div class="form-group {{{ $errors->has('floor_line_2') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Floor_Line') }}} 2<span>({{{ trans('site/site.English') }}})</span></label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Shop Floor Line" type="text"
                               name="floor_line_2" id="shop_fax"
                               value="{{{ Input::old('shop_fax', isset($Data) ? $Data->floor_line_2 : null) }}}">
                        {!! $errors->first('floor_line_2', '<label class="control-label"
                                                               for="floor_line_2">:message</label>')!!}
                    </div>
                </div>
                 <div class="form-group {{{ $errors->has('floor_line_2_c') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Floor_Line') }}} 2<span>({{{ trans('site/site.Chinese') }}})</span></label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Shop Floor Line" type="text"
                               name="floor_line_2_c" id="shop_fax"
                               value="{{{ Input::old('floor_line_2_c', isset($Data) ? $Data->floor_line_2_c : null) }}}">
                        {!! $errors->first('floor_line_2_c', '<label class="control-label"
                                                               for="floor_line_2_c">:message</label>')!!}
                    </div>
                </div>
                 <div class="form-group {{{ $errors->has('mall') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Mall') }}} <span>({{{ trans('site/site.English') }}})</span></label>

                    <div class="col-sm-5">
                        <?php $landmarTable = Text::mallAndLandmarkName($Data->mall); 
  
                                        ?> 
                        <input class="form-control" tabindex="1"
                               placeholder="Mall" type="text"
                               name="mall" id="shop_fax"
                               value="{{{ Input::old('mall', isset($landmarTable->mall_e) ? $landmarTable->mall_e : null) }}}">
                        {!! $errors->first('mall', '<label class="control-label"
                                                               for="mall">:message</label>')!!}
                    </div>
                </div>
                 <div class="form-group {{{ $errors->has('mall_c') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Mall') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Mall" type="text"
                               name="mall_c" id="shop_fax"
                               value="{{{ Input::old('mall_c', isset($landmarTable->mall_c) ? $landmarTable->mall_c : null) }}}">
                        {!! $errors->first('mall_c', '<label class="control-label"
                                                               for="mall_c">:message</label>')!!}
                    </div>
                </div>
                 <div class="form-group {{{ $errors->has('building') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Building') }}}<span>({{{ trans('site/site.English') }}})</span></label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Building" type="text"
                               name="building" id="shop_fax"
                               value="{{{ Input::old('building', isset($Data) ? $Data->building : null) }}}">
                        {!! $errors->first('building', '<label class="control-label"
                                                               for="building">:message</label>')!!}
                    </div>
                </div>
                 <div class="form-group {{{ $errors->has('building_c') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Building') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Building" type="text"
                               name="building_c" id="shop_fax"
                               value="{{{ Input::old('building_c', isset($Data) ? $Data->building_c : null) }}}">
                        {!! $errors->first('building_c', '<label class="control-label"
                                                               for="building_c">:message</label>')!!}
                    </div>
                </div>
                 <div class="form-group {{{ $errors->has('landmark') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Landmark') }}}<span>({{{ trans('site/site.English') }}})</span></label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Landmark" type="text"
                               name="landmark" id="shop_fax"
                               value="{{{ Input::old('landmark', isset($landmarTable->landmark_e) ? $landmarTable->landmark_e : null) }}}">
                        {!! $errors->first('landmark', '<label class="control-label"
                                                               for="landmark">:message</label>')!!}
                    </div>
                </div>
                 <div class="form-group {{{ $errors->has('landmark_c') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Landmark') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Landmark" type="text"
                               name="landmark_c" id="shop_fax"
                               value="{{{ Input::old('landmark_c', isset($landmarTable->landmark_c) ? $landmarTable->landmark_c : null) }}}">
                        {!! $errors->first('landmark_c', '<label class="control-label"
                                                               for="landmark_c">:message</label>')!!}
                    </div>
                </div>
                 <div class="form-group {{{ $errors->has('phase_block') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Phase_Block') }}}<span>({{{ trans('site/site.English') }}})</span></label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Phase Block" type="text"
                               name="phase_block" id="shop_fax"
                               value="{{{ Input::old('phase_block', isset($Data) ? $Data->phase_block : null) }}}">
                        {!! $errors->first('phase_block', '<label class="control-label"
                                                               for="phase_block">:message</label>')!!}
                    </div>
                </div>
                 <div class="form-group {{{ $errors->has('phase_block_c') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Phase_Block') }}}<span>({{{ trans('site/site.Chinese') }}})</span> </label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Phase Block" type="text"
                               name="phase_block_c" id="shop_fax"
                               value="{{{ Input::old('phase_block_c', isset($Data) ? $Data->phase_block_c : null) }}}">
                        {!! $errors->first('phase_block_c', '<label class="control-label"
                                                               for="phase_block_c">:message</label>')!!}
                    </div>
                </div>
                 <div class="form-group {{{ $errors->has('street') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Street') }}}<span>({{{ trans('site/site.English') }}})</span></label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Street" type="text"
                               name="street" id="shop_fax"
                               value="{{{ Input::old('street', isset($Data) ? $Data->street : null) }}}">
                        {!! $errors->first('street', '<label class="control-label"
                                                               for="street">:message</label>')!!}
                    </div>
                </div>
                 <div class="form-group {{{ $errors->has('street_c') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Street') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Street" type="text"
                               name="street_c" id="shop_fax"
                               value="{{{ Input::old('street_c', isset($Data) ? $Data->street_c : null) }}}">
                        {!! $errors->first('street_c', '<label class="control-label"
                                                               for="street_c">:message</label>')!!}
                    </div>
                </div>
                 <div class="form-group {{{ $errors->has('mtr_station') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.MTR_Station') }}}<span>({{{ trans('site/site.English') }}})</span></label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="MTR Station" type="text"
                               name="mtr_station" id="shop_fax"
                               value="{{{ Input::old('mtr_station', isset($Data) ? $Data->mtr_station : null) }}}">
                        {!! $errors->first('mtr_station', '<label class="control-label"
                                                               for="mtr_station">:message</label>')!!}
                    </div>
                </div>
                 <div class="form-group {{{ $errors->has('mtr_station_c') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.MTR_Station') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="MTR Station" type="text"
                               name="mtr_station_c" id="shop_fax"
                               value="{{{ Input::old('mtr_station_c', isset($Data) ? $Data->mtr_station_c : null) }}}">
                        {!! $errors->first('mtr_station_c', '<label class="control-label"
                                                               for="mtr_station_c">:message</label>')!!}
                    </div>
                </div>
                <!------------------Shop Region------------------------>
              <div class="form-group {{{ $errors->has('region') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">Region</label>

                    <div class="col-sm-5">

                        <?php $Region = Text::Region() ?>
                        <select  class="form-control"  name="regionf" id="regionf"  >
                            <option value="">{{{ trans("site/site.Region") }}}</option>
                            @foreach($Region as $region)
                                        <option value="{{$region->id}}" {{ ($Data->region== $region->id) ? 'selected="selected"' : null }} >@if(App::getLocale()=='jp'){{$region->name_c}}   @else {{$region->name_e}}    @endif </option>
                            @endforeach
                        </select> 

                    </div>
                </div>


                <!------------------Shop District------------------------>
                <div class="form-group {{{ $errors->has('region') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">District</label>

                    <div class="col-sm-5" id="districtlistf">
                        @if(isset($Data->region))
                        <?php $District2 = Text::District($Data->region); ?>
                        <select class="form-control" name="districtf" id="districtf"   >
                            <option value="">{{{ trans("site/site.District") }}}</option>
                              @foreach($District2 as $district)                           
                            
                            <option value="{{$district->id}}" {{ ($Data->district == $district->id) ? 'selected="selected"' : null }} > {{$district->name_e}}  </option>
                            @endforeach
                        </select>
                        @endif
                    </div>
                </div>

                <!------------------Shop Address English------------------------>
<!--                <div class="form-group {{{ $errors->has('address') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">Address<span>(English)</span></label>

                    <div class="col-sm-5">
                        <textarea class="form-control" tabindex="1"
                                  placeholder="Address in english"  
                                  name="address" id="address"
                                  >{{{ Input::old('address', isset($Data) ? $Data->address : null) }}}</textarea>

                        {!! $errors->first('address', '<label class="control-label"
                                                              for="address">:message</label>')!!}
                    </div>
                </div>

                ----------------Shop Address Chinese----------------------
                <div class="form-group {{{ $errors->has('address_c') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">Address<span>(Chinese)</span></label>

                    <div class="col-sm-5">
                        <textarea class="form-control" tabindex="1"
                                  placeholder="Address in chinese"  
                                  name="address_c" id="address_c"
                                  >{{{ Input::old('address_c', isset($Data) ? $Data->address_c : null) }}}</textarea>

                        {!! $errors->first('address_c', '<label class="control-label"
                                                                for="address_c">:message</label>')!!}
                    </div>
                </div>-->

 


            </div>

        </div>




    </div>
    <!--Second step ###################@@@@@@@@@@@@@@-->
   
    <!--############# secong stop-->


    <div class="row">


    </div>
    <div class="clearfix"> 
        <label class="col-sm-3 control-label" for="field-1"> </label>					
        <div class="col-md-5">
            <a  href="{{URL::to('admin/forshopupdate/closure_index')}}" class="btn btn-sm btn-warning close_popup">
                <span class="glyphicon glyphicon-ban-circle"></span> {{
				trans("site/site.cancel") }}
            </a> 
            <!--<button type="reset" class="btn btn-sm btn-default">
                <span class="glyphicon glyphicon-remove-circle"></span> {{
                                trans("admin/modal.reset") }}
            </button>-->
            <button type="submit" class="btn btn-sm btn-success">
                <span class="glyphicon glyphicon-ok-circle"></span> 
                 Update Shop
            </button> 

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


