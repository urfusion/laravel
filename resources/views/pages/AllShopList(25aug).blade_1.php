@extends('app')
@section('title') Home :: @parent @stop
@section('content')

<div class="warper">

    <!--refine-search-listing-page-content-here-->
    <div class="page_content refine_search_listing">
        <div class="container">
            <div class="bredcrumb_menu">
                <ul>
                    <li><span>{{{ trans('site/site.Home') }}}</span></li>
                    <li><a href="#">{{{ trans('site/site.Shops_Listing') }}}</a></li>
                </ul>  
            </div> 
            
            
            <div class="filter_box">
                 
                <div class="filter_right">
                    <ul>
                        @if(Input::get('shop_name'))
                        <li><a href="#">{{ Input::get('shop_name')  }}</a></li>
                        @endif
                        @if(Input::get('district'))
                        <li><a href="#">{{ Input::get('district')  }}</a></li>
                        @endif
                        @if(Input::get('region'))
                        <li><a href="#">{{ Input::get('region')  }}</a></li>
                        @endif
                        @if(Input::get('landmark'))
                        <li><a href="#">{{ Input::get('landmark')  }}</a></li>
                        @endif

                        @if(Input::get('shop_type'))

                        <?php
                        $SHOPTYPEBOXtag = Config::get('constants.ShopType');
                        $typeSEarch = Input::get('shop_type');
                        ?> 

                        <li><a href="#">{{trans('site/site.'.$SHOPTYPEBOXtag[$typeSEarch]) }}</a></li>

                        @endif

                        @if(Input::get('Servicing'))
                        <?php $Servicing = Input::get('Servicing') ?>

                        @if(Input::get('shop_type')==1)
                        <?php $value = Config::get('constants.FashionCategory'); ?>                                

                        @foreach($Servicing as $ServicingI=>$ServicingV)
                        <li><a href="#">{{trans('site/site.'.$value[$ServicingV]) }}</a></li>
                        @endforeach


                        @elseif(Input::get('shop_type')==2)
                        <?php $value = Config::get('constants.BeautyRetailCategory'); ?> 

                        @foreach($Servicing as $ServicingI=>$ServicingV)
                        <li><a href="#">{{trans('site/site.'.$value[$ServicingV]) }}</a></li>
                        @endforeach

                        @elseif(Input::get('shop_type')==3)
                        <?php $value = Config::get('constants.BeautyServicingCategory'); ?> 
                        @foreach($Servicing as $ServicingI=>$ServicingV)
                        <li><a href="#">{{trans('site/site.'.$value[$ServicingV]) }}</a></li>
                        @endforeach                               

                        @endif



                        @endif






                    </ul>
                </div>

            </div> 

            <div class="product_listing">
                <ul>
 	   
 	    @foreach($data as $Datas)
             
            
            
            

            <li style=" height: 150px;">
                        <h2> 
                               @if(App::getLocale()=="en")  {{$Datas->shop_name}} @else  {{$Datas->shop_name_c}} @endif 
                           </h2> 
                        <div class="product_inner_des">
                            <div class="product_image_box"><a href="{{URL::to('Shops/'.base64_encode($Datas->id).'/ShopDetail')}}">
                                    
                                     <?php  if(@getimagesize($Datas->shop_image_1)){   ?>
                          <img src="{{$Datas->shop_image_1}}" alt="" />
                          <?php } else { ?>
                          <img src="{{ asset('images/noimage.png') }}" alt="" />
                          <?php }?>
                                
                                </a></div>
                            <div class="product_image_des">
                                <div class="des_row"><i><img src="{{ asset('images/home_icon.png') }} "/></i><span>
                                        
                                         @if(App::getLocale()=="en")  {{$Datas->address}} @else  {{$Datas->address_c}} @endif </span></div>
                               @if($Datas->contact_phone_1!=null)
                                <div class="des_row"><i><img src="{{ asset('images/phone_icon.png') }} "/></i><span>{{$Datas->contact_phone_1}}</span></div>
                                @endif
                                <div class="des_row"><i><img src="{{ asset('images/edit_icon.png') }} "/></i><span>
                                  
                                          <?php $FashionCategory = Config::get('constants.FashionCategory'); ?>
                                                @if($Datas->shop_type==1)

                                                @if($Datas->fashion_category!=null)
                                                <?php $fashion_category = explode(',', $Datas->fashion_category);
                                                       $flag=0;    
                                                        ?>

                                                @foreach($FashionCategory as $a => $b)


                                                <?php
                                             
                                                if (in_array($a, $fashion_category)) {
                                                    $flag++;
                                                    if($flag < 4) {
                                                    ?>
                                                {{{ trans('site/site.'.$b) }}}/
                                                   
                                             <?php
                                                    }
                                                }
                                                ?>
                                                @endforeach 
                                                @endif 
                                                @endif 

                                                @if($Datas->shop_type==2)


                                                @if($Datas->beauty_retail_category!=null)
                                                <?php $fashion_category = explode(',', $Datas->beauty_retail_category);
                                                $flag1=0;
                                                ?>

                                                @foreach($FashionCategory as $a => $b)


                                                <?php  
                                                if (in_array($a, $fashion_category)) {
                                                     $flag1++;
                                                    if($flag1 < 4) {
                                                    ?>
                                                {{{ trans('site/site.'.$b) }}}/
                                                   
                                             <?php
                                                    }
                                                }
                                                ?>
                                                @endforeach 
                                                @endif 
                                                @endif 
                                                @if($Datas->shop_type==3)

                                                @if($Datas->beauty_service_category!=null)
                                                <?php $fashion_category = explode(',', $Datas->beauty_service_category);
                                                
                                                $flag2=0;
                                                ?>

                                                @foreach($FashionCategory as $a => $b)


                                                <?php
                                                 
                                                if (in_array($a, $fashion_category)) {
                                                    $flag2++;
                                                    if($flag2 < 4) {
                                                    ?>
                                                {{{ trans('site/site.'.$b) }}}/
                                                   
                                             <?php
                                                    }
                                                }
                                                ?>
                                                @endforeach 
                                                @endif 
                                                @endif 
                                        
                                        
                                         </span></div>
                            </div>
                        </div>
                    </li> 
                     @endforeach
                    
                </ul>
            </div>



            <div class="free_add_box">
                <a href="#"><img src="{{ asset('images/free_add.png')}}"></a>
            </div>

            <div class="pagination_shop_bg"> 

                <div class="tell_us"><span>{{{ trans('site/site.Cannot_find_particular_shop') }}}?</span><a href="#">{{{ trans('site/site.Tell_us') }}}!</a></div>
            </div>


