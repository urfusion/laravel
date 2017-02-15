@extends('app')
@section('title') About :: @parent @stop
@section('content')
<div class="warper">

    <!--contactus-page-content-here-->
    <div class="page_content contactus_content " id="editor">
        <div class="container">
            <div class="bredcrumb_menu">
                <ul>
                        <li><a href="{{ url('/home') }}"><span>{{{ trans('site/site.Home') }}}</span></a></li>

                    <li><a href="#">{{{ trans('site/site.About_us') }}}</a></li>                                        
                </ul>  

                <div class="contact_two_col_box"> 
                    
                </div>
            </div> 
        </div> 
    </div> 
</div> 


   
@endsection