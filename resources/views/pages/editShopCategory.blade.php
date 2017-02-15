@extends('app')
@section('title') Home :: @parent @stop
@section('content')

 
  <div class="warper">

<!--edit-shop-information-page-content-here-->
<div class="page_content edit_shop_information">
   
    
 <div class="container">
  <div class="bredcrumb_menu">
   <ul>
   <li><a href="{{ url('/home') }}"><span>{{{ trans('site/site.Home') }}}</span></a></li>
	 <li><a href="#" >{{{ trans("site/site.Edit_Shop_Information") }}}</a></li>
   </ul>  
  </div> 
  
  <div class="inner_head_title">
	<h1>{{{ trans("site/site.What_would_you_like_to_tell_us") }}}?</h1>
  </div>   
  <div class="inner_page_content_bg">
   <div class="edit_shop_information_list">
    <ul>
	  <li class="update_shop active">
	    <a href="{{URL::to('Shops/'.$id.'/UpdateInfo')}}">
		<i></i>
		<span>{{{ trans("site/site.Update_shop_information") }}}</span>
	    </a> 
	  </li>
	  
	  <li class="new_shop">
	    <a href="{{URL::to('Shops/'.$id.'/newShop')}}">
		<i></i>
		<span>{{{ trans("site/site.New_Shop") }}}</span>
	    </a> 
	  </li>
	  
	  <li class="shop_closure">
	    <a href="{{URL::to('Shops/'.$id.'/ShopClosure')}}">
		<i></i>
		<span>{{{ trans("site/site.Shop_Closure") }}} </span>
	    </a> 
	  </li>
	  
	  <li class="shop_relocation">
	    <a href="{{URL::to('Shops/'.$id.'/ShopRelocation')}}">
		<i></i>
		<span>{{{ trans("site/site.Shop_Relocation") }}} </span>
	    </a> 
	  </li>
	  
<!--	  <li class="shop_renovation">
	    <a href="{{URL::to('Shops/'.$id.'/ShopRenovation')}}">
		<i></i>
		<span>Shop<br/>Renovation </span>
	    </a> 
	  </li>-->
	  
	  <li class="add_branch">
	    <a href="{{URL::to('Shops/'.$id.'/AddNewBranch/2')}}">
		<i></i>
		<span>{{{ trans("site/site.Add_Branch") }}}</span>
	    </a> 
	  </li>
	 </ul>    
   </div>
  </div>
 </div>
</div>
<!--edit-shop-information-page-content-end-->

</div>



@endsection

@stop
