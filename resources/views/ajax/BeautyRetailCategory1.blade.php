<?php $value = Config::get('constants.BeautyRetailCategory'); ?> 


<select name="Servicing[]" id="Servicing" multiple="multiple">
     
    @foreach($value as $val => $val1)
 
        <option value="{{$val}}"> {{{ trans("site/site.".$val1) }}} </option>
      
 
@endforeach

</select> 
  

<script>
        $(function() {
        $('#Servicing').change(function() {
        console.log($(this).val());
        }).multipleSelect({
        width: '100%'
        });
        });
</script>