<!--            <div class="may_like_box">
                <h1>You may also like</h1>

                <div class="product_listing">
                    <ul>
                        <li>
                            <h2>Gianni's Trattoria Italiana</h2> 
                            <div class="product_inner_des">
                                <div class="product_image_box"><a href="#"><img src="images/pr01.png"></a></div>
                                <div class="product_image_des">
                                    <div class="des_row"><i><img src="images/home_icon.png"></i><span>2/F, Shining building, 477-48 Jaffe Road Sydney Australia </span></div>
                                    <div class="des_row"><i><img src="images/phone_icon.png"></i><span>90xxxxxxxxx</span></div>
                                    <div class="des_row"><i><img src="images/edit_icon.png"></i><span>Fashion / Beauty Retail / Beauty Servicing)</span></div>
                                </div>
                            </div>
                        </li>  

                        <li>
                            <h2>Gianni's Trattoria Italiana</h2> 
                            <div class="product_inner_des">
                                <div class="product_image_box"><a href="#"><img src="images/pr01.png"></a></div>
                                <div class="product_image_des">
                                    <div class="des_row"><i><img src="images/home_icon.png"></i><span>2/F, Shining building, 477-48 Jaffe Road Sydney Australia </span></div>
                                    <div class="des_row"><i><img src="images/phone_icon.png"></i><span>90xxxxxxxxx</span></div>
                                    <div class="des_row"><i><img src="images/edit_icon.png"></i><span>Fashion / Beauty Retail / Beauty Servicing)</span></div>
                                </div>
                            </div>
                        </li>  


                        <li>
                            <h2>Gianni's Trattoria Italiana</h2> 
                            <div class="product_inner_des">
                                <div class="product_image_box"><a href="#"><img src="images/pr01.png"></a></div>
                                <div class="product_image_des">
                                    <div class="des_row"><i><img src="images/home_icon.png"></i><span>2/F, Shining building, 477-48 Jaffe Road Sydney Australia </span></div>
                                    <div class="des_row"><i><img src="images/phone_icon.png"></i><span>90xxxxxxxxx</span></div>
                                    <div class="des_row"><i><img src="images/edit_icon.png"></i><span>Fashion / Beauty Retail / Beauty Servicing)</span></div>
                                </div>
                            </div>
                        </li>  

                        <li>
                            <h2>Gianni's Trattoria Italiana</h2> 
                            <div class="product_inner_des">
                                <div class="product_image_box"><a href="#"><img src="images/pr01.png"></a></div>
                                <div class="product_image_des">
                                    <div class="des_row"><i><img src="images/home_icon.png"></i><span>2/F, Shining building, 477-48 Jaffe Road Sydney Australia </span></div>
                                    <div class="des_row"><i><img src="images/phone_icon.png"></i><span>90xxxxxxxxx</span></div>
                                    <div class="des_row"><i><img src="images/edit_icon.png"></i><span>Fashion / Beauty Retail / Beauty Servicing)</span></div>
                                </div>
                            </div>
                        </li> 
                    </ul>
                </div>
            </div>-->

        </div>
    </div>
    <!--refine-search-listing-page-content-end-->

</div>

@endsection

@stop
