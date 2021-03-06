@extends('admin.layouts.default') @section('content')
  
		<div data-collapsed="0" class="panel panel-primary col-sm-9">
		
			<div class="panel-heading">
				<div class="panel-title">
					Edit Profile Image
				</div> 
			</div>			
			<div class="panel-body">
				
				<form class="form-horizontal" method="post"
	action="@if (isset($user)){{ URL::to('admin/users/' .base64_encode($user->id). '/changeProfileImage') }}@endif"
	autocomplete="off" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	
	 
	@if(isset($user))
		
		 <div class="form-group {{{ $errors->has('username') ? 'has-error' : '' }}}">
						<label class="col-sm-3 control-label" for="field-1"></label>						
						<div class="col-sm-5">
						  <img src="{{ ($user->image!=null) ? asset('uploads/users/'.$user->image ): asset('img/default_male.jpg')  }}" width="120" alt="" />
						</div>
					</div>
                     
                
                @endif
				
	 
					<div class="form-group {{{ $errors->has('username') ? 'has-error' : '' }}}">
						<label class="col-sm-3 control-label" for="field-1">Image</label>						
						<div class="col-sm-5">
						   <input type="file" class="form-control file2 inline btn btn-primary" name="image" id="image" name="filefield">
							  {!! $errors->first('image', '<label class="control-label"
                                                               for="username">:image</label>')!!}
						</div>
					</div>
					  
					<div class="form-group"> 
	<label class="col-sm-3 control-label" for="field-1"> </label>					
						<div class="col-md-5">
			<a  href="{{URL::to('admin/users/index')}}"  type="reset" class="btn btn-sm btn-warning close_popup">
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