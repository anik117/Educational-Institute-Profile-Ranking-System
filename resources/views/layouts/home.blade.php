
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SRS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="School Ranking System" />
    <meta name="author" content="Tanvir Ahassan" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,600,400italic,700' rel='stylesheet' type='text/css'>
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Flexslider -->
    <link rel="stylesheet" href="css/flexslider.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="stylesheet" href="css/purple.css">

    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    </head>

    <body>

    <!-- Loader -->
    <div class="fh5co-loader"></div>

    <div id="fh5co-page">
        @include('inc.header')
        @yield('content')
        @include('inc.footer')
    </div>
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- Flexslider -->
    <script src="js/jquery.flexslider-min.js"></script>
    <!-- Magnific Popup -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>

    <!-- Main JS (Do not remove) -->
    <script src="js/main.js"></script>

    <!-- 
    INFO:
    jQuery Cookie for Demo Purposes Only. 
    The code below is to toggle the layout to boxed or wide 
    -->
    <script src="js/jquery.cookie.js"></script>
    <script>
        $(function(){

            if ( $.cookie('layoutCookie') != '' ) {
                $('body').addClass($.cookie('layoutCookie'));
            }

            $('a[data-layout="boxed"]').click(function(event){
                event.preventDefault();
                $.cookie('layoutCookie', 'boxed', { expires: 7, path: '/'});
                $('body').addClass($.cookie('layoutCookie')); // the value is boxed.
            });

            $('a[data-layout="wide"]').click(function(event){
                event.preventDefault();
                $('body').removeClass($.cookie('layoutCookie')); // the value is boxed.
                $.removeCookie('layoutCookie', { path: '/' }); // remove the value of our cookie 'layoutCookie'
            });
        });
    </script>
    </body>
</html>