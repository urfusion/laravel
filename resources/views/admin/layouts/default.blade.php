<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Neon Admin Panel" />
        <meta name="author" content="" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>{{  SITE_NAME }} </title>

        <link href="{{ asset('assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css') }}" rel="stylesheet">	
        <link href="{{ asset('assets/css/font-icons/entypo/css/entypo.css') }}" rel="stylesheet">	
        <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">	
        <link href="{{ asset('assets/css/neon-core.css') }}" rel="stylesheet">	
        <link href="{{ asset('assets/css/neon-theme.css') }}" rel="stylesheet">	
        <link href="{{ asset('assets/css/neon-forms.css') }}" rel="stylesheet">	
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">	
        
       

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
        <link rel="stylesheet" href="{{ asset('css/timepicki/atimepicki.css') }}">
        <script src="{{ asset('assets/js/jquery-1.11.0.min.js') }}  "></script>
        <script type="text/javascript" src="{{ asset('assets/js/jquery.tablesorter.min.js') }}"></script>
        
        
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <link rel="shortcut icon"
              href="{{{ asset('assets/site/ico/favicon.ico') }}}">

    </head>
    <body class="page-body  page-left-in" data-url="http://neon.dev">

        <div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->	

            <div class="sidebar-menu">				
                <header class="logo-env">			
                    <!-- logo -->
                    <div class="logo">			 
                        <a href="{{ url('/admin/dashboard') }}">
                            <img src="{{ asset('assets/images/logo@2x.png') }} " width="120" alt="" />
                        </a>
                    </div>			
                    <!-- logo collapse icon -->

                    <div class="sidebar-collapse">
                        <a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                            <i class="entypo-menu"></i>
                        </a>
                    </div>									

                    <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
                    <div class="sidebar-mobile-menu visible-xs">
                        <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                            <i class="entypo-menu"></i>
                        </a>
                    </div>			
                </header>		  				
                <ul id="main-menu" class="">			 
                    <li class=" {{ (Request::is('admin/dashboard') ? ' class=active' : '') }}">
                        <a href="{{ url('/admin/dashboard') }}">
                            <i class="entypo-gauge"></i>
                            <span>Dashboard</span>
                        </a>			 
                    </li>



                    @if (Auth::user()->role_id==1)            

                    <li class=" {{ (Request::is('admin/users') ? ' class=active' : '') }} ">
                        <a href="#">
                            <i class="entypo-users"></i>
                            <span>Sub Admin</span>
                        </a>
                        <ul>

                            <li class="active">
                                <a href="{{URL::to('admin/users/sub_index')}}"  >
                                    <span>Sub Admin List </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{URL::to('admin/users/sub_create')}}">
                                    <span>Add New Sub Admin </span>
                                </a>
                            </li>


                        </ul>
                    </li>
                    @endif 


                    @if (Auth::user()->role_id==1 || Auth::user()->role_id==2 )           

                    <li class=" {{ (Request::is('admin/users') ? ' class=active' : '') }} ">
                        <a href="#">
                            <i class="entypo-users"></i>
                            <span>Front User</span>
                        </a>
                        <ul>

                            <li class="active">
                                <a href="{{URL::to('admin/users/index')}}"  >
                                    <span>Front User List </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{URL::to('admin/users/create')}}">
                                    <span>Add New Front User </span>
                                </a>
                            </li>


                        </ul>
                    </li>

                    <li class=" {{ (Request::is('admin/users') ? ' class=active' : '') }} ">
                        <a href="#">
                            <i class="entypo-users"></i>
                            <span>Shop Owner</span>
                        </a>
                        <ul>

                            <li class="active">
                                <a href="{{URL::to('admin/users/sho_index')}}"  >
                                    <span>Shop Owner List </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{URL::to('admin/users/sho_create')}}">
                                    <span>Add New Shop Owner </span>
                                </a>
                            </li>


                        </ul>
                    </li>
                     
                    <li class=" {{ (Request::is('admin/users') ? ' class=active' : '') }} ">
                        <a href="#">
                            <i class="entypo-users"></i>
                            <span>Manage Categories</span>
                        </a>
                        <ul>

                            <li class="active">
                                <a href="{{URL::to('admin/category/index')}}"  >
                                    <span>Add Category</span>
                                </a>
                            </li>

                           


                        </ul>
                    </li>

                    <li class=" {{ (Request::is('admin/users') ? ' class=active' : '') }} ">
                        <a href="{{URL::to('admin/users/shops_index')}}">
                            <i class="entypo-users"></i>
                            <span>Shop List</span>
                            <span class="badge badge-success chat-notifications-badge">
                                        <?php echo Text::totalshop(); ?> 
                                    </span>
                        </a>
