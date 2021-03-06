<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Sillab">

    <title>Admin::Laboratorium</title>
	
    <!-- Bootstrap Core CSS -->
	{{ HTML::style('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}
    <link href="/assets/dtbootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <!--{{ HTML::style('assets/assets/dist/css/datepicker.css') }}-->
    <!-- MetisMenu CSS -->
	{{ HTML::style('assets/bower_components/metisMenu/dist/metisMenu.min.css') }}
    <!-- Custom CSS -->
	{{ HTML::style('assets/dist/css/sb-admin-2.css') }}
    <!-- Custom Fonts -->
	{{ HTML::style('assets/bower_components/font-awesome/css/font-awesome.min.css') }}
	<!--Charts CSS -->
	<script type="text/javascript" src="/assets/hightchart/jquery.min.js"></script>
	<style type="text/css">
			${demo.css}
	</style>
</head>
<body>
    <div id="wrapper">
	<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
			@include('layouts.header')
			@include('layouts.sidebar')
        </nav>
        <!-- Page Content -->
        <div id="page-wrapper">
				@yield('content')
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
	
    <!-- /#wrapper -->
    <!-- jQuery -->
	{{ HTML::script('assets/bower_components/jquery/dist/jquery.min.js') }}
    <!--{{ HTML::script('assets/assets/dist/js/bootstrap-datepicker.js') }}-->
    <!-- Bootstrap Core JavaScript -->
	{{ HTML::script('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}
    <!-- Metis Menu Plugin JavaScript -->
	{{ HTML::script('assets/bower_components/metisMenu/dist/metisMenu.min.js') }}
    <!-- Custom Theme JavaScript -->
	{{ HTML::script('assets/dist/js/sb-admin-2.js') }}
	<!--Datetime-->
	<script type="text/javascript" src="/assets/dtbootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="/assets/dtbootstrap/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
	<script type="text/javascript" src="/assets/dtbootstrap/dt.js" charset="UTF-8"></script>
	<!--chart-->
	<script src="/assets/hightchart/highcharts.js"></script>
	<script src="/assets/hightchart/modules/exporting.js"></script>
    
</body>
</html>
