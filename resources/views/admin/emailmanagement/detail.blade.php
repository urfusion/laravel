@extends('admin.layouts.default') @section('content')

<div data-collapsed="0" class="panel panel-primary col-sm-9">

    <div class="panel-heading">
        <div class="panel-title">
        Email Template Detail
        </div> 
    </div>			
    <div class="panel-body">
     
 @include('errors.list')
       
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            
            
            
            <div class="form-group ">
                <label class="col-sm-3 control-label" for="field-1">Title</label>

                <div class="col-sm-9">
				 <label class="control-label" for="field-1">{{{ Input::old('title', isset($Data) ? $Data->title : null) }}}</label>
                     
                </div>
            </div>
			<div class="form-group ">
                <label class="col-sm-3 control-label" for="field-1">Description</label>

                <div class="col-sm-9">
				 <label class="  control-label" for="field-1">{{ preg_replace('/(<.*?>)|(&.*?;)/', '', isset($Data) ? $Data->description : null) }}</label>
                     
                </div>
            </div>
		
			
			<div class="form-group ">
                <label class="col-sm-3 control-label" for="field-1">Created at</label>

                <div class="col-sm-9">
				 <label class="  control-label" for="field-1">{{ $Data->created_at}}</label>
                     
                </div>
            </div>
			<div class="form-group ">
                <label class="col-sm-3 control-label" for="field-1">Upadated at</label>

                <div class="col-sm-9">
				 <label class=" control-label" for="field-1">{{ $Data->updated_at}}</label>
                     
                </div>
            </div>
           

            <div class="form-group"> 
                <label class="col-sm-3 control-label" for="field-1"> </label>					
                <div class="col-md-9">
                   <a  href="{{URL::to('admin/emailmanagement/index')}}" class="btn btn-sm btn-warning close_popup">
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


 