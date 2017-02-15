@extends('app')
@section('title') About :: @parent @stop
@section('content')
<link rel="stylesheet" href="{{ asset('assets/js/ckeditor/contents.css') }} ">
<div class="warper">

    <!--contactus-page-content-here-->
    <div class="page_content contactus_content my-container "  >
        <div class="container">
            <div class="bredcrumb_menu">
                <ul>
                    <li><span>Home</span></li>

                    <li><a href="#">About</a></li>
                </ul>  

                <div class="contact_two_col_box"  >
                    
                    <?php 
                    
                    echo html_entity_decode($Data->description);
                   ?>
                </div>
            </div> 
        </div> 
    </div> 
</div> 


   
@endsection