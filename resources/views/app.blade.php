<!doctype html>

 
<html>
    <head>
        <meta charset="utf-8">

        <title> @yield('title')</title>

        <!--responsive-meta-here-->
        <meta name="google-site-verification" content="53jOZX2-D87EPQIO_btI_oAksbrziXLz7uVPZwu1zgk" />
        <meta name="viewport" content="minimum-scale=1.0, maximum-scale=1.0,width=device-width, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!--responsive-meta-end-->

        <!--style-css-here-->
        <link rel="stylesheet" href="{{ asset('/css/style.css') }} ">
        <!--style-css-end-->

        <!--responsive-css-here-->
        <link rel="stylesheet" href="{{ asset('/css/responsive.css') }}">
        <!--responsive-css-end-->

        <!--slider-css-here-->
        <link rel="stylesheet" href="{{ asset('/css/flexslider.css') }}">
        <!--slider-css-end-->

        <link rel="stylesheet" href="{{ asset('/css/skins.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jquery.jcarousel.css') }}">

        <link rel="stylesheet" href="{{ asset('css/jquery.selectbox.css') }}">
        <link rel="stylesheet" href="{{ asset('css/timepicki/timepicki.css') }}">
        <!--defult-js-here-->
        <script type="text/javascript" src="{{ asset('js/1.7.2.jquery.min.js') }} "></script>
        <!--defult-js-end-->
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <link rel="shortcut icon"
              href="{{{ asset('assets/site/ico/favicon.ico') }}}">
        <!--slider-js-here-->

        <script type="text/javascript">
        $(window).load(function() {
$('.flexslider').flexslider();
        });</script>
        <!--slider-js-end-->

        <!--ie-support-html5-tag-js-here-->
        <script type="text/javascript" src="{{ asset('js/html5.js') }} "></script>
        <!--ie-support-html5-tag-js-end-->


        <script type="text/javascript" src="{{ asset('js/jquery.flexslider-min.js') }} "></script>
        <!--script type="text/javascript" src="js/jquery-1.2.3.pack.js"></script-->
        <script type="text/javascript" src="{{ asset('js/jquery.jcarousel.pack.js') }} "></script>


        <script type="text/javascript" src="{{ asset('js/new/jquery.jcarousellite.js') }} "></script>
        <!--script type="text/javascript" src="js/jquery-1.2.3.pack.js"></script-->
        <script type="text/javascript" src="{{ asset('js/new/ios-orientationchange-fix.js') }} "></script>

        <script type="text/javascript" src="{{ asset('js/jquery.selectbox-0.2.js') }} "></script>



        <script type="text/javascript">
        function mycarousel_initCallback(carousel)
        {
        // Disable autoscrolling if the user clicks the prev or next button.
        carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
        });
                carousel.buttonPrev.bind('click', function() {
                carousel.startAuto(0);
                });
                // Pause autoscrolling if the user moves with the cursor over the clip.
                carousel.clip.hover(function() {
                carousel.stopAuto();
                }, function() {
                carousel.startAuto();
                });
        };
        jQuery(document).ready(function() {
jQuery('#mycarousel').jcarousel({
auto: 3,
        wrap: 'last',
        scroll: 1,
        initCallback: mycarousel_initCallback
        });
        jQuery('#mycarousel2').jcarousel({
auto: 3,
        wrap: 'last',
        scroll: 1,
        initCallback: mycarousel_initCallback
        });
        jQuery('#mycarousel3').jcarousel({
auto: 3,
        wrap: 'last',
        scroll: 1,
        initCallback: mycarousel_initCallback
        });
        jQuery('#mycarousel4').jcarousel({
auto: 3,
        wrap: 'last',
        scroll: 1,
        initCallback: mycarousel_initCallback
        });
        jQuery('#mycarousel5').jcarousel({
auto: 3,
        wrap: 'last',
        scroll: 1,
        initCallback: mycarousel_initCallback
        });
        jQuery('#mycarousel6').jcarousel({
auto: 3,
        wrap: 'last',
        scroll: 1,
        initCallback: mycarousel_initCallback
        });
        });
        function MM_preloadImages() { //v3.0
        var d = document; if (d.images){ if (!d.MM_p) d.MM_p = new Array();
                var i, j = d.MM_p.length, a = MM_preloadImages.arguments; for (i = 0; i < a.length; i++)
                if (a[i].indexOf("#") != 0){ d.MM_p[j] = new Image; d.MM_p[j++].src = a[i]; }}
        }

