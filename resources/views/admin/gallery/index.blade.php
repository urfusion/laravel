@extends('admin.layouts.default') @section('content')
{{-- Web site Title --}}
@section('title') {{{ trans("admin/users.users") }}} :: @parent
@stop

 
    <div class="page-header">
        <h3>
            Gallery List
            <div class="pull-right">
                <div class="pull-right">
                    <a href="{{{ URL::to('admin/gallery/add') }}}"
                       class="btn btn-sm  btn-primary iframe"><span
                                class="glyphicon glyphicon-plus-sign"></span>{{trans("site/site.Add") }} {{trans("site/site.new") }}</a>
                </div>
            </div>
        </h3>
    </div>
      <!-- search form-->
<!--	 <div class="col-sm-12">
  Manish cconten 
		    
		<div class="panel panel-primary  " data-collapsed="0">		 		
			<div class="panel-body">				
				<form autocomplete="off" action="{{ URL::to('admin/gallery/index') }}" method="post" class="form-horizontal">
	<input type="hidden"  name="_token" value="{{{ csrf_token() }}}" >
					<div class="form-group"> 
						<div class="col-sm-5">
			<input type="text" value="{{{(Session::get('manishkumar'))?Session::get('manishkumar'):null }}}" id="searchbox" name="searchbox" placeholder="Search by name/email" tabindex="5" class="form-control">
						 
						</div>
							<div class="col-md-5">
			<a class="btn btn-sm btn-warning close_popup" type="reset">
				<span class="glyphicon glyphicon-ban-circle"></span> Reset
			</a>
			  
			<button class="btn btn-sm btn-success" type="submit">
				<span class="glyphicon glyphicon-ok-circle"></span> 
				   Search
			</button>
		</div> 
					</div>
					 
					 
			</form>
		
		</div>
	 

 
		
	</div>
	 
	
</div>-->
<!-- /search form -->
	 
	 
	<table class="table table-bordered table-striped datatable" id="table-2">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<thead>
		<tr>
			<th>
				 
					<input type="checkbox"  class="checkall icheck-2">
				 
			</th>
			 <th>Image</th>
            <th>Staus</th>
            <th>Last Update</th>
            <th>Action</th>
			
			 
		</tr>
	</thead>
	
	<tbody>
		 
		 
		  @foreach($Data as $Users)
		<tr>
			<td>
				 
					<input type="checkbox" name="checkboxval" value="{{$Users->id}}"  class="case">
				 
			</td>	
		<td><img src="{{ $Users->imageurl}}" width="100" height="40" /></td>
	
		 <td> 
		@if($Users->Status!=1) 
		<a href="{{URL::to('admin/gallery/'.base64_encode($Users->id).'/active')}}" class="btn btn-danger btn-sm btn-icon icon-left" type="button">
						Inactive   
						<i class="entypo-cancel"></i>
					</a>
	  @else
		 <a href="{{URL::to('admin/gallery/'.base64_encode($Users->id).'/inactive')}}" class="btn btn-green btn-sm btn-icon icon-left" type="button">
						Active
						<i class="entypo-check"></i>
					</a>
					@endif
					
					
		 
		 </td>
		 <td>{{ print($Users->updated_at)}}</td>
		 
		 <td>
				<a  href="{{URL::to('admin/gallery/'.base64_encode($Users->id).'/edit')}}"   class="btn btn-default btn-sm btn-icon icon-left">
					<i class="entypo-pencil"></i>
					Edit
				</a>
		 
<!--				<a href="#"  data-href="{{URL::to('admin/gallery/'.base64_encode($Users->id).'/delete')}}" class="btn btn-danger btn-sm btn-icon icon-left"  data-toggle="modal" data-target="#confirmDelete" data-title="Delete User" data-message="Are you sure you want to delete this Gallery?" >
					<i class="entypo-cancel"></i>
					Delete
				</a>-->
				  
				<a href="{{URL::to('admin/gallery/'.base64_encode($Users->id).'/detail')}}" class="btn btn-info btn-sm btn-icon icon-left">
					<i class="entypo-info"></i>
					View Detail
				</a>
			</td>
		</tr>
		 @endforeach
		 
		 
	</tbody>
