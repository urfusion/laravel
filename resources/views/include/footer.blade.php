<script src="{{ asset('/css/autocom/jquery-ui.js') }}"></script>

<footer  <?php if (strpos(Request::url(), 'Branches') !== false) {
    echo 'class="footerfix" ';
} ?>>
    <div class="top_footer">
        <div class="container">
            <div class="col_lg4">
                <!--                                <div class="col1">
                                                    <h1>{{{ trans('site/site.Collection') }}}</h1>
                                                    <ul>
                                                        @if(App::getLocale()=='jp') <?php $footerlink = 'searchpage' ?>  @else <?php $footerlink = 'searchpage_c' ?>   @endif
                                                        <li>
                                                            <a href="{{URL::to('/'.$footerlink.'?age_gender[]=2&refine=Refine')}}">{{{ trans('site/site.Women') }}}(<?php echo Text::Collection(2); ?>)</a>
                                                        
                                                        </li>
                                                        <li><a href="{{URL::to('/'.$footerlink.'?age_gender[]=1&refine=Refine')}}">{{{ trans('site/site.Men') }}}(<?php echo Text::Collection(1); ?>)</a></li>                      
                                                        <li><a href="{{URL::to('/'.$footerlink.'?age_gender[]=3&refine=Refine')}}">{{{ trans('site/site.Kids') }}}(<?php echo Text::Collection(3); ?>)</a></li>
                                                        <li><a href="#">{{{ trans('site/site.Comming_Soon') }}}(76)</a></li>
                                                    </ul>
                                                </div>-->
                <!--                <div class="col1">
                                    <h1>{{{ trans('site/site.site') }}}</h1>
                                    <ul>
<?php $Staticepages = Text::Staticepages(); ?>
                                        @foreach($Staticepages as $Staticepage)
                                        <li><a href="{{URL::to('/'.$Staticepage->id.'/policy')}}">{{{ $Staticepage->title }}} </a></li>
                                        @endforeach
                
                                                                <li><a href="{{URL::to('/privacypolicy')}}">{{{ trans('site/site.Privacy_Policy') }}} </a></li>
                                                                <li><a href="#">{{{ trans('site/site.Copyright_Policy') }}}</a></li>
                                                                <li><a href="#">{{{ trans('site/site.Press_Kit') }}} </a></li>
                                                                <li><a href="#">{{{ trans('site/site.Press_Kit') }}}</a></li>
                
                                    </ul>
                                </div>-->
                <div class="col1">
                    <!--                    <h1>{{{ trans('site/site.Shop') }}}</h1>-->
                    <ul>
<!--                        <li><a href="{{URL::to('/about')}}">{{{ trans('site/site.About_us') }}}</a></li>-->
                        <li>
                            <a href="{{URL::to('/searchpage?shop_type=')}}">{{{ trans('site/site.shops') }}}(<?php echo Text::totalshop(); ?>)</a>

                        </li>
                    </ul>
                </div>
                <div class="col1">
                    <!--                    <h1>{{{ trans('site/site.Shop') }}}</h1>-->
                    <ul>
                        <li><a href="{{URL::to('/about')}}">{{{ trans('site/site.About_us') }}}</a></li>
<!--                        <li>
                            <a href="{{URL::to('/searchpage?shop_type=')}}">{{{ trans('site/site.shops') }}}(<?php echo Text::totalshop(); ?>)</a>

                        </li>-->
                    </ul>
                </div>
                <div class="col1">      
                    <ul>  
                        <li><a href="{{URL::to('/contact')}}">{{{ trans('site/site.Contact_us') }}}  </a></li>
                        <!--                        <li><a href="#">{{{ trans('site/site.Update_shop_information') }}}</a></li>-->
                    </ul>
                </div>

                <div class="col1">
                    <!--                    <h1>{{{ trans('site/site.site') }}}</h1>-->
                    <ul>
