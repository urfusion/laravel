@if ( Session::has('flash_message') )
<div id="my_msg" class="alert {{ Session::get('flash_type') }} alert-dismissible fade in">
<!--<button class="close" aria-label="Close" data-dismiss="alert" type="button">
<span aria-hidden="true">×</span>
</button>-->
 <strong>{{ Session::get('error_type') }}
</strong> 
{{ Session::get('flash_message') }}
</div>    
<script type="text/javascript">

		jQuery(document).ready(function() {
			setTimeout(function() {
				jQuery('#my_msg').slideUp('slow');
			}, 5000);
		});
	
</script>
@endif
 
<!-- 

    // include('errors.messagediv')
   
   if ( Session::has('flash_message') )
	{
	 Session::reflash();	
	}
   
    success
    Session::flash('error_type', 'Well done!'); 
	Session::flash('flash_message', 'Manish successfully done.');
	Session::flash('flash_type', 'alert-success');
	
	error
	Session::flash('error_type', 'Oh snap!'); 
	Session::flash('flash_message', 'Manish successfully done.');
	Session::flash('flash_type', 'alert-danger');
	
	info
	Session::flash('error_type', 'Heads up!'); 
	Session::flash('flash_message', 'Manish successfully done.');
	Session::flash('flash_type', 'alert-info');
	
	warning
	Session::flash('error_type', 'Warning!'); 
	Session::flash('flash_message', 'Manish successfully done.');
	Session::flash('flash_type', 'alert-warning');
 

-->
