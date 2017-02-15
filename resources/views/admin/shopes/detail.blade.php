@extends('admin.layouts.default') @section('content')

<div data-collapsed="0" class="panel panel-primary col-sm-9">

    <div class="panel-heading">
        <div class="panel-title">
          Shop Detail 
        </div> 
    </div>			
    <div class="panel-body">
   
 @include('errors.list')
 
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
         
            
            
            
            <div class="form-group ">
                <label class="col-sm-3 control-label" for="field-1">Shop Name:</label>
 <?php  echo $PageId."ddd"; ?>
                <div class="col-sm-9">
				 <label class="control-label" for="field-1">{{{ Input::old('name', isset($Data) ? $Data->shop_name : null) }}}</label>
                     
                </div>
            </div>
			<div class="form-group ">
                <label class="col-sm-3 control-label" for="field-1">Manager Name:</label>

                <div class="col-sm-9">
				 <label class="  control-label" for="field-1">{{{ Input::old('manager name', isset($Data) ? $Data->manager_name : null) }}}</label>
                     
                </div>
            </div>
			<div class="form-group ">
                <label class="col-sm-3  control-label" for="field-1">Shop Type:</label>

                <div class="col-sm-9">
				 <label class=" control-label" for="field-1">{{{ Input::old('shop type', isset($Data) ? $Data->shop_type : null) }}}</label>
                     
                </div>
            </div>
			<div class="form-group ">
                <label class="col-sm-3 control-label" for="field-1">Description:</label>

                <div class="col-sm-9">
				 <label class="  control-label" for="field-1">{{{ Input::old('city', isset($Data) ? $Data->description : null) }}}</label>
                     
                </div>
            </div>
			
			<div class="form-group ">
                <label class="col-sm-3 control-label" for="field-1">Address:</label>

                <div class="col-sm-9">
				 <label class=" control-label" for="field-1">{{{ Input::old('address', isset($Data) ? $Data->address : null) }}}</label>
                     
                </div>
            </div>
              

            <div class="form-group"> 
                <label class="col-sm-3 control-label" for="field-1"> </label>					
                <div class="col-md-9">
                   <a  href="{{URL::to('admin/users/shops_index?page='.$PageId)}}" class="btn btn-sm btn-warning close_popup">
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


 