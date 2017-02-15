@extends('admin.layouts.default') @section('content')

<form class="form-horizontal" method="post"
      action="" enctype="multipart/form-data" 
      autocomplete="off">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" /> 
    <div data-collapsed="0" class="  col-md-12">
        <div data-collapsed="0" class="panel panel-primary col-sm-6">
            <div class="panel-heading">
                <div class="panel-title">
                    Manager Information
                </div> 
            </div>
            <div class="panel-body">

 
                <div class="form-group {{{ $errors->has('first_name') ? 'has-error' : '' }}}">
                    <label class="col-sm-3 control-label" for="field-1">First Name</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="First Name" type="text"
                               name="first_name" id="first_name"
                               value="{{{ Input::old('first_name', isset($user) ? $user->first_name : null) }}}">
                        {!! $errors->first('first_name', '<label class="control-label"
                                                                 for="username">:message</label>')!!}
                    </div>
                </div>

                <div class="form-group {{{ $errors->has('last_name') ? 'has-error' : '' }}}">
                    <label class="col-sm-3 control-label" for="field-1">Last Name</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="Last Name" type="text"
                               name="last_name" id="last_name"
                               value="{{{ Input::old('first_name', isset($user) ? $user->last_name : null) }}}">
                        {!! $errors->first('last_name', '<label class="control-label"
                                                                for="last_name">:message</label>')!!}
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('username') ? 'has-error' : '' }}}">
                    <label class="col-sm-3 control-label" for="field-1">Username</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="User Name" type="text"
                               name="username" id="username" @if(isset($user->username)) {{ "readonly" }}   @endif
                               value="{{{ Input::old('username', isset($user) ? $user->username : null) }}}">
                               {!! $errors->first('username', '<label class="control-label"
                               for="username">:message</label>')!!}
                    </div>
                </div>
                <div class="form-group {{{ $errors->has('email') ? 'has-error' : '' }}}">
                    <label class="col-sm-3 control-label" for="field-1">E-mail</label>

                    <div class="col-sm-5">
                        <input class="form-control" tabindex="1"
                               placeholder="E-mail" type="text"
                               name="email" id="email" @if(isset($user->email)) {{ "readonly" }}   @endif
                               value="{{{ Input::old('email', isset($user) ? $user->email : null) }}}">
                               {!! $errors->first('email', '<label class="control-label"
                               for="username">:message</label>')!!}
                    </div>
                </div>

                @if(!isset($user))
                <div class="form-group {{{ $errors->has('password') ? 'has-error' : '' }}}">
                    <label class="col-sm-3 control-label" for="password">{{
						trans('admin/users.password') }}</label>
                    <div class="col-sm-5">
                        <input class="form-control" tabindex="5"
                               placeholder="{{ trans('admin/users.password') }}"
                               type="password" name="password" id="password" value="" />
                        {!!$errors->first('password', '<label class="control-label"
                                                              for="password">:message</label>')!!}
                    </div>
                </div>

                <div class="form-group {{{ $errors->has('password_confirmation') ? 'has-error' : '' }}}">
                    <label class="col-sm-3 control-label" for="password_confirmation">{{
						trans('admin/users.password_confirmation') }}</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="password" tabindex="6"
                               placeholder="{{ trans('admin/users.password_confirmation') }}"
                               name="password_confirmation" id="password_confirmation" value="" />
                        {!!$errors->first('password_confirmation', '<label
                            class="control-label" for="password_confirmation">:message</label>')!!}
                    </div>
                </div>
                @endif



            </div>

        </div>


    </div> 



    <div class="row">

        <!-- Profile Info and Notifications -->



        <!-- Raw Links -->



    </div>
    <div class="clearfix">         				
        <div class="col-md-5">
            <a  href="{{URL::to('admin/users/sho_index')}}" class="btn btn-sm btn-warning close_popup">
                <span class="glyphicon glyphicon-ban-circle"></span> {{
				trans("site/site.cancel") }}
            </a> 
            <!--<button type="reset" class="btn btn-sm btn-default">
                <span class="glyphicon glyphicon-remove-circle"></span> {{
                                trans("admin/modal.reset") }}
            </button>-->
            <button type="submit" class="btn btn-sm btn-success">
                <span class="glyphicon glyphicon-ok-circle"></span> 
                @if	(isset($Data))
                {{ trans("site/site.edit") }}
                @else
                {{trans("site/site.create") }}
                @endif
            </button> 

        </div>

    </div>
</form>





@stop  
@section('scripts')
<script type="text/javascript">
    $(function () {
        $("#roles").select2()
    });
</script>

@stop


