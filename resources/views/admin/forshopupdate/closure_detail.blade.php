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
                        <label class="control-label" for="field-1">{{{ Input::old('landmark',isset($landmarTable->landmark_e) ? $landmarTable->landmark_e :  null) }}}
                        </label>
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('landmark_c') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Landmark') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>

                    <div class="col-sm-5">
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
<!--            <button type="submit" class="btn btn-sm btn-success">
                <span class="glyphicon glyphicon-ok-circle"></span> 
                 Update Shop
            </button> -->

        </div>

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


