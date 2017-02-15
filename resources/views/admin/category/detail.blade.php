@extends('admin.layouts.default') @section('content')

<div data-collapsed="0" class="panel panel-primary col-sm-9">

    <div class="panel-heading">
        <div class="panel-title">
          Gallery Detail
        </div> 
    </div>			
    <div class="panel-body">
     
 @include('errors.list')
       
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            
            
            
            <div class="form-group ">
                <label class="col-sm-3 control-label" for="field-1">Image</label>

                <div class="col-sm-9">
				<img src="{{ $Data->imageurl}}" width="200" height="100" />
                     
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
            <div class="form-group ">
                <label class="col-sm-3 control-label" for="field-1">Status</label>

                <div class="col-sm-9">
				 <label class="control-label" for="field-1">{{{ Input::old('status', isset($Data) ? $Data->status : null) }}}</label>
                     
                </div>
            </div>
              

            <div class="form-group"> 
                <label class="col-sm-3 control-label" for="field-1"> </label>					
                <div class="col-md-9">
                   <a  href="{{URL::to('admin/gallery/index')}}" class="btn btn-sm btn-warning close_popup">
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


 