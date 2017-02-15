@extends('admin.layouts.default') @section('content')






<div data-collapsed="0" class="panel panel-primary col-sm-9">

    <div class="panel-heading">
        <div class="panel-title">
           
            Edit Email Template 
           
           
            
        </div> 
    </div>			
    <div class="panel-body">

        <form class="form-horizontal" method="post" action=""    autocomplete="off" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />


            <div class="form-group {{{ $errors->has('title') ? 'has-error' : '' }}}">
                <label class="col-sm-3 control-label" for="field-1" >Title</label>

                <div class="col-sm-5">
                    <input class="form-control" tabindex="1"
                           placeholder="Title" type="text"
                           name="title" id="title"
                           value="{{{ Input::old('title', isset($Data) ? $Data->title : null) }}}">
                    {!! $errors->first('title', '<label class="control-label"
                                                        for="title">:message</label>')!!}
                </div>
            </div>
            <div class="form-group {{{ $errors->has('description') ? 'has-error' : '' }}}">
                <label class="col-sm-3 control-label" for="field-1">Description</label>

                <div class="col-sm-5">
    
                    <textarea class="form-control ckeditor" tabindex="1"
                           placeholder="Description" type="text"
                           name="description" id="editor" 
                           >{{ preg_replace('/(<.*?>)|(&.*?;)/', '', isset($Data) ? $Data->description : null) }}
                    </textarea>
                </div>
            </div>
          
            </div>

            

            
            </div>
            
             
          

            <div class="form-group"> 
                <label class="col-sm-3 control-label" for="field-1"> </label>					
                <div class="col-md-5">
                    <a href="{{URL::to('admin/emailmanagement/index')}}" type="reset" class="btn btn-sm btn-warning close_popup">
                        <span class="glyphicon glyphicon-ban-circle"></span> {{
				trans("site/site.cancel") }}
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