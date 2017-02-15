@extends('admin.layouts.default') @section('content')

<div data-collapsed="0" class="panel panel-primary col-sm-9">

    <div class="panel-heading">
        <div class="panel-title">
           
            @if (isset($user)){{  'Edit Sub Admin' }} @else {{ "Add Sub Admin"}}@endif
        </div> 
    </div>			
    <div class="panel-body">
      
      <form class="form-horizontal" method="post"
      action="@if (isset($user)){{ URL::to('admin/users/' . base64_encode($user->id) . '/sub_edit') }}@endif"
      autocomplete="off">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}}">
                <label class="col-sm-3 control-label" for="field-1">{{trans('admin/users.name') }}</label>
                <div class="col-sm-5">
                    <input class="form-control" tabindex="1"
                           placeholder="{{ trans('admin/users.name') }}" type="text"
                           name="name" id="name"
                           value="{{{ Input::old('name', isset($user) ? $user->name : null) }}}">
                    {!! $errors->first('name', '<label class="control-label"
                                                               for="username">:message</label>')!!}
                </div>
            </div>
            <div class="form-group {{{ $errors->has('first_name') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">First Name</label>

                <div class="col-sm-5">
                    <input class="form-control" tabindex="1"
                           placeholder="First Name" type="text"
                           name="first_name" id="first_name"
                           value="{{{ Input::old('first_name', isset($user) ? $user->first_name : null) }}}">
                    {!! $errors->first('first_name', '<label class="control-label"
                                                       for="username">:message</label>')!!}
                </div>
            </div>
            
             <div class="form-group {{{ $errors->has('last_name') ? 'has-error' : '' }}} ">
                <label class="col-sm-3 control-label" for="field-1">Last Name</label>

                <div class="col-sm-5">
                    <input class="form-control" tabindex="1"
                           placeholder="First Name" type="text"
                           name="last_name" id="last_name"
                           value="{{{ Input::old('last_name', isset($user) ? $user->last_name : null) }}}">
                    {!! $errors->first('last_name', '<label class="control-label"
                                                       for="username">:message</label>')!!}
                </div>
            </div>  
            
         	<div class="form-group {{{ $errors->has('phone') ? 'has-error' : '' }}} ">
						<label class="col-sm-3 control-label" for="field-1">Phone</label>
						
						<div class="col-sm-5">
							<input class="form-control" tabindex="1"
							placeholder="Phone" type="text"
							name="phone" id="phone"
							value="{{{ Input::old('phone', isset($user) ? $user->phone : null) }}}">
							{!! $errors->first('phone', '<label class="control-label"
                                                               for="phone">:message</label>')!!}
						</div>
					</div>
					
					<div class="form-group {{{ $errors->has('address') ? 'has-error' : '' }}} ">
						<label class="col-sm-3 control-label" for="field-1">Address</label>
						
						<div class="col-sm-5">
							<textarea class="form-control" tabindex="1"
							placeholder="address"  
							name="address" id="address"
							 >{{{ Input::old('address', isset($user) ? $user->address : null) }}}</textarea>
							
							{!! $errors->first('address', '<label class="control-label"
                                                               for="phone">:message</label>')!!}
						</div>
					</div>
					<div class="form-group {{{ $errors->has('state') ? 'has-error' : '' }}} ">
						<label class="col-sm-3 control-label" for="field-1">State</label>
						
						<div class="col-sm-5">
							<input class="form-control" tabindex="1"
							placeholder="State" type="text"
							name="state" id="state"
							value="{{{ Input::old('state', isset($user) ? $user->state : null) }}}">
							{!! $errors->first('state', '<label class="control-label"
                                                               for="state">:message</label>')!!}
						</div>
					</div>
					<div class="form-group {{{ $errors->has('city') ? 'has-error' : '' }}} ">
						<label class="col-sm-3 control-label" for="field-1">City</label>
						
						<div class="col-sm-5">
							<input class="form-control" tabindex="1"
							placeholder="city" type="text"
							name="city" id="city"
							value="{{{ Input::old('city', isset($user) ? $user->city : null) }}}">
							{!! $errors->first('city', '<label class="control-label"
                                                               for="city">:message</label>')!!}
						</div>
					</div>
					
					<div class="form-group {{{ $errors->has('postal_Code') ? 'has-error' : '' }}} ">
						<label class="col-sm-3 control-label" for="field-1">Postal Code</label>
						
						<div class="col-sm-5">
							<input class="form-control" tabindex="1"
							placeholder="Postal Code" type="text"
							name="postal_Code" id="postal_Code"
							value="{{{ Input::old('postal_Code', isset($user) ? $user->postal_Code : null) }}}">
							{!! $errors->first('postal_Code', '<label class="control-label"
                                                               for="postal_Code">:message</label>')!!}
						</div>
					</div>
				 
            
             @if(!isset($user))
             
              <input class="form-control" tabindex="1" type="hidden" name="role_id" id="role_id" value="2">
            
                <div class="form-group {{{ $errors->has('username') ? 'has-error' : '' }}}">
                    <label class="col-sm-3 control-label" for="username">{{
						trans('admin/users.username') }}</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="username" tabindex="1"
                               placeholder="{{ trans('admin/users.username') }}" name="username"
                               id="username"
                               value="{{{ Input::old('username', isset($user) ? $user->username : null) }}}" />
                        {!! $errors->first('username', '<label class="control-label"
                                                               for="username">:message</label>')!!}
                    </div>
                </div>
             
            
                <div class="form-group {{{ $errors->has('email') ? 'has-error' : '' }}}">
                    <label class="col-sm-3 control-label" for="email">{{
						trans('admin/users.email') }}</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="email" tabindex="4"
                               placeholder="{{ trans('admin/users.email') }}" name="email"
                               id="email"
                               value="{{{ Input::old('email', isset($user) ? $user->email : null) }}}" />
                        {!! $errors->first('email', '<label class="control-label"
                                                            for="email">:message</label>')!!}
                    </div>
                
            </div>
             
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
            
			<!--<div class="form-group {{{ $errors->has('postal_Code') ? 'has-error' : '' }}} ">
						<label class="col-sm-3 control-label" for="field-1">Status</label>
						
						<div class="col-sm-5">
							<select class="form-control" tabindex="1" name="Status" id="Status">
							<option>ZXZ</option>
							</select>
							{!! $errors->first('postal_Code', '<label class="control-label"
                                                               for="postal_Code">:message</label>')!!}
						</div>
					</div>-->
             
            

            <div class="form-group"> 
                <label class="col-sm-3 control-label" for="field-1"> </label>					
                <div class="col-md-5">
                    <a  href="{{URL::to('admin/users/sub_index')}}" class="btn btn-sm btn-warning close_popup">
                        <span class="glyphicon glyphicon-ban-circle"></span> {{
				trans("site/site.cancel") }}
                    </a> 
            <!--<button type="reset" class="btn btn-sm btn-default">
                <span class="glyphicon glyphicon-remove-circle"></span> {{
				trans("admin/modal.reset") }}
            </button>-->
            <button type="submit" class="btn btn-sm btn-success">
                <span class="glyphicon glyphicon-ok-circle"></span> 
                @if	(isset($user))
                {{ trans("site/site.edit") }}
                @else
                {{trans("site/site.create") }}
                @endif
            </button>
                </div>

            </div>
            
             

        </form>

    

</div>



@stop  
@section('scripts')
<script type="text/javascript">
    $(function () {
        $("#roles").select2()
    });
</script>
@stop


 