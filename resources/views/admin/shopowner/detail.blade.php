@extends('admin.layouts.default') @section('content')

<form class="form-horizontal" method="post"
      action="" enctype="multipart/form-data" 
      autocomplete="off">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" /> 
      <input  type="hidden" name="shop_id" id="shop_id"   value="{{{ Input::old('shop_id', isset($Data) ?  $Data->shop_id : null) }}}"> 
    <div class="row"> </div>
    <div data-collapsed="0" class="  col-md-12">
        <div data-collapsed="0" class="panel panel-primary col-sm-6">

            <div class="panel-heading">
                <div class="panel-title">

                    Shop Owner information
                </div> 
            </div>			
            <div class="panel-body">
                <!--#########################forn end #######################-->

                <!------------------chain name English ------------------------>
                <div class="form-group {{{ $errors->has('chain') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">Name</label>

                    <div class="col-sm-5">
                      <label class="control-label" for="field-1">{{{ Input::old('name', isset($Data) ? $Data->name : null) }}}
                    </label> </div>
                </div>

                <!------------------chain name Chinese ------------------------>
                <div class="form-group {{{ $errors->has('email') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">Email address</label>

                    <div class="col-sm-5">
                        <label class="control-label" for="field-1">{{{ Input::old('email', isset($Data) ? $Data->email : null) }}}
                    </label>
                    </div>
                </div>
<div class="panel-heading">
                <div class="panel-title">

                    Shop in-charge 1 information
                </div> 
            </div>
                <!------------------Shop name English------------------------>
                <div class="form-group {{{ $errors->has('first_name') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">First Name</label>

                    <div class="col-sm-5">
                        <label class="control-label" for="field-1">{{{ Input::old('first_name', isset($Data) ? $Data->first_name : null) }}}
                    </label>
                    </div>
                </div>

                <!------------------Shop name Chinese------------------------>
                <div class="form-group {{{ $errors->has('last_name') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">Last Name</label>

                    <div class="col-sm-5">
                       <label class="control-label" for="field-1">{{{ Input::old('last_name', isset($Data) ? $Data->last_name : null) }}}
                    </label>
                    </div>
                </div>
                <!------------------Shop Email------------------------>
                <div class="form-group {{{ $errors->has('email_1') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">Contact Email</label>

                    <div class="col-sm-5">
                       <label class="control-label" for="field-1">{{{ Input::old('email_1', isset($Data) ? $Data->email_1 : null) }}}
                    </label>
                    </div>
                </div>

                <!------------------Shop contact no------------------------>
                <div class="form-group {{{ $errors->has(' phone_1') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1"> Contact no</label>

                    <div class="col-sm-5">
                        <label class="control-label" for="field-1">{{{ Input::old('phone_1', isset($Data) ? $Data->phone_1  : null) }}}
                    </label>
                    </div>
                </div>
<div class="panel-heading">
                <div class="panel-title">

                    Shop in-charge 2 information
                </div> 
            </div>
                     <div class="form-group {{{ $errors->has('first_name_2') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">First Name</label>

                    <div class="col-sm-5">
                        <label class="control-label" for="field-1">{{{ Input::old('first_name_2', isset($Data) ? $Data->first_name_2 : null) }}}
                    </label>
                    </div>
                </div>

                <!------------------Shop name Chinese------------------------>
                <div class="form-group {{{ $errors->has('last_name') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">Last Name</label>

                    <div class="col-sm-5">
                       <label class="control-label" for="field-1">{{{ Input::old('last_name_2', isset($Data) ? $Data->last_name_2 : null) }}}
                    </label>
                    </div>
                </div>
                <!------------------Shop Email------------------------>
                <div class="form-group {{{ $errors->has('email_2') ? 'has-error' : '' }}}">
                    <label class="col-sm-4 control-label" for="field-1">Contact Email</label>

                    <div class="col-sm-5">
                       <label class="control-label" for="field-1">{{{ Input::old('email_2', isset($Data) ? $Data->email_2 : null) }}}
                    </label>
                    </div>
                </div>

                <!------------------Shop contact no------------------------>
                <div class="form-group {{{ $errors->has('phone_1') ? 'has-error' : '' }}} ">
                    <label class="col-sm-4 control-label" for="field-1"> Contact no</label>

                    <div class="col-sm-5">
                        <label class="control-label" for="field-1">{{{ Input::old('phone_2', isset($Data) ? $Data->phone_2  : null) }}}
                    </label>
                    </div>
                </div>
           
<div class="panel-heading">
                <div class="panel-title">

                    Requested Shop Names
                </div> 
            </div>
    <div class="form-group {{{ $errors->has('shops_id') ? 'has-error' : '' }}} ">
                     

                    <div class="col-sm-5">
<!--                        <label class="control-label" for="field-1">{{{ Input::old('shops_id', isset($Data) ? $Data->shops_id  : null) }}}-->
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
    <!--############# secong stop-->


    <div class="row">


    </div>
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
<!--                <button type="submit" class="btn btn-sm btn-success">
                    <span class="glyphicon glyphicon-ok-circle"></span> 
                    Update Shop
                </button> -->

            </div>

        </div>
   
    </form>


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