<!--                        <ul>

                            <li class="active">
                                <a href="{{URL::to('admin/users/shops_index')}}"  >
                                    <span>Shop List </span>

                                    <span class="badge badge-success chat-notifications-badge">
                                        <?php echo Text::totalshop(); ?> 
                                    </span>
                                </a>
                            </li>

                                                        <li>
                                                            <a href="{{URL::to('admin/users/shops_create')}}">
                                                                <span>Add New Shop </span>
                                                            </a>
                                                        </li>


                        </ul>-->
                    </li>




                    <li class=" {{ (Request::is('admin/users') ? ' class=active' : '') }} ">
                        <a href="{{URL::to('admin/gallery/index')}}"><i class="entypo-users"></i>
                            <span>Gallery List</span>
                        </a>
<!--                        <ul>

                            <li class="active">
                                <a href="{{URL::to('admin/gallery/index')}}"  >
                                    <span>Gallery List </span>
                                </a>
                            </li>

                                                        <li>
                                                            <a href="{{URL::to('admin/gallery/add')}}">
                                                                <span>Add New Gallery </span>
                                                            </a>
                                                        </li>


                        </ul>-->
                    </li>


                    <li class=" {{ (Request::is('admin/users') ? ' class=active' : '') }} ">
                        <a href="{{URL::to('admin/advertisement/index')}}"><i class="entypo-users"></i>
                            <span>Advertisement List </span>
                        </a>
<!--                        <ul>

                            <li class="active">
                                <a href="{{URL::to('admin/advertisement/index')}}"  >
                                    <span>Advertisement List </span>
                                </a>
                            </li>

                                                        <li>
                                                            <a href="{{URL::to('admin/advertisement/add')}}">
                                                                <span>Add Advertisement </span>
                                                            </a>
                                                        </li>


                        </ul>-->
                    </li>

                    <li class=" {{ (Request::is('admin/users') ? ' class=active' : '') }} ">
                        <a href="#"><i class="entypo-users"></i>
                            <span>Static Page Management</span>
                        </a>
                        <ul>

                            <li class="active">
                                <a href="{{URL::to('admin/staticpages/index')}}"  >
                                    <span>Static Page List</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{URL::to('admin/staticpages/add')}}">
                                    <span>Add Static page </span>
                                </a>
                            </li>


                        </ul>
                    </li>
                    <li class=" {{ (Request::is('admin/users') ? ' class=active' : '') }} ">
                        <a href="{{URL::to('admin/emailmanagement/index')}}"><i class="entypo-users"></i>
                            <span>Email Templates Management</span>
                        </a>

                    </li>

                    <li class=" {{ (Request::is('admin/users') ? ' class=active' : '') }} ">
                        <a href="#"><i class="entypo-users"></i>
                            <span>Manage Notification</span>
                        </a>
                        <ul>

                            <li class="active">
                                <a href="{{URL::to('admin/forshopupdate/update_index')}}"  >
                                    <span>Update Shop</span>
                                    <span class="badge badge-success chat-notifications-badge">
                                        <?php echo Text::newupadteshop(1); ?> 
                                    </span>
                                </a>

                            </li>

                            <li>
                                <a href="{{URL::to('admin/forshopupdate/newShop_index')}}">
                                    <span>New Shop</span>
                                    <span class="badge badge-success chat-notifications-badge">
                                        <?php echo Text::newupadteshop(2); ?> 
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{URL::to('admin/forshopupdate/closure_index')}}">
                                    <span>Shop Closure </span>
                                    <span class="badge badge-success chat-notifications-badge">
                                        <?php echo Text::newupadteshop(3); ?> 
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{URL::to('admin/forshopupdate/relocation_index')}}">
                                    <span>Shop Relocation </span>
                                    <span class="badge badge-success chat-notifications-badge">
                                        <?php echo Text::newupadteshop(4); ?> 
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{URL::to('admin/forshopupdate/renovation_index')}}">
                                    <span>Shop Renovation</span>
                                    <span class="badge badge-success chat-notifications-badge">
                                        <?php echo Text::newupadteshop(5); ?> 
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{URL::to('admin/forshopupdate/Branch_index')}}">
                                    <span>Add Branch</span>
                                    <span class="badge badge-success chat-notifications-badge">
                                        <?php echo Text::newupadteshop(6); ?> 
                                    </span>
                                </a>
                            </li>


                        </ul>
                    </li>
