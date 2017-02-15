 @foreach($data as $Datas)

                            <li>
                                <h2>  <a href="{{URL::to('Shops/'.base64_encode($Datas->id).'/ShopDetail')}}"> 
                                        @if(App::getLocale()=="en")  {{$Datas->shop_name}} @else  {{$Datas->shop_name_c}} @endif 
                                    </a></h2> 
                                <div class="product_inner_des">
                                    <div class="product_image_box"><a href="{{URL::to('Shops/'.base64_encode($Datas->id).'/ShopDetail')}}">

                                            <?php if (@getimagesize($Datas->shop_image_1)) { ?>
                                                <img src="{{$Datas->shop_image_1}}" alt="" />
                                            <?php } else { ?>
                                                <img src="{{ asset('images/noimage.png') }}" alt="" />
                                            <?php } ?>
                                        </a></div>
                                    <div class="product_image_des">
                                        <div class="des_row"><i><img src="{{ asset('images/home_icon.png') }}"/></i><span>
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
                                                $addressString = trim($addressString . $Datas->address_c);
// $addressString= preg_replace("/[[:blank:]]+/","",$addressString);
// 
// $addressString = preg_replace('/\s+/', '',$addressString);
//     $addressString=str_replace(' ', '',trim($addressString));
                                                echo preg_replace('/[\s]+/mu', '', $addressString);
                                                ?>
          
                                                @endif  
                                            </span></div>
                                        @if($Datas->contact_phone_1!=null)
                                        <div class="des_row"><i><img src="{{ asset('images/phone_icon.png') }}"/></i><span>{{ $Datas->contact_phone_1}}</span></div>
                                        @endif
                                        <div class="des_row"><i><img src="{{ asset('images/edit_icon.png') }}"/></i><span>
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
                                        <!--                                        <a href="#" class="sponsor_text">Sponsor</a>-->
                                    </div>
                                </div>
                            </li>  
                            
                       
                            @endforeach                           
                            <script>
                                $(document).ready(function () {
                                   var url=$("#nexturl").val("<?php echo $data->nextPageUrl()  ?>");
                                   <?php  if($data->lastPage()== $data->currentPage()){ ?>
                                       $("#moreViewShop").hide();
                               <?php    } ?>
                                });
                                </script>
                