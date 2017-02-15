@extends('admin.layouts.default') @section('content')

<div data-collapsed="0" class="panel panel-primary col-sm-9">

    <div class="panel-heading">
        <div class="panel-title">
            Detail
        </div> 
    </div>			
    <div class="panel-body">
     
 @include('errors.list')
       
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            
            
            
            <div class="form-group ">
                <label class="col-sm-3 control-label" for="field-1">{{trans('admin/users.name') }}:</label>

                <div class="col-sm-9">
				 <label class="control-label" for="field-1">{{{ Input::old('name', isset($user) ? $user->name : null) }}}</label>
                     
                </div>
            </div>
			<div class="form-group ">
                <label class="col-sm-3 control-label" for="field-1">Phone</label>

                <div class="col-sm-9">
				 <label class="  control-label" for="field-1">{{{ Input::old('phone', isset($user) ? $user->phone : null) }}}</label>
                     
                </div>
            </div>
			<div class="form-group ">
                <label class="col-sm-3  control-label" for="field-1">State</label>

                <div class="col-sm-9">
				 <label class=" control-label" for="field-1">{{{ Input::old('state', isset($user) ? $user->state : null) }}}</label>
                     
                </div>
            </div>
			<div class="form-group ">
                <label class="col-sm-3 control-label" for="field-1">City</label>

                <div class="col-sm-9">
				 <label class="  control-label" for="field-1">{{{ Input::old('city', isset($user) ? $user->city : null) }}}</label>
                     
                </div>
            </div>
			<div class="form-group ">
                <label class="col-sm-3 control-label" for="field-1">Address</label>

                <div class="col-sm-9">
				 <label class="  control-label" for="field-1">{{{ Input::old('address', isset($user) ? $user->address : null) }}}</label>
                     
                </div>
            </div>
			<div class="form-group ">
                <label class="col-sm-3 control-label" for="field-1">Postal Code</label>

                <div class="col-sm-9">
				 <label class=" control-label" for="field-1">{{{ Input::old('postal_Code', isset($user) ? $user->postal_Code : null) }}}</label>
                     
                </div>
            </div>
              

            <div class="form-group"> 
                <label class="col-sm-3 control-label" for="field-1"> </label>					
                <div class="col-md-9">
                   <a  href="{{URL::to('admin/users/index')}}" class="btn btn-sm btn-warning close_popup">
                        <span class="glyphicon glyphicon-ban-circle"></span> {{
				trans("site/site.cancel") }}
                    </a> 
             
                </div>

            </div>
            
              
    

</div>



@stop  
@section('scripts')
<script type="text/javascript">
    $(function () {
        $("#roles").select2()
    });
</script>
@stop


 