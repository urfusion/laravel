@extends('admin.layouts.default') @section('content')
{{-- Web site Title --}}
@section('title') {{{ trans("admin/users.users") }}} :: @parent
@stop
  <script src="{{asset('assets/site/js/sorttable.js')}}"></script>
<script src="sorttable.js"></script>
<div class="page-header">
    <h3>
        Shop List <?php $PageId= $Data->currentPage();?>  
        <div class="pull-right">
            <div class="pull-right">
                <a href="{{{ URL::to('admin/users/shops_create') }}}"
                   class="btn btn-sm  btn-primary iframe"><span class="glyphicon glyphicon-plus-sign"></span>{{trans("site/site.Add_Shop") }} </a>
            </div>
             <div class="pull-right">
                <a href="{{{ URL::to('admin/users/sho_upload_excel') }}}"
                   class="btn btn-sm    btn-gold iframe"><i class="entypo-up"></i>Upload Excel</a>
            </div>
<!--             <div class="pull-right">
                <a href="{{{ URL::to('admin/users/createExcel') }}}"
                   class="btn btn-sm    btn-gold iframe"><i class="entypo-down"></i>Download Excel</a>
            </div>-->

        </div>
    </h3>
</div>

<!-- search form-->
<div class="col-sm-12">
    <!-- Manish cconten --> 
    <div class="panel panel-primary  " data-collapsed="0">		 		
        <div class="panel-body">				
            <form autocomplete="off" action="{{ URL::to('admin/users/shops_index') }}" method="post" class="form-horizontal">
                <input type="hidden"  name="_token" value="{{{ csrf_token() }}}" >
                <input type="hidden"  name="page" value="{{{ $PageId }}}" >
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


<table class="sortable table table-bordered table-striped datatable" id="table-2">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <thead>
        <tr>
            <th>

                <input type="checkbox"  class="checkall icheck-2">

            </th>
            <th>Shop Name</th>
            <th>Chain Name</th>
            <th>Manager Name</th>
            <th>Email</th>
            <th>District</th>
<!--            <th>Source</th>-->
            <th>Total Product</th>
            <th>Display on Homepage</th>
             <th>Created at</th>
             <th>Last Update</th>
            <th>Status</th>         
            <th>Action</th>


        </tr>
    </thead>

    <tbody>


        @foreach($Data as $Datas)

       
        <tr>
            <td>

                <input type="checkbox" name="checkboxval" value="{{$Datas->id}}"  class="case">
            </td>	
            <td>{{ $Datas->shop_name}} </td>
            <td>{{ $Datas->chain}} </td>
            <td>{{ $Datas->freelancer}}</td>
            <td>{{ $Datas->shop_email}}</td>
            <td> <?php 
                    $Did=$Datas->district;
                    $DistName = Text::districtname2($Did);
                    foreach($DistName as $DisTNAme)
                    echo $DisTNAme['name_e'];
                    ?>
            </td>
            
<!--            @if ($Datas->source!='Facebook' || $Datas->source=='' )
            <td>{{ $Datas->website_english}}</td>
            @else
           <td> {{ $Datas->facebook}}</td>
            @endif-->
            
            <td><a href="{{URL::to('admin/users/'.base64_encode($Datas->id).'/shop_index')}}"><span class="badge badge-success chat-notifications-badge"> {{ sizeof($Datas->Procuct)}}</span></a></td>
            <td>
                 @if($Datas->display_top!='1')  
                <a href="{{URL::to('admin/users/'.base64_encode($Datas->id).'/shop_display')}}" class="btn btn-danger btn-sm btn-icon icon-left" type="button">
                    No   
                    <i class="entypo-cancel"></i>
                </a>
                   @else
                 <a href="{{URL::to('admin/users/'.base64_encode($Datas->id).'/shop_undisplay')}}" class="btn btn-green btn-sm btn-icon icon-left" type="button">
                    Yes
                    <i class="entypo-check"></i>
                </a>
                 @endif 
            
            </td>
            <td>{{ $Datas->created_at}}</td>
            <td>{{ $Datas->updated_at}}</td>
            <td > 
                @if($Datas->status!='ready') 
            
                <a href="{{URL::to('admin/users/'.base64_encode($Datas->id).'/shop_active')}}" class="btn btn-danger btn-sm btn-icon icon-left" type="button">
                    Inactive   
                    <i class="entypo-cancel"></i>
                </a>
                @else
                <a href="{{URL::to('admin/users/'.base64_encode($Datas->id).'/shop_inactive')}}" class="btn btn-green btn-sm btn-icon icon-left" type="button">
                    Active
                    <i class="entypo-check"></i>
                </a>
                @endif 
            </td>
            <td class="icon_box">

                <a  href="{{URL::to('admin/users/'.base64_encode($Datas->id).'/shops_edit?page='.$PageId)}}"   class="btn btn-default btn-sm btn-icon icon-left">
                    <i class="entypo-pencil" title="Edit"></i>
                    
                </a>

