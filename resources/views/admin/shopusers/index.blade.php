@extends('admin.layouts.default') @section('content')
{{-- Web site Title --}}
@section('title') {{{ trans("admin/users.users") }}} :: @parent
@stop

<!--@if( Session::has( 'success' ))
     {{ Session::get( 'success' ) }}
@elseif( Session::has( 'warning' ))
     {{ Session::get( 'warning' ) }}  here to 'withWarning()' 
@endif-->
<div class="page-header">
    <h3>
        List of shop owner
        <div class="pull-right">
            <div class="pull-right">
                <a href="{{{ URL::to('admin/users/sho_create') }}}"
                   class="btn btn-sm  btn-primary iframe"><span
                        class="glyphicon glyphicon-plus-sign"></span>{{
					trans("site/site.new") }}</a>
            </div>           
        </div>
    </h3>
</div>
<!-- search form-->
<div class="col-sm-12">
    <!-- Manish cconten --> 
    <div class="panel panel-primary  " data-collapsed="0">		 		
        <div class="panel-body">				
            <form autocomplete="off" action="{{ URL::to('admin/users/sho_index') }}" method="post" class="form-horizontal">
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
            <th>{{{ trans("admin/users.name") }}}</th>
            <th>{{{ trans("admin/users.email") }}}</th>
            <th>{{{ trans("admin/users.active_user") }}}</th>
            <th>Total Shop</th>
            <th>{{{ trans("admin/admin.created_at") }}}</th>
            <th>{{{ trans("admin/admin.action") }}}</th>


        </tr>
    </thead>

    <tbody>


        @foreach($User as $Users)


        <tr>
            <td>

                <input type="checkbox" name="checkboxval" value="{{$Users->id}}"  class="case">

            </td>	
            <td>{{ $Users->name}} </td>
            <td>{{  $Users->email}}</td>
            <td> 
                @if($Users->Status!=1) 
                <a href="{{URL::to('admin/users/'.base64_encode($Users->id).'/sho_active')}}" class="btn btn-danger btn-sm btn-icon icon-left" type="button">
                    Inactive   
                    <i class="entypo-cancel"></i>
                </a>
                @else
                <a href="{{URL::to('admin/users/'.base64_encode($Users->id).'/sho_inactive')}}" class="btn btn-green btn-sm btn-icon icon-left" type="button">
                    Active
                    <i class="entypo-check"></i>
                </a>
                @endif



            </td>
            <td><a href="{{URL::to('admin/users/'.base64_encode($Users->id).'/shop_index')}}"><span class="badge badge-success chat-notifications-badge"> <?php echo Text::usersshop(); ?></span></a></td>
            <td>{{ print($Users->created_at)}}</td>

            <td>
                <a  href="{{URL::to('admin/users/'.base64_encode($Users->id).'/sho_edit')}}"   class="btn btn-default btn-sm btn-icon icon-left">
                    <i class="entypo-pencil"></i>
                    Edit
                </a>

                <a href="#"  data-href="{{URL::to('admin/users/'.base64_encode($Users->id).'/sho_delete')}}" class="btn btn-danger btn-sm btn-icon icon-left"  data-toggle="modal" data-target="#confirmDelete" data-title="Delete Shop Owner" data-message="Are you sure you want to delete this Shop Owner?" >
                    <i class="entypo-cancel"></i>
                    Delete
                </a>

                <a href="{{URL::to('admin/users/'.base64_encode($Users->id).'/sho_detail')}}" class="btn btn-info btn-sm btn-icon icon-left">
                    <i class="entypo-info"></i>
                    Profile
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
             <?php $Purl='admin/users/sho_index?page='; ?>
            @include('pagination.default', ['paginator' => $User])
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
        $('.activeall').click(function () {

            if ($(".case:checked").length > 0) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                var checkboxvalue = [];
                $(".case:checked").each(function () {
                    checkboxvalue.push($(this).val());
                });
                checkboxvalue = checkboxvalue.join(",");


                $.ajax({
                    url: '{{url()}}/admin/users/sho_activeall',
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
                    url: '{{url()}}/admin/users/sho_inactiveall',
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
                

                $.ajax({
                    url: '{{url()}}/admin/users/sho_deleteall',
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

