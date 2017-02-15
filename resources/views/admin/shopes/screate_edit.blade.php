@extends('admin.layouts.default') @section('content')

<form class="form-horizontal" method="post"
      action="" enctype="multipart/form-data" 
      autocomplete="off">
      <input type="hidden" name="_token" value="{{{ csrf_token() }}}" /> 
    <div data-collapsed="0" class="  col-md-12">
        <div data-collapsed="0" class="panel panel-primary col-sm-6">

            <div class="panel-heading">
                <div class="panel-title">

                    Account Information
                </div> 
            </div>

            <div class="panel-body">
 
              

                <div class="form-group {{{ $errors->has('first_name') ? 'has-error' : '' }}}">
                    <label class="col-sm-3 control-label" for="field-1">First Name</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="First Name" type="text"
                               name="first_name" id="first_name"
                               value="{{{ Input::old('first_name', isset($User) ? $User->first_name : null) }}}">
                        {!! $errors->first('first_name', '<label class="control-label"
                                                                 for="username">:message</label>')!!}
                    </div>
                </div>

                <div class="form-group {{{ $errors->has('last_name') ? 'has-error' : '' }}}">
                    <label class="col-sm-3 control-label" for="field-1">Last Name</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Last Name" type="text"
                               name="last_name" id="last_name"
                               value="{{{ Input::old('first_name', isset($User) ? $User->last_name : null) }}}">
                        {!! $errors->first('last_name', '<label class="control-label"
                                                                for="last_name">:message</label>')!!}
                    </div>
                </div>

                <div class="form-group {{{ $errors->has('email') ? 'has-error' : '' }}}">
                    <label class="col-sm-3 control-label" for="field-1">E-mail</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="E-mail" type="text"
                               name="email" id="email" @if(isset($User->email)) {{ "readonly" }}   @endif
                               value="{{{ Input::old('email', isset($User) ? $User->email : null) }}}">
                        {!! $errors->first('email', '<label class="control-label"
                                                            for="username">:message</label>')!!}
                    </div>
                </div>
                  <div class="form-group {{{ $errors->has('username') ? 'has-error' : '' }}}">
                    <label class="col-sm-3 control-label" for="field-1">User Name</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Username" type="text"
                               name="username" id="username" @if(isset($User->username)) {{ "readonly" }}   @endif
                               value="{{{ Input::old('username', isset($User) ? $User->username : null) }}}">
                        {!! $errors->first('username', '<label class="control-label"
                                                            for="username">:message</label>')!!}
                    </div>
                </div>

                @if(isset($User))
                <input class="form-control" tabindex="1" type="hidden" name="user_id" id="user_id" value="{{{ Input::old('id', isset($User) ? base64_encode($User->id) : null) }}}">
                @else
                <div class="form-group {{{ $errors->has('password') ? 'has-error' : '' }}}">
                    <label class="col-sm-3 control-label" for="password">{{
						trans('admin/users.password') }}</label>
                    <div class="col-sm-5">
                        <input class="form-control" tabindex="5"
                               placeholder="{{ trans('admin/users.password') }}"
                               type="password" name="password" id="password" value="" />
                        {!!$errors->first('password', '<label class="control-label"
                                                              for="password">:message</label>')!!}
                    </div>
                </div>

                <div class="form-group {{{ $errors->has('password_confirmation') ? 'has-error' : '' }}}">
                    <label class="col-sm-3 control-label" for="password_confirmation">{{
						trans('admin/users.password_confirmation') }}</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="password" tabindex="6"
                               placeholder="{{ trans('admin/users.password_confirmation') }}"
                               name="password_confirmation" id="password_confirmation" value="" />
                        {!!$errors->first('password_confirmation', '<label
                            class="control-label" for="password_confirmation">:message</label>')!!}
                    </div>
                </div>
                @endif 

 

            </div>

        </div>

        <div data-collapsed="0" class="panel panel-primary col-sm-6">

            <div class="panel-heading">
                <div class="panel-title"> 
                    Shop owner Personal information
                </div> 
            </div>			
            <div class="panel-body">

                <div class="form-group {{{ $errors->has('full_name') ? 'has-error' : '' }}}">
                    <label class="col-sm-3 control-label" for="field-1">Full Name</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Full Name" type="text"
                               name="full_name" id="full_name"
                               value="{{{ Input::old('full_name', isset($Data) ? $Data->full_name : null) }}}">
                        {!! $errors->first('full_name', '<label class="control-label"
                                                                for="full_name">:message</label>')!!}
                    </div>
                </div>

                <div class="form-group {{{ $errors->has('phone') ? 'has-error' : '' }}} ">
                    <label class="col-sm-3 control-label" for="field-1">Contact Number</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Contact Number" type="text"
                               name="phone" id="phone"
                               value="{{{ Input::old('phone', isset($Data) ? $Data->phone : null) }}}">
                        {!! $errors->first('phone', '<label class="control-label"
                                                            for="phone">:message</label>')!!}
                    </div>
                </div>

                <div class="form-group {{{ $errors->has('contact_email') ? 'has-error' : '' }}}">
                    <label class="col-sm-3 control-label" for="field-1">E-mail</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="E-mail" type="text"
                               name="contact_email" id="contact_email"
                               value="{{{ Input::old('contact_email', isset($Data) ? $Data->contact_email : null) }}}">
                        {!! $errors->first('contact_email', '<label class="control-label"
                                                                    for="contact_email">:message</label>')!!}
                    </div>
                </div>

                <div class="form-group {{{ $errors->has('facebook') ? 'has-error' : '' }}}">
                    <label class="col-sm-3 control-label" for="field-1">Facebook URL</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Facebook URL" type="text"
                               name="facebook" id="facebook"
                               value="{{{ Input::old('facebook', isset($Data) ? $Data->facebook : null) }}}">
                        {!! $errors->first('facebook', '<label class="control-label"
                                                               for="facebook">:message</label>')!!}
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('twitter') ? 'has-error' : '' }}}">
                    <label class="col-sm-3 control-label" for="field-1">Twitter URL</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Twitter URL" type="text"
                               name="twitter" id="twitter"
                               value="{{{ Input::old('twitter', isset($Data) ? $Data->twitter : null) }}}">
                        {!! $errors->first('twitter', '<label class="control-label"
                                                              for="username">:message</label>')!!}
                    </div>
                </div>


            </div>

        </div>
    </div>
<div class="row"> </div>
    <div data-collapsed="0" class="  col-md-12">
        <div data-collapsed="0" class="panel panel-primary col-sm-6">

            <div class="panel-heading">
                <div class="panel-title">

                    Shop information
                </div> 
            </div>			
            <div class="panel-body">

                <div class="form-group {{{ $errors->has('shop_name') ? 'has-error' : '' }}}">
                    <label class="col-sm-3 control-label" for="field-1">Shop Name</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Full Name" type="text"
                               name="shop_name" id="shop_name"
                               value="{{{ Input::old('shop_name', isset($Data) ? $Data->shop_name : null) }}}">
                        {!! $errors->first('shop_name', '<label class="control-label"
                                                                for="shop_name">:message</label>')!!}
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('shop_email') ? 'has-error' : '' }}}">
                    <label class="col-sm-3 control-label" for="field-1">E-mail</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="E-mail" type="text"
                               name="shop_email" id="shop_email"
                               value="{{{ Input::old('shop_email', isset($Data) ? $Data->shop_email : null) }}}">
                        {!! $errors->first('shop_email', '<label class="control-label"
                                                                 for="username">:message</label>')!!}
                    </div>
                </div>

                <div class="form-group {{{ $errors->has('contact_phone_1') ? 'has-error' : '' }}} ">
                    <label class="col-sm-3 control-label" for="field-1">Shop contact no</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Shop contact no" type="text"
                               name="contact_phone_1" id="contact_phone_1"
                               value="{{{ Input::old('contact_phone_1', isset($Data) ? $Data->contact_phone_1 : null) }}}">
                        {!! $errors->first('contact_phone_1', '<label class="control-label"
                                                                      for="contact_phone_1">:message</label>')!!}
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('shop_fax') ? 'has-error' : '' }}} ">
                    <label class="col-sm-3 control-label" for="field-1">Fax</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Shop Fax" type="text"
                               name="shop_fax" id="shop_fax"
                               value="{{{ Input::old('shop_fax', isset($Data) ? $Data->shop_fax : null) }}}">
                        {!! $errors->first('shop_fax', '<label class="control-label"
                                                               for="shop_fax">:message</label>')!!}
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('address') ? 'has-error' : '' }}} ">
                    <label class="col-sm-3 control-label" for="field-1">Address</label>

                    <div class="col-sm-5">
                        <textarea class="form-control" tabindex="1"
                                  placeholder="address"  
                                  name="address" id="address"
                                  >{{{ Input::old('address', isset($Data) ? $Data->address : null) }}}</textarea>

                        {!! $errors->first('address', '<label class="control-label"
                                                              for="address">:message</label>')!!}
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('region') ? 'has-error' : '' }}} ">
                    <label class="col-sm-3 control-label" for="field-1">Region</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Region" type="text"
                               name="region" id="region"
                               value="{{{ Input::old('region', isset($Data) ? $Data->region : null) }}}">
                        {!! $errors->first('region', '<label class="control-label"
                                                             for="region">:message</label>')!!}
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('district') ? 'has-error' : '' }}} ">
                    <label class="col-sm-3 control-label" for="field-1">District</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="District" type="text"
                               name="district" id="district"
                               value="{{{ Input::old('district', isset($Data) ? $Data->district : null) }}}">
                        {!! $errors->first('district', '<label class="control-label"
                                                               for="district">:message</label>')!!}
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('mall') ? 'has-error' : '' }}} ">
                    <label class="col-sm-3 control-label" for="field-1">Mall</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Mall" type="text"
                               name="mall" id="mall"
                               value="{{{ Input::old('mall', isset($Data) ? $Data->mall : null) }}}">
                        {!! $errors->first('mall', '<label class="control-label"
                                                           for="mall">:message</label>')!!}
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('landmark') ? 'has-error' : '' }}} ">
                    <label class="col-sm-3 control-label" for="field-1">Landmark</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="landmark" type="text"
                               name="landmark" id="landmark"
                               value="{{{ Input::old('landmark', isset($Data) ? $Data->landmark : null) }}}">
                        {!! $errors->first('landmark', '<label class="control-label"
                                                               for="landmark">:message</label>')!!}
                    </div>
                </div>
                <div class="panel-heading">
                    <div class="panel-title">
                        Shop hours
                    </div> 
                </div>

                <div class="form-group  ">

                    <label class="col-sm-3 control-label" for="field-1">Monday</label>

                    <div class="col-sm-4">
                        <input class="form-control time" tabindex="1"
                               placeholder="00:00:00" type="text"
                               name="mondayopen" id="mondayopen"
                               value="{{{ Input::old('mondayopen', isset($Data) ? $Data->mondayopen : null) }}}">

                    </div>
                    <div class="col-sm-4">
                        <input class="form-control time" tabindex="1"   placeholder="00:00:00" type="text"      name="mondayclosed" id="mondayclosed"
                               value="{{{ Input::old('mondayclosed', isset($Data) ? $Data->mondayclosed : null) }}}">

                    </div>
                </div>

                <div class="form-group  ">

                    <label class="col-sm-3 control-label" for="field-1">Tuesday</label>

                    <div class="col-sm-4">
                        <input class="form-control time" tabindex="1"
                               placeholder="00:00:00" type="text"
                               name="tuesdayopen" id="tuesdayopen"
                               value="{{{ Input::old('tuesdayopen', isset($Data) ? $Data->tuesdayopen : null) }}}">

                    </div>
                    <div class="col-sm-4">
                        <input class="form-control time" tabindex="1"
                               placeholder="00:00:00" type="text"
                               name="tuesdayclosed" id="tuesdayclosed"
                               value="{{{ Input::old('tuesdayclosed', isset($Data) ? $Data->tuesdayclosed : null) }}}">

                    </div>
                </div>
                <div class="form-group  ">

                    <label class="col-sm-3 control-label" for="field-1">Wednesday</label>

                    <div class="col-sm-4">
                        <input class="form-control time" tabindex="1"
                               placeholder="00:00:00" type="text"
                               name="wednesdayopen" id="wednesdayopen"
                               value="{{{ Input::old('wednesdayopen', isset($Data) ? $Data->wednesdayopen : null) }}}">

                    </div>
                    <div class="col-sm-4">
                        <input class="form-control time" tabindex="1"
                               placeholder="00:00:00" type="text"
                               name="wednesdayclosed" id="wednesdayclosed"
                               value="{{{ Input::old('wednesdayclosed', isset($Data) ? $Data->wednesdayclosed : null) }}}">

                    </div>
                </div>
                <div class="form-group  ">

                    <label class="col-sm-3 control-label" for="field-1">Thursday</label>

                    <div class="col-sm-4">
                        <input class="form-control time" tabindex="1"
                               placeholder="00:00:00" type="text"
                               name="thursdayopen" id="thursdayopen"
                               value="{{{ Input::old('thursdayopen', isset($Data) ? $Data->thursdayopen : null) }}}">

                    </div>
                    <div class="col-sm-4">
                        <input class="form-control time" tabindex="1"
                               placeholder="00:00:00" type="text"
                               name="thursdayclosed" id="thursdayclosed"
                               value="{{{ Input::old('thursdayclosed', isset($Data) ? $Data->thursdayclosed : null) }}}">

                    </div>
                </div>
                <div class="form-group  "> 
                    <label class="col-sm-3 control-label" for="field-1">Friday</label> 

                    <div class="col-sm-4">
                        <input class="form-control time" tabindex="1"
                               placeholder="00:00:00" type="text"
                               name="fridayopen" id="fridayopen"
                               value="{{{ Input::old('fridayopen', isset($Data) ? $Data->fridayopen : null) }}}">

                    </div>
                    <div class="col-sm-4">
                        <input class="form-control time" tabindex="1"
                               placeholder="00:00:00" type="text"
                               name="fridayclosed" id="fridayclosed"
                               value="{{{ Input::old('fridayclosed', isset($Data) ? $Data->fridayclosed : null) }}}">

                    </div>
                </div>
                <div class="form-group  "> 
                    <label class="col-sm-3 control-label" for="field-1">Saturday</label> 

                    <div class="col-sm-4">
                        <input class="form-control time" tabindex="1"
                               placeholder="00:00:00" type="text"
                               name="saturdayopen" id="saturdayopen"
                               value="{{{ Input::old('saturdayopen', isset($Data) ? $Data->saturdayopen : null) }}}">

                    </div>
                    <div class="col-sm-4">
                        <input class="form-control time" tabindex="1"
                               placeholder="00:00:00" type="text"
                               name="saturdayclosed" id="saturdayclosed"
                               value="{{{ Input::old('saturdayclosed', isset($Data) ? $Data->saturdayclosed : null) }}}">

                    </div>
                </div>
                <div class="form-group  "> 
                    <label class="col-sm-3 control-label" for="field-1">Sunday</label> 

                    <div class="col-sm-4">
                        <input class="form-control time" tabindex="1"
                               placeholder="00:00:00" type="text"
                               name="sundayopen" id="sundayopen"
                               value="{{{ Input::old('sundayopen', isset($Data) ? $Data->sundayopen : null) }}}">

                    </div>
                    <div class="col-sm-4">
                        <input class="form-control time" tabindex="1"
                               placeholder="00:00:00" type="text"
                               name="sundayclosed" id="sundayclosed"
                               value="{{{ Input::old('sundayclosed', isset($Data) ? $Data->sundayclosed : null) }}}">

                    </div>
                </div>
                <div class="form-group  "> 
                    <label class="col-sm-3 control-label" for="field-1">Public Holiday</label> 

                    <div class="col-sm-4">
                        <input class="form-control time" tabindex="1"
                               placeholder="00:00:00" type="text"
                               name="public_holidayopen" id="public_holidayopen"
                               value="{{{ Input::old('public_holidayopen', isset($Data) ? $Data->public_holidayopen : null) }}}">

                    </div>
                    <div class="col-sm-4">
                        <input class="form-control time" tabindex="1"
                               placeholder="00:00:00" type="text"
                               name="public_holidayclosed" id="public_holidayclosed"
                               value="{{{ Input::old('public_holidayclosed', isset($Data) ? $Data->public_holidayclosed : null) }}}">

                    </div>
                </div>
                <!--                <div class="form-group">
                                    <label class="col-sm-3 control-label">Date Time</label>
                
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" data-mask="masdnsa" id="masdnsa" />
                
                
                                    </div>
                                </div>-->
                <!--                <script>
                                    jQuery(function ($) {
                                         $("#masdnsa").mask("99:99:99",{placeholder:"00:00:00 "});
                  
                                    });
                                </script>-->

                <div class="form-group {{{ $errors->has('website_english') ? 'has-error' : '' }}} ">
                    <label class="col-sm-3 control-label" for="field-1">Website</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Website" type="text"
                               name="website_english" id="website_english"
                               value="{{{ Input::old('website_english', isset($Data) ? $Data->website_english : null) }}}">
                        {!! $errors->first('website_english', '<label class="control-label"
                                                                      for="website_english">:message</label>')!!}
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('description') ? 'has-error' : '' }}} ">
                    <label class="col-sm-3 control-label" for="field-1">Description </label>

                    <div class="col-sm-5">
                        <textarea class="form-control" tabindex="1"
                                  placeholder="Description"  
                                  name="description" id="description"
                                  >{{{ Input::old('description', isset($Data) ? $Data->description : null) }}}</textarea>

                        {!! $errors->first('description', '<label class="control-label"
                                                                  for="description">:message</label>')!!}
                    </div>
                </div>


                @if(isset($Data->payment_option))
                <?php $pyment = explode(',', $Data->payment_option) ?>                 
                @endif


                <div class="form-group {{{ $errors->has('payment_option') ? 'has-error' : '' }}} ">
                    <label class="col-sm-3 control-label" for="field-1">Payment option  </label>

                    <div class="col-sm-9">
                        <div class="col-sm-2">
                            <input type="checkbox" name="payment_option[]" value="1"  class="icheck-2"  @if(isset($Data->payment_option)) @if (in_array('1', $pyment)) checked @endif  @endif>
                        </div>
                        <label class="col-sm-10  " for="field-1">Mastercard</label>

                        <div class="col-sm-2">
                            <input type="checkbox" name="payment_option[]" value="2" class="icheck-2" @if(isset($Data->payment_option)) @if (in_array('2', $pyment)) checked @endif  @endif>
                        </div>
                        <label class="col-sm-10  " for="field-1">Visa</label>

                        <div class="col-sm-2">
                            <input type="checkbox" name="payment_option[]" value="3" class="icheck-2" @if(isset($Data->payment_option)) @if (in_array('3', $pyment)) checked @endif  @endif>
                        </div>
                        <label class="col-sm-10  " for="field-1">American Express</label>
                        <div class="col-sm-2">
                            <input type="checkbox" name="payment_option[]" value="4" class="icheck-2" @if(isset($Data->payment_option)) @if (in_array('4', $pyment)) checked @endif  @endif>
                        </div>
                        <label class="col-sm-10 " for="field-1">Union Pay</label>
                        <div class="col-sm-2">
                            <input type="checkbox" name="payment_option[]" value="5" class="icheck-2" @if(isset($Data->payment_option)) @if (in_array('5', $pyment)) checked @endif  @endif>
                        </div>
                        <label class="col-sm-10  " for="field-1">EPS</label>
                        <div class="col-sm-2">
                            <input type="checkbox" name="payment_option[]" value="6" class="icheck-2" @if(isset($Data->payment_option)) @if (in_array('6', $pyment)) checked @endif  @endif>
                        </div>
                        <label class="col-sm-10  " for="field-1">Cash</label>
                        <div class="col-sm-2">
                            <input type="checkbox" name="payment_option[]" value="7" class="icheck-2" @if(isset($Data->payment_option)) @if (in_array('7', $pyment)) checked @endif  @endif>
                        </div>
                        <label class="col-sm-10 " for="field-1">Bank transfer</label>
                        <div class="col-sm-2">
                            <input type="checkbox" name="payment_option[]" value="8" class="icheck-2" @if(isset($Data->payment_option)) @if (in_array('8', $pyment)) checked @endif  @endif>
                        </div>
                        <label class="col-sm-10  " for="field-1">Paypal</label>

                    </div>


                </div>




            </div>

        </div>

        <div data-collapsed="0" class="panel panel-primary col-sm-6">

            <div class="panel-heading">
                <div class="panel-title">  
                    Shop information  
                </div> 
            </div>			
            <div class="panel-body"> 



                <div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}}">
                    <label class="col-sm-3 control-label" for="field-1">Shop Type</label>

                    @if(isset($Data->shop_type))
                    <div class="col-sm-5">
                        {!! Form::select('shop_type', Config::get('constants.ShopType'),$Data->shop_type, ['class' => 'form-control','id' => 'shop_type' ]) !!}
                    </div>
                    @else

                    <div class="col-sm-5">
                        {!! Form::select('shop_type', Config::get('constants.ShopType'),null, ['class' => 'form-control','id' => 'shop_type' ]) !!}
                    </div>
                    @endif
                </div>


                <div class="form-group" id="shopTypeCategory">

                    @if(isset($Data->shop_type))
                    @if($Data->shop_type==1)

                    @if(isset($Data->fashion_category))
                    <div class="form-group" >
                        <label class="col-sm-3 control-label" for="field-1">Fashion Category</label>

                        <div class="col-sm-5" >
                            <?php $selected = explode(',', $Data->fashion_category); ?>
                            {!! Form::select('FashionCategory[]', Config::get('constants.FashionCategory'),$selected, ['class' => 'form-control','id' => 'FashionCategory','multiple']) !!}
                        </div>
                    </div>
                    @else 
                    <div class="form-group" >
                        <label class="col-sm-3 control-label" for="field-1">Fashion Category</label>

                        <div class="col-sm-5" >
                            {!! Form::select('FashionCategory[]', Config::get('constants.FashionCategory'), null, ['class' => 'form-control','id' => 'FashionCategory','multiple']) !!}
                        </div>
                    </div>
                    @endif
                    @if(isset($Data->refined_shop_type))
                    <div class="form-group" >
                        <label class="col-sm-3 control-label" for="field-1">Shop Type</label>
                        <?php $selected = explode(',', $Data->refined_shop_type); ?>
                        <div class="col-sm-5" >
                            {!! Form::select('ShopTypeo1[]', Config::get('constants.ShopTypeo1'), $selected, ['class' => 'form-control','id' => 'ShopTypeo1','multiple']) !!}
                        </div>
                    </div>
                    @else
                    <div class="form-group" >
                        <label class="col-sm-3 control-label" for="field-1">Shop Type</label>

                        <div class="col-sm-5" >
                            {!! Form::select('ShopTypeo1[]', Config::get('constants.ShopTypeo1'), null, ['class' => 'form-control','id' => 'ShopTypeo1','multiple']) !!}
                        </div>
                    </div>
                    @endif


                    @elseif($Data->shop_type==2)

                    @if(isset($Data->beauty_retail_category))
                    <?php $selected = explode(',', $Data->beauty_retail_category); ?>
                    <div class="form-group" >
                        <label class="col-sm-3 control-label" for="field-1">Beauty Retail Category</label>

                        <div class="col-sm-5" >
                            {!! Form::select('BeautyRetailCategory[]', Config::get('constants.BeautyRetailCategory'), $selected, ['class' => 'form-control','id' => 'BeautyRetailCategory','multiple']) !!}
                        </div>
                    </div>
                    @else 
                    <div class="form-group" >
                        <label class="col-sm-3 control-label" for="field-1">Beauty Retail Category</label>

                        <div class="col-sm-5" >
                            {!! Form::select('BeautyRetailCategory[]', Config::get('constants.BeautyRetailCategory'), null, ['class' => 'form-control','id' => 'BeautyRetailCategory','multiple']) !!}
                        </div>
                    </div>

                    @endif

                    @if(isset($Data->refined_shop_type))
                    <div class="form-group" >
                        <label class="col-sm-3 control-label" for="field-1">Shop Type</label>
                        <?php $selected = explode(',', $Data->refined_shop_type); ?>
                        <div class="col-sm-5" >
                            {!! Form::select('ShopTypeo2[]', Config::get('constants.ShopTypeo2'), $selected, ['class' => 'form-control','id' => 'ShopTypeo1','multiple']) !!}
                        </div>
                    </div>
                    @else
                    <div class="form-group" >
                        <label class="col-sm-3 control-label" for="field-1">Shop Type</label>

                        <div class="col-sm-5" >
                            {!! Form::select('ShopTypeo2[]', Config::get('constants.ShopTypeo2'), null, ['class' => 'form-control','id' => 'ShopTypeo1','multiple']) !!}
                        </div>
                    </div>
                    @endif


                    @elseif($Data->shop_type==3)


                    @if(isset($Data->beauty_service_category))
                    <?php $selected = explode(',', $Data->beauty_service_category); ?>
                    <div class="form-group" >
                        <label class="col-sm-3 control-label" for="field-1">Beauty Servicing Category</label>


                        <div class="col-sm-5" >
                            {!! Form::select('BeautyServicingCategory[]', Config::get('constants.BeautyServicingCategory'), $selected, ['class' => 'form-control','id' => 'BeautyServicingCategory','multiple']) !!}    </div>
                    </div>

                    @else 
                    <div class="form-group" >
                        <label class="col-sm-3 control-label" for="field-1">Beauty Retail Category</label>


                        <div class="col-sm-5" >
                            {!! Form::select('BeautyServicingCategory[]', Config::get('constants.BeautyServicingCategory'), null, ['class' => 'form-control','id' => 'BeautyServicingCategory','multiple']) !!}    </div>
                    </div>


                    @endif


                    @if(isset($Data->refined_shop_type))
                    <div class="form-group" >
                        <label class="col-sm-3 control-label" for="field-1">Shop Type</label>
                        <?php $selected = explode(',', $Data->refined_shop_type); ?>
                        <div class="col-sm-5" >
                            {!! Form::select('ShopTypeo3[]', Config::get('constants.ShopTypeo3'), $selected, ['class' => 'form-control','id' => 'ShopTypeo1','multiple']) !!}
                        </div>
                    </div>
                    @else
                    <div class="form-group" >
                        <label class="col-sm-3 control-label" for="field-1">Shop Type</label>

                        <div class="col-sm-5" >
                            {!! Form::select('ShopTypeo3[]', Config::get('constants.ShopTypeo3'), null, ['class' => 'form-control','id' => 'ShopTypeo1','multiple']) !!}
                        </div>
                    </div>
                    @endif

                    @else
                    <label class="col-sm-3 control-label" for="field-1">Shop Type Category</label>
                    <div class="col-sm-5" >
                        <select class="form-control" >
                            <option>Select Shop Type Category</option>
                        </select>
                    </div>


                    @endif
                    @else

                    <label class="col-sm-3 control-label" for="field-1">Shop Type Category</label>
                    <div class="col-sm-5" >
                        <select class="form-control" >
                            <option>Select Shop Type Category</option>
                        </select>
                    </div>
                </div>
                @endif



                <div class="form-group {{{ $errors->has('age_gender') ? 'has-error' : '' }}} ">
                    <label class="col-sm-3 control-label" for="field-1">Age & Gender</label>

                    @if(isset($Data->age_gender))
                    <?php $gender = explode(',', $Data->age_gender) ?>                 
                    @endif
                  

                    <div class="col-sm-9">
                        <div class="col-sm-2">
                            <input type="checkbox" name="age_gender[]" value="1" class="icheck-2"   @if(isset($Data->age_gender)) @if (in_array('1', $gender)) checked @endif  @endif>
                        </div>
                        <label class="col-sm-10  " for="field-1">Men</label>

                        <div class="col-sm-2">
                            <input type="checkbox" name="age_gender[]" value="2" class="icheck-2"  @if(isset($Data->age_gender)) @if (in_array('2', $gender)) checked @endif  @endif>
                        </div>
                        <label class="col-sm-10  " for="field-1">Women</label>

                        <div class="col-sm-2">
                            <input type="checkbox" name="age_gender[]" value="3" class="icheck-2"  @if(isset($Data->age_gender)) @if (in_array('3', $gender)) checked @endif  @endif>
                        </div>
                        <label class="col-sm-10  " for="field-1">Infants & Kids</label> 
                    </div> 
                </div>
                <div class="form-group {{{ $errors->has('price_range') ? 'has-error' : '' }}} ">
                    <label class="col-sm-3 control-label" for="field-1">Price Range</label>
                    
                      @if(isset($Data->price_range))
                    <?php $pricerange = explode(',', $Data->price_range) ?>                 
                    @endif
                    <div class="col-sm-9">
                        <div class="col-sm-2">
                            <input type="checkbox" name="price_range[]" value="1" class="icheck-2"   @if(isset($Data->price_range)) @if (in_array('1', $pricerange)) checked @endif  @endif>
                        </div>
                        <label class="col-sm-10  " for="field-1"><$300</label>

                        <div class="col-sm-2">
                            <input type="checkbox" name="price_range[]" value="2" class="icheck-2" @if(isset($Data->price_range)) @if (in_array('2', $pricerange)) checked @endif  @endif>
                        </div>
                        <label class="col-sm-10  " for="field-1">$300-$799</label>

                        <div class="col-sm-2">
                            <input type="checkbox" name="price_range[]" value="3" class="icheck-2" @if(isset($Data->price_range)) @if (in_array('3', $pricerange)) checked @endif  @endif>
                        </div>
                        <label class="col-sm-10  " for="field-1">$800-$1499</label> 
                        <div class="col-sm-2">
                            <input type="checkbox" name="price_range[]" value="4" class="icheck-2" @if(isset($Data->price_range)) @if (in_array('4', $pricerange)) checked @endif  @endif>
                        </div>
                        <label class="col-sm-10  " for="field-1">$1500-$2999</label>
                        <div class="col-sm-2">
                            <input type="checkbox" name="price_range[]" value="5" class="icheck-2" @if(isset($Data->price_range)) @if (in_array('5', $pricerange)) checked @endif  @endif>
                        </div>
                        <label class="col-sm-10  " for="field-1">$3000-$4999</label>
                        <div class="col-sm-2">
                            <input type="checkbox" name="price_range[]" value="6" class="icheck-2" @if(isset($Data->price_range)) @if (in_array('6', $pricerange)) checked @endif  @endif>
                        </div>
                        <label class="col-sm-10  " for="field-1">>$5000</label>
                    </div> 
                </div>

                <div class="form-group {{{ $errors->has('membership') ? 'has-error' : '' }}} ">
                    <label class="col-sm-3 control-label" for="field-1">Membership</label>
                    <div class="col-sm-9">
                        <div class="col-sm-2">
                            <input type="radio" name="membership" value="0" @if(isset($Data->membership)) @if ($Data->membership!=1 ) checked @endif  @endif >
                        </div>
                        <label class="col-sm-10  " for="field-1">No</label>

                        <div class="col-sm-2">
                            <input type="radio" name="membership" value="1" @if(isset($Data->membership)) @if ($Data->membership==1 ) checked @endif  @endif >
                        </div>
                        <label class="col-sm-10  " for="field-1">Yes</label>

                    </div> 
                </div>


            </div>

        </div>


    </div>


    <div class="row">

        <!-- Profile Info and Notifications -->



        <!-- Raw Links -->



    </div>
    <div class="clearfix"> 
        <label class="col-sm-3 control-label" for="field-1"> </label>					
        <div class="col-md-5">
            <a  href="{{URL::to('admin/users/shops_index')}}" class="btn btn-sm btn-warning close_popup">
                <span class="glyphicon glyphicon-ban-circle"></span> {{
				trans("site/site.cancel") }}
            </a> 
            <!--<button type="reset" class="btn btn-sm btn-default">
                <span class="glyphicon glyphicon-remove-circle"></span> {{
                                trans("admin/modal.reset") }}
            </button>-->
            <button type="submit" class="btn btn-sm btn-success">
                <span class="glyphicon glyphicon-ok-circle"></span> 
                @if	(isset($Data))
                {{ trans("site/site.edit") }}
                @else
                {{trans("site/sitel.create") }}
                @endif
            </button> 
           
        </div>

    </div>
</form>





@stop  
@section('scripts')
<script type="text/javascript">
    $(function () {
        $("#roles").select2()
    });
</script>

@stop


