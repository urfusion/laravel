<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Neon Admin Panel" />
        <meta name="author" content="" />

        <title>Neon | Login</title>

        <link href="{{ asset('assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/font-icons/entypo/css/entypo.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/neon-core.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/neon-theme.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/neon-forms.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">

        <script src="{{ asset('assets/js/jquery-1.11.0.min.js') }}  "></script>


        <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->


    </head>
    <body class="page-body login-page login-form-fall boxed-layout"  >

        <div class="login-container">

            <div class="login-header login-caret">

                <div class="login-content">

                    <a href="#">
                        <img src="{{ asset('assets/images/logo@2x.png') }} " width="120" alt="" />
                    </a>

                    <p class="description">Forgot Passwordadsadasd</p>
                    
                </div>

            </div>

            <div class="login-progressbar">
                <div></div>
            </div>

            <div class="login-form">

                <div class="login-content">
                   
                    
                     @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                      @include('errors.list')
                    <form class="form-horizontal" role="form" method="POST" action="{!! URL::to('/password/email') !!}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-user"></i>
                                </div>
<input type="email" class="form-control" name="email" placeholder="Email Id" data-validate="email"  autocomplete="off"  value="{{ old('email') }}">
                            

                            </div>

                        </div>

                         
 

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block btn-login">
                                <i class="entypo-login"></i>
                               Send Password Reset Link
                            </button>
                        </div>

                         			
                    </form>

 

                </div>

            </div>

        </div>


        <!-- Bottom Scripts -->
        <script src="{{ asset('assets/js/gsap/main-gsap.js') }}  "></script>
        <script src="{{ asset('assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') }}  "></script>
        <script src="{{ asset('assets/js/bootstrap.js') }}  "></script>
        <script src="{{ asset('assets/js/joinable.js') }}  "></script>
        <script src="{{ asset('assets/js/resizeable.js') }}  "></script>
        <script src="{{ asset('assets/js/neon-api.js') }}  "></script>
        <script src="{{ asset('assets/js/jquery.validate.min.js') }}  "></script>
        <script src="{{ asset('assets/js/neon-login.js') }}  "></script>

        <script src="{{ asset('assets/js/neon-demo.js') }}  "></script>


    </body>
</html> 
