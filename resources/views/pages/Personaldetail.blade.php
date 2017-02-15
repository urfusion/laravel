@extends('app')
@section('title') Home :: @parent @stop
@section('content')

<div class="warper">

    <!--shop-closure-content-here-->
    <div class="page_content shop_closure form_bg">
        <div class="container">
            <div class="bredcrumb_menu">
                <ul>
                    <li><a href="{{ url('/home') }}"><span>{{{ trans('site/site.Home') }}}</span></a></li>


                    <li><a href="#">{{{ trans('site/site.Contact_Information') }}}  </a></li>
                </ul>  
            </div> 
            @include('errors.messagediv')
            <div class="inner_head_title">
                <h1>{{{ trans('site/site.Contact_Information') }}} </h1>
            </div>   

            <div class="inner_page_content_bg">
                <form class="form-horizontal" method="post" action="{!! URL::to('Shops/'.base64_encode($Data->id).'/personalinfo') !!}" enctype="multipart/form-data"  autocomplete="off">
                    <div class="two_fild_row">
                        <div class="fild_box left_fild">
                            <!--                            <div class="fild_box_inner" style=" padding-top: 0 !important;">
                                                            <label style=" padding-top: 0;">{{{ trans('site/site.you_are') }}}</label>
                                                       <div class="checkbox_box checkbox_box02">       
                                                        <input type="checkbox" name="guestuser_type[]" value="1"   /> 
                                                        <label style=" padding-top: 0 !important;">{{{ trans('site/site.owner') }}}</label>
                                                                         
                                                        <input type="checkbox" name="guestuser_type[]" value="2" /> 
                                                         <label style=" padding-top: 0 !important;">{{{ trans('site/site.member') }}}</label>
                                                    </div>  
                                                        </div>-->
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.you_are') }}}</label>
                                <div class="fild select_fild_box">



                                    
                                    <select class="fabmap_visitor_select" name="user_type"  >
                                        <option  value=""> {{{ trans('site/site.please_select_an_option') }}} </option>
                                        <option  value="1"> {{{ trans('site/site.shop_in_charge') }}} </option>
<!--                                        <option   value="2"> {{{ trans('site/site.fabmap_member') }}}  </option>-->
                                        <option   value="3">{{{ trans('site/site.fabmap_visitor') }}} </option>

                                    </select>

                                 
                                </div>
                            </div>
                        </div>
                    </div>  
                    
                    
                    <div id="fabmap_visitor_cont" style="display:none">                    
                    <div class="two_fild_row">
                        <input type="hidden" name="shop_temp_id" value="{{$shopId}}" />
                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.contact_name') }}}</label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="guest_name"  required="" />
                                </div>{!! $errors->first('guest_name', ':message')!!}  
                            </div>
                        </div>
                    </div>
                    <div class="two_fild_row">
                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.contact_email') }}}</label>
                                <div class="fild input_fild_box">
                                    <input type="text" name="guest_email"  required="" />
                                </div>{!! $errors->first('guest_email', ':message')!!} 
                            </div>
                        </div>

                    </div>
                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.contact_phone') }}}
                                </label>
                                <div class="fild input_fild_box">
                                    <input type="tel"  name="guest_phone" required=""  />
                                </div>
                            </div>
                        </div>


                    </div>


<!--                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Address') }}}</label>


                                <div class="fild textarea_fild_box">
                                    <textarea  name="guest_address"  ></textarea>
                                </div>
                            </div>
                        </div>


                    </div>-->


<!--                    <div class="two_fild_row">

                        <div class="fild_box left_fild">
                            <div class="fild_box_inner">
                                <label>{{{ trans('site/site.Region') }}}</label>
                                <div class="fild select_fild_box">



                                    <?php $Region = Text::Region() ?>
                                    <select class="" name="guest_region"   >
                                        <option value="">{{{ trans("site/site.Region") }}}</option>
                                        @foreach($Region as $region)
                                        <option value="{{$region->id}}" {{ 'selected="selected"' }} >@if(App::getLocale()=='jp'){{$region->name_c}}   @else {{$region->name_e}}    @endif </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>


                    </div>-->



                    <div class="submit_button_bg">
                        <input type="submit" value="{{{ trans('site/site.Submit') }}}"/>
                    </div>
</div>
                </form>
            </div>

        </div>
    </div>
    <!--shop-closure-content-end-->
</div>
<!--login-page-content-end-->

 
    
    <script>
 $(function () {
  
  $('.fabmap_visitor_select').change(function(e){
      
       if ($(this).val() == "1" || $(this).val() == "3"  ) {
   
    $('#fabmap_visitor_cont').show('slow');
        }else if ($(this).val() == "2") {
    window.location.href = "{{ url('/auth/login') }} ";
       }  
       else {
            $('#fabmap_visitor_cont').hide('slow');
        }
  });
});
</script>
 
 

 

@include('include.divtoggal')


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
<script>
    $(':checkbox').on('change',function(){
        var th = $(this), name = th.prop('name'); 
        if(th.is(':checked')){
            $(':checkbox[name="'  + name + '"]').not($(this)).prop('checked',false);   
        }
    });
</script>
<sript>
    
</sript>


@endsection

@stop
