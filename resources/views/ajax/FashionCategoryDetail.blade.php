<h2>Fashion Shop Category<sup>*</sup></h2>
<?php $fashionCategoryH = Config::get('constants.FashionCategory'); ?>


<div class="checkbox_fild_row mar_bott">
    @foreach($fashionCategoryH as $indexing => $valuing)
    <div class="checkbox_box">                               
        <input type="checkbox" name="FashionCategory[]" value="{{ $indexing }}" /> 
        <label>{{$valuing}}</label>                                

    </div>  
    @endforeach
</div>




<h2>Refined Shop Type</h2>

<div class="checkbox_fild_row">
    <?php $RefinedShopType = Config::get('constants.ShopTypeo1'); ?>
    @foreach($RefinedShopType as $indexingr => $valuingr)
      @if($indexingr!=null)
    <div class="checkbox_box">
        <input type="checkbox"  name="ShopTypeo[]"  value="{{ $indexingr }}"  /> 
        <label>{{$valuingr}}</label>
    </div> 
      @endif
    @endforeach

</div>


