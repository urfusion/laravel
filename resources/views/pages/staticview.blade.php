@extends('app')
@section('title') About :: @parent @stop
@section('content')

<!--<link rel="stylesheet" href="{{ asset('assets/js/ckeditor/contents.css') }} ">-->
<div class="warper">

    <!--contactus-page-content-here-->
    <div class="page_content contactus_content " id="editor">
        <div class="container">
         
<div class="bredcrumb_menu">
    
      <ul>
                    <li><a href="{{ url('/home') }}"><span>{{{ trans('site/site.Home') }}}</span></a></li>
                    

                    <li>
                        <a href="#"> @if(App::getLocale()=='jp'){{$Data->title_c }}   @else {{$Data->title }}    @endif</a>
                         
                  </li> 
      </ul>  
    
   
     </div>
       <div class="contact_two_col_box my-container"   > 
          
     <?php  echo html_entity_decode($Data->description); ?>
      </div>
        </div> 
    </div> 
</div> 

 <script src="{{ asset('assets/js/ckeditor/ckeditor.js') }}  "></script>
   	  <script src="{{ asset('assets/js/ckeditor/adapters/jquery.js') }}  "></script>
 
   
@endsection