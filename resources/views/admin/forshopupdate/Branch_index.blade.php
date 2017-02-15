@extends('admin.layouts.default') @section('content')
{{-- Web site Title --}}
@section('title') {{{ trans("admin/users.users") }}} :: @parent
@stop
 

<div class="page-header">
    <h3>
     Notification New Shop
        <div class="pull-right">
            <div class="pull-right">
<!--                <a href="{{{ URL::to('admin/staticpages/add') }}}"
                   class="btn btn-sm  btn-primary iframe"><span
                        class="glyphicon glyphicon-plus-sign"></span>{{
					trans("admin/modal.new") }}</a>-->
            </div>
        </div>
    </h3>
</div>
<!-- search form-->
<div class="col-sm-12">
    <!-- Manish cconten -->

    <div class="panel panel-primary  " data-collapsed="0">		 		
        <div class="panel-body">				
            <form autocomplete="off" action="{{ URL::to('admin/forshopupdate/Branch_index') }}" method="post" class="form-horizontal">
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


</div>
<!-- /search form -->


<table class="table table-bordered table-striped datatable" id="table-2">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <thead>
        <tr>
            <th>
              <input type="checkbox"  class="checkall icheck-2">
                </th> 
            <th>Shop Name</th>
            <th>Address</th>
            <th>Contact No</th>
           <th>Created at</th>
             <th>Updated at</th>
            <th>Action</th>

        </tr>
    </thead>

    <tbody>

        
        
       

        @foreach($Data as $Users)
           <tr  <?php if($Users->read_status==0){echo 'class="read"'; }else {echo 'class="unread"';} ?> >  
            
                       <td><input type="checkbox" name="checkboxval" value="{{$Users->id}}"  class="case"> </td>
 
             
            
          <td>{{ preg_replace('/(<.*?>)|(&.*?;)/', '', isset($Users) ?  $Users->shop_name: null)  }}</td>
            <td>{{ preg_replace('/(<.*?>)|(&.*?;)/', '', isset($Users) ? $Users->address : null) }}</td>  
            <td>{{ preg_replace('/(<.*?>)|(&.*?;)/', '', isset($Users) ?  $Users->contact_phone_1: null)  }}</td>  
             
            
            
           
            
           
            <td>{{ $Users->created_at}}</td>
             <td>{{ $Users->updated_at}}</td>
            <td>
                <a  href="{{URL::to('admin/forshopupdate/'.base64_encode($Users->id).'/BranchUpdate')}}"   class="btn btn-default btn-sm btn-icon icon-left">
                    <i class="entypo-pencil"></i>
                    Update
                </a>

<!--                <a href="#"  data-href="{{URL::to('admin/forshopupdate/'.base64_encode($Users->id).'/branchdelete')}}" class="btn btn-danger btn-sm btn-icon icon-left"  data-toggle="modal" data-target="#confirmDelete" data-title="Delete Static Page" data-message="Are you sure you want to delete this Page?" >
                    <i class="entypo-cancel"></i>
                    Delete
                </a>-->

                <a href="{{URL::to('admin/forshopupdate/'.base64_encode($Users->id).'/branchdetail')}}" class="btn btn-info btn-sm btn-icon icon-left">
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
<!--        <div class="dataTables_info" id="table-2_info">
            Showing 1 to 8 of 12 entries</div>-->
       
        <a href="javascript:void(0)" class="btn btn-danger btn-sm btn-icon icon-left deleteall">
            <i class="entypo-cancel"></i>
            Delete All   
        </a>

    </div>
    <div class="col-xs-6 col-right">
<div class="dataTables_paginate paging_bootstrap">
    <div style="float: right">
     <?php $Purl='admin/forshopupdate/Branch_index?page='; ?>
	@include('pagination.default', ['paginator' => $Data])
	</div>
	</div>
 </div></div>
<script language="javascript">
    $(document).ready(function () {
        $(".checkall").click(function () {
            if (this.checked) { // check select status
                $('.case').each(function () { //loop through each checkbox
                    this.checked = true;  //select all checkboxes with class "checkbox1"              
                });
            } else {
                $('.case').each(function () { //loop through each checkbox
                    this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                });
            }
        });
        $(".case").click(function () {
            if ($(".case").length == $(".case:checked").length) {

                $(".checkall").prop("checked", "checked");


            } else {
                $(".checkall").removeAttr("checked");
            }
        });
    });
</script>
<script type="text/javascript">

    $(document).ready(function () {
          $('.deleteall').click(function () {
            if ($(".case:checked").length > 0) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var checkboxvalue = [];
                $(".case:checked").each(function () {
                    checkboxvalue.push($(this).val());
                });
                checkboxvalue = checkboxvalue.join(",");
                alert("Are you sure to delete the selected ?");

                $.ajax({
                    url: '{{url()}}/admin/forshopupdate/Branch_index/deleteall',
                    type: "post",
                    data: {_token: CSRF_TOKEN, checkboxvalue: checkboxvalue},
                    success: function (data) {
                        window.location = self.location;
                    }
                });
            } else {
                alert("plese select atlist on value!")
            }


        });
    });
</script>


@stop

