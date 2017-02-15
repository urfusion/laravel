 
                        @if(strpos($id, '1') !== false)            <!-- condition for type 1 -->

                        <h2>{{{ trans('site/site.Fashion_Shop_Category') }}}</h2>
                        <?php $fashionCategoryH = Config::get('constants.FashionCategory'); ?> 
                                                                       <!-- else condition for  fashion category -->
                        <div class="checkbox_fild_row mar_bott">
                            @foreach($fashionCategoryH as $indexing => $valuing)
                            <div class="checkbox_box">                               
                                <input type="checkbox" name="FashionCategory[]"   value="{{ $indexing }}"/> 
                              
                                <label>{{{ trans('site/site.'.$valuing) }}} </label>  

                            </div>  
                            @endforeach
                        </div>
 
                        @endif       <!-- end condition for type 1 -->

                        
                        
                        @if(strpos($id, '2') !== false)  <!--  condition for type 2 -->


                      <h2>{{{ trans('site/site.Beauty_Retail_Shop_Category') }}}</h2>
                        <?php $fashionCategoryH = Config::get('constants.BeautyRetailCategory'); ?>
                                                        <!--  else  condition for  beauty retail  category --> 
                        <div class="checkbox_fild_row mar_bott">
                            @foreach($fashionCategoryH as $indexing => $valuing)
                            <div class="checkbox_box">                               
                                <input type="checkbox" name="BeautyRetailCategory[]" value="{{ $indexing }}"/> 
                                     <label>{{{ trans('site/site.'.$valuing) }}} </label>                             

                            </div>  
                            @endforeach
                        </div> 
                        @endif                                        <!-- end condition for type 2 -->
                        
                         
                          @if(strpos($id, '3') !== false)  <!--  condition for type 3 -->

                        <h2>{{{ trans('site/site.Beauty_Servicing_Shop_Category') }}}</h2>
                        <?php $fashionCategoryH = Config::get('constants.BeautyServicingCategory'); ?>
 
                        <div class="checkbox_fild_row mar_bott">
                            @foreach($fashionCategoryH as $indexing => $valuing)
                            <div class="checkbox_box">                               
                                <input type="checkbox"  name="BeautyServicingCategory[]" value="{{ $indexing }}"/> 
                                 <label>{{{ trans('site/site.'.$valuing) }}} </label>                              

                            </div>  
                            @endforeach
                        </div> 
                        @endif 
                        

                        <!--######### ########## Refined Shop Type ######## #############-->
 
                        @if(strpos($id, '1') !== false)  <!-- condition for type 1 -->

                         <h2>{{{ trans('site/site.Refined_Shop_Type') }}}</h2>
                        <?php $RefinedShopType = Config::get('constants.ShopTypeo1'); ?>
                                                                 <!-- ELSE  condition for type 1 -->
                                                                 <div class="checkbox_fild_row">

                            @foreach($RefinedShopType as $indexingr => $valuingr)
                            @if($indexingr!=null)
                            <div class="checkbox_box">
                                <input type="checkbox" name="ShopTypeo[]"   value="{{ $indexingr }}" /> 
                            
                                   <label>{{{ trans('site/site.'.$valuingr) }}} </label>
                            </div> 
                            @endif
                            @endforeach

                        </div>
 


                        @elseif(strpos($id, '2') !== false) 
                         <h2>{{{ trans('site/site.Refined_Shop_Type') }}}</h2>
                        <?php $RefinedShopType = Config::get('constants.ShopTypeo2'); ?>
                                                 <!--   else condition for type 2 -->
                        <div class="checkbox_fild_row">

                            @foreach($RefinedShopType as $indexingr => $valuingr)
                            @if($indexingr!=null)
                            <div class="checkbox_box">
                                <input type="checkbox"  name="ShopTypeo[]"  value="{{ $indexingr }}"/> 
                                
                                
                                 <label>{{{ trans('site/site.'.$valuingr) }}} </label>
                            </div> 
                            @endif
                            @endforeach

                        </div>
                      
                        @elseif(strpos($id, '3') !== false)

                       
                        <h2>{{{ trans('site/site.Refined_Shop_Type') }}}</h2>

                        <div class="checkbox_fild_row">
                            <?php $RefinedShopType = Config::get('constants.ShopTypeo3'); ?>

                                                               <!-- else condition for type 3 -->

                            @foreach($RefinedShopType as $indexingr => $valuingr)
                            @if($indexingr!=null)
                            <div class="checkbox_box">
                                <input type="checkbox" name="ShopTypeo[]"   value="{{ $indexingr }}"/> 
                                  <label>{{{ trans('site/site.'.$valuingr) }}} </label>
                            </div> 
                            @endif
                            @endforeach 
                        </div>


                        @endif

 
 