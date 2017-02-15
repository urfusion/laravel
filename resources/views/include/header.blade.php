<link rel="stylesheet" href="{{ asset('/css/autocom/jquery-ui.css') }} ">    
<script src="{{ asset('/css/autocom/jquery-ui.js') }}"></script>

<link rel="stylesheet" href="{{ asset('/css/multiple-select.css') }} ">  

<header>
    <div class="top_header">
        <div class="container">
            <!--logo-here-->
            <div class="logo"><a href="{{ url('/home') }}"><img src="{{ asset('images/logo.png') }}"/></a></div>
            <!--logo-end-->


            <div class="top_head_right">
                <div class="sign_lang_box">


                    <ul>

                        <li class="sign"> 
                            <ul class="dropdown-menu">

                                @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                <li> 
                                    <a href="{{ url('/lang/'.$lang) }}">{{$language}} </a>
                                </li>
                                @endif
                                @endforeach
                            </ul>


                        </li>
<!--                        <li class="lang"><a href="#"><img src="{{ asset('images/lang_icon.png') }} "/></a></li>-->





                                                @if(Auth::check())
<!--                                                <li class="sign"><a href="{{ url('/auth/logout') }}">logout</a></li>  -->
                                                <li class="sign"><a href="{{ url('members/dashboard') }}">{{ Auth::user()->name }}</a></li>  
                        <?php
                        $email = Auth::user()->email;
                        $id = Auth::id();
                        ?>
                                                @else 
                                                <li class="sign"><a href="{{ url('/auth/login') }}">Sign in</a></li>  
                                                @endif                  


                    </ul>
                </div>
                <div class="head_social_box">
                                        <ul>
                    
     <li><a href="https://www.facebook.com/fabmaphk" target="_blank"><img src="{{ asset('images/icon1.png') }} "/></a></li>
     
    <li><a href="#"><img src="{{ asset('images/icon2.png') }}"></a></li>
    <li><a href="#" target="_blank"><img src="{{ asset('images/icon3.png') }}"></a></li>
    <li><a href="#" target="_blank"><img src="{{ asset('images/icon4.png') }}"></a></li>
    <li><a href="#"><img src="{{ asset('images/icon5.png') }}"></a></li></ul>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_header">
        
        
        <div class="bottom_header_inner">
            <div class="container">
                <a class="menu_toggel">{{{ trans("site/site.Menu") }}}</a>
                <div class="category_nav">


                    <form  id="headerSearch" action="@if(App::getLocale()=='jp'){{ URL::to('/searchpage_c') }}@else{{ URL::to('/searchpage') }}@endif " method="get" >
                        <input type="hidden"  name="_token" value="{{{ csrf_token() }}}" >

                        @if(Input::get('ShopType')) 
                        <?php $ShopType = Input::get('ShopType'); ?>
                        @foreach($ShopType as $SER=>$SERV)
                        <input type="hidden" name="ShopType[]" value="{{ $SERV }}" >
                        @endforeach
                        @endif

                        @if(Input::get('age_gender')) 
                        <?php $age_gender = Input::get('age_gender'); ?>
                        @foreach($age_gender as $SER=>$SERV)
                        <input type="hidden" name="age_gender[]" value="{{ $SERV }}" >
                        @endforeach
                        @endif

                        @if(Input::get('price_range')) 
                        <?php $price_range = Input::get('price_range'); ?>
                        @foreach($price_range as $SER=>$SERV)
                        <input type="hidden" name="price_range[]" value="{{ $SERV }}" >
                        @endforeach
                        @endif

                        <ul>
                            <li class="input_text_box">



                                <input type="text" value="{{ Input::get('shop_name')  }}" placeholder="{{{ trans("site/site.Shop_Name") }}}" name="shop_name" id="shop_name"/></li>
                            <li class="cat_menu">
                                <?php $SHOPTYPEBOX = Config::get('constants.ShopType'); ?>
                                <select id="shop_type" name="shop_type">
                                    @foreach($SHOPTYPEBOX as $SHOPI=> $SHOPV)
                                    <option value="{{$SHOPI}}" {{ (Input::get('shop_type') == $SHOPI) ? 'selected="selected"' : null }} >{{{ trans("site/site.".$SHOPV) }}} </option>
                                    @endforeach

                                </select>

                            </li>




                            <li class=" " id="ServiceList">
                                @if(Input::get('shop_type')==1)

                                <?php $FASHIONCATEGORY = Config::get('constants.FashionCategory'); ?>             


                                <select name="Servicing[]" id="Servicing" multiple="multiple">
                                    <?php $i = 1; ?>
                                    @foreach($FASHIONCATEGORY as $val => $val1)


                                    @if($i==1)  <optgroup label="{{{ trans("site/site.Item") }}} ">@endif
                                        @if($i==6)  <optgroup label="{{{ trans("site/site.Style") }}} ">@endif    
                                        <option value="{{$val}}" @if(Input::get('Servicing'))  @if (in_array($val, Input::get('Servicing'))) selected="selected"  @endif   @endif > {{{ trans("site/site.".$val1) }}} </option>
                                        @if($i==6)   </optgroup>   @endif 
                                    @if($i==1)   </optgroup>   @endif 

                                    <?php $i++; ?>
                                    @endforeach

                                </select>

                                <!--Input::get('Servicing')-->


                                @elseif(Input::get('shop_type')==2)

                                <?php $value = Config::get('constants.BeautyRetailCategory'); ?> 


                                <select name="Servicing[]" id="Servicing" multiple="multiple">
                                    @foreach($value as $val => $val1)
                                    <option value="{{$val}}"   @if(Input::get('Servicing')) @if (in_array($val, Input::get('Servicing'))) selected="selected"  @endif @endif > {{{ trans("site/site.".$val1) }}} </option>
                                    @endforeach
                                </select> 
                                @elseif(Input::get('shop_type')==3)
                                <?php $value = Config::get('constants.BeautyServicingCategory'); ?> 
                                <select name="Servicing[]" id="Servicing" multiple="multiple">
                                    @foreach($value as $val => $val1)
                                    <option value="{{$val}}"    @if(Input::get('Servicing'))  @if (in_array($val, Input::get('Servicing'))) selected="selected"  @endif @endif  > {{{ trans("site/site.".$val1) }}} </option>
                                    @endforeach
                                </select>                                 
                                @else
                                <select class="" name="Servicing" id="Servicing">
                                    <option value="">{{{ trans("site/site.Product") }}}/{{{ trans("site/site.Service") }}} </option>
                                </select>
                                @endif
                            </li>



                            <li class="cat_menu"> 
                                <?php $Region = Text::Region(); ?> 
                                <select class="" name="region" id="region">
                                    <option value="">{{{ trans("site/site.Region") }}}</option>
                                    @foreach($Region as $region)
                                    <option value="{{$region->id}}" {{ (Input::get('region') == $region->id) ? 'selected="selected"' : null }} > @if(App::getLocale()=='jp'){{$region->name_c}}   @else {{$region->name_e}}    @endif </option>
                                    @endforeach
                                </select>
                            </li>

                            <li class="cat_menu" id="districtlist">
                                <?php $District = Text::District(Input::get('region')); ?> 
                                <select class="" name="district" id="district">
                                    <option value="">{{{ trans("site/site.District") }}}</option>
                                    @foreach($District as $district)
                                    <option value="{{$district->id}}" {{ (Input::get('district') == $district->id) ? 'selected="selected"' : null }} >@if(App::getLocale()=='jp'){{$district->name_c}}   @else {{$district->name_e}}    @endif</option>
                                    @endforeach
                                </select>
                            </li>


                            <?php $Landmark = Text::Landmark(Input::get('district')); ?>

                            <li class="cat_menu"  id="landmarkview">

                                <select class="" name="landmark" id="landmark"> 
                                    <option value="">{{{ trans("site/site.Mall") }}}/{{{ trans("site/site.Landmark") }}}</option>
                                    @foreach($Landmark as $landmark)
                                    <option value="{{$landmark->id}}" {{ (Input::get('landmark') == $landmark->id) ? 'selected="selected"' : null }} >
                                        @if(App::getLocale()=='jp') 
                                        <?php $landmartag = $landmark->mall_c; ?>  @if($landmark->landmark_c!=null) <?php $landmartag = $landmartag . '/' . $landmark->landmark_c; ?>@endif  
                                        <?php echo trim($landmartag, "/"); ?>
                                        @else <?php $landmartag = $landmark->mall_e; ?> 
                                        @if($landmark->landmark_e!=null)<?php $landmartag = $landmartag . '/' . $landmark->landmark_e; ?>@endif 
                                        <?php echo trim($landmartag, "/"); ?>
                                        @endif  
                                    </option>
                                    @endforeach
                                </select>
                            </li>


                            <li class="submit_button">

                                <input type="submit" value="{{{ trans("site/site.search") }}}"/></li>
                        </ul>
                    </form>

                </div>
            </div>
        </div>
    </div>
