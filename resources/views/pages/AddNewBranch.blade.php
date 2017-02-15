@extends('app')
@section('title') Home :: @parent @stop
@section('content')


<div class="warper"> 
    <!--beauty-retail-shop-content-here-->
    <div class="page_content fashionshop_bg form_bg">
        <div class="container">
            <div class="bredcrumb_menu">
                <ul>
                    <li><a href="{{ url('/home') }}"><span>{{{ trans('site/site.Home') }}}</span></a></li>
                    <li><a href="{{URL::to('Shops/'.base64_encode($Data->id).'/editShopCategory')}}"><span>{{{ trans('site/site.Edit_Shop_Information') }}}</span></a></li>

                    <li><a href="#">{{{ trans('site/site.Add_Branch') }}}</a></li>
                </ul>  
            </div> 
            @include('errors.messagediv')
            <div class="inner_head_title">
                <h1>{{{ trans('site/site.Shop_Information') }}}</h1>
            </div>   

            <div class="inner_page_content_bg">

                <!--################# shop form ##########################-->
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data"  autocomplete="off">
                    <h2>{{{ trans('site/site.Shop_Information') }}}</h2> 

                    <div class="main_shop">
                        <input type="checkbox" id="sameAsMainShop" name="sameAsMainShop" @if(isset($type)) @if ($type==1 ) checked @endif  @endif/>
                               <label>{{{ trans('site/site.Same_as_main_shop') }}}</label>
                    </div>

                    @if($type==1)
                    @include('include.branchform')
                    @else
                    @include('include.branchformnull')
                    @endif

                </form>
            </div>

        </div>
    </div>
    <!--beauty-retail-shop-content-end-->
</div>


<script type="text/javascript">

    $(document).ready(function () {

    $("#sameAsMainShop").change(function () {
    if ($(this).prop("checked") == true) {

    window.location.href = '{{{ URL::to('') }}}/Shops/{{base64_encode($Data->id)}}/AddNewBranch/1';
    }
    else if ($(this).prop("checked") == false) {

    window.location.href = '{{{ URL::to('') }}}/Shops/{{base64_encode($Data->id)}}/AddNewBranch/2';
    }
    });
    });</script>
<script>
            $(function () {
            $('.shop_type').click(function () {


            var SHOPTYPEVAL = [];
                    $('#loader').show();
                    $("input:checkbox[class=shop_type]:checked").each(function () {
            SHOPTYPEVAL.push($(this).val());
            });
                    SHOPTYPEVAL = SHOPTYPEVAL.join(",");
                    $.get('{{{ URL::to('') }}}/Shops/shopType/' + SHOPTYPEVAL, function (data)
                    {
                    $('#changeShopType').html(data);
                    }
                    );
            });
            });
</script>


@include('include.divtoggal')
@endsection

@stop
