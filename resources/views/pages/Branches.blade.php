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
            @include('errors.messagediv')
            <div class="product_listing">
                <ul>

                    @foreach($data as $Datas)





                    <li style=" height: 150px;">

                        <h2>   @if(App::getLocale()=="en")  {{$Datas->shop_name}} @else  {{$Datas->shop_name_c}} @endif </h2> 

                        <div class="product_inner_des">
                            <div class="product_image_box"><a href="{{URL::to('Shops/'.base64_encode($Datas->id).'/ShopDetail')}}">

                                    <?php if (@getimagesize($Datas->shop_image_1)) { ?>
                                        <img src="{{$Datas->shop_image_1}}" alt="" />
                                    <?php } else { ?>
                                        <img src="{{ asset('images/noimage.png') }}" alt="" />
                                    <?php } ?>

                                </a></div>
                            <div class="product_image_des">
                                <div class="des_row"><i><img src="{{ asset('images/home_icon.png') }} "/></i><span> 
                                         @if(App::getLocale()=="en")                                                 
                                                {{$Datas->address}} 

                                                @if($Datas->district)
                                                <?php $districtname = Text::districtname($Datas->district); ?>
                                                ,{{$districtname->name_e}}   

                                                @endif
                                                @if($Datas->region)
                                                <?php $regionname = Text::regionname($Datas->region); ?>

                                                ,{{$regionname->name_e}}   

                                                @endif

                                                @else 



                                                 <?php     $addressString=""; ?>
                                                @if($Datas->region)
                                                <?php $regionname = Text::regionname($Datas->region); 
                                                  $addressString =trim($regionname->name_c);
                                                
                                                ?>
                                                @endif

                                                @if($Datas->district)
                                                <?php $districtname = Text::districtname($Datas->district);  

                                               $addressString=trim($addressString.trim($districtname->name_c)); ?> 

                                                @endif

                                               <?php 
     
    $addressString=trim($addressString.$Datas->address_c); 
// $addressString= preg_replace("/[[:blank:]]+/","",$addressString);
// 
// $addressString = preg_replace('/\s+/', '',$addressString);
 
