@extends('app')
@section('title') About :: @parent @stop
@section('content')

 


<div class="warper">

<!--thank-you-page-content-here-->
<div class="page_content thank_you">
 <div class="container">
  <div class="bredcrumb_menu">
                 <ul>
                    <li><a href="{{ url('/home') }}"><span>{{{ trans('site/site.Home') }}}</span></a></li>
                    <li><a href="#">Search for Update</a></li>

                  
                </ul> 
                
            </div> 
  
  <div class="inner_head_title">
	<h1> Search </h1>
  </div>   
  <div class="inner_page_content_bg">
   <div class="container">
                <a class="menu_toggel">{{{ trans("site/site.Menu") }}}</a>
                <div class="category_nav">


                    <form  id="headerSearch" action=" {!! URL::to('Shops/listing') !!}" method="get" >
                    
                  
                    <ul>
                      <li class="input_text_box">
                          <input type="hidden" name="Rpage" value="{{ Input::get('Rpage')  }}"  />
                             <input type="hidden" name="Rtype" value="{{ Input::get('Rtype')  }}"  />
                     <input type="text" value="{{ Input::get('shop_name')  }}" placeholder="{{{ trans("site/site.Shop_Name") }}}" name="shop_name" id="Ushop_name"/></li>
                    
                      <li class="submit_button">
                        <input type="submit" value="Search"/>
                      
                       </li>
                        </ul>
                    </form>

                </div>
            </div>
   </div>
 </div>
</div>
<!--thank-you-page-content-end-->

</div


   
@endsection