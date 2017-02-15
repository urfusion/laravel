@extends('admin.layouts.default') @section('content')

<div data-collapsed="0" class="panel panel-primary col-sm-9">

    <div class="panel-heading">
        <div class="panel-title">
            Advertisement Detail
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
<!--        <div class="form-group ">
            <label class="col-sm-3 control-label" for="field-1">Type</label>

            <div class="col-sm-9">
                <label class="  control-label" for="field-1">
                    {{ preg_replace('/(<.*?>)|(&.*?;)/', '', isset($Data) ? $Data->type : null) }}
                </label>

            </div>
        </div>-->
        <div class="form-group ">
            <label class="col-sm-3  control-label" for="field-1">Page</label>

            <div class="col-sm-9">
                <label class=" control-label" for="field-1"> 
                    <?php $addpageConfig = Config::get('constants.Page'); ?>

                    @if(isset($Data->page))
                    {{$addpageConfig[$Data->page]}}
                    @endif
                </label>

            </div>
        </div>
        <div class="form-group ">
            <label class="col-sm-3 control-label" for="field-1">Position</label>

            <div class="col-sm-9">
                <label class="  control-label" for="field-1">
                      <?php $addpageConfig = Config::get('constants.Position'); ?>

                    @if(isset($Data->position))
                    {{$addpageConfig[$Data->position]}}
                    @endif
                    
                </label>

            </div>
        </div>
 @if($Data->image_url!=null)
        <div class="form-group ">
            <label class="col-sm-3 control-label" for="field-1">Image</label>

            <div class="col-sm-9">
                <label class="control-label" for="field-1">
                     
                  <img src="{{{ Input::old('image', isset($Data) ?  $Data->image_url : null) }}}"height="80" width="80" />  
                  
                </label>

            </div>
        </div>
 @else
  <div class="form-group ">
            <label class="col-sm-3 control-label" for="field-1">Google Script</label>

            <div class="col-sm-9">
                <label class="control-label" for="field-1">	
                     
                 {{{ Input::old('title', isset($Data) ? $Data->googlescript : null) }}}
                  
                </label>

            </div>
        </div>
@endif
 </div>
 </div>
        <div class="form-group"> 
            <label class="col-sm-3 control-label" for="field-1"> </label>					
            <div class="col-md-9">
                <a  href="{{URL::to('admin/advertisement/index')}}" class="btn btn-sm btn-warning close_popup">
                    <span class="glyphicon glyphicon-ban-circle"></span> {{{ trans('site/site.cancel') }}}
                </a> 

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


