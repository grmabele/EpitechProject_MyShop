
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>Home | Publish-site</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{('/assets/images/favicon.png')}}" type="image/png">

    <!--====== Nice Select CSS ======-->
    <link rel="stylesheet" href="{{('/assets/css/nice-select.css')}}">

    <!--====== Font Awesome CSS ======-->
    <link rel="stylesheet" href="{{('/assets/css/fontawesome/css/all.css')}}">

    <!--====== Font myfont CSS ======-->
    <link rel="stylesheet" href="{{('/assets/myfont/styles.css')}}">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="{{('/assets/css/bootstrap.min.css')}}">

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="{{('/assets/css/default.css')}}">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="{{('/assets/css/style.css')}}">

    </head>
<!--====== HEADER PART START ======-->
<body>
<header class="header_area">

    <div class="header_navbar">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="index.html">
                    <img src="assets/images/logo.png" alt="logo">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="fasse" aria-label="Toggle navigation">
                    <span class="toggler-icon"></span>
                    <span class="toggler-icon"></span>
                    <span class="toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        <li>
                            <a class="active" href="{{url('/')}}">Home <span class="line"></span></a>
                        </li>

                        <li><a href="{{url('/contact')}}">Contact <span class="line"></span></a></li>
                    </ul>
                </div>

                <div class="navbar_btn">
                    <ul>
                        <li>
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="fasse">My account</a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <ul>
                                        <li><a href="profile-settings.html"><i class="fas fa-cog"></i> Profile Settings</a></li>
                                        <li><a href="my-ads.html"><i class="fas fa-layer-group"></i> My Ads</a></li>
                                        <li><a href="#"><i class="fas fa-sign-out"></i> Sign Out</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li><a class="sign-up" href="post-ads.html">Post Ads</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
<!--====== HEADER PART ENDS ======-->


        @yield('content')


<!--====== CALL TO ACTION PART START-footer ======-->

<section class="call_to_action_area pt-20 pb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="call_to_action_content mt-45">
                    <h4 class="title">Subscribe For Update</h4>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="call_to_action_form mt-50">
                    <form action="#">
                        <i class="fas fa-envelope"></i>
                        <input type="text" placeholder="Enter your mail address . . .">
                        <button class="main-btn">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!--====== CALL TO ACTION PART ENDS ======-->

<!--====== FOOTER PART START ======-->
<footer>
    <div class="footer_copyright pt-15 pb-30">
        <div class="container">
            <div class="footer_copyright_wrapper text-center d-sm-flex justify-content-between align-items-center">
                <div class="copyright mt-15">
                    <ul class="link d-flex">
                        <li class="m-2"><a href="#">Home</a></li>
                        <li class="m-2"><a href="#">Contact Us</a></li>
                    </ul>
                </div>

                <div class="payment mt-15">
                    <ul>
                        <li><a href="#"><img src="assets/images/icon/payment-method1.jpg" alt="payment"></a></li>
                        <li><a href="#"><img src="assets/images/icon/payment-method2.jpg" alt="payment"></a></li>
                        <li><a href="#"><img src="assets/images/icon/payment-method3.jpg" alt="payment"></a></li>
                        <li><a href="#"><img src="assets/images/icon/payment-method4.jpg" alt="payment"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<!--====== FOOTER PART ENDS ======-->


<!--====== Jquery js ======-->
<script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>

<!--====== Bootstrap js ======-->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!--====== Slick js ======-->
<script src="assets/js/slick.min.js"></script>

<!--====== Magnific Popup js ======-->
<script src="assets/js/jquery.magnific-popup.min.js"></script>

<!--====== Nice Select js ======-->
<script src="assets/js/jquery.nice-select.min.js"></script>

<!--====== Counter Up js ======-->
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>

<!--====== Price Range js ======-->
<script src="assets/js/ion.rangeSlider.min.js"></script>

<!--====== Ajax Contact js ======-->
<script src="assets/js/ajax-contact.js"></script>

<!--====== Main js ======-->
<script src="assets/js/main.js"></script>


</body>
</html>
