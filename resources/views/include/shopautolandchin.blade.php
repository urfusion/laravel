<?php
 
    $autoUrl = URL::to('autolandmarkchinese');
    
 ?>
<script>
       var pathggvy = "<?php echo $autoUrl; ?>";
$("#landmarkdiefy_c").autocomplete({
    
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