//     $addressString=str_replace(' ', '',trim($addressString));
 echo preg_replace('/[\s]+/mu', '', $addressString);
      ?>
          

                                                @endif 
                                    </span></div>
                                   @if($Datas->contact_phone_1!=null)
                                        <div class="des_row"><i><img src="{{ asset('images/phone_icon.png') }}"/></i><span style="line-height: 15px;" >{{ $Datas->contact_phone_1}}</span></div>
                                        @endif
                                <div class="des_row"><i><img src="{{ asset('images/edit_icon.png') }} "/></i><span>

                                        <?php $FashionCategory = Config::get('constants.FashionCategory'); ?>
                                        <!--                                                in_array($indexing, $selected)-->
                                        <?php
                                        $ShopTYPE = explode(',', $Datas->shop_type);
                                        $TAG = NULL;
                                        ?>
                                        @if(in_array('1', $ShopTYPE))

                                        @if($Datas->fashion_category!=null)
                                        <?php $fashion_category = explode(',', $Datas->fashion_category) ?>

                                        @foreach($FashionCategory as $a => $b)


                                        <?php
                                        if (in_array($a, $fashion_category)) {
                                            $TAG = $TAG . trans('site/site.' . $b) . '/ ';
                                        }
                                        ?>
                                        @endforeach 
                                        @endif 
                                        @endif 


                                        @if(in_array('2', $ShopTYPE))
                                        <?php $FashionCategory = Config::get('constants.BeautyRetailCategory'); ?>
                                        @if($Datas->beauty_retail_category!=null)
                                        <?php $fashion_category = explode(',', $Datas->beauty_retail_category) ?>

                                        @foreach($FashionCategory as $a => $b)


                                        <?php
                                        if (in_array($a, $fashion_category)) {
                                            $TAG = $TAG . trans('site/site.' . $b) . '/ ';
                                        }
                                        ?>
                                        @endforeach 
                                        @endif 
                                        @endif 

                                        @if(in_array('3', $ShopTYPE))
                                        <?php $FashionCategory = Config::get('constants.BeautyServicingCategory'); ?>
                                        @if($Datas->beauty_service_category!=null)
                                        <?php $fashion_category = explode(',', $Datas->beauty_service_category) ?>

                                        @foreach($FashionCategory as $a => $b)


                                        <?php
                                        if (in_array($a, $fashion_category)) {
                                            $TAG = $TAG . trans('site/site.' . $b) . '/ ';
                                        }
                                        ?>
                                        @endforeach 
                                        @endif 
                                        @endif 

                                        <?php
                                        if (strlen($TAG) > 55) {

                                            $TAG = substr($TAG, 0, 55);
                                            $TAG = trim($TAG);
                                            $TAG = trim($TAG, "/");
                                            $TAG = htmlentities(trim($TAG, "/"));
                                            echo trim($TAG, "/") . '...';
                                        } else {
                                            $TAG = trim($TAG);
                                            $TAG = htmlentities(trim($TAG, "/"));
                                            echo $TAG = trim($TAG, "/");
                                        }
                                        ?>


                                    </span></div>
                            </div>
                        </div>
                    </li> 
                    @endforeach

                </ul>
            </div>



            <div class="free_add_box">
                <a href="#"><img src="{{ asset('images/free_add.png') }}"></a>
            </div>

            <div class="pagination_shop_bg">
                <div class="pagination">
                    {{$Datas=$data}}
                    @if ($Datas->lastPage() > 1)
                    <ul>
                        <!-- si la pagina actual es distinto a 1 y hay mas de 5 hojas muestro el boton de 1era hoja -->
                        <!-- if actual page is not equals 1, and there is more than 5 pages then I show first page button -->
                        @if ($Datas->currentPage() != 1 && $Datas->lastPage() >= 5)

                        <li> <a href="{{URL::to('searchpage?page=1')}}" ><<</a></li>

                        @endif

                        <!-- si la pagina actual es distinto a 1 muestra el boton de atras -->
                        @if($Datas->currentPage() != 1)

                        <li>
                            <a href="{{URL::to('searchpage?page='.($Datas->currentPage()-1) )}}" >
                                <
                            </a>
                        </li>
                        @endif

                        <!-- dibuja las hojas... Tomando un rango de 5 hojas, siempre que puede muestra 2 hojas hacia atras y 2 hacia adelante -->
                        <!-- I draw the pages... I show 2 pages back and 2 pages forward -->
                        @for($i = max($Datas->currentPage()-2, 1); $i <= min(max($Datas->currentPage()-2, 1)+4,$Datas->lastPage()); $i++)
                        <li class="{{ ($Datas->currentPage() == $i) ? ' active' : '' }}">
                            <a href="{{URL::to('searchpage?page='.$i)}}">{{ $i }}</a>
                        </li>
                        @endfor

                        <!-- si la pagina actual es distinto a la ultima muestra el boton de adelante -->
                        <!-- if actual page is not equal last page then I show the forward button-->
                        @if ($Datas->currentPage() != $Datas->lastPage())

                        <li>
                            <a href="{{URL::to('searchpage?page='.($Datas->currentPage()+1)  )}}  " >
                                >
                            </a>
                        </li>
                        @endif

                        <!-- si la pagina actual es distinto a la ultima y hay mas de 5 hojas muestra el boton de ultima hoja -->
                        <!-- if actual page is not equal last page, and there is more than 5 pages then I show last page button -->
                        @if ($Datas->currentPage() != $Datas->lastPage() && $Datas->lastPage() >= 5)
                        <li>
                            <a href="{{URL::to('searchpage?page='.$Datas->lastPage())}}   " >
                                >>
                            </a>
                        </li>
                        @endif
                    </ul>
                    @endif

                </div>

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