</header>



<script>

        $('#shop_type').change(function ()
{
$.get('{{{ URL::to('') }}}/users/' + this.value + '/shop_type', function (data)
{
$('#ServiceList').html(data);
}
);
});
        $('#region').change(function ()
{
$.get('{{{ URL::to('') }}}/users/region/' + this.value, function (data)
{
$('#districtlist').html(data);
}
);
});
        $('#district').change(function ()
{
$.get('{{{ URL::to('') }}}/users/district/' + this.value, function (data)
{
//alert(JSON.stringify(data));  
$('#landmarkview').html(data);
}
);
});</script>



<script src="{{ asset('/js/jquery.multiple.select.js') }}"></script>

<script>
        $(function() {


        $('#Servicing').change(function() {
        console.log($(this).val());
        }).multipleSelect({
        width:'100%'
        });
        });
        $(function () {

<?php
if (App::getLocale() == 'jp') {

    $autoUrl = URL::to('autocomplete_c');
    
} else {
    $autoUrl = URL::to('autocomplete');
    
}
?>
        var pathggvy = "<?php echo $autoUrl; ?>";
        
                $("#shop_name").autocomplete({
        source: pathggvy,
                minLength: 2,
                select: function(event, ui) {
                /*log( ui.item ?
                 "Selected: " + ui.item.value + " aka " + ui.item.id :
                 "Nothing selected, input was " + this.value );*/
                $('#q').val(ui.item.value);
                }
        });
        
                $("#Ushop_name").autocomplete({
        source: pathggvy,
                minLength: 2,
                select: function(event, ui) {
                /*log( ui.item ?
                 "Selected: " + ui.item.value + " aka " + ui.item.id :
                 "Nothing selected, input was " + this.value );*/
                $('#q').val(ui.item.value);
                }
        });
        
         
        
        });
        $(function () {
        $("#shop_type").selectbox();
                $("#region").selectbox();
                $("#district").selectbox();
                $("#landmark").selectbox();
        });</script>

<script>
            (function(i, s, o, g, r, a, m){i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function(){
            (i[r].q = i[r].q || []).push(arguments)}, i[r].l = 1 * new Date(); a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-52045517-1', 'auto');
            ga('send', 'pageview');</script>
<!--  <script>
        jQuery(window).ready(function(){
            jQuery("#btnInit").click(initiate_geolocation);
            
        });
 
        function initiate_geolocation() {
            navigator.geolocation.getCurrentPosition(handle_geolocation_query,handle_errors);
        }
 
        function handle_errors(error)
        {
            switch(error.code)
            {
                case error.PERMISSION_DENIED: alert("user did not share geolocation data");
                break;
 
                case error.POSITION_UNAVAILABLE: alert("could not detect current position");
                break;
 
                case error.TIMEOUT: alert("retrieving position timed out");
                break;
 
                default: alert("unknown error");
                break;
            }
        }
 
        function handle_geolocation_query(position){
        
            alert('Lat: ' + position.coords.latitude +
                  ' Lon: ' + position.coords.longitude);
        }
    </script>-->