<li class=" {{ (Request::is('admin/users') ? ' class=active' : '') }} ">
                        <a href="{{URL::to('admin/newsletter/index')}}"><i class="entypo-users"></i>
                            <span>Newsletter Subscription Management</span>
                        </a>

                    </li>
<li class=" {{ (Request::is('admin/users') ? ' class=active' : '') }} ">
                        <a href="{{URL::to('admin/shopowner/index')}}"><i class="entypo-users"></i>
                            <span>Shop in-charge</span>
                        </a>

                    </li>
<li class=" {{ (Request::is('admin/users') ? ' class=active' : '') }} ">
                        <a href="{{URL::to('admin/members/index')}}"><i class="entypo-users"></i>
                            <span>Membership Dashboard</span>
                        </a>

                    </li>

                    @endif             

                    <!--<li class=" {{ (Request::is('admin/newscategory') ? ' class=active' : '') }} ">
                            <a href="#">
                                    <i class="entypo-gauge"></i>
                                    <span>Categories</span>
                            </a>
                            <ul>
                                    
                                    <li class="active">
                                            <a href="#">
                                                    <span>Categories List </span>
                                            </a>
                                    </li>
                                    
                                    <li>
                                            <a href="{{URL::to('admin/newscategory')}}">
                                                    <span>Add New Category </span>
                                            </a>
                                    </li>
                                    
                                     
                            </ul>
                    </li>-->

                </ul>

            </div>	

            <div class="main-content">

                <div class="row">

                    <!-- Profile Info and Notifications -->



                    <!-- Raw Links -->

                    <div class="col-md-12  ">

                        <div class="col-md-12  clearfix">
                            <ul class="col-md-9 user-info pull-left pull-none-xsm">
                            </ul>
                            <ul class="col-md-3 user-info pull-left pull-none-xsm">

                                <!-- Profile Info -->
                                <li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->

                                    @if (Auth::user())

                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="{{ (Auth::user()->image!=null) ? asset('uploads/users/'.Auth::user()->image ): asset('img/default_male.jpg')  }}" alt="" class="img-circle" width="44"/>

                                        {{ Auth::user()->name }} 
                                    </a>
                                    @else

                                    @endif



                                    <ul class="dropdown-menu">

                                        <!-- Profile sub-links -->
                                        <li> 
                                            <a href="{{URL::to('admin/users/'.base64_encode( Auth::user()->id).'/editprofile')}}">
                                                <i class="entypo-user"></i>
                                                Edit Profile
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{URL::to('admin/users/'.base64_encode(Auth::user()->id).'/changePasswor')}}">
                                                <i class="entypo-lock"></i>
                                                Change Password
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{URL::to('admin/users/'.base64_encode(Auth::user()->id).'/changeProfileImage')}}">
                                                <i class="entypo-calendar"></i>
                                                Change Profile Image
                                            </a>
                                        </li>

                                        <!--                                        <li>
                                                                                    <a href="#">
                                                                                        <i class="entypo-clipboard"></i>
                                                                                        Tasks
                                                                                    </a>
                                                                                </li>-->
                                        <li>
                                            <a href="{{ url('/auth/logout') }}">
                                                Log Out <i class="entypo-logout right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>


                        </div>


                    </div>

                </div>

                <hr />


                <div class="row">

                    @include('errors.messagediv')
                    @include('errors.list')


                    <div class="col-sm-12">
                        <!-- Manish cconten -->
                        @yield('content')

                    </div>


                </div>

                <!-- Footer
                <footer class="main">
                        
                                
                        &copy; 2014 <strong>Neon</strong> Admin Theme by <a href="http://laborator.co" target="_blank">Laborator</a>
                         
                </footer>-->	

            </div>




        </div>

        <!-- Sample Modal (Skin gray) -->

        <!-- Modal Dialog -->
        <div class="modal fade"  style="z-index:1150" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Delete Parmanently</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure about this ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                        <a class="btn btn-danger btn-ok" id="confirm">Delete</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dialog show event handler -->
        <script type="text/javascript">
