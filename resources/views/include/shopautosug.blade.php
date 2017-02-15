<?php
if (App::getLocale() == 'jp') {

    $autoUrl = URL::to('automallsug_c');
    
} else {
    $autoUrl = URL::to('automallsug');
    
}
?>
<script>
       var pathggvy = "<?php echo $autoUrl; ?>";
$("#malldiefy").autocomplete({
        source: pathggvy,
                minLength: 2,
                select: function(event, ui) {
                /*log( ui.item ?
                 "Selected: " + ui.item.value + " aka " + ui.item.id :
                 "Nothing selected, input was " + this.value );*/
                $('#q').val(ui.item.value);
                }
        });
        
      
        
</script>