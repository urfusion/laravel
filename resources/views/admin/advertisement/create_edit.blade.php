@extends('admin.layouts.default') @section('content')

<div data-collapsed="0" class="panel panel-primary col-sm-9">

    <div class="panel-heading">
        <div class="panel-title">
            @if (isset($Data))
            Edit Your Advertisement
            @else
            Add Advertisement
            @endif


        </div> 
    </div>			
    <div class="panel-body">

        <form class="form-horizontal" method="post" action=""    autocomplete="off" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />


            <div class="form-group {{{ $errors->has('title') ? 'has-error' : '' }}}">
                <label class="col-sm-3 control-label" for="field-1">Title</label>

                <div class="col-sm-5">
                    <input class="form-control" tabindex="1"
                           placeholder="Title" type="text"
                           name="title" id="title"
                           value="{{{ Input::old('title', isset($Data) ? $Data->title : null) }}}">
                    {!! $errors->first('title', '<label class="control-label"
                                                        for="title">:message</label>')!!}
                </div>
            </div>



            <div class="form-group {{{ $errors->has('page') ? 'has-error' : '' }}}">
                <label class="col-sm-3 control-label" for="field-1">Page</label>

                <div class="col-sm-5">
                    @if(isset($Data->page))

                    {!! Form::select('page', Config::get('constants.Page'),$Data->page, ['class' => 'form-control','id' => 'page' ]) !!}

                    @else

                    {!! Form::select('page', Config::get('constants.Page'),null, ['class' => 'form-control','id' => 'page' ]) !!}

                    @endif
                </div>
            </div>

            <div class="form-group {{{ $errors->has('position') ? 'has-error' : '' }}}">
                <label class="col-sm-3 control-label" for="field-1">Position</label>

                <div class="col-sm-5">
                    @if(isset($Data->page))

                    {!! Form::select('position', Config::get('constants.Position'),$Data->position, ['class' => 'form-control','id' => 'position' ]) !!}

                    @else

                    {!! Form::select('position', Config::get('constants.Position'),null, ['class' => 'form-control','id' => 'position' ]) !!}

                    @endif
                </div>
            </div>

            <div class="form-group {{{ $errors->has('type') ? 'has-error' : '' }}}">
                <label class="col-sm-3 control-label" for="field-1">Type</label>

                <div class="col-sm-5">
                    @if(isset($Data->type))

                    {!! Form::select('type', Config::get('constants.AddType'),$Data->type, ['class' => 'form-control','id' => 'type' ]) !!}

                    @else


                    {!! Form::select('type', Config::get('constants.AddType'),null, ['class' => 'form-control','id' => 'type' ]) !!}

                    @endif
                </div>
            </div>


           
            <div class="form-group" id="clientAdd"   @if(isset($Data->type)) @if($Data->type==2) style="display: none"  @endif @endif>
                <label class="col-sm-3 control-label" for="field-1">Image</label>						
                <div class="col-sm-5">
                    <input type="file" class="form-control file2 inline btn btn-primary" name="image" id="image" name="filefield">
                    {!! $errors->first('image', '<label class="control-label"
                                                        for="username">:image</label>')!!}
                </div>
            </div>

            <div class="form-group" id="googleadd"  @if(isset($Data->type)) @if($Data->type==1) style="display: none"  @endif @else  style="display: none"  @endif >
                <label class="col-sm-3 control-label" for="field-1"> Google Script</label>						
                <div class="col-sm-5">
                    <textarea name="googlescript" id="googlescript" class="form-control">{{{ Input::old('googlescript', isset($Data) ? $Data->googlescript : null) }}}</textarea>                     
                </div>
            </div>
            
           

            <div class="form-group"> 
                <label class="col-sm-3 control-label" for="field-1"> </label>					
                <div class="col-md-5">
                    <a href="{{URL::to('admin/advertisement/index')}}"  type="reset" class="btn btn-sm btn-warning close_popup">
                        <span class="glyphicon glyphicon-ban-circle"></span> {{{ trans('site/site.cancel') }}}
                    </a>
                    <button type="submit" class="btn btn-sm btn-success">
                        <span class="glyphicon glyphicon-ok-circle"></span> 
                        @if (isset($Data))
                        Update
                        @else
                        Add
                        @endif
                    </button>
                </div>

            </div>

        </form>

    </div>

</div>

<script type="text/javascript">




    $(function () {

        $('#type').change(function ()
        {
            if (this.value == 1) {
                $("#clientAdd").show();
                $("#googleadd").hide();
            } else {
                $("#clientAdd").hide();
                $("#googleadd").show();
            }



        });

    });</script>

@stop  
@section('scripts')
<script type="text/javascript">


    $(function () {


        $("#roles").select2()
    });
</script>
@stop