<!--                <a href="#"  data-href="{{URL::to('admin/users/'.base64_encode($Datas->id).'/shop_delete')}}" class="btn btn-danger btn-sm btn-icon icon-left"  data-toggle="modal" data-target="#confirmDelete" data-title="Delete Shop" data-message="Are you sure you want to delete this Shop?" >
                    <i class="entypo-cancel"></i>
                    Delete
                </a>-->

                <a href="{{URL::to('admin/users/'.base64_encode($Datas->id).'/shop_detail?page='.$PageId)}}" class="btn btn-info btn-sm btn-icon icon-left" >
                    
                    <i class="entypo-info" title="View Detail"></i>
                    
                    
                </a>
                <a href="{{URL::to('admin/users/'.base64_encode($Datas->id).'/shop_Image')}}" class="btn btn-info btn-sm btn-icon icon-left">
                    <i class='entypo-camera' title="Shop Image"></i>
                   
                </a>
               
                
                
                
                 @if($Datas->sub_user_id!=0) 
                  <a href="{{URL::to('admin/users/'.base64_encode($Datas->sub_user_id).'/edit-manager')}}" class="btn btn-orange btn-sm btn-icon icon-left">
                      <i class="entypo-user-add" title="Edit Manager"></i>
                    
                </a>
                  @else
                   <a href="{{URL::to('admin/users/'.base64_encode($Datas->id).'/add-manager')}}" class="btn btn-orange btn-sm btn-icon icon-left">
                       <i class="entypo-user-add" title="Add Manager"></i>
                    
                </a>
                       @endif 
               
                   
               
            </td>
        </tr>
        @endforeach


    </tbody>
</table>

<div class="row">
    <div class="col-xs-6 col-left">
        <!--        <div class="dataTables_info" id="table-2_info">
                    Showing 1 to 8 of 12 entries</div>-->
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
            <?php $Purl='admin/users/shops_index?page='; ?>
            @include('pagination.default', ['paginator' => $Data])
        </div>
    </div>

<!--<div class="pull-right">
                <a href="{{{ URL::to('admin/users/createExcel') }}}"
                   class="btn btn-sm    btn-gold iframe"><i class="entypo-down"></i>Download Excel</a>
            </div>-->

</div>


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
        $('.activeall').click(function () {

            if ($(".case:checked").length > 0) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                var checkboxvalue = [];
                $(".case:checked").each(function () {
                    checkboxvalue.push($(this).val());
                });
                checkboxvalue = checkboxvalue.join(",");
             
                $.ajax({
                    url: '{{url()}}/admin/users/shop_activeall',
                    type: "post",
                    data: {_token: CSRF_TOKEN, checkboxvalue: checkboxvalue},
                    //data: {'_token': $('input[name=_csrf-token]').val()},
                    success: function (data) {
                       
                        window.location = self.location;
                    }
                });
                   
    } else {
                alert("plese select atlist on value!")
            }


        });

        $('.inactiveall').click(function () {

            if ($(".case:checked").length > 0) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                var checkboxvalue = [];
                $(".case:checked").each(function () {
                    checkboxvalue.push($(this).val());
                });
                checkboxvalue = checkboxvalue.join(",");


                $.ajax({
                    url: '{{url()}}/admin/users/shop_inactiveall',
                    type: "post",
                    data: {_token: CSRF_TOKEN, checkboxvalue: checkboxvalue},
                    //data: {'_token': $('input[name=_csrf-token]').val()},
                    success: function (data) {
                        window.location = self.location;
                    }
                });
            } else {
                alert("plese select atlist on value!")
            }


        });

        $('.deleteall').click(function () {
            if ($(".case:checked").length > 0) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var checkboxvalue = [];
                $(".case:checked").each(function () {
                    checkboxvalue.push($(this).val());
                });
                checkboxvalue = checkboxvalue.join(",");
              var result = confirm("Are you sure to delete selected shops?");
if (result) {  


                $.ajax({
                    url: '{{url()}}/admin/users/shop_deleteall',
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
<!--<script>
$(document).ready(function(){
$(function(){
$(".sortable").tablesorter();

});
});
</script>-->

@stop

