@extends('admin.layouts.default') @section('content')

<form class="form-horizontal" method="post"
      action="" enctype="multipart/form-data" 
      autocomplete="off">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" /> 
      <input  type="hidden" name="shop_id" id="shop_id"   value="{{{ Input::old('shop_id', isset($Data) ?  $Data->shop_id : null) }}}"> 
      <input  type="hidden" name="password" id="password"   value="{{{ Input::old('password', isset($Data) ?  $Data->password : null) }}}"> 
  
     
    <div data-collapsed="0" class="  col-md-12">
        <div data-collapsed="0" class="panel panel-primary col-sm-6">

            <div class="panel-heading">
                <div class="panel-title">

                    Shop owner information
                </div> 
            </div>			
            <div class="panel-body">
                <!--#########################forn end #######################-->

                <!------------------chain name English ------------------------>
                <div class="form-group {{{ $errors->has('chain') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">Name</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Shop owner name" type="text"
                               name="name" id="chain"
                               value="{{{ Input::old('name', isset($Data) ? $Data->name : null) }}}">
                        {!! $errors->first('chain', '<label class="control-label"
                                                            for="chain">:message</label>')!!}
                    </div>
                </div>

                <!------------------chain name Chinese ------------------------>
                <div class="form-group {{{ $errors->has('email') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">Email address</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Email address" type="text"
                               name="email" id="email"
                               value="{{{ Input::old('email', isset($Data) ? $Data->email : null) }}}">
                        {!! $errors->first('email', '<label class="control-label"
                                                              for="chain_c">:message</label>')!!}
                    </div>
                </div>

                
                <div class="panel-heading">
                <div class="panel-title">

                    Shop in-charge 1 information
                </div> 
            </div>
                <!------------------Shop name English------------------------>
                <div class="form-group {{{ $errors->has('first_name') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">First name</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="first_name" type="text"
                               name="first_name" id="shop_name"
                               value="{{{ Input::old('first_name', isset($Data) ? $Data->first_name : null) }}}">
                        {!! $errors->first('first_name', '<label class="control-label"
                                                                for="first_name">:message</label>')!!}
                    </div>
                </div>

                <!------------------Shop name Chinese------------------------>
                <div class="form-group {{{ $errors->has('last_name') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">Last Name</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="last_name" type="text"
                               name="last_name" id="shop_name_c"
                               value="{{{ Input::old('last_name', isset($Data) ? $Data->last_name : null) }}}">
                        {!! $errors->first('last_name', '<label class="control-label"
                                                                  for="last_name">:message</label>')!!}
                    </div>
                </div>
                <!------------------Shop Email------------------------>
                <div class="form-group {{{ $errors->has('email_1') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">Shop Email</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="email_1  " type="email"
                               name="email_1" id="shop_email"
                               value="{{{ Input::old('email_1', isset($Data) ? $Data->email_1 : null) }}}">
                        {!! $errors->first('email_1', '<label class="control-label"
                                                                 for="email_1">:message</label>')!!}
                    </div>
                </div>

                <!------------------Shop contact no------------------------>
                <div class="form-group {{{ $errors->has('phone_1') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">Shop contact no </label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Shop contact no" type="text"
                               name="phone_1" id="contact_phone_1"
                               value="{{{ Input::old('phone_1', isset($Data) ? $Data->phone_1 : null) }}}">
                        {!! $errors->first('contact_phone_1', '<label class="control-label"
                                                                      for="phone_1">:message</label>')!!}
                    </div>
                </div>
<div class="panel-heading">
                <div class="panel-title">

                    Shop in-charge 2 information
                </div> 
            </div>
                <!------------------Shop contact no 2------------------------>
                <div class="form-group {{{ $errors->has('first_name_2') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">First Name</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Shop contact no" type="text"
                               name="first_name_2" id="contact_phone_2"
                               value="{{{ Input::old('first_name_2', isset($Data) ? $Data->first_name_2 : null) }}}">
                        {!! $errors->first('first_name_2', '<label class="control-label"
                                                                      for="first_name_2">:message</label>')!!}
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('last_name_2') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">Last Name </label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Shop contact no" type="text"
                               name="last_name_2" id="contact_phone_2"
                               value="{{{ Input::old('last_name_2', isset($Data) ? $Data->last_name_2 : null) }}}">
                        {!! $errors->first('last_name_2', '<label class="control-label"
                                                                      for="last_name_2">:message</label>')!!}
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('email_2') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">Shop email</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Shop email_2" type="text"
                               name="email_2" id="contact_phone_2"
                               value="{{{ Input::old('email_2', isset($Data) ? $Data->email_2 : null) }}}">
                        {!! $errors->first('email_2', '<label class="control-label"
                                                                      for="email_2">:message</label>')!!}
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('phone_2') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1">Shop contact no</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Shop contact no" type="text"
                               name="phone_2" id="contact_phone_2"
                               value="{{{ Input::old('phone_2', isset($Data) ? $Data->phone_2 : null) }}}">
                        {!! $errors->first('phone_2', '<label class="control-label"
                                                                      for="phone_2">:message</label>')!!}
                    </div>
                </div>
                <div class="panel-heading">
                <div class="panel-title">

                   Requested Shop Names
                </div> 
            </div>
               <div class="form-group {{{ $errors->has('shops_id') ? 'has-error' : '' }}} ">
                    

                    <div class="col-sm-5">
             <table  class=" table table-bordered table-striped datatable" id="table-2"> 
     <thead>
        <tr>
            <th>Shop Name</th>
            <th>Contact</th>
            <th>Address</th>
        </tr>
     </thead>
     <tbody>
       
             
           
                  <?php
                             $Sid = explode(',', $Data->shops_id);
                      
                     foreach ($Sid as $key => $item) {
                    $users = DB::table('shopes')->where('id','=',$item)->get();
                     print "<tr>";
                    foreach ($users as $user) {
                      print "<td>";  
                      echo $user->shop_name ;
                     print "</td>";
                      print "<td>";  
                      echo $user->contact_phone_1 ;
                     print "</td>";
                      print "<td>";  
                      echo $user->address ;
                     print "</td>";
                    }
                    print "</tr>";
                    }
                    //print_r($users);
                                             
    
                            ?>
         
         
            
     </tbody>
</table> 
                    </div>
                </div> 
                <!------------------Shop Fax------------------------>
              
    <!--############# secong stop-->


    <div class="row">


    </div>
    <div class="clearfix"> 
        <label class="col-sm-3 control-label" for="field-1"> </label>					
        <div class="col-md-5">
            <a  href="{{URL::to('admin/shopowner/index')}}" class="btn btn-sm btn-warning close_popup">
                <span class="glyphicon glyphicon-ban-circle"></span> {{
				trans("site/site.cancel") }}
            </a> 
            <!--<button type="reset" class="btn btn-sm btn-default">
                <span class="glyphicon glyphicon-remove-circle"></span> {{
                                trans("admin/modal.reset") }}
            </button>-->
            <button type="submit" class="btn btn-sm btn-success">
                <span class="glyphicon glyphicon-ok-circle"></span> 
                 Update Shop
            </button> 

        </div>

    </div>
    </div>
    </div>
    </div>
</form>
<script>
    $(function () {
        $('.shop_type').click(function () {


            var SHOPTYPEVAL = [];
            $('#loader').show();
            $("input:checkbox[class=shop_type]:checked").each(function () {
                SHOPTYPEVAL.push($(this).val());
            });
            SHOPTYPEVAL = SHOPTYPEVAL.join(",");
           
            $.get('{{{ URL::to('') }}}/admin/Shops/shopType/' + SHOPTYPEVAL, function (data)
            { 
              $('#changeShopType').html(data);
            }
            );

        });
    });
</script>

<script type="text/javascript">
    $('#regionf').change(function ()
    {
        $.get('{{{ URL::to('') }}}/admin/users/region/' + this.value, function (data)
        {
            $('#districtlistf').html(data);

        }
        );
    });
</script>

<script>

    $(function () {


        $('.time1').timepicki();

    });
</script>

@stop  
@section('scripts')


@stop


