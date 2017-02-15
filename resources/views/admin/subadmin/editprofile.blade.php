@extends('admin.layouts.default') @section('content')
  
		<div data-collapsed="0" class="panel panel-primary col-sm-9">
		
			<div class="panel-heading">
				<div class="panel-title">
					Edit Profile
				</div> 
			</div>			
			<div class="panel-body">
				
				<form class="form-horizontal" method="post"
	action="@if (isset($user)){{ URL::to('admin/users/'.base64_encode($user->id).'/editprofile') }}@endif"
	autocomplete="off">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}} ">
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
					  
					<div class="form-group"> 
	<label class="col-sm-3 control-label" for="field-1"> </label>					
						<div class="col-md-5">
			<a type="reset" href="{{ url('/admin/dashboard') }}" class="btn btn-sm btn-warning close_popup">
				<span class="glyphicon glyphicon-ban-circle"></span> {{
				trans("site/site.cancel") }}
			</a>
			  
			<button type="submit" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-ok-circle"></span> 
				    Update
			</button>
		</div>
					
					
						 
				</form>
				
			</div>
		
		</div>
	 

 
@stop  
  @section('scripts')
<script type="text/javascript">
	$(function() {
		$("#roles").select2()
	});
</script>
@stop