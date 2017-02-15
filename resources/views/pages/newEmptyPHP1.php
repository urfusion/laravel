<div id="changeShopType">
                        @if(isset($Data->shop_type))                            <!--  IF CONDTION 1 -->

                        @if(strpos($Data->shop_type, '1') !== false)            <!-- condition for type 1 -->

                        <h2>Fashion Shop Category</h2>
                        <?php $fashionCategoryH = Config::get('constants.FashionCategory'); ?> 
                        @if(isset($Data->fashion_category))                    <!-- condition for  fashion category -->

                        <?php $selected = explode(',', $Data->fashion_category); ?>
                        <div class="checkbox_fild_row mar_bott">
                            @foreach($fashionCategoryH as $indexing => $valuing)
                            <div class="checkbox_box">                               
                                <input type="checkbox" name="FashionCategory[]"  value="{{ $indexing }}"  @if (in_array($indexing, $selected)) checked @endif/> 
                                       <label>{{$valuing}}</label>  
                            </div>  
                            @endforeach
                        </div>
                        @else                                                 <!-- else condition for  fashion category -->
                        <div class="checkbox_fild_row mar_bott">
                            @foreach($fashionCategoryH as $indexing => $valuing)
                            <div class="checkbox_box">                               
                                <input type="checkbox" name="FashionCategory[]"   value="{{ $indexing }}"/> 
                                <label >{{$valuing}}</label>                                

                            </div>  
                            @endforeach
                        </div>

                        @endif                                               <!-- end condition for  fashion category -->                      


                        @endif       <!-- end condition for type 1 -->

                        @if(strpos($Data->shop_type, '2') !== false)  <!--  condition for type 2 -->


                        <h2>Beauty Retail Shop Category</h2>
                        <?php $fashionCategoryH = Config::get('constants.BeautyRetailCategory'); ?>
                        @if(isset($Data->beauty_retail_category))   <!--   condition for  beauty retail  category -->  
                        <?php $selected = explode(',', $Data->beauty_retail_category); ?>
                        <div class="checkbox_fild_row mar_bott">
                            @foreach($fashionCategoryH as $indexing => $valuing)
                            <div class="checkbox_box">                               
                                <input type="checkbox" name="BeautyRetailCategory[]" value="{{ $indexing }}"  @if (in_array($indexing, $selected)) checked @endif /> 
                                       <label>{{$valuing}}</label>                             

                            </div>  
                            @endforeach
                        </div>
                        @else                                   <!--  else  condition for  beauty retail  category --> 
                        <div class="checkbox_fild_row mar_bott">
                            @foreach($fashionCategoryH as $indexing => $valuing)
                            <div class="checkbox_box">                               
                                <input type="checkbox" name="BeautyRetailCategory[]" value="{{ $indexing }}"/> 
                                <label>{{$valuing}}</label>                                

                            </div>  
                            @endforeach
                        </div>
                        @endif                                        <!--  end  condition for  beauty retail  category --> 

                        @endif                                        <!-- end condition for type 2 -->

                        <!-- end condition for type 3 -->
                        @else  <!--  ELSE  CONDTION 1 -->
                        <h2>Fashion Shop Category<sup>*</sup></h2>
                        <?php $fashionCategoryH = Config::get('constants.FashionCategory'); ?>

                        <div class="checkbox_fild_row mar_bott">
                            @foreach($fashionCategoryH as $indexing => $valuing)
                            <div class="checkbox_box">                               
                                <input type="checkbox"  name="FashionCategory[]"  value="{{ $indexing }}"/> 
                                <label>{{$valuing}}</label>                                

                            </div>  
                            @endforeach
                        </div>

                        @endif <!--  end  CONDTION 1 -->


                        <!--######### ########## Refined Shop Type ######## #############-->

                        @if(isset($Data->shop_type)) <!--  IF CONDTION 1 -->


                        @if(strpos($Data->shop_type, '1') !== false)  <!-- condition for type 1 -->

                        <h2>Refined Shop Type</h2>
                        <?php $RefinedShopType = Config::get('constants.ShopTypeo1'); ?>
                        @if(isset($Data->refined_shop_type))
                        <?php $selected1 = explode(',', $Data->refined_shop_type); ?>
                        <div class="checkbox_fild_row">

                            @foreach($RefinedShopType as $indexingr => $valuingr)
                            @if($indexingr!=null)
                            <div class="checkbox_box">
                                <input type="checkbox"  name="ShopTypeo[]"  value="{{ $indexingr }}"  @if (in_array($indexingr, $selected1)) checked @endif/> 
                                       <label>{{$valuingr}}</label>
                            </div> 
                            @endif
                            @endforeach

                        </div>

                        @else                                          <!-- ELSE  condition for type 1 -->
                        <div class="checkbox_fild_row">

                            @foreach($RefinedShopType as $indexingr => $valuingr)
                            @if($indexingr!=null)
                            <div class="checkbox_box">
                                <input type="checkbox" name="ShopTypeo[]"   value="{{ $indexingr }}" /> 
                                <label>{{$valuingr}}</label>
                            </div> 
                            @endif
                            @endforeach

                        </div>

                        @endif                                   <!-- END  condition for type 1 -->




                        @elseif(strpos($Data->shop_type, '2') !== false)




                        <h2>Refined Shop Type</h2>
                        <?php $RefinedShopType = Config::get('constants.ShopTypeo2'); ?>
                        @if(isset($Data->refined_shop_type))    <!--    condition for type 2 -->
                        <?php $selected1 = explode(',', $Data->refined_shop_type); ?>
                        <div class="checkbox_fild_row">

                            @foreach($RefinedShopType as $indexingr => $valuingr)
                            @if($indexingr!=null)
                            <div class="checkbox_box">
                                <input type="checkbox" name="ShopTypeo[]"  value="{{ $indexingr }}"  @if (in_array($indexingr, $selected1)) checked @endif/> 
                                       <label>{{$valuingr}}</label>
                            </div> 
                            @endif
                            @endforeach

                        </div>
                        @else                             <!--   else condition for type 2 -->
                        <div class="checkbox_fild_row">

                            @foreach($RefinedShopType as $indexingr => $valuingr)
                            @if($indexingr!=null)
                            <div class="checkbox_box">
                                <input type="checkbox"  name="ShopTypeo[]"  value="{{ $indexingr }}"/> 
                                <label>{{$valuingr}}</label>
                            </div> 
                            @endif
                            @endforeach

                        </div>
                        @endif                           <!--   end condition for type 2 -->



                        @elseif(strpos($Data->shop_type, '3') !== false)

                        <?php $selected1 = explode(',', $Data->refined_shop_type); ?>
                        <h2>Refined Shop Type</h2>

                        <div class="checkbox_fild_row">
                            <?php $RefinedShopType = Config::get('constants.ShopTypeo3'); ?>

                            @if(isset($Data->refined_shop_type))            <!-- condition for type 3 -->

                            @foreach($RefinedShopType as $indexingr => $valuingr)
                            @if($indexingr!=null)
                            <div class="checkbox_box">
                                <input type="checkbox"  name="ShopTypeo[]"  value="{{ $indexingr }}" @if (in_array($indexingr, $selected1)) checked @endif/> 
                                       <label>{{$valuingr}}</label>
                            </div> 
                            @endif
                            @endforeach

                            @else                                      <!-- else condition for type 3 -->

                            @foreach($RefinedShopType as $indexingr => $valuingr)
                            @if($indexingr!=null)
                            <div class="checkbox_box">
                                <input type="checkbox" name="ShopTypeo[]"   value="{{ $indexingr }}"/> 
                                <label>{{$valuingr}}</label>
                            </div> 
                            @endif
                            @endforeach


                            @endif <!-- end condition for type 3 -->



                        </div>


                        @endif



                        @else  <!--  ELSE  CONDTION 1 -->

                        <h2>Refined Shop Type</h2>
                        <div class="checkbox_fild_row">
                            <?php $RefinedShopType = Config::get('constants.ShopTypeo1'); ?>
                            @foreach($RefinedShopType as $indexingr => $valuingr)
                            <div class="checkbox_box">
                                <input type="checkbox"  name="ShopTypeo[]"  value="{{ $indexingr }}"/> 
                                <label>{{$valuingr}}</label>
                            </div> 
                            @endforeach

                        </div>

                        @endif <!--  end  CONDTION 1 -->



                    </div>




<script>
    $(function () {
        $('.shop_type').click(function () {


            var SHOPTYPEVAL = [];
            $('#loader').show();
            $("input:checkbox[name=shop_type]:checked").each(function () {
                SHOPTYPEVAL.push($(this).val());
            });
            SHOPTYPEVAL = SHOPTYPEVAL.join(",");
           
            $.get('{{{ URL::to('') }}}/Shops/shopType/' + SHOPTYPEVAL, function (data)
            {
                
                alert(data);
             //   $('#changeShopType').html(data);
            }
            );

        });
    });
</script>