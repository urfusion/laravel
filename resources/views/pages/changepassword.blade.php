@extends('admin.layouts.default') @section('content')
  
		<div data-collapsed="0" class="panel panel-primary col-sm-9">
		
			<div class="panel-heading">
				<div class="panel-title">
					{{{ trans('site/site.change_password') }}}
				</div> 
			</div>			
			<div class="panel-body">
				
				<form class="form-horizontal" method="post"
	action="@if (isset($user)){{ URL::to('members/' . base64_encode($user->id) . '/changePasswor') }}@endif"
	autocomplete="off">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<div class="form-group">
						<label class="col-sm-3 control-label" for="field-1">Password</label>
						
						<div class="col-sm-5">
							<input class="form-control" tabindex="5"
							placeholder="Password"
							type="password" name="password" id="password" value="" />
						{!!$errors->first('password', '<label class="control-label"
							for="password">:message</label>')!!}
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label" for="field-1">Password confirmation</label>
						
						<div class="col-sm-5">
							<input class="form-control" type="password" tabindex="6"
							placeholder="Password confirmation"
							name="password_confirmation" id="password_confirmation" value="" />
						{!!$errors->first('password_confirmation', '<label
							class="control-label" for="password_confirmation">:message</label>')!!}
						</div>
					</div>
					  
					<div class="form-group"> 
	<label class="col-sm-3 control-label" for="field-1"> </label>					
						<div class="col-md-5">
			<a type="reset" class="btn btn-sm btn-warning close_popup">
				<span class="glyphicon glyphicon-ban-circle"></span> {{
				trans("site/site.cancel") }}
			</a>
			  
			<button type="submit" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-ok-circle"></span> 
				    Update Password
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