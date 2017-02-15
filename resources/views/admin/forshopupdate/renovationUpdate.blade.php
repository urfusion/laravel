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
                               placeholder="Shop name in chinese" type="text"
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
                            
                            <option value="{{$district->id}}" {{ (@$Data->district == $district->id) ? 'selected="selected"' : null }} > {{$district->name_e}}  </option>
                            @endforeach
                        </select>
                        @endif
                    </div>
                </div>

                <!------------------Shop Address English------------------------>
                <div class="form-group {{{ $errors->has('address') ? 'has-error' : '' }}} ">
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

                <!------------------Shop Address Chinese------------------------>
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
                </div>
                
                 <!-----------------------Shop hours---------------------->
            <div class="panel-heading">
                <div class="panel-title">
                    Shop hours
                </div> 
            </div>

            <div class="form-group  ">

                <label class="col-sm-3 control-label" for="field-1">Monday</label>

                <div class="col-sm-4">
                    <input class="form-control time1"  type="text"
                           name="mondayopen" id="mondayopen"  value="{{{ Input::old('mondayopen', isset($Data) ?  date('h:i A', strtotime($Data->mondayopen))  : null) }}}">

                </div>
                <div class="col-sm-4">
                    <input class="form-control time1"   type="text"      name="mondayclosed" id="mondayclosed"
                           value="{{{ Input::old('mondayclosed', isset($Data) ? date('h:i A', strtotime($Data->mondayclosed))  : null) }}}">

                </div>
            </div>

            <div class="form-group  ">

                <label class="col-sm-3 control-label" for="field-1">Tuesday</label>

                <div class="col-sm-4">
                    <input class="form-control time1" tabindex="1"
                           placeholder="00:00:00" type="text"
                           name="tuesdayopen" id="tuesdayopen"
                           value="{{{ Input::old('tuesdayopen', isset($Data) ?date('h:i A', strtotime($Data->tuesdayopen))  : null) }}}">

                </div>
                <div class="col-sm-4">
                    <input class="form-control time1" tabindex="1"
                           placeholder="00:00:00" type="text"
                           name="tuesdayclosed" id="tuesdayclosed"
                           value="{{{ Input::old('tuesdayclosed', isset($Data) ? date('h:i A', strtotime($Data->tuesdayclosed))   : null) }}}">

                </div>
            </div>
            <div class="form-group  ">

                <label class="col-sm-3 control-label" for="field-1">Wednesday</label>

                <div class="col-sm-4">
                    <input class="form-control time1" tabindex="1"
                           placeholder="00:00:00" type="text"
                           name="wednesdayopen" id="wednesdayopen"
                           value="{{{ Input::old('wednesdayopen', isset($Data) ? date('h:i A', strtotime($Data->wednesdayopen)) : null) }}}">

                </div>
                <div class="col-sm-4">
                    <input class="form-control time1" tabindex="1"
                           placeholder="00:00:00" type="text"
                           name="wednesdayclosed" id="wednesdayclosed"
                           value="{{{ Input::old('wednesdayclosed', isset($Data) ?  date('h:i A', strtotime($Data->wednesdayclosed)) : null) }}}">

                </div>
            </div>
            <div class="form-group  ">

                <label class="col-sm-3 control-label" for="field-1">Thursday</label>

                <div class="col-sm-4">
                    <input class="form-control time1" tabindex="1"
                           placeholder="00:00:00" type="text"
                           name="thursdayopen" id="thursdayopen"
                           value="{{{ Input::old('thursdayopen', isset($Data) ? date('h:i A', strtotime($Data->thursdayopen)): null) }}}">

                </div>
                <div class="col-sm-4">
                    <input class="form-control time1" tabindex="1"
                           placeholder="00:00:00" type="text"
                           name="thursdayclosed" id="thursdayclosed"
                           value="{{{ Input::old('thursdayclosed', isset($Data) ? date('h:i A', strtotime($Data->thursdayclosed)) : null) }}}">

                </div>
            </div>
            <div class="form-group  "> 
                <label class="col-sm-3 control-label" for="field-1">Friday</label> 

                <div class="col-sm-4">
                    <input class="form-control time1" tabindex="1"
                           placeholder="00:00:00" type="text"
                           name="fridayopen" id="fridayopen"
                           value="{{{ Input::old('fridayopen', isset($Data) ? date('h:i A', strtotime($Data->fridayopen)) : null) }}}">

                </div>
                <div class="col-sm-4">
                    <input class="form-control time1" tabindex="1"
                           placeholder="00:00:00" type="text"
                           name="fridayclosed" id="fridayclosed"
                           value="{{{ Input::old('fridayclosed', isset($Data) ? date('h:i A', strtotime($Data->fridayclosed)) : null) }}}">

                </div>
            </div>
            <div class="form-group  "> 
                <label class="col-sm-3 control-label" for="field-1">Saturday</label> 

                <div class="col-sm-4">
                    <input class="form-control time1" tabindex="1"
                           placeholder="00:00:00" type="text"
                           name="saturdayopen" id="saturdayopen"
                           value="{{{ Input::old('saturdayopen', isset($Data) ? date('h:i A', strtotime($Data->saturdayopen))  : null) }}}">

                </div>
                <div class="col-sm-4">
                    <input class="form-control time1" tabindex="1"
                           placeholder="00:00:00" type="text"
                           name="saturdayclosed" id="saturdayclosed"
                           value="{{{ Input::old('saturdayclosed', isset($Data) ? date('h:i A', strtotime($Data->saturdayclosed)) : null) }}}">

                </div>
            </div>
            <div class="form-group  "> 
                <label class="col-sm-3 control-label" for="field-1">Sunday</label> 

                <div class="col-sm-4">
                    <input class="form-control time1" tabindex="1"
                           placeholder="00:00:00" type="text"
                           name="sundayopen" id="sundayopen"
                           value="{{{ Input::old('sundayopen', isset($Data) ? date('h:i A', strtotime($Data->sundayopen)) : null) }}}">

                </div>
                <div class="col-sm-4">
                    <input class="form-control time1" tabindex="1"
                           placeholder="00:00:00" type="text"
                           name="sundayclosed" id="sundayclosed"
                           value="{{{ Input::old('sundayclosed', isset($Data) ? date('h:i A', strtotime($Data->sundayclosed)) : null) }}}">

                </div>
            </div>
            <div class="form-group  "> 
                <label class="col-sm-3 control-label" for="field-1">Public Holiday</label> 

                <div class="col-sm-4">
                    <input class="form-control time1" tabindex="1"
                           placeholder="00:00:00" type="text"
                           name="public_holidayopen" id="public_holidayopen"
                           value="{{{ Input::old('public_holidayopen', isset($Data) ? date('h:i A', strtotime($Data->public_holidayopen)) : null) }}}">

                </div>
                <div class="col-sm-4">
                    <input class="form-control time1" tabindex="1"
                           placeholder="00:00:00" type="text"
                           name="public_holidayclosed" id="public_holidayclosed"
                           value="{{{ Input::old('public_holidayclosed', isset($Data) ? date('h:i A', strtotime($Data->public_holidayclosed))  : null) }}}">

                </div>
            </div>

            <div class="form-group  "> 
                <label class="col-sm-3 control-label" for="field-1">Public Holidays’ Eve</label> 

                <div class="col-sm-4">
                    <input class="form-control time1" tabindex="1"
                           placeholder="00:00:00" type="text"
                           name="public_holidayevopen" id="public_holidayevopen"
                           value="{{{ Input::old('public_holidayevopen', isset($Data) ? date('h:i A', strtotime($Data->public_holidayevopen))  : null) }}}">

                </div>
                <div class="col-sm-4">
                    <input class="form-control time1" tabindex="1"
                           placeholder="00:00:00" type="text"
                           name="public_holidayevclosed" id="public_holidayevclosed"
                           value="{{{ Input::old('public_holidayevclosed', isset($Data) ? date('h:i A', strtotime($Data->public_holidayevclosed))   : null) }}}">

                </div>
            </div>


 


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
            <a  href="{{URL::to('admin/forshopupdate/renovation_index')}}" class="btn btn-sm btn-warning close_popup">
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


