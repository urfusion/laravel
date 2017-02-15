@extends('app')
@section('title') Home :: @parent @stop
@section('content')
<!--<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=1602645729958011";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>-->

<div class="warper">

    <!--slider-content-here-->
    <section class="slider_bg">
        <div class="flexslider">
            <ul class="slides">
                <?php $GalleryImage = Text::GalleryImage() ?>
                @foreach($GalleryImage as $GalleryImag)
                <li><a href="#"><img src="{{$GalleryImag->imageurl}}"></a></li>
                @endforeach
            </ul>
        </div>
    </section>
    <!--slider-content-end-->
    <!--home-page-content-here-->
    <div class="page_content home_content">
        <div class="container">
            <div class="cat_slider_add_bg">
                <div class="cat_slider_box">
                    <div class="cat_slider_box_row">
                        <div class="slide_tilte_box pink_bg">
                            <h1>{{{ trans("site/site.Hot_Fashion_Shops") }}}  </h1>
                            <a href="{{URL::to('searchpage?shop_type=1')}}" class="see_all"> {{{ trans("site/site.See_All") }}}</a> </div>
                        <div class="slideshow">
                            <div class="slideInner">
                                <ul class="slides">
                                    <?php $FashionShoplist = Text::getShop('1') ?>
                                    @foreach($FashionShoplist as $FashionShoplis)
                                     
                                    <li class="slide">
                                        <div class="image_box_bg"> 
                                            <div class="image_box">

                                                <?php if (@getimagesize($FashionShoplis->shop_image_1)) { ?>
                                                    <img src="{{$FashionShoplis->shop_image_1}}" alt="" />
                                                <?php } else { ?>
                                                    <img src="{{ asset('images/noimage.png') }}" alt="" />
                                                <?php } ?>
                                            </div>

                                            <a href="{{URL::to('Shops/'.base64_encode($FashionShoplis->id).'/ShopDetail')}}">
                                                <div class="overlow_box">
                                                    <div class="overlow_box_content"> 
                                                        <?php $Fdistrictname = Text::districtname($FashionShoplis->district); ?>
                                                        @if($Fdistrictname!=null)
                                                        @if(App::getLocale()=="en")  {{$Fdistrictname->name_e}}  @else  {{$Fdistrictname->name_c}}  @endif </div>
                                                    @endif
                                                </div>
                                            </a>
                                        </div>
                                        <div class="product_des_box"> <a href="{{URL::to('Shops/'.base64_encode($FashionShoplis->id).'/ShopDetail')}}">
                                                <div class="product_name">
                                                
                                                  @if(App::getLocale()=="en")  {{$FashionShoplis->shop_name}}  @else  {{$FashionShoplis->shop_name_c}}  @endif
                                            </a> </div>
                                       <!--                                    <div class="rating_box"><img src="images/rating.png"/></div>-->
                                        </div>
                                    </li>
                                   

                                    @endforeach
                                </ul>
                            </div>
                            <a href="#" class="prev"></a> <a href="#" class="next"></a> </div>
                    </div>
                    <div class="cat_slider_box_row">
                        <div class="slide_tilte_box light_blue_bg">
                            <h1>{{{ trans("site/site.Hot_Beauty_Retail_Shops")}}}</h1>
                            <a href="{{URL::to('searchpage?shop_type=2')}}" class="see_all">{{{ trans("site/site.See_All") }}}</a> </div>
                        <div class="slideshow ">
                            <div class="slideInner">
                                <ul class="slides">
                                    <?php $BeautyRetail = Text::getShop('2') ?>
                                    @foreach($BeautyRetail as $BeautyRetai)
                                    
                                    <li class="slide">
                                        <div class="image_box_bg">
                                            <div class="image_box">
 
                                                <?php if (@getimagesize($BeautyRetai->shop_image_1)) { ?>
                                                    <img src="{{$BeautyRetai->shop_image_1}}" alt="" />
                                                <?php } else { ?>
                                                    <img src="{{ asset('images/noimage.png') }}" alt="" />
                                                <?php } ?>
                                            </div>
                                            <a href="{{URL::to('Shops/'.base64_encode($BeautyRetai->id).'/ShopDetail')}}">
                                                <div class="overlow_box">
                                                    <div class="overlow_box_content">
                                                        <?php $Bdistrictname = Text::districtname($BeautyRetai->district); ?>
                                                      @if($Bdistrictname!=null)
                                                        @if(App::getLocale()=="en")  {{$Bdistrictname->name_e}} @else   {{$Bdistrictname->name__c}}  @endif  
                                                        @endif
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="product_des_box">
                                            <div class="product_name"> <a href="{{URL::to('Shops/'.base64_encode($BeautyRetai->id).'/ShopDetail')}}"> 
                                               
                                                    @if(App::getLocale()=="en")  {{$BeautyRetai->shop_name}} @else  {{$BeautyRetai->shop_name_c}}  @endif    
                                                </a></div>
                                         <!--                                    <div class="rating_box"><img src="images/rating.png"/></div>-->
                                        </div>
                                    </li>
                                  

                                    @endforeach
                                </ul>
                            </div>
                            <a href="#" class="prev"></a> <a href="#" class="next"></a> </div>
                    </div>
                    <div class="cat_slider_box_row">
                        <div class="slide_tilte_box pink_bg">
                            <h1>{{{ trans("site/site.Hot_Beauty_Servicing_Shops") }}} </h1>
                            <a href="{{URL::to('searchpage?shop_type=3')}}" class="see_all">{{{ trans("site/site.See_All") }}}</a> </div>
                        <div class="slideshow">
                            <div class="slideInner">
                                <ul class="slides">
                                    <?php $BeautyServicing = Text::getShop('3') ?>
                                    @foreach($BeautyServicing as $BeautyServicin)
                                    
                                    <li class="slide">
                                        <div class="image_box_bg">
                                            <div class="image_box">
                                                <?php if (@getimagesize($BeautyServicin->shop_image_1)) { ?>
                                                    <img src="{{$BeautyServicin->shop_image_1}}" alt="" />
                                                <?php } else { ?>
                                                    <img src="{{ asset('images/noimage.png') }}" alt="" />
                                                <?php } ?>
                                            </div>
                                            <a href="{{URL::to('Shops/'.base64_encode($BeautyServicin->id).'/ShopDetail')}}">
                                                <div class="overlow_box">
                                              <div class="overlow_box_content">
                                                        <?php $BSdistrictname = Text::districtname($BeautyServicin->district); ?>
                                                  @if($BSdistrictname!=null)    
                                                  @if(App::getLocale()=="en")  {{$BSdistrictname->name_e}} @else  {{$BSdistrictname->name_c}} @endif  
                                                  @endif     
                                              </div>
                                                   

                                                </div>
                                            </a>
                                        </div>
                                        <div class="product_des_box">
                                            <div class="product_name"> <a href="{{URL::to('Shops/'.base64_encode($BeautyServicin->id).'/ShopDetail')}}"> 
                                                    @if(App::getLocale()=="en")  {{$BeautyServicin->shop_name}} @else  {{$BeautyServicin->shop_name_c}} @endif  
                                                </a> </div>
                                          <!--                                    <div class="rating_box"><img src="images/rating.png"/></div>-->
                                        </div>
                                    </li>
                                 
                                    @endforeach
                                </ul>
                            </div>
                            <a href="#" class="prev"></a> <a href="#" class="next"></a> </div>
                    </div>
                    <!--          <div class="cat_slider_box_row">
                                <div class="slide_tilte_box light_blue_bg">
                                  <h1>Top Items</h1>
                                  <a href="#" class="see_all">See all</a> </div>
                                  
                                  
                                  
                                  
                                  <div class="slideshow">
                                  <div class="slideInner">
                                    <ul class="slides">
                                     
                                      <li class="slide">
                                       <div class="image_box_bg">
                                      <div class="image_box"><img src="images/img01.png" alt="" /></div>
                                      <div class="overlow_box">
                                        <div class="overlow_box_content"> <span>Street Style:</span>
                                          <p>Dallas Fashion Scene</p>
                                          <a href="#">Kristi and Scot Redman</a> </div>
                                      </div>
                                    </div>
                                       <div class="product_des_box">
                                      <div class="product_name">Shop Name</div>
                                      <div class="rating_box"><img src="images/rating.png"/></div>
                                    </div>
                                      </li>                    
                                      <li class="slide">
                                       <div class="image_box_bg">
                                      <div class="image_box"><img src="images/img02.png" alt="" /></div>
                                      <div class="overlow_box">
                                        <div class="overlow_box_content"> <span>Street Style:</span>
                                          <p>Dallas Fashion Scene</p>
                                          <a href="#">Kristi and Scot Redman</a> </div>
                                      </div>
                                    </div>
                                       <div class="product_des_box">
                                      <div class="product_name">Shop Name</div>
                                      <div class="rating_box"><img src="images/rating.png"/></div>
                                    </div>
                                      </li>
                                      <li class="slide">
                                       <div class="image_box_bg">
                                      <div class="image_box"><img src="images/img03.png" alt="" /></div>
                                      <div class="overlow_box">
                                        <div class="overlow_box_content"> <span>Street Style:</span>
                                          <p>Dallas Fashion Scene</p>
                                          <a href="#">Kristi and Scot Redman</a> </div>
                                      </div>
                                    </div>
                                       <div class="product_des_box">
                                      <div class="product_name">Shop Name</div>
                                      <div class="rating_box"><img src="images/rating.png"/></div>
                                    </div>
                                      </li>
                                       <li class="slide">
                                       <div class="image_box_bg">
                                      <div class="image_box"><img src="images/img01.png" alt="" /></div>
                                      <div class="overlow_box">
                                        <div class="overlow_box_content"> <span>Street Style:</span>
                                          <p>Dallas Fashion Scene</p>
                                          <a href="#">Kristi and Scot Redman</a> </div>
                                      </div>
                                    </div>
                                       <div class="product_des_box">
                                      <div class="product_name">Shop Name</div>
                                      <div class="rating_box"><img src="images/rating.png"/></div>
                                    </div>
                                      </li>                    
                                      <li class="slide">
                                       <div class="image_box_bg">
                                      <div class="image_box"><img src="images/img02.png" alt="" /></div>
                                      <div class="overlow_box">
                                        <div class="overlow_box_content"> <span>Street Style:</span>
                                          <p>Dallas Fashion Scene</p>
                                          <a href="#">Kristi and Scot Redman</a> </div>
                                      </div>
                                    </div>
                                       <div class="product_des_box">
                                      <div class="product_name">Shop Name</div>
                                      <div class="rating_box"><img src="images/rating.png"/></div>
                                    </div>
                                      </li>
                                      <li class="slide">
                                       <div class="image_box_bg">
                                      <div class="image_box"><img src="images/img03.png" alt="" /></div>
                                      <div class="overlow_box">
                                        <div class="overlow_box_content"> <span>Street Style:</span>
                                          <p>Dallas Fashion Scene</p>
                                          <a href="#">Kristi and Scot Redman</a> </div>
                                      </div>
                                    </div>
                                       <div class="product_des_box">
                                      <div class="product_name">Shop Name</div>
                                      <div class="rating_box"><img src="images/rating.png"/></div>
                                    </div>
                                      </li>
                                       <li class="slide">
                                       <div class="image_box_bg">
                                      <div class="image_box"><img src="images/img01.png" alt="" /></div>
                                      <div class="overlow_box">
                                        <div class="overlow_box_content"> <span>Street Style:</span>
                                          <p>Dallas Fashion Scene</p>
                                          <a href="#">Kristi and Scot Redman</a> </div>
                                      </div>
                                    </div>
                                       <div class="product_des_box">
                                      <div class="product_name">Shop Name</div>
                                      <div class="rating_box"><img src="images/rating.png"/></div>
                                    </div>
                                      </li>                    
                                      <li class="slide">
                                       <div class="image_box_bg">
                                      <div class="image_box"><img src="images/img02.png" alt="" /></div>
                                      <div class="overlow_box">
                                        <div class="overlow_box_content"> <span>Street Style:</span>
                                          <p>Dallas Fashion Scene</p>
                                          <a href="#">Kristi and Scot Redman</a> </div>
                                      </div>
                                    </div>
                                       <div class="product_des_box">
                                      <div class="product_name">Shop Name</div>
                                      <div class="rating_box"><img src="images/rating.png"/></div>
                                    </div>
                                      </li>
                                      <li class="slide">
                                       <div class="image_box_bg">
                                      <div class="image_box"><img src="images/img03.png" alt="" /></div>
                                      <div class="overlow_box">
                                        <div class="overlow_box_content"> <span>Street Style:</span>
                                          <p>Dallas Fashion Scene</p>
                                          <a href="#">Kristi and Scot Redman</a> </div>
                                      </div>
                                    </div>
                                       <div class="product_des_box">
                                      <div class="product_name">Shop Name</div>
                                      <div class="rating_box"><img src="images/rating.png"/></div>
                                    </div>
                                      </li>
                                       <li class="slide">
                                       <div class="image_box_bg">
                                      <div class="image_box"><img src="images/img01.png" alt="" /></div>
                                      <div class="overlow_box">
                                        <div class="overlow_box_content"> <span>Street Style:</span>
                                          <p>Dallas Fashion Scene</p>
                                          <a href="#">Kristi and Scot Redman</a> </div>
                                      </div>
                                    </div>
                                       <div class="product_des_box">
                                      <div class="product_name">Shop Name</div>
                                      <div class="rating_box"><img src="images/rating.png"/></div>
                                    </div>
                                      </li>                    
                                      <li class="slide">
                                       <div class="image_box_bg">
                                      <div class="image_box"><img src="images/img02.png" alt="" /></div>
                                      <div class="overlow_box">
                                        <div class="overlow_box_content"> <span>Street Style:</span>
                                          <p>Dallas Fashion Scene</p>
                                          <a href="#">Kristi and Scot Redman</a> </div>
                                      </div>
                                    </div>
                                       <div class="product_des_box">
                                      <div class="product_name">Shop Name</div>
                                      <div class="rating_box"><img src="images/rating.png"/></div>
                                    </div>
                                      </li>
                                      <li class="slide">
                                       <div class="image_box_bg">
                                      <div class="image_box"><img src="images/img03.png" alt="" /></div>
                                      <div class="overlow_box">
                                        <div class="overlow_box_content"> <span>Street Style:</span>
                                          <p>Dallas Fashion Scene</p>
                                          <a href="#">Kristi and Scot Redman</a> </div>
                                      </div>
                                    </div>
                                       <div class="product_des_box">
                                      <div class="product_name">Shop Name</div>
                                      <div class="rating_box"><img src="images/rating.png"/></div>
                                    </div>
                                      </li>
                                      
                                      
                                    </ul>
                                  </div>
                                  <a href="#" class="prev"></a> <a href="#" class="next"></a> </div>
                                   
                                
                              </div>-->
                </div>
                <div class="add_banner_bg">
                    <?php $AdvertisementImage = Text::AdvertisementImage('1', '4', '2') ?>
                    @foreach($AdvertisementImage as $AdvertisementImag)
                    <div class="banner_box">
                        @if($AdvertisementImag->type==1)
                        <a href="#"><img src="{{$AdvertisementImag->image_url}}"/></a>
                        @else 
                        <?php echo htmlspecialchars_decode($AdvertisementImag->googlescript); ?>

                        @endif

                    </div>
                    @endforeach </div>
            </div>


            <div id="fb-root"></div>
            <script>(function (d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id))
                        return;
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=1602645729958011";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>            
            <div class="signup_join_fabmap">
                <div class="sign_box" style=" padding:10px; text-align:left">
                    <div class="fb-page" data-href="https://www.facebook.com/FabMap-223293637862783" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false" data-width="470"></div>