<?php $Staticepages = Text:: Staticepages(); ?>
                        @foreach($Staticepages as $Staticepage)

                        <li><a href="{{URL::to('/'.$Staticepage->id.'/policy')}}">@if(App::getLocale()=='jp'){{{ $Staticepage->title_c }}}  @else {{{ $Staticepage->title }}}    @endif </a></li>
                        @endforeach



                    </ul>
                </div>



                <div class="col1">
                    <!--                    <h1>{{{ trans('site/site.Newsletter_Sign_Up') }}} </h1>-->
                    <form  method="post" action="" id="newsletter">
                        <input id="newsletteremail" type="text" placeholder="{{{ trans('site/site.Input_Your_Email_ID') }}}" required="" pattern="^\S+@\S+\.\S+$" />
                        <input id = "newslettersub" type="submit" value="{{{ trans('site/site.GO') }}}"/>

                    </form>
                  
   <div id="newsletterrr" style="display: none;"> 
   <p class="alert alert-success">Thank you for newsletter subscription ! </p>
   </div>
   <div id="newsletterrr1" style="display: none;"> 
   <p class="alert alert-info">Sorry! please try again.. </p>
   </div>
     
   
                    <div class="footer_social">
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
    </div>
    <div class="bottom_footer">
        <div class="container">
            <p>© 2015 {{{ trans('site/site.fabmap_All_Rights_Reserved') }}} . </p>
        </div>
    </div>
</footer>
<script>

$(function () {

    $("#districtf").selectbox();
});
$(window).resize(function () {
   
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
$(document).ready(function () {
    $('#newsletter').on('submit', function (event) {

        event.preventDefault();

        var formData = {
            email: $('#newsletteremail').val(),
        }

        $.ajax({
            type: "POST",
            url: "{{ URL::to('/newsletter') }}",
            //  url:  $(this).attr('action'),
            data: formData,
            cache: false,
            success: function (data) {
                console.log(data);
                if (data.status == "failed") {
                   $('#newsletterrr1').show();  
                   setTimeout(function() { 
                    $('#newsletterrr1').fadeOut('slow'); 
   },5000);
                } else {
               $('#newsletterrr').show(); 
                setTimeout(function() { 
                    $('#newsletterrr').fadeOut('slow'); 
   },5000);
                }
            }
        })

        return false;

    });

    $(".closeFilter").click(function () {
        var keyvalue = $(this).data("key");

        if (keyvalue == 'shopname')
        {
            $('#shop_name').val('');
            $('form#headerSearch').submit();
        }
        if (keyvalue == 'Servicing')
        {
            var myvalue = $(this).data("value");

            $('select[name^="Servicing[]"] option[value=' + myvalue + ']').removeAttr('selected');
            ;
            //$('#Servicing').val(myvalue).attr("selected", false);
            $('form#headerSearch').submit();
//        $('select[name^="salesrep"] option[value="Bruce Jones"]').attr("selected","selected");
//        $('select[id^="Servicing"] option:selected').attr("selected",null);
        }

        if (keyvalue == 'ShopType')
        {
            var myvalue = $(this).data("value");

            $('select[name^="shop_type"] option[value=' + myvalue + ']').removeAttr('selected');
            ;
            //$('#Servicing').val(myvalue).attr("selected", false);
            $('form#headerSearch').submit();
//        $('select[name^="salesrep"] option[value="Bruce Jones"]').attr("selected","selected");
//        $('select[id^="Servicing"] option:selected').attr("selected",null);
        }
        
        if (keyvalue == 'landmark')
        {
            var myvalue = $(this).data("value");

            $('select[name^="landmark"] option[value="' + myvalue + '"]').removeAttr('selected');


            $('form#headerSearch').submit();
        }


        if (keyvalue == 'district')
        {
            var myvalue = $(this).data("value");

            $('select[name^="district"] option[value="' + myvalue + '"]').removeAttr('selected');


            $('form#headerSearch').submit();
        }
        if (keyvalue == 'region')
        {
            var myvalue = $(this).data("value");

            $('select[name^="region"] option[value="' + myvalue + '"]').removeAttr('selected');
            $('form#headerSearch').submit();
        }

if (keyvalue == 'AgeGender')
        {
            var myvalue = $(this).data("value");
      var keyyy = $(this).attr('data-value');
       $('#agegentogalsh .checkbox input').each(function(){
           var chkval = $(this).val();
            if(chkval == keyyy){
                $(this).prop('checked', false); 
               $("#searchShopForm").submit();
               
           }
           
       });
        }
    });

 
    /////////////// loader 

    $('#loaderheader').hide()
            // Hide it initially
            .ajaxStart(function () {
                $(this).show();
            })
            .ajaxStop(function () {
                $(this).hide();
            })


});

$(window).load(function () {
    $('#loaderheader').hide();
    
});


function clearFun(clerVal) {
     alert(clerVal)
    $("input[name^=" + clerVal + "]:checkbox").removeAttr('checked');

    $('form#searchShopForm').submit();
}
</script>


 


