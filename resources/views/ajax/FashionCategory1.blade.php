<?php $value = Config::get('constants.FashionCategory'); ?> 


<select name="Servicing[]" id="Servicing" multiple="multiple">
    <?php $i = 1; ?>
    @foreach($value as $val => $val1)


    @if($i==1)  <optgroup label="{{{ trans("site/site.Item") }}} ">@endif
        @if($i==6)  <optgroup label="{{{ trans("site/site.Style") }}} ">@endif    
        <option value="{{$val}}"> {{{ trans("site/site.".$val1) }}} </option>
        @if($i==6)   </optgroup>   @endif 
    @if($i==1)   </optgroup>   @endif 

<?php $i++; ?>
@endforeach

</select>


<script>
    $(function () {
        $('#Servicing').change(function () {
            console.log($(this).val());
        }).multipleSelect({
            width: '100%'
        });
    });
</script>
