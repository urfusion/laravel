@extends('admin.layouts.default') @section('content')
{{-- Web site Title --}}
@section('title') {{{ trans("admin/users.users") }}} :: @parent
@stop


<div class="page-header">
    <h3>
    Newsletter Subscription List
        <div class="pull-right">
            <div class="pull-right">
<!--                <a href="#"
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
            <form autocomplete="off" action="{{ URL::to('admin/newsletter/index') }}" method="post" class="form-horizontal">
                <input type="hidden"  name="_token" value="{{{ csrf_token() }}}" >
                <div class="form-group"> 
                    <div class="col-sm-5">
                        <input type="text" value="{{{(Session::get('manishkumar'))?Session::get('manishkumar'):null }}}" id="searchbox" name="searchbox" placeholder="Search by email" tabindex="5" class="form-control">

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
            <th>Email</th>
             
           
          
             <th>{{{ trans("admin/admin.created_at") }}}</th>
              
            <th>{{{ trans("admin/admin.action") }}}</th>


        </tr>
    </thead>

    <tbody>

        
        
       

        @foreach($Data as $Users)
        <tr>
            <td>

                <input type="checkbox" name="checkboxval" value="{{$Users->id}}"  class="case">

            </td>
            
             
            
          <td>{{ $Users->email}}</td>
           <td>{{ $Users->created_at}}</td>
             
            <td>
                 
                <a href="#"  data-href="{{URL::to('admin/newsletter/'.base64_encode($Users->id).'/delete')}}" class="btn btn-danger btn-sm btn-icon icon-left"  data-toggle="modal" data-target="#confirmDelete" data-title="Delete Newsletter Subscription" data-message="Are you sure you want to delete this Newsletter subscription?" >
                    <i class="entypo-cancel"></i>
                    Delete
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
            Delete  
        </a>

    </div>
    <div class="col-xs-6 col-right">
        <div class="dataTables_paginate paging_bootstrap">
            <?php $Purl='admin/newsletter/index?page='; ?>
            @include('pagination.default', ['paginator' => $Data])
        </div>
        <div class="pull-right">
                <a href="{{{ URL::to('admin/newsletter/csvdownload') }}}"
                   class="btn btn-sm    btn-gold iframe"><i class="entypo-down"></i>Download CSV</a>
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
              var result = confirm("Are you sure to delete selected subscription?");
if (result) {   
                $.ajax({
                    url: '{{url()}}/admin/newsletter/deleteall',
                    type: "post",
                    data: {_token: CSRF_TOKEN, checkboxvalue: checkboxvalue},
                    success: function (data) {
                        window.location = self.location;
                    }
                });
            }
            }
            else {
                alert("plese select atlist on value!")
            }

       
        });
    });
</script>	

@stop