$('#confirmDelete').on('show.bs.modal', function (e) {
    $message = $(e.relatedTarget).attr('data-message');
    $(this).find('.modal-body p').text($message);
    $title = $(e.relatedTarget).attr('data-title');
    $(this).find('.modal-title').text($title);
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    // Pass form reference to modal for submission on yes/ok
    var form = $(e.relatedTarget).closest('form');
    $(this).find('.modal-footer #confirm').data('form', form);
});

        </script>

        <link href="{{ asset('assets/js/jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet">	
        <link href="{{ asset('assets/js/rickshaw/rickshaw.min.css') }}" rel="stylesheet">	

        <!-- Bottom Scripts -->
        <script src="{{ asset('assets/js/gsap/main-gsap.js') }}  "></script>
        <script src="{{ asset('assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') }}  "></script>
        <script src="{{ asset('assets/js/bootstrap.js') }}  "></script>
        <script src="{{ asset('assets/js/joinable.js') }}  "></script>
        <script src="{{ asset('assets/js/resizeable.js') }}  "></script>
        <script src="{{ asset('assets/js/neon-api.js') }}  "></script>
        <script src="{{ asset('assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js') }}  "></script>
        <script src="{{ asset('assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js') }}  "></script>
        <script src="{{ asset('assets/js/jvectormap/jquery-jvectormap-world-mill-en.js') }}  "></script>

        <script src="{{ asset('assets/js/jquery.sparkline.min.js') }}  "></script>
        <script src="{{ asset('assets/js/rickshaw/vendor/d3.v3.js') }}  "></script>
        <script src="{{ asset('assets/js/rickshaw/rickshaw.min.js') }}  "></script>
        <script src="{{ asset('assets/js/neon-custom.js') }}  "></script>
        <script src="{{ asset('assets/js/neon-demo.js') }}  "></script>
        <script src="{{ asset('js/jquery.maskedinput.js') }}  "></script>

        <script type="text/javascript" src="{{ asset('css/timepicki/timepicki.js') }} "></script>
        <script>

$('#shop_type').change(function ()
{

    $.get('{{{ URL::to('') }}}/admin/users/' + this.value + '/shop_type', function (data)
    {
        $('#shopTypeCategory').html(data);

    });
});
jQuery(function ($) {
    $(".time").mask("99:99:99", {placeholder: "hh:mm:ss"});
    //$("#mondayopen").setMask({mask: "time", defaultValue:"hh:mm"});
    // $('#mondayopen').mask("99:99 to 99:99");
    //$("#mondayopen").inputmask({ alias: "date", "clearIncomplete": true });
    //
//    $("#phone").mask("(999) 999-9999");
//    $("#tin").mask("99-9999999");
//    $("#ssn").mask("999-99-9999");
});
        </script>
    </body>
</html>
