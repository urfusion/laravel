 
                        @if(strpos($id, '1') !== false)            <!-- condition for type 1 -->
<div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}}">
 <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Fashion_Shop_Category') }}}</label>
                         
                        <?php $fashionCategoryH = Config::get('constants.FashionCategory'); ?> 
                                                                       <!-- else condition for  fashion category -->
                         <div class="col-sm-8">
                            @foreach($fashionCategoryH as $indexing => $valuing)
                              <div class="col-sm-12">                             
                                <input type="checkbox" name="FashionCategory[]"   value="{{ $indexing }}"/> 
                              
                                <label>{{{ trans('site/site.'.$valuing) }}} </label>  

                            </div>  
                            @endforeach
                        </div>
                        </div>
 
                        @endif       <!-- end condition for type 1 -->

                        
                        
                        @if(strpos($id, '2') !== false)  <!--  condition for type 2 -->

<div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}}">
 <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Beauty_Retail_Shop_Category') }}}</label>
                    
                        <?php $fashionCategoryH = Config::get('constants.BeautyRetailCategory'); ?>
                                                        <!--  else  condition for  beauty retail  category --> 
                         <div class="col-sm-8">
                            @foreach($fashionCategoryH as $indexing => $valuing)
                            <div class="col-sm-12">                         
                                <input type="checkbox" name="BeautyRetailCategory[]" value="{{ $indexing }}"/> 
                                     <label>{{{ trans('site/site.'.$valuing) }}} </label>                             

                            </div>  
                            @endforeach
                        </div> 
                        @endif                                        <!-- end condition for type 2 -->
                        
                         
                          @if(strpos($id, '3') !== false)  <!--  condition for type 3 -->
<div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}}">
 <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Beauty_Servicing_Shop_Category') }}}</label>
                       
                        <?php $fashionCategoryH = Config::get('constants.BeautyServicingCategory'); ?>
 
                         <div class="col-sm-8">
                            @foreach($fashionCategoryH as $indexing => $valuing)
                             <div class="col-sm-12">                              
                                <input type="checkbox"  name="BeautyServicingCategory[]" value="{{ $indexing }}"/> 
                                 <label>{{{ trans('site/site.'.$valuing) }}} </label>                              

                            </div>  
                            @endforeach
                        </div> 
                        </div> 
                        @endif 
                        

                        <!--######### ########## Refined Shop Type ######## #############-->
 
                        @if(strpos($id, '1') !== false)  <!-- condition for type 1 -->
<div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}}">
 <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Refined_Shop_Type') }}}</label>
                         
                        <?php $RefinedShopType = Config::get('constants.ShopTypeo1'); ?>
                                                                 <!-- ELSE  condition for type 1 -->
<div class="col-sm-8">
                            @foreach($RefinedShopType as $indexingr => $valuingr)
                            @if($indexingr!=null)
                            <div class="col-sm-12">
                                <input type="checkbox" name="ShopTypeo[]"   value="{{ $indexingr }}" /> 
                            
                                   <label>{{{ trans('site/site.'.$valuingr) }}} </label>
                            </div> 
                            @endif
                            @endforeach

                        </div>
                        </div>
 


                        @elseif(strpos($id, '2') !== false) 
                        <div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}}">
 <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Refined_Shop_Type') }}}</label>
                      
                        <?php $RefinedShopType = Config::get('constants.ShopTypeo2'); ?>
                                                 <!--   else condition for type 2 -->
                          <div class="col-sm-8">

                            @foreach($RefinedShopType as $indexingr => $valuingr)
                            @if($indexingr!=null)
                             <div class="col-sm-12">
                                <input type="checkbox"  name="ShopTypeo[]"  value="{{ $indexingr }}"/> 
                                
                                
                                 <label>{{{ trans('site/site.'.$valuingr) }}} </label>
                            </div> 
                            @endif
                            @endforeach

                        </div>
                        </div>
                      
                        @elseif(strpos($id, '3') !== false)

         <div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}}">
 <label class="col-sm-4 control-label" for="field-1">{{{ trans('site/site.Refined_Shop_Type') }}}</label>              
                        

                         <div class="col-sm-8">
                            <?php $RefinedShopType = Config::get('constants.ShopTypeo3'); ?>

                                                               <!-- else condition for type 3 -->

                            @foreach($RefinedShopType as $indexingr => $valuingr)
                            @if($indexingr!=null)
                             <div class="col-sm-12">
                                <input type="checkbox" name="ShopTypeo[]"   value="{{ $indexingr }}"/> 
                                  <label>{{{ trans('site/site.'.$valuingr) }}} </label>
                            </div> 
                            @endif
                            @endforeach 
                        </div>
                        </div>


                        @endif

 
 