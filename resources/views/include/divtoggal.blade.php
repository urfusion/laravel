<script> 
  $(function () {
        $('.fitting').click(function () {
            if(this.value==1){                
                //$("#fitting_detaildiv").show(1000);
                 $('#fitting_detail').removeAttr('readonly');
            } if(this.value==0){
              //  $("#fitting_detaildiv").hide(1000);
               $("#fitting_detail").val('');
                 $("#fitting_detail").attr('readonly','readonly');
            }
            
    
        });
        
        $('.refund').click(function () {
            if(this.value==1){    
                 $('#refund_detail').removeAttr('readonly');
            } if(this.value==0){ 
               $("#refund_detail").val('');
                 $("#refund_detail").attr('readonly','readonly');
            }
            
    
        });
        
        $('.refund').click(function () {
            if(this.value==1){    
                 $('#refund_detail').removeAttr('readonly');
            } if(this.value==0){ 
               $("#refund_detail").val('');
                 $("#refund_detail").attr('readonly','readonly');
            }
            
    
        });
         $('.exchange').click(function () {
            if(this.value==1){    
                 $('#exchange_detail').removeAttr('readonly');
            } if(this.value==0){ 
               $("#exchange_detail").val('');
                 $("#exchange_detail").attr('readonly','readonly');
            }
            
    
        });
         $('.membership').click(function () {
            if(this.value==1){    
                 $('#membership_detail').removeAttr('readonly');
            } if(this.value==0){ 
               $("#membership_detail").val('');
                 $("#membership_detail").attr('readonly','readonly');
            }
            
    
        });
            
     
    });
</script>