@extends('admin.layouts.default') @section('content')






<div data-collapsed="0" class="panel panel-primary col-sm-12">

    <div class="panel-heading">
        <div class="panel-title">
            @if (isset($Data))
            Edit Your Static Page
            @else
             Add Static Page
             @endif
           
            
        </div> 
    </div>			
    <div class="panel-body">

        <form class="form-horizontal" method="post" action=""    autocomplete="off" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />


            <div class="form-group {{{ $errors->has('title') ? 'has-error' : '' }}}">
                <label class="col-sm-2 control-label" for="field-1" >Title(English)</label>

                <div class="col-sm-10">
                    <input class="form-control" tabindex="1"
                           placeholder="Title in English" type="text"
                           name="title" id="title"
                           value="{{{ Input::old('title', isset($Data) ? $Data->title : null) }}}">
                    {!! $errors->first('title', '<label class="control-label"
                                                        for="title">:message</label>')!!}
                </div>
            </div>
             <div class="form-group {{{ $errors->has('title_c') ? 'has-error' : '' }}}">
                <label class="col-sm-2 control-label" for="field-1" >Title(Chinese)</label>

                <div class="col-sm-10">
                    <input class="form-control" tabindex="1"
                           placeholder="Title in Chinese" type="text"
                           name="title_c" id="title"
                           value="{{{ Input::old('title_c', isset($Data) ? $Data->title_c : null) }}}">
                    {!! $errors->first('title_c', '<label class="control-label"
                                                        for="title">:message</label>')!!}
                </div>
            </div>
            
            
            
            
            <div class="form-group {{{ $errors->has('description') ? 'has-error' : '' }}}">
                <label class="col-sm-2 control-label" for="field-1">Description</label>

                <div class="col-sm-10">
    
                    <textarea class="form-control ckeditor" tabindex="1"
                           placeholder="Description" type="text"
                           name="description" id="editor" 
                           >{{{ Input::old('description', isset($Data) ? $Data->description : null) }}}  </textarea>
                </div>
            </div>
            
            <div class="form-group {{{ $errors->has('metatag') ? 'has-error' : '' }}}">
                <label class="col-sm-2 control-label" for="field-1">Meta Tag</label>

                <div class="col-sm-10">
                    <input class="form-control" tabindex="1"
                           placeholder="Meta Tag" type="text"
                           name="metatag" id="title"
                           value="{{{ Input::old('metatag', isset($Data) ? $Data->metatag : null) }}}">
                    {!! $errors->first('metatag', '<label class="control-label"
                                                        for="title">:message</label>')!!}
                </div>
            </div>
            
            <div class="form-group {{{ $errors->has('metakeyword') ? 'has-error' : '' }}}">
                <label class="col-sm-2 control-label" for="field-1">Meta Keyword</label>

                <div class="col-sm-10">
                    <input class="form-control" tabindex="1"
                           placeholder="Meta Keyword" type="text"
                           name="metakeyword" id="title"
                           value="{{{ Input::old('metakeyword', isset($Data) ? $Data->metakeyword : null) }}}">
                    {!! $errors->first('metakeyword', '<label class="control-label"
                                                        for="title">:message</label>')!!}
                </div>
            </div>

            
 
            <div class="form-group"> 
                <label class="col-sm-2 control-label" for="field-1"> </label>					
                <div class="col-md-10">
                    <a href="{{URL::to('admin/staticpages/index')}}" type="reset" class="btn btn-sm btn-warning close_popup">
                        <span class="glyphicon glyphicon-ban-circle"></span>{{{ trans('site/site.cancel') }}}
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
	  <script src="{{ asset('assets/js/ckeditor/ckeditor.js') }}  "></script>
   	  <script src="{{ asset('assets/js/ckeditor/adapters/jquery.js') }}  "></script>

@stop  
@section('scripts')

   <script type="text/javascript">
         CKEDITOR.replace( 'editor',
         {
          customConfig : 'config.js',
          toolbar : 'simple'
          })
</script>         
            
            
    $(function () {
        $("#roles").select2()
    });
</script>
@stop
