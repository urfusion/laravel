@extends('app')
@section('title') Contact :: @parent @stop
@section('content')
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<?php
$ADDRESS = "Rm 1105, Easey Commercial Building, 253 Hennessy Road, Wan Chai, Hong Kong";
$ADDRESS = trim($ADDRESS, ",");
$ADDRESS = str_replace(",,", ",", $ADDRESS);
?>
<script type="text/javascript">
    var geocoder;
    var map;
    var address = "{{ $ADDRESS }}";
    function initialize() {
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(-34.397, 150.644);
        var myOptions = {
            zoom: 12,
            center: latlng,
            mapTypeControl: true,
            mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
            navigationControl: true,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
        if (geocoder) {
            geocoder.geocode({'address': address}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
                        map.setCenter(results[0].geometry.location);

                        var infowindow = new google.maps.InfoWindow(
                                {content: '<b>' + address + '</b>',
                                    size: new google.maps.Size(150, 50)
                                });

                        var marker = new google.maps.Marker({
                            position: results[0].geometry.location,
                            map: map,
                            title: '121 King Street, Melbourne Victoria 3000 Australia  '
                        });
                        google.maps.event.addListener(marker, 'click', function () {
                            infowindow.open(map, marker);
                        });

                    } else {
                        alert("No results found");
                    }
                } else {
                    alert("Geocode was not successful for the following reason: " + status);
                }
            });
        }
    }

</script> 






<div class="warper">

    <!--contactus-page-content-here-->
    <div class="page_content contactus_content">
        <div class="container">
@if ( Session::has('flash_message') )
 
  <div class="alert {{ Session::get('flash_type') }}">
      <h3>{{ Session::get('flash_message') }}</h3>
  </div>
  
@endif
            <div class="bredcrumb_menu">
                <ul>
                    <li><a href="{{ url('/home') }}"><span>{{{ trans('site/site.Home') }}}</span></a></li>

                    <li><a href="#">{{{ trans('site/site.Contact_us') }}}</a></li> 
                </ul>  
            </div> 
 
            <div class="contact_two_col_box">
                <div class="contact_left_box">
                    <div class="information_hour_bg">
                        <div class="information_box in_ho_box">
                            <h2>{{{ trans('site/site.Contact_Information') }}}</h2>	  
                            <ul>
                                <li><a href="#"><i><img src="images/co_icon1.png"/></i><span>@if(App::getLocale()=='jp')灣仔軒尼詩道253號依時商業大廈1105室 @else Rm 1105, Easey Commercial Building, 253 Hennessy Road, Wan Chai, Hong Kong @endif</span></a></li>
                    <!--		<li><a href="#"><i><img src="images/co_icon2.png"/></i><span>+61 3 8376 6284</span></a></li>-->
                                <li><a href="mailto:dilefy.chung@fabmap.com.hk"><i><img src="images/co_icon3.png"/></i><span>dilefy.chung@fabmap.com.hk </span></a></li>
                            </ul>
                        </div>

                    </div>

                    <div class="drop_line_box">
                        <h1>{{{ trans('site/site.Drop_Us_A_Line') }}} </h1>
                        <form class="form-horizontal" method="post" action=""  id="contact_sendmsg"  autocomplete="off" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                            <div class="drop_form_box">
                                <div class="drop_form_row">
                                    <div class="drop_form_box drop_left">
                                        <input id="contact_sendName" type="text" name="sendName" placeholder="{{{ trans('site/site.Your_Name') }}}..." required=""/>
                                    </div>
                                    <div class="drop_form_box drop_right">
                                        <input id="contact_sendMessage" type="text" name="sendMessage" placeholder="{{{ trans('site/site.Your_Message') }}}..." required=""/>
                                    </div>
                                </div>

                                <div class="drop_form_row">
                                    <div class="drop_form_box drop_left">
                                        <input id="contact_sendEmail" type="text" name="sendEmail" placeholder="{{{ trans('site/site.Your_Email') }}}..." required="" pattern="^\S+@\S+\.\S+$" />
                                    </div>

                                </div>

                                <div class="send_message_button">
                                    <input id="contact_sendbutton" type="submit" value="{{{ trans('site/site.Submit') }}}"/>

                                </div>

                            </div>
                        </form>
                    </div>	
                </div>

                <div class="contact_right_box">
                    <div class="contact_map_box">
                        <div class="detail_map_box" id="map_canvas"  style="width:100%; height:400px">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--contactus-page-content-end-->

</div>
 

@endsection