<!--                                        <div class="fb-page" data-href="https://www.facebook.com/devtechnosys?_rdr=p" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/devtechnosys?_rdr=p"><a href="https://www.facebook.com/devtechnosys?_rdr=p">Dev Technosys</a></blockquote></div></div>
                                                                        <h1>{{{ trans("site/site.sign_up_to_receive_our_updates") }}}</h1>
                                                                        <p>Nulla ipsum dolor lacus, suscipit adipiscing. </p>
                                                                        <form>
                                                                            <input type="text" placeholder="{{{ trans('site/site.Your_mail_address') }}}"/>
                                                                            <input type="submit" value="{{{ trans('site/site.Add') }}}"/>
                                                                        </form>-->
                </div>
                <div class="join_fabmap_box">

                    <a style="line-height: 6;" href="{{URL::to('Shops')}}"> <h1>{{{ trans('site/site.Tell_about_new_shop') }}} </h1></a>
<!--                                <p>Nulla ipsum dolor lacus, suscipit adipiscing.<br/>
                        Nulla ipsum dolor lacus, suscipit adipiscing. </p>-->
                    <!--                    <a href="#" class="join_fabmap">Join Fabmap Now</a> </div>-->
                </div>
                <?php $AdvertisementImage = Text::AdvertisementImage('1', '5', '1');
                ?>
                @foreach($AdvertisementImage as $AdvertisementImag)
                <div class="free_add_box">
                    @if($AdvertisementImag->type==1)
                    <a href="#"><img src="{{$AdvertisementImag->image_url}}"/></a>
                    @else 
                    <?php echo htmlspecialchars_decode($AdvertisementImag->googlescript); ?>
                    @endif
                </div>
                @endforeach
                <!--      <div class="cat_slider_box_row our_clients_bg">
                        <div class="slide_tilte_box pink_bg">
                          <h1>Our Clients</h1>
                        </div>
                        <ul id="mycarousel5" class="jcarousel-skin-tango">
                          <li>
                            <div class="image_box_bg">
                              <div class="image_box"><img src="images/01.png" alt="" /></div>
                            </div>
                          </li>
                          <li>
                            <div class="image_box_bg">
                              <div class="image_box"><img src="images/02.png" alt="" /></div>
                            </div>
                          </li>
                          <li>
                            <div class="image_box_bg">
                              <div class="image_box"><img src="images/03.png" alt="" /></div>
                            </div>
                          </li>
                          <li>
                            <div class="image_box_bg">
                              <div class="image_box"><img src="images/04.png" alt="" /></div>
                            </div>
                          </li>
                          <li>
                            <div class="image_box_bg">
                              <div class="image_box"><img src="images/05.png" alt="" /></div>
                            </div>
                          </li>
                          <li>
                            <div class="image_box_bg">
                              <div class="image_box"><img src="images/06.png" alt="" /></div>
                            </div>
                          </li>
                        </ul>
                      </div>-->
            </div>
        </div>
        <!--home-page-content-end-->
    </div>
    @endsection

    @stop 