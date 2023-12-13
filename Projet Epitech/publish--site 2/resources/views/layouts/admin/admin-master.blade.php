<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Dashio - Bootstrap Admin Template</title>

    <!-- Favicons -->
    <link href="{{('/assets/admin/img/favicon.png')}}" rel="icon">
    <link href="{{('/assets/admin/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{('/assets/admin/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{('/assets/admin/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="lib/bootstrap-fileupload/bootstrap-fileupload.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{('/assets/admin/lib/bootstrap-datepicker/css/datepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{('/assets/admin/lib/bootstrap-daterangepicker/daterangepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{('/assets/admin/lib/bootstrap-timepicker/compiled/timepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{('/assets/admin/lib/bootstrap-datetimepicker/datertimepicker.css')}}" />
    <!-- Custom styles for this template -->
    <link href="{{('/assets/admin/css/style.css')}}" rel="stylesheet">
    <link href="{{('/assets/admin/css/style-responsive.css')}}" rel="stylesheet">

    <!-- =======================================================
      Template Name: Dashio
      Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
      Author: TemplateMag.com
      License: https://templatemag.com/license/
    ======================================================= -->
</head>

<body>
<section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    @include('layouts.admin.header')
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
  @include('layouts.admin.sidebar')
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->

@yield('content')

    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
        <div class="text-center">
            <p>
                &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
            </p>
            <div class="credits">
                <!--
                  You are NOT allowed to delete the credit link to TemplateMag with free version.
                  You can delete the credit link only if you bought the pro version.
                  Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
                  Licensing information: https://templatemag.com/license/
                -->
                Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
            </div>
            <a href="advanced_form_components.blade.php#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
    <!--footer end-->
</section>


<!-- js placed at the end of the document so the pages load faster -->
<script src="{{('/assets/admin/lib/jquery/jquery.min.js')}}"></script>
<script src="{{('/assets/admin/lib/bootstrap/js/bootstrap.min.js')}}"></script>
<script class="include" type="text/javascript" src="{{('/assets/admin/lib/jquery.dcjqaccordion.2.7.js')}}></script>
<script src="{{('/assets/admin/lib/jquery.scrollTo.min.js')}}" > </script>
<script src="{{('/assets/admin/lib/jquery.nicescroll.js')}}" type="text/javascript"></script>
<!--common script for all pages-->
<script src="{{('/assets/admin/lib/common-scripts.js')}}"></script>
<!--script for this page-->
<script src="{{('/assets/admin/lib/jquery-ui-1.9.2.custom.min.js')}}"></script>
<script type="text/javascript" src="{{('/assets/admin/lib/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
<script type="text/javascript" src="{{('/assets/admin/lib/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript" src="{{('/assets/admin/lib/bootstrap-daterangepicker/date.js')}}"></script>
<script type="text/javascript" src="{{('/assets/admin/lib/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script type="text/javascript" src="{{('/assets/admin/lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}}"></script>
<script type="text/javascript" src="{{('/assets/admin/lib/bootstrap-daterangepicker/moment.min.js')}}"></script>
<script type="text/javascript" src="{{('/assets/admin/lib/bootstrap-timepicker/js/bootstrap-timepicker.js')}}"></script>
<script src="{{('/assets/admin/lib/advanced-form-components.js')}}"></script>



</body>

</html>