function MM_swapImgRestore() { //v3.0
var i, x, a = document.MM_sr; for (i = 0; a && i < a.length && (x = a[i]) && x.oSrc; i++) x.src = x.oSrc;
        }

function MM_findObj(n, d) { //v4.01
var p, i, x; if (!d) d = document; if ((p = n.indexOf("?")) > 0 && parent.frames.length) {
d = parent.frames[n.substring(p + 1)].document; n = n.substring(0, p); }
if (!(x = d[n]) && d.all) x = d.all[n]; for (i = 0; !x && i < d.forms.length; i++) x = d.forms[i][n];
        for (i = 0; !x && d.layers && i < d.layers.length; i++) x = MM_findObj(n, d.layers[i].document);
        if (!x && d.getElementById) x = d.getElementById(n); return x;
        }

function MM_swapImage() { //v3.0
var i, j = 0, x, a = MM_swapImage.arguments; document.MM_sr = new Array; for (i = 0; i < (a.length - 2); i += 3)
        if ((x = MM_findObj(a[i])) != null){document.MM_sr[j++] = x; if (!x.oSrc) x.oSrc = x.src; x.src = a[i + 2]; }
}
        </script>

        <!--menu-toggel-script-here-->
        <script type="text/javascript">
            $(document).ready(function() {
            $('.menu_toggel').click(function() {
            $('.category_nav').slideToggle('fast');
            });
                    $('.branches').click(function() {
            $('.branches_inner_list').slideToggle('fast');
            });
            });</script> 
        <!--menu-toggel-script-end-->

        <!--detail-tabing-js-here-->
        <script type="text/javascript">
                    $(document).ready(function() {

            $(".tab_content").hide();
                    $(".tab_content:first").show();
                    $("ul.tabs li").click(function() {
            $("ul.tabs li").removeClass("active");
                    $(this).addClass("active");
                    $(".tab_content").hide();
                    var activeTab = $(this).attr("rel");
                    $("#" + activeTab).fadeIn();
            });
            });</script> 
        <!--detail-tabing-js-end-->
      
    </head>  
    <body onLoad="initialize()" @if(App::getLocale()=='jp')  class="fabmapch"  @endif>
        <div class="site_content <?php    if (strpos(Request::url(),'Branches') !== false) { echo 'fixfooter' ;} ?>">
            <img id="loaderheader" alt="Loading..." width="60" height="60" src="{{ asset('images/loading_1.gif') }}" style="position: fixed;top:13px;left:634px; z-index: 999">
             
            <!--header-content-end-->

            @include('include.header')
            <!--header-content-end-->

            @yield('content')
            <!--footer-content-here-->
            @include('include.footer')

            <!--script type="text/javascript" src="{{ asset('/css/autocom/jquery.mockjax.js') }}  "></script>
            <script type="text/javascript" src="{{ asset('/css/autocom/jquery.autocomplete.js') }}  "></script>
            <script type="text/javascript" src="{{ asset('/css/autocom/countries.js') }}  "></script-->
            <script type="text/javascript" src="{{ asset('/css/autocom/demo.js') }}  "></script>

            <script type="text/javascript" src="{{ asset('css/timepicki/timepicki.js') }} "></script>


            <script>

                $(document).ready(function(){

        $('input[type="file"]#shop_image_1').change(function(e){
        // var fileName = e.target.files[0].name;
        document.getElementById("shop_image_10").value = this.value;
        });
                $('input[type="file"]#shop_image_2').change(function(e){
        // var fileName = e.target.files[0].name;
        document.getElementById("shop_image_20").value = this.value;
        });
                $('input[type="file"]#shop_image_3').change(function(e){
        // var fileName = e.target.files[0].name;
        document.getElementById("shop_image_30").value = this.value;
        });
                $('input[type="file"]#shop_image_4').change(function(e){
        // var fileName = e.target.files[0].name;
        document.getElementById("shop_image_40").value = this.value;
        });
                $('input[type="file"]#shop_image_5').change(function(e){
        // var fileName = e.target.files[0].name;
        document.getElementById("shop_image_50").value = this.value;
        });
        });
                /////////////////


                $('#regionf').change(function ()
        {
        $.get('{{{ URL::to('') }}}/users/regionf/' + this.value, function (data)
        {
        $('#districtlistf').html(data);
        }
        );
        });
                $(function () {





                $('input:radio[name=shop_type]').change(function () {

                $.get('{{{ URL::to('') }}}/Shops/shopType/' + this.value, function (data)
                {
                $('#changeShopType').html(data);
                }
                );
                });
                        ///////// select box
                        $("#regionf").selectbox();
                        $('#mondayopen').timepicki();
                        $('#mondayclosed').timepicki();
                        $('#tuesdayopen').timepicki();
                        $('#tuesdayclosed').timepicki();
                        $('#wednesdayopen').timepicki();
                        $('#wednesdayclosed').timepicki();
                        $('#thursdayopen').timepicki();
                        $('#thursdayclosed').timepicki();
                        $('#fridayopen').timepicki();
                        $('#fridayclosed').timepicki();
                        $('#saturdayopen').timepicki();
                        $('#saturdayclosed').timepicki();
                        $('#sundayopen').timepicki();
                        $('#sundayclosed').timepicki();
                        $('#public_holidayopen').timepicki();
                        $('#public_holidayclosed').timepicki();
                        $('#public_holidayevopen').timepicki();
                        $('#public_holidayevclosed').timepicki();
                });
                function sameTime(){


                        $('#tuesdayopen').val($("#mondayopen").val());
                        $('#tuesdayclosed').val($("#mondayclosed").val());
                        $('#wednesdayopen').val($("#mondayopen").val());
                        $('#wednesdayclosed').val($("#mondayclosed").val());
                        $('#thursdayopen').val($("#mondayopen").val());
                        $('#thursdayclosed').val($("#mondayclosed").val());
                        $('#fridayopen').val($("#mondayopen").val());
                        $('#fridayclosed').val($("#mondayclosed").val());
                        $('#saturdayopen').val($("#mondayopen").val());
                        $('#saturdayclosed').val($("#mondayclosed").val());
                        $('#sundayopen').val($("#mondayopen").val());
                        $('#sundayclosed').val($("#mondayclosed").val());
                        $('#public_holidayopen').val($("#mondayopen").val());
                        $('#public_holidayclosed').val($("#mondayclosed").val());
                        $('#public_holidayevopen').val($("#mondayopen").val());
                        $('#public_holidayevclosed').val($("#mondayclosed").val());
                }

            </script>
            <script>

                $(document).ready(function() {
                var width = $('div.slideshow').width();
                        //alert(width);
                        var i = 3;
                        var w = width;
                      if (w <= 379){
                i = 1;
                }
                else if (w <= 767 && w >= 380){
                i = 2;
                }
                else if (w <= 1024 && w >= 380){
                i = 3;
                }

                var carouselOptions = {
                auto: true,
                        circular: false,
                        autoWidth: true,
                        responsive: true,
                        visible: i,
                        speed: 300,
                        pause: true,
                        btnPrev: function() {
                        return $(this).find('.prev');
                        },
                        btnNext: function() {
                        return $(this).find('.next');
                        }
                };
                        $('div.slideshow').jCarouselLite(carouselOptions);
                });


            </script>

        </div>
    </body>
</html>
