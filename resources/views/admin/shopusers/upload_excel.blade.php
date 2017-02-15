@extends('admin.layouts.default') @section('content')

<div data-collapsed="0" class="panel panel-primary col-sm-9">

    <div class="panel-heading">
        <div class="panel-title">
            upload Shop Excel 
        </div> 
    </div>			
    <div class="panel-body">

        <form class="form-horizontal" method="post"
              action="" enctype="multipart/form-data" 
              autocomplete="off">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
 
            <div class="form-group">
                 <label class="col-sm-3 control-label" for="field-1">File</label>
                  
                <div class="col-sm-5">

                    <input type="file"  name="excel" id="excel" class="form-control file2 inline btn btn-primary" data-label="<i class='glyphicon glyphicon-file'></i> Browse" />

                </div>
            </div>




            <div class="form-group"> 
                <label class="col-sm-3 control-label" for="field-1"> </label>					
                <div class="col-md-5">
                    <a  href="{{URL::to('admin/users/shops_index')}}" class="btn btn-sm btn-warning close_popup">
                        <span class="glyphicon glyphicon-ban-circle"></span> {{
				trans("site/site.cancel") }}
                    </a> 
                    <!--<button type="reset" class="btn btn-sm btn-default">
                        <span class="glyphicon glyphicon-remove-circle"></span> {{
                                        trans("admin/modal.reset") }}
                    </button>-->
                    <button type="submit" class="btn btn-sm btn-success">
                        <span class="glyphicon glyphicon-ok-circle"></span> 
                        Upload
                    </button>
                </div>

            </div>



        </form>



    </div>



    @stop  
    @section('scripts')
    <script type="text/javascript">
        $(function () {
            $("#roles").select2()
        });
    </script>
    @stop


