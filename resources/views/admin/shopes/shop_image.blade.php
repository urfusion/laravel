@extends('admin.layouts.default') @section('content')

<form class="form-horizontal" method="post"
      action="" enctype="multipart/form-data" 
      autocomplete="off">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" /> 
    <div data-collapsed="0" class="  col-md-12">
        <div data-collapsed="0" class="panel panel-primary col-sm-6">
            <div class="panel-heading">
                <div class="panel-title">
                    Shop Image
                </div> 
            </div>
            <div class="panel-body">
                

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="field-1">Shop Image 1 </label>	
                    @if(isset($data)) 			
                        <div class="col-sm-4">
                            <img src=" {{ $data->shop_image_1}}" width="120" alt="" />
                        </div> 
                    @endif
                    <div class="col-sm-5">
                        <input type="file" class="form-control file2 inline btn btn-primary" name="shop_image_1" id="shop_image_1" name="filefield">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="field-1">Shop Image 2 </label>	
                    @if(isset($data)) 			
                        <div class="col-sm-4">
                            <img src=" {{ $data->shop_image_2}}" width="120" alt="" />
                        </div> 
                    @endif
                    <div class="col-sm-5">
                        <input type="file" class="form-control file2 inline btn btn-primary" name="shop_image_2" id="shop_image_2" name="filefield">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="field-1">Shop Image 3 </label>	
                    @if(isset($data)) 			
                        <div class="col-sm-4">
                            <img src=" {{ $data->shop_image_3}}" width="120" alt="" />
                        </div> 
                    @endif
                    <div class="col-sm-5">
                        <input type="file" class="form-control file2 inline btn btn-primary" name="shop_image_3" id="shop_image_3" name="filefield">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="field-1">Shop Image 4 </label>
                    @if(isset($data)) 			
                        <div class="col-sm-4">
                            <img src=" {{ $data->shop_image_4}}" width="120" alt="" />
                        </div> 
                    @endif
                    <div class="col-sm-5">
                        <input type="file" class="form-control file2 inline btn btn-primary" name="shop_image_4" id="shop_image_4" name="filefield">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="field-1">Shop Image 5 </label>	
                    @if(isset($data)) 			
                        <div class="col-sm-4">
                            <img src=" {{ $data->shop_image_5}}" width="120" alt="" />
                        </div> 
                    @endif
                    <div class="col-sm-5">
                        <input type="file" class="form-control file2 inline btn btn-primary" name="shop_image_5" id="shop_image_5" name="filefield">

                    </div>
                </div>


                @if(!isset($data))


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


