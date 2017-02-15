@extends('admin.layouts.default') @section('content')
{{-- Web site Title --}}
@section('title') {{{ trans("admin/users.users") }}} :: @parent
@stop
 

<div class="page-header">
    <h3>
     Notification New Shop
        <div class="pull-right">
            <div class="pull-right">
                <a href="{{{ URL::to('admin/staticpages/add') }}}"
                   class="btn btn-sm  btn-primary iframe"><span
                        class="glyphicon glyphicon-plus-sign"></span>{{
					trans("admin/modal.new") }}</a>
            </div>
        </div>
    </h3>
</div>
<!-- search form-->
<div class="col-sm-12">
    <!-- Manish cconten -->

    <div class="panel panel-primary  " data-collapsed="0">		 		
        <div class="panel-body">				
            <form autocomplete="off" action="{{ URL::to('admin/users/index') }}" method="post" class="form-horizontal">
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
            
            <th>Shop Name</th>
            <th>Address</th>
            <th>Contact No</th>
           
           
            
             <th>{{{ trans("admin/admin.created_at") }}}</th>
             <th>Updated at</th>
            <th>{{{ trans("admin/admin.action") }}}</th>


        </tr>
    </thead>

    <tbody>

        
        
       

        @foreach($Data as $Users)
        <tr>
            
            
             
            
          <td>{{ preg_replace('/(<.*?>)|(&.*?;)/', '', isset($Users) ?  $Users->shop_name: null)  }}</td>
            <td>{{ preg_replace('/(<.*?>)|(&.*?;)/', '', isset($Users) ? $Users->address : null) }}</td>  
            <td>{{ preg_replace('/(<.*?>)|(&.*?;)/', '', isset($Users) ?  $Users->contact_phone_1: null)  }}</td>  
             
            
            
           
            
           
            <td>{{ $Users->created_at}}</td>
             <td>{{ $Users->updated_at}}</td>
            <td>
                <a  href="{{URL::to('admin/forshopupdate/'.base64_encode($Users->id).'/createNewShop')}}"   class="btn btn-default btn-sm btn-icon icon-left">
                    <i class="entypo-pencil"></i>
                    Update
                </a>

<!--                <a href="#"  data-href="{{URL::to('admin/staticpages/'.base64_encode($Users->id).'/delete')}}" class="btn btn-danger btn-sm btn-icon icon-left"  data-toggle="modal" data-target="#confirmDelete" data-title="Delete Static Page" data-message="Are you sure you want to delete this Page?" >
                    <i class="entypo-cancel"></i>
                    Delete
                </a>-->

                <a href="{{URL::to('admin/forshopupdate/'.base64_encode($Users->id).'/detail')}}" class="btn btn-info btn-sm btn-icon icon-left">
                    <i class="entypo-info"></i>
                    Profile
                </a>
            </td>
        </tr>
        @endforeach


    </tbody>
</table>

<div class="row">
   
    <div class="col-xs-6 col-right">
        <div class="dataTables_paginate paging_bootstrap">
            @include('pagination.default', ['paginator' => $Data])
        </div>
    </div></div>




@stop

