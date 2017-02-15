@extends('admin.layouts.default') @section('content')

<form class="form-horizontal" method="post"
      action="" enctype="multipart/form-data" 
      autocomplete="off">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" /> 
      <input  type="hidden" name="shop_id" id="shop_id"   value="{{{ Input::old('shop_id', isset($Data) ?  $Data->shop_id : null) }}}"> 
   <div data-collapsed="0" class="  col-md-12">
        <div data-collapsed="0" class="panel panel-primary col-sm-6">

            <div class="panel-heading">
                <div class="panel-title">

                    Account Informations
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

 
                
                
                <div class="form-group {{{ $errors->has('phone') ? 'has-error' : '' }}}">
                    <label class="col-sm-3 control-label" for="field-1">Contact No</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Contact Number" type="text"
                               name="phone" id="full_name"
                              
                               value="{{{ Input::old('phone', isset($User) ?  $User->phone : null) }}}">
                        {!! $errors->first('phone', '<label class="control-label"
                                                                for="phone">:message</label>')!!}
                    </div>
                </div>

                <div class="form-group {{{ $errors->has('phone_2') ? 'has-error' : '' }}} ">
                    <label class="col-sm-3 control-label" for="field-1">Contact No 2</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Contact Number" type="text"
                               name="phone_2" id="phone"
                              
                               value="{{{ Input::old('phone_2', isset($User) ? $User->phone_2 : null) }}}">
                        {!! $errors->first('phone_2', '<label class="control-label"
                                                            for="phone_2">:message</label>')!!}
                    </div>
                </div>

 
                <div class="form-group {{{ $errors->has('email_2') ? 'has-error' : '' }}}">
                    <label class="col-sm-3 control-label" for="field-1">Contact email </label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="E-mail" type="text"
                               name="email_2" id="contact_email"
                              
                               value="{{{ Input::old('email_2', isset($User) ? $User->email_2: null) }}}">
                        {!! $errors->first('email_2', '<label class="control-label"
                                                                    for="email_2">:message</label>')!!}
                    </div>
                </div>

<!--                <div class="form-group {{{ $errors->has('facebook') ? 'has-error' : '' }}}">
                    <label class="col-sm-3 control-label" for="field-1">Facebook URL</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Facebook URL" type="text"
                               name="facebook" id="facebook"
                               value="{{{ Input::old('facebook', isset($Data) ? $Data->facebook : null) }}}">
                        {!! $errors->first('facebook', '<label class="control-label"
                                                               for="facebook">:message</label>')!!}
                    </div>
                </div>-->
<!--                <div class="form-group {{{ $errors->has('twitter') ? 'has-error' : '' }}}">
                    <label class="col-sm-3 control-label" for="field-1">Twitter URL</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Twitter URL" type="text"
                               name="twitter" id="twitter"
                               value="{{{ Input::old('twitter', isset($Data) ? $Data->twitter : null) }}}">
                        {!! $errors->first('twitter', '<label class="control-label"
                                                              for="username">:message</label>')!!}
                    </div>
                </div>-->


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
                <!--#########################forn end #######################-->

                <!------------------chain name English ------------------------>
                <div class="form-group {{{ $errors->has('chain') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">Chain name<span>(English)</span></label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Chain name" type="text"
                               name="chain" id="chain"
                               value="{{{ Input::old('chain', isset($Data) ? $Data->chain : null) }}}">
                        {!! $errors->first('chain', '<label class="control-label"
                                                            for="chain">:message</label>')!!}
                    </div>
                </div>

                <!------------------chain name Chinese ------------------------>
                <div class="form-group {{{ $errors->has('chain_c') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">Chain name<span>(Chinese)</span></label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Chain name (Chinese)" type="text"
                               name="chain_c" id="chain_c"
                               value="{{{ Input::old('chain_c', isset($Data) ? $Data->chain_c : null) }}}">
                        {!! $errors->first('chain_c', '<label class="control-label"
                                                              for="chain_c">:message</label>')!!}
                    </div>
                </div>

                <!------------------Shop name English------------------------>
                <div class="form-group {{{ $errors->has('shop_name') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">Shop Name(English)</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Shop Name(English)" type="text"
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
                               placeholder="Shop Name(Chinese)" type="text"
                               name="shop_name_c" id="shop_name_c"
                               value="{{{ Input::old('shop_name_c', isset($Data) ? $Data->shop_name_c : null) }}}">
                        {!! $errors->first('shop_name_c', '<label class="control-label"
                                                                  for="shop_name_c">:message</label>')!!}
                    </div>
                </div>
                <!------------------Shop Email------------------------>
                <div class="form-group {{{ $errors->has('source') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">Source</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Add source" type="source"
                               name="source" id="source"
                               value="{{{ Input::old('source', isset($Data) ? $Data->source : null) }}}">
                        {!! $errors->first('source', '<label class="control-label"
                                                                 for="source">:message</label>')!!}
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('shop_email') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">Shop Email</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Shop Email" type="email"
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
                               value="{{{ Input::old('shop_no', isset($Data) ? $Data->shop_no : null) }}}">
                        {!! $errors->first('shop_no', '<label class="control-label"
                                                               for="shop_no_c">:message</label>')!!}
                    </div>
                </div>
                 <div class="form-group {{{ $errors->has('shop_no_c') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Shop_No') }}}<span>({{{ trans('site/site.Chinese') }}})</span></label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Shop No" type="text"
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
                            <option value="{{$region->id}}"{{ ($Data->region == $region->id) ? 'selected="selected"' : null }}>@if(App::getLocale()=='jp'){{$region->name_c}}   @else {{$region->name_e}}    @endif </option>
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
                         
                            <option value="{{$district->id}}" {{ ($Data->district == $district->id) ? 'selected="selected"' : null }} >@if(App::getLocale()=='jp'){{$district->name_c}}   @else {{$district->name_e}}    @endif   </option>
                           
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
                                  placeholder="address"  
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
                                  placeholder="address"  
                                  name="address_c" id="address_c"
                                  >{{{ Input::old('address_c', isset($Data) ? $Data->address_c : null) }}}</textarea>

                        {!! $errors->first('address_c', '<label class="control-label"
                                                                for="address_c">:message</label>')!!}
                    </div>
                </div>-->


                <div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">Shop Type</label>

                    <div class="col-sm-8">
                        <div class="col-sm-12">
                            <input type="checkbox" value="1" class="shop_type" name="shop_type[]" @if(isset($Data->shop_type)) @if(strpos($Data->shop_type, '1') !== false) checked @endif  @endif >

                                   <label>{{{ trans('site/site.Fashion_Shop') }}}</label>
                        </div>
                        <div class="col-sm-12">
                            <input type="checkbox" value="2" class="shop_type" name="shop_type[]"  @if(isset($Data->shop_type)) @if(strpos($Data->shop_type, '2') !== false) checked @endif  @endif  >

                                   <label>{{{ trans('site/site.Beauty_Retail_Shop') }}}</label>
                        </div>
                        <div class="col-sm-12">
                            <input type="checkbox"   value="3" class="shop_type"  name="shop_type[]"  @if(isset($Data->shop_type)) @if(strpos($Data->shop_type, '3') !== false) checked @endif  @endif /> 
                                   <label>{{{ trans('site/site.Beauty_Servicing_Shop') }}}</label>
                        </div>

                    </div>
                </div>


                <div id="changeShopType">
                        @if(isset($Data->shop_type))                            <!--  IF CONDTION 1 -->

                        @if(strpos($Data->shop_type, '1') !== false)            <!-- condition for type 1 -->
 <div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Fashion_Shop_Category') }}}</label>
                       
                        <?php $fashionCategoryH = Config::get('constants.FashionCategory'); ?> 
                        @if(isset($Data->fashion_category))                    <!-- condition for  fashion category -->

                        <?php $selected = explode(',', $Data->fashion_category); ?>
                       <div class="col-sm-8">
                            @foreach($fashionCategoryH as $indexing => $valuing)
                            <div class="col-sm-12">                              
                                <input type="checkbox" name="FashionCategory[]"  value="{{ $indexing }}"@if (in_array($indexing, $selected)) checked @endif/> 
                                       <label>{{{ trans('site/site.'.$valuing) }}}</label>  
                            </div>  
                            @endforeach
                        </div>
                        @else                                                 <!-- else condition for  fashion category -->
                       <div class="col-sm-8">
                            @foreach($fashionCategoryH as $indexing => $valuing)
                           <div class="col-sm-12">                           
                                <input type="checkbox" name="FashionCategory[]"   value="{{ $indexing }}"/> 
                                <label >{{{ trans('site/site.'.$valuing) }}}</label>                                

                            </div>  
                            @endforeach
                        </div>

                        @endif                                               <!-- end condition for  fashion category -->                      
 </div> 

                        @endif       <!-- end condition for type 1 -->

    
      
                        
                        @if(strpos($Data->shop_type, '2') !== false)  <!--  condition for type 2 -->

<div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Beauty_Retail_Shop_Category') }}}</label>
                 
                    
                        <?php $fashionCategoryH = Config::get('constants.BeautyRetailCategory'); ?>
                        @if(isset($Data->beauty_retail_category))   <!--   condition for  beauty retail  category -->  
                        <?php $selected = explode(',', $Data->beauty_retail_category); ?>
                        <div class="col-sm-8">
                            @foreach($fashionCategoryH as $indexing => $valuing)
                            <div class="col-sm-12">                              
                                <input type="checkbox" name="BeautyRetailCategory[]" value="{{ $indexing }}"  @if (in_array($indexing, $selected)) checked @endif /> 
                                      <label>{{{ trans('site/site.'.$valuing) }}}</label>                             

                            </div>  
                            @endforeach
                        </div>
                        @else                                   <!--  else  condition for  beauty retail  category --> 
                        <div class="col-sm-8">
                            @foreach($fashionCategoryH as $indexing => $valuing)
                            <div class="col-sm-12">                              
                                <input type="checkbox" name="BeautyRetailCategory[]" value="{{ $indexing }}"/> 
                                <label>{{{ trans('site/site.'.$valuing) }}}</label>                                

                            </div>  
                            @endforeach
                        </div>
                   
                        @endif                                        <!--  end  condition for  beauty retail  category --> 
     </div>
                        @endif                                        <!-- end condition for type 2 -->
                        
                         
                          @if(strpos($Data->shop_type, '3') !== false)  <!--  condition for type 3 -->
<div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Beauty_Servicing_Shop_Category') }}}</label>
                 
                      
                        <?php $fashionCategoryH = Config::get('constants.BeautyServicingCategory'); ?>


                        @if(isset($Data->beauty_service_category))
                        <?php $selected = explode(',', $Data->beauty_service_category); ?>

                        <div class="col-sm-8"> 
                            @foreach($fashionCategoryH as $indexing => $valuing)
                           <div class="col-sm-12">                             
                                <input type="checkbox" name="BeautyServicingCategory[]" value="{{ $indexing }}"  @if (in_array($indexing, $selected)) checked @endif/> 
                                       <label>{{{ trans('site/site.'.$valuing) }}}</label>                                

                            </div>  
                            @endforeach
                        </div>
                        @else
                        <div class="col-sm-8"> 
                            @foreach($fashionCategoryH as $indexing => $valuing)
                           <div class="col-sm-12">                            
                                <input type="checkbox"  name="BeautyServicingCategory[]" value="{{ $indexing }}"/> 
                                <label>{{{ trans('site/site.'.$valuing) }}}</label>                                

                            </div>  
                            @endforeach
                        </div>
                  
                        @endif
      </div>
                        @endif 
                      

                        <!-- end condition for type 3 -->
                        @else  <!--  ELSE  CONDTION 1 -->
                        <div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Fashion_Shop_Category') }}} </label>

                        
                        <?php $fashionCategoryH = Config::get('constants.FashionCategory'); ?>

                      <div class="col-sm-8"> 
                            @foreach($fashionCategoryH as $indexing => $valuing)
                           <div class="col-sm-12">                           
                                <input type="checkbox"  name="FashionCategory[]"  value="{{ $indexing }}"/> 
                                <label>{{{ trans('site/site.'.$valuing) }}}</label>                               

                            </div>  
                            @endforeach
                        </div>
                        </div>

                        @endif <!--  end  CONDTION 1 -->


                        <!--######### ########## Refined Shop Type ######## #############-->

                        @if(isset($Data->shop_type)) <!--  IF CONDTION 1 -->


                        @if(strpos($Data->shop_type, '1') !== false)  <!-- condition for type 1 -->
     <div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Refined_Shop_Type') }}} </label>

                       
                        <?php $RefinedShopType = Config::get('constants.ShopTypeo1'); ?>
                        @if(isset($Data->refined_shop_type))
                        <?php $selected1 = explode(',', $Data->refined_shop_type); ?>
                        <div class="col-sm-8"> 

                            @foreach($RefinedShopType as $indexingr => $valuingr)
                            @if($indexingr!=null)
                            <div class="col-sm-12"> 
                                <input type="checkbox"  name="ShopTypeo[]"  value="{{ $indexingr }}"  @if (in_array($indexingr, $selected1)) checked @endif/> 
                                       <label>{{{ trans('site/site.'.$valuingr) }}}</label>
                            </div> 
                            @endif
                            @endforeach

                        </div>

                        @else                                          <!-- ELSE  condition for type 1 -->
                         <div class="col-sm-8"> 

                            @foreach($RefinedShopType as $indexingr => $valuingr)
                            @if($indexingr!=null)
                             <div class="col-sm-12"> 
                                <input type="checkbox" name="ShopTypeo[]"   value="{{ $indexingr }}" /> 
                                <label>{{{ trans('site/site.'.$valuingr) }}}</label>
                            </div> 
                            @endif
                            @endforeach

                        </div>
                        </div>

                        @endif                                   <!-- END  condition for type 1 -->




                        @elseif(strpos($Data->shop_type, '2') !== false)

  <div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}}">
 <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Refined_Shop_Type') }}}</label>



                      
                        <?php $RefinedShopType = Config::get('constants.ShopTypeo2'); ?>
                        @if(isset($Data->refined_shop_type))    <!--    condition for type 2 -->
                        <?php $selected1 = explode(',', $Data->refined_shop_type); ?>
                        <div class="col-sm-8">

                            @foreach($RefinedShopType as $indexingr => $valuingr)
                            @if($indexingr!=null)
                           <div class="col-sm-12">
                                <input type="checkbox" name="ShopTypeo[]"  value="{{ $indexingr }}"  @if (in_array($indexingr, $selected1)) checked @endif/> 
                                       <label>{{{ trans('site/site.'.$valuingr) }}}</label>
                            </div> 
                            @endif
                            @endforeach

                        </div>
                        @else                             <!--   else condition for type 2 -->
                        <div class="col-sm-8">

                            @foreach($RefinedShopType as $indexingr => $valuingr)
                            @if($indexingr!=null)
                            <div class="col-sm-12">
                                <input type="checkbox"  name="ShopTypeo[]"  value="{{ $indexingr }}"/> 
                                <label>{{{ trans('site/site.'.$valuingr) }}}</label>
                            </div> 
                            @endif
                            @endforeach

                        </div>
                        </div>
                        @endif                           <!--   end condition for type 2 -->



                        @elseif(strpos($Data->shop_type, '3') !== false)

                        <?php $selected1 = explode(',', $Data->refined_shop_type); ?>
                         <div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}}">
 <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Refined_Shop_Type') }}}</label>
                         

                       <div class="col-sm-8">
                            <?php $RefinedShopType = Config::get('constants.ShopTypeo3'); ?>

                            @if(isset($Data->refined_shop_type))            <!-- condition for type 3 -->

                            @foreach($RefinedShopType as $indexingr => $valuingr)
                            @if($indexingr!=null)
                          <div class="col-sm-12">
                                <input type="checkbox"  name="ShopTypeo[]"  value="{{ $indexingr }}" @if (in_array($indexingr, $selected1)) checked @endif/> 
                                       <label>{{{ trans('site/site.'.$valuingr) }}}</label>
                            </div> 
                            @endif
                            @endforeach

                            @else                                      <!-- else condition for type 3 -->

                            @foreach($RefinedShopType as $indexingr => $valuingr)
                            @if($indexingr!=null)
                            <div class="col-sm-12">
                                <input type="checkbox" name="ShopTypeo[]"   value="{{ $indexingr }}"/> 
                                <label>{{{ trans('site/site.'.$valuingr) }}}</label>
                            </div> 
                            @endif
                            @endforeach


                            @endif <!-- end condition for type 3 -->



                        </div>
                        </div>


                        @endif



                        @else  <!--  ELSE  CONDTION 1 -->
<div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}}">
 <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Refined_Shop_Type') }}}</label>
                       
                        <div class="col-sm-8">
                            <?php $RefinedShopType = Config::get('constants.ShopTypeo1'); ?>
                            @foreach($RefinedShopType as $indexingr => $valuingr)
                             <div class="col-sm-12">
                                <input type="checkbox"  name="ShopTypeo[]"  value="{{ $indexingr }}"/> 
                                <label>{{{ trans('site/site.'.$valuingr) }}}</label>
                            </div> 
                            @endforeach

                        </div>

                        @endif <!--  end  CONDTION 1 -->



                    </div>
                    </div>
                    

                <!-----------------------age @ gender---------------------->
                <div class="form-group {{{ $errors->has('age_gender') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">Age & Gender</label>

                    @if(isset($Data->age_gender))
                    <?php $gender = explode(',', $Data->age_gender) ?>                 
                    @endif


                    <div class="col-sm-8">
                        <div class="col-sm-12">
                            <input type="checkbox" name="age_gender[]" value="1" class="icheck-2"   @if(isset($Data->age_gender)) @if (in_array('1', $gender)) checked @endif  @endif>

                                   <label   for="field-1">Men</label>
                        </div>
                        <div class="col-sm-12">
                            <input type="checkbox" name="age_gender[]" value="2" class="icheck-2"  @if(isset($Data->age_gender)) @if (in_array('2', $gender)) checked @endif  @endif>

                                   <label   for="field-1">Women</label>
                        </div>
                        <div class="col-sm-12">
                            <input type="checkbox" name="age_gender[]" value="3" class="icheck-2"  @if(isset($Data->age_gender)) @if (in_array('3', $gender)) checked @endif  @endif>

                                   <label   for="field-1">Infants & Kids</label> 
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
                            <input type="checkbox" name="price_range[]" value="1" class="icheck-2"   @if(isset($Data->price_range)) @if (in_array('1', $pricerange)) checked @endif  @endif>
                                   <label ><$300</label>
                        </div>





                        <div class="col-sm-12">
                            <input type="checkbox" name="price_range[]" value="2" class="icheck-2" @if(isset($Data->price_range)) @if (in_array('2', $pricerange)) checked @endif  @endif>
                                   <label >$300-$799</label>
                        </div>


                        <div class="col-sm-12">
                            <input type="checkbox" name="price_range[]" value="3" class="icheck-2" @if(isset($Data->price_range)) @if (in_array('3', $pricerange)) checked @endif  @endif>
                                   <label>$800-$1499</label> 
                        </div>

                        <div class="col-sm-12">
                            <input type="checkbox" name="price_range[]" value="4" class="icheck-2" @if(isset($Data->price_range)) @if (in_array('4', $pricerange)) checked @endif  @endif>
                                   <label >$1500-$2999</label>
                        </div>

                        <div class="col-sm-12">
                            <input type="checkbox" name="price_range[]" value="5" class="icheck-2" @if(isset($Data->price_range)) @if (in_array('5', $pricerange)) checked @endif  @endif>
                                   <label>$3000-$4999</label>
                        </div>

                        <div class="col-sm-12">
                            <input type="checkbox" name="price_range[]" value="6" class="icheck-2" @if(isset($Data->price_range)) @if (in_array('6', $pricerange)) checked @endif  @endif>
                                   <label>>$5000</label>
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
                            <input type="checkbox" name="payment_option[]" value="1"  class="icheck-2"  @if(isset($Data->payment_option)) @if (in_array('1', $pyment)) checked @endif  @endif>
                                   <label >Mastercard</label>
                        </div>


                        <div class="col-sm-12">
                            <input type="checkbox" name="payment_option[]" value="2" class="icheck-2" @if(isset($Data->payment_option)) @if (in_array('2', $pyment)) checked @endif  @endif>
                                   <label>Visa</label>
                        </div>


                        <div class="col-sm-12">
                            <input type="checkbox" name="payment_option[]" value="3" class="icheck-2" @if(isset($Data->payment_option)) @if (in_array('3', $pyment)) checked @endif  @endif>
                                   <label>American Express</label>
                        </div>

                        <div class="col-sm-12">
                            <input type="checkbox" name="payment_option[]" value="4" class="icheck-2" @if(isset($Data->payment_option)) @if (in_array('4', $pyment)) checked @endif  @endif>
                                   <label>Union Pay</label>
                        </div>

                        <div class="col-sm-12">
                            <input type="checkbox" name="payment_option[]" value="5" class="icheck-2" @if(isset($Data->payment_option)) @if (in_array('5', $pyment)) checked @endif  @endif>
                                   <label>EPS</label>
                        </div>

                        <div class="col-sm-12">
                            <input type="checkbox" name="payment_option[]" value="6" class="icheck-2" @if(isset($Data->payment_option)) @if (in_array('6', $pyment)) checked @endif  @endif>
                                   <label>Cash</label>
                        </div>

                        <div class="col-sm-12">
                            <input type="checkbox" name="payment_option[]" value="7" class="icheck-2" @if(isset($Data->payment_option)) @if (in_array('7', $pyment)) checked @endif  @endif>
                                   <label>Bank transfer</label>
                        </div>

                        <div class="col-sm-12">
                            <input type="checkbox" name="payment_option[]" value="8" class="icheck-2" @if(isset($Data->payment_option)) @if (in_array('8', $pyment)) checked @endif  @endif>
                                   <label>Paypal</label>
                        </div>


                    </div>


                </div>  
<div class="form-group {{{ $errors->has('display_top') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Display on Home Page:</label>

                <div class="col-sm-8" id="display_topcheck">
                    <div class="col-sm-6">
 <input type="checkbox" value="0" class="icheck-2" name="display_top" @if(isset($Data->display_top)) @if(strpos($Data->display_top, '0') !== false) checked @endif  @endif >
 
                       

                                   <label>No</label>
                    </div>
                    <div class="col-sm-6">
  <input type="checkbox" value="1" class="icheck-2" name="display_top" @if(isset($Data->display_top)) @if(strpos($Data->display_top, '1') !== false) checked @endif  @endif >

                       

                                   <label>Yes</label>
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
                    <label class="col-sm-3 control-label" for="field-1">Shop Image 1 </label>	
                    @if(isset($Data)) 			
                    <div class="col-sm-4">
                        <img src=" {{ $Data->shop_image_1}}" width="100" height="70" alt="" />
                    </div> 
                    @else
                    <div class="col-sm-4">
                        <img src="{{ asset('images/noimage.png') }}" width="100" height="70" alt="" /> 
                    </div>
                    @endif
                    <div class="col-sm-5">
                        <input type="file"  id="shop_image_1" name="shop_image_1"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="field-1">Shop Image 2</label>
                    @if(isset($Data)) 			
                    <div class="col-sm-4">
                        <img src=" {{ $Data->shop_image_2}}" width="100" height="70" alt="" />
                    </div> 
                    @else
                    <div class="col-sm-4">
                        <img src="{{ asset('images/noimage.png') }}" width="100" height="70" alt="" /> 
                    </div>
                    @endif
                    <div class="col-sm-5">

                        <input type="file"  id="shop_image_2" name="shop_image_2"/>


                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="field-1">Shop Image 3</label>
                    @if(isset($Data)) 			
                    <div class="col-sm-4">
                        <img src=" {{ $Data->shop_image_3}}" width="100" height="70" alt="" />
                    </div> 
                    @else
                    <div class="col-sm-4">
                        <img src="{{ asset('images/noimage.png') }}" width="100" height="70" alt="" /> 
                    </div>
                    @endif
                    <div class="col-sm-5">

                        <input type="file"  id="shop_image_3" name="shop_image_3"/>


                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="field-1">Shop Image 4</label>
                    @if(isset($Data)) 			
                    <div class="col-sm-4">
                        <img src=" {{ $Data->shop_image_4}}" width="100" height="70" alt="" />
                    </div> 
                    @else
                    <div class="col-sm-4">
                        <img src="{{ asset('images/noimage.png') }}" width="100" height="70"alt="" /> 
                    </div>
                    @endif
                    <div class="col-sm-5">
                        <input type="file"  id="shop_image_4" name="shop_image_4"/>


                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="field-1">Shop Image 5</label>
                    @if(isset($Data)) 			
                    <div class="col-sm-4">
                        <img src=" {{ $Data->shop_image_5}}"width="100" height="70" alt="" /> 
                    </div>
                    @else
                    <div class="col-sm-4">
                        <img src="{{ asset('images/noimage.png') }}" width="100" height="70" alt="" /> 
                    </div>
                    @endif
                    <div class="col-sm-5">
                        <input type="file"  id="shop_image_5" name="shop_image_5"/>


                    </div>
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
                        <input type="radio" name="fitting" value="1" @if(isset($Data->fitting)) @if ($Data->fitting==1 ) checked @endif  @endif> 
                               <label>Yes</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="radio" name="fitting" value="0" @if(isset($Data->fitting)) @if ($Data->fitting!=1 ) checked @endif  @endif  > 
                               <label>No</label>
                    </div>
                </div>
            </div>


            <div class="form-group {{{ $errors->has('fitting_detail') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Fitting Details </label>

                <div class="col-sm-5">
                    <textarea class="form-control" tabindex="1"
                              placeholder="Fitting Details"  
                              name="fitting_detail" id="fitting_detail"
                              >{{{ Input::old('fitting_detail', isset($Data) ? $Data->fitting_detail : null) }}}</textarea>

                    {!! $errors->first('fitting_detail', '<label class="control-label"
                                                                 for="fitting_detail">:message</label>')!!}
                </div>
            </div>

            <!-----------------------Other Information---------------------->


            <div class="form-group {{{ $errors->has('refund') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Refund</label>

                <div class="col-sm-8">
                    <div class="col-sm-3">
                        <input type="radio" name="refund" value="1" @if(isset($Data->refund)) @if ($Data->refund==1 ) checked @endif  @endif> 
                               <label>Yes</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="radio" name="refund" value="0" @if(isset($Data->refund)) @if ($Data->refund!=1 ) checked @endif  @endif  > 
                               <label>No</label>
                    </div>
                </div>
            </div>


            <div class="form-group {{{ $errors->has('refund_detail') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Refund Details </label>

                <div class="col-sm-5">
                    <textarea class="form-control" tabindex="1"
                              placeholder="Refund Details"  
                              name="refund_detail" id="refund_detail"
                              >{{{ Input::old('refund_detail', isset($Data) ? $Data->refund_detail : null) }}}</textarea>

                    {!! $errors->first('refund_detail', '<label class="control-label"
                                                                for="refund_detail">:message</label>')!!}
                </div>
            </div>


            <!-----------------------Other Information---------------------->


            <div class="form-group {{{ $errors->has('exchange') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Exchange</label>

                <div class="col-sm-8">
                    <div class="col-sm-3">
                        <input type="radio" name="exchange" value="1" @if(isset($Data->exchange)) @if ($Data->exchange==1 ) checked @endif  @endif> 
                               <label>Yes</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="radio" name="exchange" value="0" @if(isset($Data->exchange)) @if ($Data->exchange!=1 ) checked @endif  @endif  > 
                               <label>No</label>
                    </div>
                </div>
            </div>


            <div class="form-group {{{ $errors->has('exchange_detail') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Exchange Details </label>

                <div class="col-sm-5">
                    <textarea class="form-control" tabindex="1"
                              placeholder="Exchange Details"  
                              name="exchange_detail" id="exchange_detail"
                              >{{{ Input::old('exchange_detail', isset($Data) ? $Data->exchange_detail : null) }}}</textarea>

                    {!! $errors->first('exchange_detail', '<label class="control-label"
                                                                  for="exchange_detail">:message</label>')!!}
                </div>
            </div>

            <!-----------------------Other Information---------------------->


            <div class="form-group {{{ $errors->has('membership') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Membership</label>

                <div class="col-sm-8">
                    <div class="col-sm-3">
                        <input type="radio" name="membership" value="1" @if(isset($Data->membership)) @if ($Data->membership==1 ) checked @endif  @endif> 
                               <label>Yes</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="radio" name="membership" value="0" @if(isset($Data->membership)) @if ($Data->membership!=1 ) checked @endif  @endif  > 
                               <label>No</label>
                    </div>
                </div>
            </div>


            <div class="form-group {{{ $errors->has('membership_detail') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Membership Details </label>

                <div class="col-sm-5">
                    <textarea class="form-control" tabindex="1"
                              placeholder="Membership Details"  
                              name="membership_detail" id="membership_detail"
                              >{{{ Input::old('membership_detail', isset($Data) ? $Data->membership_detail : null) }}}</textarea>

                    {!! $errors->first('membership_detail', '<label class="control-label"
                                                                    for="membership_detail">:message</label>')!!}
                </div>
            </div>

            <!-----------------------Description English ---------------------->
            <div class="form-group {{{ $errors->has('description') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Description English</label>

                <div class="col-sm-5">
                    <textarea class="form-control" tabindex="1"
                              placeholder="Description"  
                              name="description" id="description"
                              >{{{ Input::old('description', isset($Data) ? $Data->description : null) }}}</textarea>

                    {!! $errors->first('description', '<label class="control-label"
                                                              for="description">:message</label>')!!}
                </div>
            </div>

            <!-----------------------Description Chinese ---------------------->
            <div class="form-group {{{ $errors->has('description_c') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Description Chinese </label>

                <div class="col-sm-5">
                    <textarea class="form-control" tabindex="1"
                              placeholder="Description"  
                              name="description_c" id="description_c"
                              >{{{ Input::old('description_c', isset($Data) ? $Data->description_c : null) }}}</textarea>

                    {!! $errors->first('description_c', '<label class="control-label"
                                                                for="description_c">:message</label>')!!}
                </div>
            </div>

            <!-----------------------Website English ---------------------->
            <div class="form-group {{{ $errors->has('website_english') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Website English </label>

                <div class="col-sm-5">

                    <input class="form-control " tabindex="1"
                           placeholder="00:00:00" type="text"
                           name="Website English" id="website_english"
                           value="{{{ Input::old('website_english', isset($Data) ?  $Data->website_english : null) }}}">


                    {!! $errors->first('website_english', '<label class="control-label"
                                                                  for="website_english">:message</label>')!!}
                </div>
            </div>

            <!-----------------------Website Chinese ---------------------->
            <div class="form-group {{{ $errors->has('website_chinese') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Website Chinese </label>

                <div class="col-sm-5">

                    <input class="form-control " tabindex="1"
                           placeholder="Website Chinese" type="text"
                           name="website_chinese" id="website_chinese"
                           value="{{{ Input::old('website_chinese', isset($Data) ?  $Data->website_chinese : null) }}}"> 
                    {!! $errors->first('website_chinese', '<label class="control-label"
                                                                  for="website_chinese">:message</label>')!!}
                </div>
            </div>

            <!-----------------------Facebook ---------------------->
            <div class="form-group {{{ $errors->has('facebook') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Facebook</label>

                <div class="col-sm-5">
                    <input class="form-control " tabindex="1"
                           placeholder="Facebook" type="text"
                           name="facebook" id="facebook"
                           value="{{{ Input::old('facebook', isset($Data) ?  $Data->facebook : null) }}}"> 


                    {!! $errors->first('facebook', '<label class="control-label"  for="facebook">:message</label>')!!}
                </div>
            </div>

            <!-----------------------Instagram ---------------------->
            <div class="form-group {{{ $errors->has('instagram') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Instagram</label>

                <div class="col-sm-5">
                    <input class="form-control " tabindex="1"
                           placeholder="Instagram" type="text"
                           name="instagram" id="instagram"
                           value="{{{ Input::old('instagram', isset($Data) ?  $Data->instagram : null) }}}"> 


                    {!! $errors->first('instagram', '<label class="control-label"  for="instagram">:message</label>')!!}
                </div>
            </div>

            <!-----------------------Twitter ---------------------->
            <div class="form-group {{{ $errors->has('twitter') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Twitter</label>

                <div class="col-sm-5">
                    <input class="form-control " tabindex="1"
                           placeholder="Twitter" type="text"
                           name="twitter" id="twitter"
                           value="{{{ Input::old('twitter', isset($Data) ?  $Data->twitter : null) }}}"> 


                    {!! $errors->first('twitter', '<label class="control-label"  for="twitter">:message</label>')!!}
                </div>
            </div>

            <!-----------------------Weibo ---------------------->
            <div class="form-group {{{ $errors->has('weibo') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Weibo</label>

                <div class="col-sm-5">
                    <input class="form-control " tabindex="1"
                           placeholder="Weibo" type="text"
                           name="weibo" id="weibo"
                           value="{{{ Input::old('weibo', isset($Data) ?  $Data->weibo : null) }}}"> 


                    {!! $errors->first('weibo', '<label class="control-label"  for="weibo">:message</label>')!!}
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
                Update Shop
            </button> 

        </div>

    </div>
</form>
<script>
    $(function () {
        $('.shop_type').click(function () {


            var SHOPTYPEVAL = [];
            
            $("input:checkbox[class=shop_type]:checked").each(function () {
                SHOPTYPEVAL.push($(this).val());
            });
            SHOPTYPEVAL = SHOPTYPEVAL.join(",");
           
            $.get('{{{ URL::to('') }}}/admin/Shops/shopType/'+SHOPTYPEVAL,function(data)
            { 
              $('#changeShopType').html(data);
            }
            );

        });
    });
</script>
<script>
$(document).ready(function(){
    $(':checkbox').bind('change', function() {
        var thisClass = $(this).attr('class');
        if ($(this).attr('checked')) {
            $(':checkbox.' + thisClass + ":not(#" + this.id + ")").removeAttr('checked');
        }
        else {
            $(this).attr('checked', 'checked');
        }
    });
});
</script>

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
 <script>
$(':checkbox').on('change',function(){
 var th = $(this), name = th.prop('display_top'); 
 if(th.is(':checked')){
     $(':checkbox[name="display_top"]').not($(this)).prop('checked',false);   
  }
});
</script>
@stop  
@section('scripts')


@stop