</table>

<div class="row">
<div class="col-xs-6 col-left">

<a href="javascript:void(0)" class="btn btn-green btn-sm btn-icon icon-left activeall">
					<i class="entypo-check"></i>
					Active
				</a>
				<a href="javascript:void(0)" class="btn btn-info btn-sm btn-icon icon-left inactiveall">
					<i class="entypo-cancel"></i>
					Inactive  
				</a>
				<a href="javascript:void(0)" class="btn btn-danger btn-sm btn-icon icon-left deleteall">
					<i class="entypo-cancel"></i>
					Delete  
				</a>

</div>
<div class="col-xs-6 col-right">
<div class="dataTables_paginate paging_bootstrap">
    <?php $Purl='admin/gallery/index?page='; ?>
	@include('pagination.default', ['paginator' => $Data])
	</div>
 </div></div>
	
	
	<script language="javascript">
	$(document).ready(function() {	
	$(".checkall").click(function(){ 
        if(this.checked) { // check select status
            $('.case').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"              
            });
        }else{
            $('.case').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                      
            });        
        }     
	});	
	$(".case").click(function(){	 
	if($(".case").length==$(".case:checked").length){
		 
	 $(".checkall").prop("checked", "checked");
	 
	
	}else{$(".checkall").removeAttr("checked");}
	});	
	});
	</script>
<script type="text/javascript">
 
$(document).ready(function(){
  $('.activeall').click(function(){
	  
	 if($(".case:checked").length > 0 ) {
     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	 
	  var checkboxvalue = []; 
            $(".case:checked").each(function () { 
                checkboxvalue.push($(this).val()); 
            }); 
            checkboxvalue =checkboxvalue.join(","); 
			 
			
    $.ajax({
       url:'{{url()}}/admin/gallery/activeall', 
      type: "post",
	  data: {_token: CSRF_TOKEN,checkboxvalue:checkboxvalue},
    //data: {'_token': $('input[name=_csrf-token]').val()},
      success: function(data){
       window.location = self.location;
      }
    });      
	 }else{
		 alert("plese select atlist on value!")
	 }
	
	
  }); 
   
  $('.inactiveall').click(function(){
	  
	 if($(".case:checked").length > 0 ) {
     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	 
	  var checkboxvalue = []; 
            $(".case:checked").each(function () { 
                checkboxvalue.push($(this).val()); 
            }); 
            checkboxvalue =checkboxvalue.join(","); 
			 
			
    $.ajax({
       url:'{{url()}}/admin/gallery/inactiveall', 
      type: "post",
	  data: {_token: CSRF_TOKEN,checkboxvalue:checkboxvalue},
    //data: {'_token': $('input[name=_csrf-token]').val()},
      success: function(data){
      window.location = self.location;
      }
    });      
	 }else{
		 alert("plese select atlist on value!")
	 }
	
	
  }); 
   
  $('.deleteall').click(function(){	  
	 if($(".case:checked").length > 0 ) {
     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');	 
	  var checkboxvalue = []; 
            $(".case:checked").each(function () { 
                checkboxvalue.push($(this).val()); 
            }); 
            checkboxvalue =checkboxvalue.join(","); 
		alert("Are you sure to delete the selected Gallery?");	
			
    $.ajax({
       url:'{{url()}}/admin/gallery/deleteall', 
      type: "post",
	  data: {_token: CSRF_TOKEN,checkboxvalue:checkboxvalue},    
      success: function(data){
         window.location = self.location;
      }
    });      
	 }else{
		 alert("plese select atlist on value!")
	 }
	
	
  }); 
});
</script>	
    
@stop
 
